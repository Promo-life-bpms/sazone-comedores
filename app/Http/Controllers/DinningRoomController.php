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

    public function show()
    {
        return view('super.pages.dinning-room.show');
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
}
