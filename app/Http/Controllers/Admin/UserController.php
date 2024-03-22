<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SendAccessMail;
use App\Models\DiningRoom;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
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
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'type' => 'required|in:dining_manager,collaborator',
            'dining_id' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt("defaultpass")
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

        return redirect()->back()
            ->with('section', 'usuarios')
            ->with('success_user_create', 'Usuario creado correctamente');
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
    public function destroy(Request $request)
    {
        $user_id = $request->user_id;
        $user = User::find($user_id);
        $user->profile()->delete();
        $user->delete();
        return response()->json(['success' => 'Eliminado correctaente'], 200);
    }

    // Enviar acceso a usuario
    public function sendAccess(Request $request)
    {
        $user = User::find($request->user_id);
        $pass = Str::random(8);
        $user->password = Hash::make($pass);
        $user->save();
        $dataNotification = [
            'name' => $user->name,
            'email' => $user->email,
            'password' => $pass,
            'urlEmail' => url('/loginEmail?email=' . $user->email . '&password=' . $pass)
        ];
        $mailSend = new SendAccessMail($dataNotification);
        Mail::mailer('smtp')->to($user->email)->send($mailSend);
        return response()->json(['success' => 'Se ha enviado el acceso correctamente'], 200);
    }

    // Importtar usuarios, similar a importar menu
    public function import(Request $request)
    {
        /*  $validator = Validator::make($request->all(), [
            'file_users' => 'required|mimes:xlsx,xls,csv',
            'dining_id' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->with('section', 'usuarios')
                ->with('error_user_import', 'No se ha podido importar el archivo por un problema con los datos');
        } */

        $dining = DiningRoom::find($request->dining_id);
        $file = $request->file('file_users');
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
            for ($indiceFila = 2; $indiceFila <= $numeroMayorDeFila; $indiceFila++) {
                $user['name'] = trim($hojaActual->getCell('B' . $indiceFila)->getValue());
                $user['email'] = strtolower(trim(str_replace(' ', '', $hojaActual->getCell('C' . $indiceFila)->getValue())));
                $user['dining_room_id'] = $dining->id;
                $user['password'] = "DefaultPass";
                $user['type'] = 'collaborator';

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

            /*  if (count($errors) > 0) {
                return redirect()->back()
                    ->with('section', 'usuarios')
                    ->with('error_user_import', 'No se ha podido importar el archivo por un problema con los datos');
            } */

            foreach ($users as $userData) {
                $user = User::create($userData);
                $user->profile()->create([
                    'dining_room_id' => $dining->id,
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
            return redirect()->back()
                ->with('section', 'usuarios')
                ->with('success_user_create', 'Se ha importado correctamente el archivo');
        }
    }

    // Enviar acceso a todos los usuarios
    public function sendAccessAll(Request $request)
    {
        $diningRoom = DiningRoom::find($request->dining_id);
        if ($diningRoom) {
            $users = $diningRoom->users()->get();
            foreach ($users as $user) {
                if (filter_var($user->email, FILTER_VALIDATE_EMAIL)) {
                    $pass = Str::random(8);
                    $user->password = Hash::make($pass);
                    $user->save();
                    $dataNotification = [
                        'name' => $user->name,
                        'email' => $user->email,
                        'password' => $pass,
                        'urlEmail' => url('/loginEmail?email=' . $user->email . '&password=' . $pass)
                    ];
                    $mailSend = new SendAccessMail($dataNotification);
                    Mail::mailer('smtp')->to($user->email)->send($mailSend);
                }
            }
        }
        return response()->json(['success' => 'Se han enviado los accesos correctamente a todos los usuarios del comedor'], 200);
    }
}
