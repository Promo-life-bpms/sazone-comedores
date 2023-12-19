<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DiningRoom;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\IOFactory;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

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
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'type' => 'required|in:dining_manager,collaborator',
            'dining_id' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $user->profile()->create([
            'dining_room_id' => $request->dining_id,
            'type' => $request->type,
        ]);

        // si es colaborador, agregar el rol user y si es admin, agregar asu rol
        if ($request->type == 'collaborator') {
            $role = Role::where('name', 'user')->first();
            $user->attachRole($role);
        } else {
            $role = Role::where('name', 'admin')->first();
            $user->attachRole($role);
        }

        return redirect()->back()->with('success_user_create', 'Usuario creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // Importtar usuarios, similar a importar menu
    public function import(Request $request)
    {
        $request->validate([
            'file_user' => 'required|mimes:xlsx,xls,csv',
            'dining_id' => 'required'
        ]);

        $dining = DiningRoom::find($request->dining_id);
        $file = $request->file('file_user');
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
            $users = [];
            $errors = [];
            for ($indiceFila = 3; $indiceFila <= $numeroMayorDeFila; $indiceFila++) {
                $user['name'] = $hojaActual->getCell('A' . $indiceFila)->getValue();
                $user['email'] = $hojaActual->getCell('B' . $indiceFila)->getValue();
                $user['password'] = $hojaActual->getCell('C' . $indiceFila)->getValue();
                $user['dining_room_id'] = $request->dining_id;
                $user['type'] = $hojaActual->getCell('D' . $indiceFila)->getValue();

                // Validar con Validator
                $validator = Validator::make($user, [
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required',
                    'dining_room_id' => 'required',
                    'type' => 'required|in:collaborator,admin'
                ]);

                if ($validator->fails()) {
                    $validator->errors()->add('fila', $indiceFila);
                    $errors[] = $validator->errors();
                } else {
                    $user['password'] = bcrypt($user['password']);
                    $users[] = $user;
                }
            }

            if (count($errors) > 0) {
                return redirect()->back()->with('error_user', 'No se ha podido importar el archivo por un problema con los datos');
            }

            foreach ($users as $userData) {
                $user = User::create($userData);
                $user->profile()->create([
                    'dining_room_id' => $request->dining_id,
                    'type' => $userData['type'],
                ]);

                // si es colaborador, agregar el rol user y si es admin, agregar asu rol
                if ($userData['type'] == 'collaborator') {
                    $role = Role::where('name', 'user')->first();
                    $user->attachRole($role);
                } else {
                    $role = Role::where('name', 'admin')->first();
                    $user->attachRole($role);
                }
            }

            // Delete file
            Storage::delete('public/' . $path . $nameFile);
            return redirect()->back()->with('success_user_import', 'Se ha importado correctamente el archivo');
        }
    }
}
