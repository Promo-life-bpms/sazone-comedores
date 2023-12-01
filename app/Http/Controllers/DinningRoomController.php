<?php

namespace App\Http\Controllers;

use App\Models\DinningRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DinningRoomController extends Controller
{
    public function index()
    {
        $dinningRooms = DinningRoom::orderBy('created_at', 'DESC')->paginate(15);
        return view('super.pages.dinning-room.index', compact('dinningRooms'));
    }

    public function show(DinningRoom $dinningRoom)
    {
        return view('admin.pages.home', compact('dinningRoom'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'logo' => 'required',
        ]);

        $dinningRoom = [
            'name' => $request->name,
            'address' => $request->address,
            'status' => "created",
            'slug' => Str::slug($request->name),
        ];


        $file = $request->file('logo');

        $nameFile = $dinningRoom['slug'] . '_logo.' . $file->getClientOriginalExtension();
        $path = 'dinning_room/' . Str::slug($request->name) . '/';

        $dinningRoom['logo'] = $path . $nameFile;

        if ($file->isValid()) {
            Storage::putFileAs('public/' . $path, $file, $nameFile);
        }

        $dinningRoom = DinningRoom::create($dinningRoom);

        return redirect()->route('dinning.show', $dinningRoom);
    }

    public function updateGeneralDetails(Request $request, DinningRoom $dinning)
    {
        $dinning->customization = json_encode([
            'primary_color' => $request->primary,
            'secondary_color' => $request->secondary,
        ]);


        $file = $request->file('logo');

        if ($file) {
            $nameFile = $dinning->slug . '_logo.' . $file->getClientOriginalExtension();
            $path = 'dinning_room/' . Str::slug($dinning->name) . '/';

            $dinning->logo = $path . $nameFile;

            if ($file->isValid()) {
                Storage::putFileAs('public/' . $path, $file, $nameFile);
            }
        }

        $dinning->save();

        return redirect()->back()->with('success', 'Se han actualizado los colores correctamente');
    }
}
