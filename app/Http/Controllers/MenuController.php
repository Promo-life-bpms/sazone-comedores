<?php

namespace App\Http\Controllers;

use App\Models\DayFood;
use App\Models\DayFoodMenu;
use App\Models\DiningRoom;
use App\Models\Menu;
use App\Models\MenuVisibility;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
                'time_food' => 'required|in:desayuno,comida,cena,especial',
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
                'time_food_edit' => 'required|in:desayuno,comida,cena,especial',
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

            // Obtener la última hoja disponible
            $sheetCount = $spreadsheet->getSheetCount();
            $lastSheet = $spreadsheet->getSheet($sheetCount - 1);

            // Obtener la última fila de la última hoja (opcional)
            $highestRow = $lastSheet->getHighestRow();


            $filas = [13,16,19,22,25,28,31,34,37,40,43,46,49,55,58,61,64,68];
            $columnas = ['B', 'C', 'D','E','F','G','H'];

           
            foreach ($filas as $fila) {
                foreach ($columnas as $columna) {
                    $cellCoordinate = $columna . $fila; 
                    $cellValue = $lastSheet->getCell($cellCoordinate)->getValue(); 
            
                    $time = 'Comida';

                    switch($fila){
                        case 43:
                            $time = 'Desayuno';
                            break;
                        case 46:
                            $time = 'Desayuno';
                            break;
                        case 58:
                            $time = 'Desayuno';
                            break;
                        case 68:
                            $time = 'Desayuno';
                            break;
                    }

                    if(trim($cellValue) != ''){
                       $createMenu = new Menu();
                       $createMenu->name =  $cellValue;
                       $createMenu->description = '';
                       $createMenu->dining_room_id = $request->dining_id;
                       $createMenu->time = $time;
                       $createMenu->image = '';
                       $createMenu->save();
            
                       $day = 1;
            
                        switch($columna){
                            case 'B':
                                $day = 1;
                                break;
                            case 'C':
                                $day = 2;
                                break;
                            case 'D':
                                $day = 3;
                                break;
                            case 'E':
                                $day = 4;
                                break;
                            case 'F':
                                $day = 5;
                                break;
                            case 'G':
                                $day = 6;
                                break;
                            case 'H':
                                $day = 7;
                                break;
                        }


            
                       $createDayFoodMenu = new DayFoodMenu();
                       $createDayFoodMenu->day_food_id = $day;
                       $createDayFoodMenu->menu_id = $createMenu->id; 
                       $createDayFoodMenu->updated_at = now(); 
                       $createDayFoodMenu->created_at = now(); 
                       $createDayFoodMenu->save();
                    }
                }
            }
           

           /*  $hojaActual = $spreadsheet->getSheet(0);
            $numeroMayorDeFila = $hojaActual->getHighestRow();

            $menus = [];

            $errors = [];
            for ($indiceFila = 2; $indiceFila <= $numeroMayorDeFila; $indiceFila++) {
                $menu['name'] = $hojaActual->getCell('A' . $indiceFila)->getValue();
                $menu['description'] = $hojaActual->getCell('B' . $indiceFila)->getValue();
                $menu['time'] = $hojaActual->getCell('C' . $indiceFila)->getValue();
                $menu['slug'] = Str::slug($menu['name']);
                $imageUrl = $hojaActual->getCell('D' . $indiceFila)->getValue();
                $imageContents = $this->curl_get_file_contents($imageUrl); // Usar la función curl_get_file_contents()
                $imageName = $menu['slug'] . '.png';
                Storage::put('public/images/' . $imageName, $imageContents);
                $menu['image'] = 'images/' . $imageName;
                $menu['availability'] = [
                    trim($hojaActual->getCell('E' . $indiceFila)->getValue()),
                    trim($hojaActual->getCell('F' . $indiceFila)->getValue()),
                    trim($hojaActual->getCell('G' . $indiceFila)->getValue()),
                    trim($hojaActual->getCell('H' . $indiceFila)->getValue()),
                    trim($hojaActual->getCell('I' . $indiceFila)->getValue()),
                    trim($hojaActual->getCell('J' . $indiceFila)->getValue()),
                    trim($hojaActual->getCell('K' . $indiceFila)->getValue()),
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
                $menuData['dining_room_id'] = $dining->id;
                $menu = Menu::create($menuData);
                $menu->daysAvailable()->attach($menuData['availability']);
            }

            // Delete dile
            Storage::delete('public/' . $path . $nameFile); */
            return redirect()->back()->with('success', 'Se ha importado correctamente el archivo');
        } else {
            return redirect()->back()->with('error', 'No se ha podido crear el platillo por un problema con el archivo');
        }
    }

    function curl_get_file_contents($URL)
    {
        $c = curl_init();
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_URL, $URL);
        $contents = curl_exec($c);
        curl_close($c);

        if ($contents) return $contents;
        else return FALSE;
    }


    public function resetMenu(Request $request) {

        $foods =  Menu::where('dining_room_id',$request->dining_id)->get();

        foreach($foods as $food){
            DB::table('day_food_menu')->where('menu_id', $food->id)->delete();
        }

        Menu::where('dining_room_id', $request->dining_id)->delete();
        
        return redirect()->back()->with('success', 'Platillos eliminados correctametne');

    }

    public function setMenuVisible(Request $request) {
        $fingMenuVisible = MenuVisibility::where('dining_room_id' , $request->dining_id)->first();

        if($fingMenuVisible != null || $fingMenuVisible != []){
            $fingMenuVisible->visible = 1;
            $fingMenuVisible->save();
        }else{
            $createMenu = new MenuVisibility();
            $createMenu->dining_room_id = $request->dining_id;
            $createMenu->visible = 1;
            $createMenu->save();
        }
        return redirect()->back()->with('success', 'Ahora los platillos estan disponibles');

    }

    public function setMenuInvisible(Request $request) {
        $fingMenuVisible = MenuVisibility::where('dining_room_id' , $request->dining_id)->first();

        if($fingMenuVisible != null || $fingMenuVisible != []){
            $fingMenuVisible->visible = 0;
            $fingMenuVisible->save();
        }else{
            $createMenu = new MenuVisibility();
            $createMenu->dining_room_id = $request->dining_id;
            $createMenu->visible = 0;
            $createMenu->save();
        }
        return redirect()->back()->with('success', 'Ahora los platillos estan ocultos para los comensales');

    }
}
