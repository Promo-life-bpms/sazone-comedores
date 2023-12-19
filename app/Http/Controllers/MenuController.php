<?php

namespace App\Http\Controllers;

use App\Models\DiningRoom;
use App\Models\Menu;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\IOFactory;

class MenuController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator =  Validator::make(
            $request->all(),
            [
                'name_food' => 'required',
                'description_food' => 'required',
                'dining_id' => 'required',
                'time_food' => 'required|in:desayuno,comida,cena',
                'image_food' => 'required',
                'availability_food' => 'required'
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()
                ->with('error_menu', 'No se ha podido crear el anuncio')
                ->with('section', 'menu')
                ->withErrors($validator->getMessageBag());
        }
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
            return redirect()->back()
                ->with('error_menu', 'No se ha podido crear el platillo por un problema con la imagen')
                ->with('section', 'menu');
        }

        $menu = Menu::create($menu);

        $menu->daysAvailable()->attach($request->availability_food);

        return redirect()->back()
            ->with('success_menu', 'Platillo creado correctamente')
            ->with('section', 'menu');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator =  Validator::make(
            $request->all(),
            [
                'name_food_edit' => 'required',
                'description_food_edit' => 'required',
                'dining_id' => 'required',
                'food_id' => 'required',
                'time_food_edit' => 'required|in:desayuno,comida,cena',
                'availability_food_edit' => 'required'
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()
                ->with('error_menu_edit', 'No se ha podido editar el platillo')
                ->with('section', 'menu')
                ->with('menu_id', $request->food_id)
                ->withErrors($validator->getMessageBag());
        }
        $menu = Menu::find($request->food_id);
        $dining = DiningRoom::find($request->dining_id);

        $menu->name = $request->name_food;
        $menu->description = $request->description_food;
        $menu->dining_room_id = $request->dining_id;
        $menu->time = $request->time_food;
        $menu->slug = Str::slug($request->name_food);

        if ($request->hasFile('image_food_edit')) {
            $file = $request->file('image_food_edit');

            $nameFile = $menu->slug . '_menu.' . $file->getClientOriginalExtension();
            $path = 'dining_room/' . $dining->slug . "/menu/";

            $menu->image = $path . $nameFile;

            if ($file->isValid()) {
                //delete old file
                Storage::delete('public/' . $menu->image);
                Storage::putFileAs('public/' . $path, $file, $nameFile);
            } else {
                return redirect()->back()
                    ->with('error_menu', 'No se ha podido crear el platillo por un problema con la imagen')
                    ->with('section', 'menu');
            }
        }

        $menu->save();

        $menu->daysAvailable()->sync($request->availability_food);

        return redirect()->back()
            ->with('success_menu', 'Platillo actualizado correctamente')
            ->with('section', 'menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $dining_id = $request->menu_id;
        $menu = Menu::find($dining_id);
        $menu->daysAvailable()->detach();
        $menu->delete();
        return response()->json(['success' => 'Eliminado correctaente'], 200);
    }

    public function importMenu(Request $request)
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
