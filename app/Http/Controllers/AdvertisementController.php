<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\DiningRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdvertisementController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'file_advertisment' => 'required',
            'start' => 'required',
            'end' => 'required',
            'dining_id' => 'required'
        ]);

        $dining = DiningRoom::find($request->dining_id);

        $advertisement = [
            'title' => $request->title,
            'description' => $request->description,
            'vigencia' => json_encode([
                'start' => $request->start,
                'end' => $request->end
            ]),
            'dining_room_id' => $request->dining_id,
        ];

        $file = $request->file('file_advertisment');

        $nameFile = date('Y-m-d') . '_anuncio.' . $file->getClientOriginalExtension();
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
}
