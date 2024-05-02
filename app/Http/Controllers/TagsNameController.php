<?php

namespace App\Http\Controllers;

use App\Models\TagName;
use App\Models\DiningRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TagsNameController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        //validate con Validator
        $validator = Validator::make($request->all(), [
            'file_tagname' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'dining_id' => 'required'
        ]);
        

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error_tags', 'No se ha podido crear la seccion')
                ->with('section', 'tags')
                ->withErrors($validator->getMessageBag());
        }

        $dining = DiningRoom::find($request->dining_id);

        $tags = [
            'title' => $request->title ?? null,
            'description' => $request->description ?? null,
            'vigencia' => json_encode([
                'start' => $request->start_date,
                'end' => $request->end_date
            ]),
            'dining_room_id' => $request->dining_id,
        ];

        $file = $request->file('file_tagname');

        $nameFile = date('Y-m-d-s') . '_tagname.' . $file->getClientOriginalExtension();
        $path = 'dining_room/' . $dining->slug . "/tagname/";

        $tags['resource'] = $path . $nameFile;

        if ($file->isValid()) {
            Storage::putFileAs('public/' . $path, $file, $nameFile);
        } else {
            return redirect()->back()
                ->with('error_tagnames', 'No se ha podido crear la seccion por un problema con la imagen')
                ->with('section', 'tagnames');
        }

        $tags = TagName::create($tags);

        $tags->diningRooms()->attach($dining);

        return redirect()->back()
            ->with('success_tagname', 'Seccion creado correctamente')
            ->with('section', 'tagnames');
    }

    public function editTag(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'start_date_edit' => 'required',
            'end_date_edit' => 'required',
            'advertisement_id_edit' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error_edit_tagname', 'No se ha podido crear la seccion')
                ->with('tagname_id', $request->tagname_id_edit)
                ->with('section', 'tagnames')
                ->withErrors($validator->getMessageBag());
        }

        $edit = TagName::find($request->input('tagname_id_edit'));
        $dining = $edit->diningRooms()->first();

        if ($edit) {
            $edit->title = $request->title_edit ?? $edit->title;
            $edit->description = $request->description_edit ?? $edit->description;
            $edit->vigencia = json_encode([
                'start' => $request->input('start_date_edit'),
                'end' => $request->input('end_date_edit'),
            ]);

            if ($request->hasFile('file_tagname_edit')) {
                $file = $request->file('file_tagname_edit');
                $nameFile = date('Y-m-d-s') . '_tagname.' . $file->getClientOriginalExtension();
                $path = 'dining_room/' . $dining->slug . "/tagname/";
                $edit->resource = $path . $nameFile;
                if ($file->isValid()) {
                    // Eliminar imagen anterior
                    Storage::delete('public/' . $edit->resource);
                    Storage::putFileAs('public/' . $path, $file, $nameFile);
                } else {
                    return redirect()->back()
                        ->with('error_edit_tagnames', 'No se ha podido crear la seccion por un problema con la imagen')
                        ->with('section', 'tagnames');
                }
            }

            $edit->save();

            return redirect()->back()->with('success_tagname', 'Editado correctamente')
                ->with('section', 'tagnames');
        } else {
            return redirect()->back()->with('error_edit_tagname', 'No se ha podido editar la seccion')
                ->with('section', 'tagnames');
        }
    }
    public function deleteTag(Request $request)
    {
        $dining_id = $request->tarjeta_id;
        $tarjeta = TagName::find($dining_id);
        $tarjeta->diningRooms()->detach();
        $tarjeta->delete();
        return response()->json(['success' => 'Eliminado correctaente'], 200);
    }

}
