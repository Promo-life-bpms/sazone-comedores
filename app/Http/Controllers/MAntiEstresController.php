<?php

namespace App\Http\Controllers;

use App\Models\DiningRoom;
use App\Models\Estre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MAntiEstresController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        //validate con Validator
        $validator = Validator::make($request->all(), [
            'file_mantiestre' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'dining_id' => 'required'
        ]);
        

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error_estre', 'No se ha podido crear la seccion')
                ->with('section', 'estres')
                ->withErrors($validator->getMessageBag());
        }

        $dining = DiningRoom::find($request->dining_id);

        $estres = [
            'title' => $request->title ?? null,
            'description' => $request->description ?? null,
            'vigencia' => json_encode([
                'start' => $request->start_date,
                'end' => $request->end_date
            ]),
            'dining_room_id' => $request->dining_id,
        ];

        $file = $request->file('file_mantiestre');

        $nameFile = date('Y-m-d-s') . '_mantiestre.' . $file->getClientOriginalExtension();
        $path = 'dining_room/' . $dining->slug . "/mantiestres/";

        $estres['resource'] = $path . $nameFile;

        if ($file->isValid()) {
            Storage::putFileAs('public/' . $path, $file, $nameFile);
        } else {
            return redirect()->back()
                ->with('error_estre', 'No se ha podido crear la seccion por un problema con la imagen')
                ->with('section', 'estres');
        }

        $estres = Estre::create($estres);

        $estres->diningRooms()->attach($dining);

        return redirect()->back()
            ->with('success_estre', 'Seccion creado correctamente')
            ->with('section', 'estres');
    }

    public function editMenuEstres(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'start_date_edit' => 'required',
            'end_date_edit' => 'required',
            'estre_id_edit' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error_edit_estre', 'No se ha podido crear la seccion')
                ->with('estre_id', $request->estre_id_edit)
                ->with('section', 'estres')
                ->withErrors($validator->getMessageBag());
        }

        $edit = Estre::find($request->input('estre_id_edit'));
        $dining = $edit->diningRooms()->first();

        if ($edit) {
            $edit->title = $request->title_edit ?? $edit->title;
            $edit->description = $request->description_edit ?? $edit->description;
            $edit->vigencia = json_encode([
                'start' => $request->input('start_date_edit'),
                'end' => $request->input('end_date_edit'),
            ]);

            if ($request->hasFile('file_estre_edit')) {
                $file = $request->file('file_estre_edit');
                $nameFile = date('Y-m-d-s') . '_mantiestre.' . $file->getClientOriginalExtension();
                $path = 'dining_room/' . $dining->slug . "/mantiestre/";
                $edit->resource = $path . $nameFile;
                if ($file->isValid()) {
                    // Eliminar imagen anterior
                    Storage::delete('public/' . $edit->resource);
                    Storage::putFileAs('public/' . $path, $file, $nameFile);
                } else {
                    return redirect()->back()
                        ->with('error_edit_estre', 'No se ha podido crear la seccion por un problema con la imagen')
                        ->with('section', 'estres');
                }
            }

            $edit->save();

            return redirect()->back()->with('success_estre', 'Editado correctamente')
                ->with('section', 'estres');
        } else {
            return redirect()->back()->with('error_edit_estre', 'No se ha podido editar la seccion')
                ->with('section', 'estres');
        }
    }
    public function deleteMenuEstres(Request $request)
    {
        $dining_id = $request->menuAnti_id;
        $menuAnti = Estre::find($dining_id);
        $menuAnti->diningRooms()->detach();
        $menuAnti->delete();
        return response()->json(['success' => 'Eliminado correctaente'], 200);
    }
}
