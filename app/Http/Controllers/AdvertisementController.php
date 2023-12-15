<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\DiningRoom;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;

class AdvertisementController extends Controller
{

<<<<<<< HEAD
=======
    public function __construct()
    {
        $this->middleware('auth');
    }

>>>>>>> 6ec5eba2888611ca73f820708bc404362198011e
    public function store(Request $request)
    {
        $request->validate([
            'file_advertisment' => 'required',
            'start' => 'required',
            'end' => 'required',
            'dining_id' => 'required'
        ]);

        $dining = DiningRoom::find($request->dining_id);

        $advertisement = [
            'title' => $request->title ?? null,
            'description' => $request->description ?? null,
            'vigencia' => json_encode([
                'start' => $request->start,
                'end' => $request->end
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
            return redirect()->back()->with('error', 'No se ha podido crear el platillo por un problema con la imagen');
        }



        $advertisement = Advertisement::create($advertisement);

        $advertisement->diningRooms()->attach($dining);

        return redirect()->back()->with('success_advertisment', 'Anuncio creado correctamente');
    }
    public function editAdvertisement(Request $request)
    {

        $dining_id = $request->input('dining_id');
        $edit = Advertisement::find($dining_id);

        if ($edit) {

            $edit->title = $request->input('title');
            $edit->description = $request->input('description');
            $edit->vigencia = json_encode([
                'start' => $request->input('start'),
                'end' => $request->input('end'),
            ]);
            $edit->save();
            return redirect()->back()->with('success_advertisment', 'editado correctamente');
        } else {
            'no se puede editar';
        }
    }
    public function deleteAdvertisement(Request $request)
    {

        $dining_id = $request->input('dining_id');
        $edit = Advertisement::find($dining_id);
        $edit->delete();
    }
}
