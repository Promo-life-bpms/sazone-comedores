<?php

namespace App\Http\Controllers;

use App\Models\DiningRoom;
use App\Models\Capsula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class NutriCapsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        //validate con Validator
        $validator = Validator::make($request->all(), [
            'file_capsula' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'dining_id' => 'required'
        ]);


        if ($validator->fails()) {
            return redirect()->back()
                ->with('error_capsula', 'No se ha podido crear la seccion')
                ->with('section', 'capsulas')
                ->withErrors($validator->getMessageBag());
        }

        $dining = DiningRoom::find($request->dining_id);

        $capsulas = [
            'title' => $request->title ?? null,
            'description' => $request->description ?? null,
            'vigencia' => json_encode([
                'start' => $request->start_date,
                'end' => $request->end_date
            ]),
            'dining_room_id' => $request->dining_id,
        ];

        $file = $request->file('file_capsula');

        $nameFile = date('Y-m-d-s') . '_capsula.' . $file->getClientOriginalExtension();
        $path = 'dining_room/' . $dining->slug . "/capsulas/";

        $capsulas['resource'] = $path . $nameFile;

        if ($file->isValid()) {
            Storage::putFileAs('public/' . $path, $file, $nameFile);
        } else {
            return redirect()->back()
                ->with('error_capsula', 'No se ha podido crear la seccion por un problema con la imagen')
                ->with('section', 'capsulas');
        }

        $capsulas = Capsula::create($capsulas);

        $capsulas->diningRooms()->attach($dining);

        return redirect()->back()
            ->with('success_capsula', 'Seccion creado correctamente')
            ->with('section', 'capsulas');
    }

    public function editNutriCaps(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'start_date_edit' => 'required',
            'end_date_edit' => 'required',
            'capsula_id_edit' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error_edit_capsula', 'No se ha podido crear la seccion')
                ->with('capsula_id', $request->capsula_id_edit)
                ->with('section', 'capsulas')
                ->withErrors($validator->getMessageBag());
        }

        $edit = Capsula::find($request->input('capsula_id_edit'));
        $dining = $edit->diningRooms()->first();

        if ($edit) {
            $edit->title = $request->title_edit ?? $edit->title;
            $edit->description = $request->description_edit ?? $edit->description;
            $edit->vigencia = json_encode([
                'start' => $request->input('start_date_edit'),
                'end' => $request->input('end_date_edit'),
            ]);

            if ($request->hasFile('file_capsula_edit')) {
                $file = $request->file('file_capsula_edit');
                $nameFile = date('Y-m-d-s') . '_capsula.' . $file->getClientOriginalExtension();
                $path = 'dining_room/' . $dining->slug . "/capsulas/";
                $edit->resource = $path . $nameFile;
                if ($file->isValid()) {
                    // Eliminar imagen anterior
                    Storage::delete('public/' . $edit->resource);
                    Storage::putFileAs('public/' . $path, $file, $nameFile);
                } else {
                    return redirect()->back()
                        ->with('error_edit_capsula', 'No se ha podido crear la seccion por un problema con la imagen')
                        ->with('section', 'capsulas');
                }
            }

            $edit->save();

            return redirect()->back()->with('success_capsula', 'Editado correctamente')
                ->with('section', 'capsulas');
        } else {
            return redirect()->back()->with('error_edit_capsula', 'No se ha podido editar la seccion')
                ->with('section', 'capsulas');
        }
    }
    public function deleteNutriCaps(Request $request)
    {
        $dining_id = $request->nutriCaps_id;
        $nutriCaps = Capsula::find($dining_id);
        $nutriCaps->diningRooms()->detach();
        $nutriCaps->delete();
        return response()->json(['success' => 'Eliminado correctaente'], 200);
    }
}
