<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class QuizController extends Controller
{
    public function storeQuiz(Request $request) {
        
        $request->validate([
            'src' => 'required|image',
        ]);
    
        $file = $request->file('src');
    
        
        if ($file) {
            $nameFile = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $path = 'dining_room/' . Str::slug($dining->name) . '/';
    
            Storage::putFileAs('public/' . $path, $file, $nameFile);
    
            $menu_banner = new Quiz();
            $menu_banner->dining_room_id = $request->id;
            $menu_banner->src = $path . $nameFile;
            $menu_banner->save();
    
            return redirect()->back()->with('success', 'Encuesta agregada satisfactoriamente');
        }
    }

    public function deleteQuiz(Request $request) {

        DB::table('quiz')->where('dining_room_id',$request->dining_room_id)->delete();

    }

    public function storeService(Request $request) {

        $request->validate([
            'src' => 'required|image',
        ]);
    
        $file = $request->file('src');
    
        if ($file) {
            $nameFile = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $path = 'dining_room/' . Str::slug($dining->name) . '/';
    
            Storage::putFileAs('public/' . $path, $file, $nameFile);
    
            $menu_banner = new Service();
            $menu_banner->dining_room_id = $request->id;
            $menu_banner->img = $path . $nameFile;
            $menu_banner->save();
    
            return redirect()->back()->with('success', 'Horario de servicio agregado satisfactoriamente');
        }
    }

    public function deleteService(Request $request) {
        
        DB::table('service')->where('dining_room_id',$request->dining_room_id)->delete();

    }
}
