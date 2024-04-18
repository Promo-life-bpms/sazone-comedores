<?php

namespace App\Http\Controllers;

use App\Models\DayFood;
use App\Models\DiningRoom;
use App\Models\Role;
use App\Models\User;
use App\Models\UserHasDiningRooms;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class DiningRoomController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        if ($user->hasRole('master-admin')) {
            $diningRooms = DiningRoom::orderBy('created_at', 'DESC')->paginate(15);
        } elseif ($user->hasRole('super-admin')) {
            $diningRoomIds = UserHasDiningRooms::where('user_id', $user->id)->pluck('dining_room_id');
            $diningRooms = DiningRoom::whereIn('id', $diningRoomIds)->orderBy('created_at', 'DESC')->paginate(15);
        } else {
            $diningRooms = [];
        }

        return view('super.pages.dining-room.index', compact('diningRooms'));
    }

    public function show(DiningRoom $diningRoom)
    {
        $users = $diningRoom->users->filter(function ($user) {
            return $user->status == 1;
        });        

        $menuDays = DayFood::all();
        $advertisements = $diningRoom->advertisements;

        $allFood = [];
        foreach ($menuDays as $day) {
            foreach ($day->menus($diningRoom->id) as $food) {
                $food->daysAvailable;
                $allFood[] = $food;
            }
        }

        return view('admin.home', compact('diningRoom', 'menuDays', 'users', 'advertisements', 'allFood'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'mision' => 'required',
            'vision' => 'required',
            "valores" => 'required',
        ]);



        $diningRoom = [
            'name' => $request->name,
            'address' => $request->address,
            'status' => "created",
            'slug' => Str::slug($request->name),
            "mission" => $request->mision,
            "vision" => $request->vision,
            "values" => $request->valores,
        ];


        if ($request->hasFile('logo')) {

            $request->validate([
                'logo' => 'required|image|mimes:jpg,jpeg,png,gif',
            ]);

            $filenameWithExt = $request->file('logo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('logo')->clientExtension();
            $fileNameToStore = time() . $filename . '.' . $extension;
            $path = 'storage/dining_room/' . $fileNameToStore;

            $request->file('logo')->move('storage/dining_room/', $fileNameToStore);
        } else {
            $path = '';
        }

        /* $file = $request->file('logo');

        $nameFile = $diningRoom['slug'] . '_logo.' . $file->getClientOriginalExtension();
        $path = 'dining_room/' . Str::slug($request->name) . '/';

        $diningRoom['logo'] = $path . $nameFile;

        if ($file->isValid()) {
            Storage::putFileAs('public/' . $path, $file, $nameFile);
        } else {
            return redirect()->back()->with('error', 'No se ha podido crear el restaurante por un problema con la imagen');
        } */

        $diningRoom = DiningRoom::create([
            'name' => $request->name,
            'address' => $request->address,
            'logo' => $path,
            'status' => "created",
            'slug' => Str::slug($request->name),
            "mission" => $request->mision,
            "vision" => $request->vision,
            "values" => $request->valores,
        ]);

        return redirect()->route('dining.show', $diningRoom);
    }

    public function updateGeneralDetails(Request $request, DiningRoom $dining)
    {
        $dining->customization = json_encode([
            'primary_color' => $request->primary,
            'secondary_color' => $request->secondary,
        ]);


        $file = $request->file('logo');

        if ($file) {
            $nameFile = $dining->slug . '_logo.' . $file->getClientOriginalExtension();
            $path = 'dining_room/' . Str::slug($dining->name) . '/';

            $dining->logo = $path . $nameFile;

            if ($file->isValid()) {
                Storage::putFileAs('public/' . $path, $file, $nameFile);
            }
        }

        $dining->save();

        return redirect()->back()->with('success', 'Se han actualizado los colores correctamente');
    }

    public function editDiningRoom(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name_edit' => 'required',
            'address_edit' => 'required',
            'mision_edit' => 'required',
            'vision_edit' => 'required',
            'valores_edit' => 'required',
            'dining_room_id_edit' => 'required',
            'logo_edit' => 'nullable|image|mimes:jpg,jpeg,png,gif',
        ]);

        $diningRoom = DiningRoom::find($request->dining_rooms_id_edit);

        if ($diningRoom) {
            $diningRoom->name = $request->name_edit;
            $diningRoom->address = $request->address_edit;
            $diningRoom->mission = $request->mision_edit;
            $diningRoom->vision = $request->vision_edit;
            $diningRoom->values = $request->valores_edit;
            $diningRoom->logo = $request->logo_edit;

            if ($request->hasFile('logo_edit')) {
                $file = $request->file('logo_edit');
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $fileNameToStore = time() . '_' . Str::slug($filename) . '.' . $extension;
                $path = 'storage/dining_room/' . $fileNameToStore;

                $file->move('storage/dining_room/', $fileNameToStore);

                $diningRoom->logo = $path;
            }

            try {
                $diningRoom->save();
                return redirect()->route('dining.show', $diningRoom)->with('success', 'Comedor editado correctamente');
            } catch (\Exception $exception) {

                return redirect()->back()->with('error', 'Error al editar comedor');
            }
        } else {
            return redirect()->back()->with('error', 'Comedor no encontrado');
        }
    }

    public function admins()
    {
        $userIds = UserRole::whereIn('role_id', [1, 2])->pluck('user_id')->toArray();
        $users = User::whereIn('id', $userIds)->get();
        $diningRooms = DiningRoom::all();
        return view('super.pages.dining-room.users', compact('users', 'diningRooms'));
    }

    public function storeUserAdmin(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
        ]);

        $create_user = new User();
        $create_user->name = $request->name;
        $create_user->email = $request->email;
        $create_user->password = bcrypt("defaultpass");
        $create_user->save();

        $diningRooms = DiningRoom::all();
        foreach ($diningRooms as $diningRoom) {

            if (isset($request->dining_rooms[$diningRoom->id])) {
                $userHasDiningRoom = new UserHasDiningRooms();
                $userHasDiningRoom->user_id = $create_user->id;
                $userHasDiningRoom->dining_room_id = $diningRoom->id;
                $userHasDiningRoom->save();
            }
        }

        $role = Role::where('name', 'super-admin')->first();
        $create_user->attachRole($role);

        return redirect()->back()->with('success', 'Administrador creado correctamente');
    }

    public function updateUserAdmin(Request $request)
    {
        $update_user = User::find($request->id);
        
        UserHasDiningRooms::where('user_id', $update_user->id)->delete();
    
        $diningRooms = DiningRoom::all();
        foreach ($diningRooms as $diningRoom) {
            if (isset($request->dining_rooms[$diningRoom->id])) {
                $userHasDiningRoom = new UserHasDiningRooms();
                $userHasDiningRoom->user_id = $update_user->id;
                $userHasDiningRoom->dining_room_id = $diningRoom->id;
                $userHasDiningRoom->save();
            }
        }
    
        return redirect()->back()->with('success', 'Relación usuario-comedor actualizada correctamente');
    }
    
    public function updateDiningStatus(Request $request)
    {
        $dining_room_id = $request->dining_room_id;
    
        // Busca la sala de comedor por su ID
        $diningRoom = DiningRoom::findOrFail($dining_room_id);
    
        // Actualiza el campo 'statusV' a 0
        $diningRoom->update([
            'statusV' => 0,
        ]);
    
        return response()->json(['success' => 'Comedor Inactivo'], 200);
    }
    
}
