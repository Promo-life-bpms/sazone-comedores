<?php

namespace App\Http\Controllers;

use App\Models\DiningRoom;
use App\Models\Nutricion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\IOFactory;

class NutricionController extends Controller
{
    public function store(Request $request)
    {
        $validator =  Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'description' => 'required',
                'dining_id' => 'required',
                'image' => 'required',
            ]
        );
        $dining = DiningRoom::find($request->dining_id);

        $nutricion = [
            'name' => $request->name_food,
            'description' => $request->description_food,
            'dining_room_id' => $request->dining_id,
        ];

        $file = $request->file('image_food');

        $nameFile = $nutricion . '_nutricion.' . $file->getClientOriginalExtension();
        $path = 'dining_room/' . $dining->slug . "/nutricion/";

        $nutricion['image'] = $path . $nameFile;

        if ($file->isValid()) {
            Storage::putFileAs('public/' . $path, $file,
             $nameFile);
        } else {
            return redirect()->back()
                ->with('error_nutricion', 'No se ha podido crear el platillo por un problema con la imagen')
                ->with('section', 'nutricion');
        }

        $nutricion = Nutricion::create($nutricion);

        return redirect()->back()
            ->with('success_nutricion', 'Platillo creado correctamente')
            ->with('section', 'nutricion');
    }

}
