<?php

namespace App\Http\Controllers;

use App\Models\Nutrition;
use App\Models\DiningRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class NutritionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        //validate con Validator
        $validator = Validator::make($request->all(), [
            'file_nutrition' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'dining_id' => 'required'
        ]);
        

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error_nutritions', 'No se ha podido crear la seccion')
                ->with('section', 'nutritions')
                ->withErrors($validator->getMessageBag());
        }

        $dining = DiningRoom::find($request->dining_id);

        $nutrition = [
            'title' => $request->title ?? null,
            'description' => $request->description ?? null,
            'vigencia' => json_encode([
                'start' => $request->start_date,
                'end' => $request->end_date
            ]),
            'dining_room_id' => $request->dining_id,
        ];

        $file = $request->file('file_nutrition');

        $nameFile = date('Y-m-d-s') . '_nutrition.' . $file->getClientOriginalExtension();
        $path = 'dining_room/' . $dining->slug . "/nutrition/";

        $nutrition['resource'] = $path . $nameFile;

        if ($file->isValid()) {
            Storage::putFileAs('public/' . $path, $file, $nameFile);
        } else {
            return redirect()->back()
                ->with('error_nutritions', 'No se ha podido crear la seccion por un problema con la imagen')
                ->with('section', 'nutritions');
        }

        $nutrition = Nutrition::create($nutrition);

        $nutrition->diningRooms()->attach($dining);

        return redirect()->back()
            ->with('success_nutritions', 'Seccion creado correctamente')
            ->with('section', 'nutritions');
    }

    public function editNutrition(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'start_date_edit' => 'required',
            'end_date_edit' => 'required',
            'nutrition_id_edit' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error_edit_nutritions', 'No se ha podido crear la seccion')
                ->with('nutrition_id', $request->nutrition_id_edit)
                ->with('section', 'nutritions')
                ->withErrors($validator->getMessageBag());
        }

        $edit = Nutrition::find($request->input('nutrition_id_edit'));
        $dining = $edit->diningRooms()->first();

        if ($edit) {
            $edit->title = $request->title_edit ?? $edit->title;
            $edit->description = $request->description_edit ?? $edit->description;
            $edit->vigencia = json_encode([
                'start' => $request->input('start_date_edit'),
                'end' => $request->input('end_date_edit'),
            ]);

            if ($request->hasFile('file_nutritions_edit')) {
                $file = $request->file('file_nutritions_edit');
                $nameFile = date('Y-m-d-s') . '_nutrition.' . $file->getClientOriginalExtension();
                $path = 'dining_room/' . $dining->slug . "/nutrition/";
                $edit->resource = $path . $nameFile;
                if ($file->isValid()) {
                    // Eliminar imagen anterior
                    Storage::delete('public/' . $edit->resource);
                    Storage::putFileAs('public/' . $path, $file, $nameFile);
                } else {
                    return redirect()->back()
                        ->with('error_edit_nutritions', 'No se ha podido crear la seccion por un problema con la imagen')
                        ->with('section', 'nutritions');
                }
            }

            $edit->save();

            return redirect()->back()->with('success_nutritions', 'Editado correctamente')
                ->with('section', 'nutritions');
        } else {
            return redirect()->back()->with('error_edit_nutritions', 'No se ha podido editar la seccion')
                ->with('section', 'nutritions');
        }
    }
    public function deleteNutrition(Request $request)
    {
        $dining_id = $request->nutricion_id;
        $nutricion = Nutrition::find($dining_id);
        $nutricion->diningRooms()->detach();
        $nutricion->delete();
        return response()->json(['success' => 'Eliminado correctaente'], 200);
    }
}
