<?php

namespace App\Http\Controllers;

use App\Models\DiningRoom;
use App\Models\MenuBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; 


class MenuBannerController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'src' => 'required|image',
        ]);
    
        $dining = DiningRoom::findOrFail($request->id);
    
        $file = $request->file('src');
    
        if ($file) {
            $nameFile = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $path = 'dining_room/' . Str::slug($dining->name) . '/';
    
            Storage::putFileAs('public/' . $path, $file, $nameFile);
    
            $menu_banner = new MenuBanner();
            $menu_banner->dining_room_id = $request->id;
            $menu_banner->src = $path . $nameFile;
            $menu_banner->save();
    
            return redirect()->back()->with('success', 'Elemento agregado satisfactoriamente');
        }
    
        return redirect()->back()->with('error', 'Error al subir la imagen');
    }

    public function delete(Request $request) {

        MenuBanner::where('id', $request->id)->delete();

        return redirect()->back()->with('success', 'Elemento eliminado satisfactoriamente');
    }
}
