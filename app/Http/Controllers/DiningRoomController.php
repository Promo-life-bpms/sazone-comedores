<?php

namespace App\Http\Controllers;

use App\Models\DiningRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DiningRoomController extends Controller
{
    public function index()
    {
        $diningRooms = DiningRoom::orderBy('created_at', 'DESC')->paginate(15);
        return view('super.pages.dining-room.index', compact('diningRooms'));
    }

    public function show(DiningRoom $DiningRoom)
    {
        return view('admin.pages.home', compact('DiningRoom'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'logo' => 'required',
        ]);

        $DiningRoom = [
            'name' => $request->name,
            'address' => $request->address,
            'status' => "created",
            'slug' => Str::slug($request->name),
        ];


        $file = $request->file('logo');

        $nameFile = $DiningRoom['slug'] . '_logo.' . $file->getClientOriginalExtension();
        $path = 'dining_room/' . Str::slug($request->name) . '/';

        $DiningRoom['logo'] = $path . $nameFile;

        if ($file->isValid()) {
            Storage::putFileAs('public/' . $path, $file, $nameFile);
        }

        $DiningRoom = DiningRoom::create($DiningRoom);

        return redirect()->route('dining.show', $DiningRoom);
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
}