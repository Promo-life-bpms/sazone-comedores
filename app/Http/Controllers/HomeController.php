<?php

namespace App\Http\Controllers;

use App\Models\DayFood;
use App\Models\DiningRoom;
use App\Models\Health;
use App\Models\Nutrition;
use App\Models\TagName;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         if (auth()->user()->hasRole(['super-admin', 'master-admin'])) {
            return redirect()->route('dining.index');
        }

        if (auth()->user()->hasRole(['user', 'admin'])) {
            if (auth()->user()->profile ? auth()->user()->profile->diningRoom : false) {
                return redirect()->route('dining.showUser');
            }
        }

        return abort(404, 'No tienes permisos para acceder a esta página o no tienes un comedor asignado');
    }

    public function comedor()
    {
        $diningRoom = auth()->user()->profile->diningRoom;
        // Obtener el dia de hoy entre moday y friday con su nombre
        $today = date('l');
        $today = strtolower($today);
        $today = ucfirst($today);
        $day = DayFood::where('slug', $today)->first();
        $advertisements = $diningRoom->advertisements;
        $tagnames = $diningRoom->tagnames;
        $nutritions =  $diningRoom->nutritions;
        $healths = $diningRoom->healths;

        return view('user.pages.home', compact('diningRoom', 'day', 'advertisements','tagnames', 'nutritions', 'healths'));
    }

    public function cupones()
    {
        if (!(auth()->user()->hasRole(['super-admin', 'master-admin']))) {
            $diningRoom = auth()->user();
        } else {
            // Aquí puedes definir qué DiningRoom deberían ver los 'super-admin' y 'master-admin'
            $diningRoom = DiningRoom::get(); // Ejemplo
        }
        return view('user.pages.cupones', compact('diningRoom'));
    }

    public function menu()
    {
        if ((auth()->user()->hasRole(['super-admin', 'master-admin']))) {
            $menuDays = DayFood::all();
        $diningRoom = auth()->user();
        return view('user.pages.menu', compact('menuDays', 'diningRoom'));
        } else {
            $menuDays = DayFood::all();
            $diningRoom = auth()->user()->profile->diningRoom;
            return view('user.pages.menu', compact('menuDays', 'diningRoom'));
        }
        
    }

    public function acerca()
    {
        if ((auth()->user()->hasRole(['super-admin', 'master-admin']))) {
            $diningRoom = auth()->user();
            return view('user.pages.acerca-de', compact('diningRoom'));
        } else {
            $diningRoom = auth()->user()->profile->diningRoom;
            return view('user.pages.acerca-de', compact('diningRoom'));
        }

    }

    public function cuenta()
    {
        $diningRoom = '';
        if (!(auth()->user()->hasRole(['super-admin', 'master-admin']))) {
            $diningRoom = auth()->user()->profile->diningRoom;
        }
        return view('user.pages.mi-cuenta', compact('diningRoom'));
    }

    public function preview(DiningRoom $diningRoom)
    {

        $users = $diningRoom->users->filter(function ($user) {
            return $user->status == 1;
        });
        // Obtén los datos que necesitas mostrar para la vista preliminar de un usuario normal
        $menuDays = DayFood::all();
        $advertisements = $diningRoom->advertisements;
        $tagnames = $diningRoom->tagnames;
        $nutritions =  $diningRoom->nutritions;
        $healths = $diningRoom->healths;
        $allFood = [];

        foreach ($menuDays as $day) {
            foreach ($day->menus($diningRoom->id) as $food) {
                $food->daysAvailable;
                $allFood[] = $food;
            }
        }

        return view('user.pages.home', compact('diningRoom', 'menuDays', 'allFood', 'advertisements','tagnames','nutritions','healths', 'users','day'));
    }

    public function nutricionVida()
    {
        $diningRoom = auth()->user()->profile->diningRoom;
        $advertisements = $diningRoom->advertisements;
        $tagnames = $diningRoom->tagnames;
        $nutritions =  $diningRoom->nutritions;
        $healths = $diningRoom->healths;
        return view('user.pages.nutricion-vida', compact('diningRoom','tagnames','healths','nutritions'));
    }
}
