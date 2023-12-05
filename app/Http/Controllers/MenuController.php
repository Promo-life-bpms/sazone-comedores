<?php

namespace App\Http\Controllers;

use App\Models\DiningRoom;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\IOFactory;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_food' => 'required',
            'description_food' => 'required',
            'dining_id' => 'required',
            'time_food' => 'required|in:desayuno,comida,cena',
            'image_food' => 'required',
            'availability_food' => 'required'
        ]);

        $dining = DiningRoom::find($request->dining_id);

        $menu = [
            'name' => $request->name_food,
            'description' => $request->description_food,
            'dining_room_id' => $request->dining_id,
            'time' => $request->time_food,
            'slug' => Str::slug($request->name_food),
        ];

        $file = $request->file('image_food');

        $nameFile = $menu['slug'] . '_menu.' . $file->getClientOriginalExtension();
        $path = 'dining_room/' . $dining->slug . "/menu/";

        $menu['image'] = $path . $nameFile;

        if ($file->isValid()) {
            Storage::putFileAs('public/' . $path, $file, $nameFile);
        } else {
            return redirect()->back()->with('error', 'No se ha podido crear el platillo por un problema con la imagen');
        }

        $menu = Menu::create($menu);

        $menu->daysAvailable()->attach($request->availability_food);

        return redirect()->back()->with('success_food', 'Platillo creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }

    public function import(Request $request)
    {
        $request->validate([
            'file_food' => 'required|mimes:xlsx,xls,csv',
            'dining_id' => 'required'
        ]);

        $dining = DiningRoom::find($request->dining_id);

        $file = $request->file('file_food');

        $nameFile = $dining->slug . (string)(date('Ymd')) . '_import.' . $file->getClientOriginalExtension();
        $path = 'dining_room/' . $dining->slug . "/";


        if ($file->isValid()) {
            Storage::putFileAs('public/' . $path, $file, $nameFile);
            // Get that file
            $file = Storage::get('public/' . $path . '/' . $nameFile);

            // Import to database with spreadsheet
            $spreadsheet = IOFactory::load('storage/' . $path . '/' . $nameFile);
            $hojaActual = $spreadsheet->getSheet(0);
            $numeroMayorDeFila = $hojaActual->getHighestRow();

            $menus = [];
            $menu = [
                'name' => $request->name_food,
                'description' => $request->description_food,
                'dining_room_id' => $request->dining_id,
                'time' => $request->time_food,
                'slug' => Str::slug($request->name_food),
            ];

            $errors = [];
            for ($indiceFila = 3; $indiceFila <= $numeroMayorDeFila; $indiceFila++) {
                $menu['name'] = $hojaActual->getCell('A' . $indiceFila)->getValue();
                $menu['description'] = $hojaActual->getCell('B' . $indiceFila)->getValue();
                $menu['time'] = $hojaActual->getCell('C' . $indiceFila)->getValue();
                $menu['slug'] = Str::slug($menu['name']);
                $menu['image'] = $hojaActual->getCell('D' . $indiceFila)->getValue();
                $menu['availability'] = [
                    trim($hojaActual->getCell('E' . $indiceFila)->getValue()),
                    trim($hojaActual->getCell('F' . $indiceFila)->getValue()),
                    trim($hojaActual->getCell('G' . $indiceFila)->getValue()),
                    trim($hojaActual->getCell('H' . $indiceFila)->getValue()),
                    trim($hojaActual->getCell('I' . $indiceFila)->getValue()),
                    trim($hojaActual->getCell('J' . $indiceFila)->getValue()),
                ];
                // Obtener los indices que no estan vacios de $menu['availability']
                $menu['availability'] = array_filter($menu['availability'], function ($value) {
                    return $value != '';
                });
                $dataAvailability = [];
                foreach ($menu['availability'] as $key => $value) {
                    $dataAvailability[] = $key + 1;
                }
                $menu['availability'] = $dataAvailability;
                $menus[] = $menu;


                // Validar con Validator
                $validator = Validator::make($menu, [
                    'name' => 'required',
                    'description' => 'required',
                    'time' => 'required',
                    'slug' => 'required',
                    'availability' => 'required',
                    'image' => 'required'
                ]);

                if ($validator->fails()) {
                    $validator->errors()->add('fila', $indiceFila);
                    $errors[] = $validator->errors();
                }
            }

            if (count($errors) > 0) {
                return redirect()->back()->with('error_food', 'No se ha podido importar el archivo por un problema con los datos');
            }


            foreach ($menus as $menuData) {
                $menu = Menu::create($menuData);
                $menu->daysAvailable()->attach($menuData['availability']);
            }

            // Delete dile
            Storage::delete('public/' . $path . $nameFile);
            return redirect()->back()->with('success_import', 'Se ha importado correctamente el archivo');
        } else {
            return redirect()->back()->with('error', 'No se ha podido crear el platillo por un problema con el archivo');
        }
    }
}
