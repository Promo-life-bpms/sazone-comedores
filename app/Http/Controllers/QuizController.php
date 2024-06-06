<?php

namespace App\Http\Controllers;

use App\Models\DiningRoom;
use App\Models\Quiz;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class QuizController extends Controller
{
    public function storeQuiz(Request $request) {
        
        $request->validate([
            'file' => 'required|image',
        ]);
    
        $file = $request->file('file');
    
        $dining =  DiningRoom::where('id',$request->dining_room_id)->first();

        if ($file) {
            $nameFile = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $path = 'dining_room/' . Str::slug($dining->name) . '/';
    
            Storage::putFileAs('public/' . $path, $file, $nameFile);
    
            $menu_banner = new Quiz();
            $menu_banner->dining_room_id = $request->dining_room_id;
            $menu_banner->img = $path . $nameFile;
            $menu_banner->url = $request->url;
            $menu_banner->save();
    
            return redirect()->back()->with('success', 'Encuesta agregada satisfactoriamente');
        }
    }

    public function deleteQuiz(Request $request) {
     
        DB::table('quiz')->where('id',$request->id)->delete();

        return redirect()->back()->with('success', 'Encuesta eliminada satisfactoriamente');

    }

    public function storeService(Request $request) {

        $request->validate([
            'file' => 'required|image',
        ]);
    
        $file = $request->file('file');
    
        $dining =  DiningRoom::where('id',$request->dining_room_id)->first();

        if ($file) {
            $nameFile = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $path = 'dining_room/' . Str::slug($dining->name) . '/';
    
            Storage::putFileAs('public/' . $path, $file, $nameFile);
    
            $menu_banner = new Service();
            $menu_banner->dining_room_id = $request->dining_room_id;
            $menu_banner->img = $path . $nameFile;
            $menu_banner->save();
    
            return redirect()->back()->with('success', 'Horario de servicio agregado satisfactoriamente');
        }
    }

    public function deleteService(Request $request) {

        DB::table('service')->where('id',$request->id)->delete();
        return redirect()->back()->with('success', 'Horario de servicio eliminado satisfactoriamente');

    }
}
