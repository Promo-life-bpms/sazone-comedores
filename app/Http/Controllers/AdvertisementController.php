<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\DiningRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdvertisementController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        //validate con Validator
        $validator = Validator::make($request->all(), [
            'file_advertisment' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'dining_id' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error_advertisment', 'No se ha podido crear el anuncio')
                ->with('section', 'advertisements')
                ->withErrors($validator->getMessageBag());
        }

        $dining = DiningRoom::find($request->dining_id);

        $advertisement = [
            'title' => $request->title ?? null,
            'description' => $request->description ?? null,
            'vigencia' => json_encode([
                'start' => $request->start_date,
                'end' => $request->end_date
            ]),
            'dining_room_id' => $request->dining_id,
        ];

        $file = $request->file('file_advertisment');

        $nameFile = date('Y-m-d-s') . '_anuncio.' . $file->getClientOriginalExtension();
        $path = 'dining_room/' . $dining->slug . "/anuncio/";

        $advertisement['resource'] = $path . $nameFile;

        if ($file->isValid()) {
            Storage::putFileAs('public/' . $path, $file, $nameFile);
        } else {
            return redirect()->back()
                ->with('error_advertisment', 'No se ha podido crear el platillo por un problema con la imagen')
                ->with('section', 'advertisements');
        }

        $advertisement = Advertisement::create($advertisement);

        $advertisement->diningRooms()->attach($dining);

        return redirect()->back()
            ->with('success_advertisment', 'Anuncio creado correctamente')
            ->with('section', 'advertisements');
    }

    public function editAdvertisement(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'start_date_edit' => 'required',
            'end_date_edit' => 'required',
            'advertisement_id_edit' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error_edit_advertisment', 'No se ha podido crear el anuncio')
                ->with('anuncio_id', $request->advertisement_id_edit)
                ->with('section', 'advertisements')
                ->withErrors($validator->getMessageBag());
        }

        $edit = Advertisement::find($request->input('advertisement_id_edit'));
        $dining = $edit->diningRooms()->first();

        if ($edit) {
            $edit->title = $request->title_edit ?? $edit->title;
            $edit->description = $request->description_edit ?? $edit->description;
            $edit->vigencia = json_encode([
                'start' => $request->input('start_date_edit'),
                'end' => $request->input('end_date_edit'),
            ]);

            if ($request->hasFile('file_advertisment_edit')) {
                $file = $request->file('file_advertisment_edit');
                $nameFile = date('Y-m-d-s') . '_anuncio.' . $file->getClientOriginalExtension();
                $path = 'dining_room/' . $dining->slug . "/anuncio/";
                $edit->resource = $path . $nameFile;
                if ($file->isValid()) {
                    // Eliminar imagen anterior
                    Storage::delete('public/' . $edit->resource);
                    Storage::putFileAs('public/' . $path, $file, $nameFile);
                } else {
                    return redirect()->back()
                        ->with('error_edit_advertisment', 'No se ha podido crear el platillo por un problema con la imagen')
                        ->with('section', 'advertisements');
                }
            }

            $edit->save();

            return redirect()->back()->with('success_advertisment', 'Editado correctamente')
                ->with('section', 'advertisements');
        } else {
            return redirect()->back()->with('error_edit_advertisment', 'No se ha podido editar el anuncio')
                ->with('section', 'advertisements');
        }
    }
    public function deleteAdvertisement(Request $request)
    {
        $dining_id = $request->anuncio_id;
        $anuncio = Advertisement::find($dining_id);
        $anuncio->diningRooms()->detach();
        $anuncio->delete();
        return response()->json(['success' => 'Eliminado correctaente'], 200);
    }
}
