<?php

namespace App\Http\Controllers;

use App\Models\Health;
use App\Models\DiningRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class HealthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        //validate con Validator
        $validator = Validator::make($request->all(), [
            'file_health' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'dining_id' => 'required'
        ]);
        

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error_healths', 'No se ha podido crear el anuncio')
                ->with('section', 'healths')
                ->withErrors($validator->getMessageBag());
        }

        $dining = DiningRoom::find($request->dining_id);

        $health = [
            'title' => $request->title ?? null,
            'description' => $request->description ?? null,
            'vigencia' => json_encode([
                'start' => $request->start_date,
                'end' => $request->end_date
            ]),
            'dining_room_id' => $request->dining_id,
        ];

        $file = $request->file('file_health');

        $nameFile = date('Y-m-d-s') . '_health.' . $file->getClientOriginalExtension();
        $path = 'dining_room/' . $dining->slug . "/health/";

        $health['resource'] = $path . $nameFile;

        if ($file->isValid()) {
            Storage::putFileAs('public/' . $path, $file, $nameFile);
        } else {
            return redirect()->back()
                ->with('error_healths', 'No se ha podido crear el platillo por un problema con la imagen')
                ->with('section', 'healths');
        }

        $health = Health::create($health);

        $health->diningRooms()->attach($dining);

        return redirect()->back()
            ->with('success_healths', 'Anuncio creado correctamente')
            ->with('section', 'healths');
    }

    public function editHealth(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'start_date_edit' => 'required',
            'end_date_edit' => 'required',
            'health_id_edit' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error_edit_healths', 'No se ha podido crear el anuncio')
                ->with('health_id', $request->health_id_edit)
                ->with('section', 'healths')
                ->withErrors($validator->getMessageBag());
        }

        $edit = Health::find($request->input('health_id_edit'));
        $dining = $edit->diningRooms()->first();

        if ($edit) {
            $edit->title = $request->title_edit ?? $edit->title;
            $edit->description = $request->description_edit ?? $edit->description;
            $edit->vigencia = json_encode([
                'start' => $request->input('start_date_edit'),
                'end' => $request->input('end_date_edit'),
            ]);

            if ($request->hasFile('file_health_edit')) {
                $file = $request->file('file_health_edit');
                $nameFile = date('Y-m-d-s') . '_health.' . $file->getClientOriginalExtension();
                $path = 'dining_room/' . $dining->slug . "/health/";
                $edit->resource = $path . $nameFile;
                if ($file->isValid()) {
                    // Eliminar imagen anterior
                    Storage::delete('public/' . $edit->resource);
                    Storage::putFileAs('public/' . $path, $file, $nameFile);
                } else {
                    return redirect()->back()
                        ->with('error_edit_healths', 'No se ha podido crear el platillo por un problema con la imagen')
                        ->with('section', 'healths');
                }
            }

            $edit->save();

            return redirect()->back()->with('success_health', 'Editado correctamente')
                ->with('section', 'healths');
        } else {
            return redirect()->back()->with('error_edit_health', 'No se ha podido editar el anuncio')
                ->with('section', 'healths');
        }
    }
    public function deleteHealth(Request $request)
    {
        $dining_id = $request->saludable_id;
        $saludable = Health::find($dining_id);
        $saludable->diningRooms()->detach();
        $saludable->delete();
        return response()->json(['success' => 'Eliminado correctaente'], 200);
    }

}
