<?php

namespace App\Http\Controllers;

use App\Models\DayFood;
use App\Models\DiningRoom;
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

        return view('user.pages.home', compact('diningRoom', 'day', 'advertisements'));
    }

    public function cupones()
    {
        $diningRoom = auth()->user()->profile->diningRoom;
        return view('user.pages.cupones', compact('diningRoom'));
    }

    public function menu()
    {
        $menuDays = DayFood::all();
        $diningRoom = auth()->user()->profile->diningRoom;
        return view('user.pages.menu', compact('menuDays', 'diningRoom'));
    }

    public function acerca()
    {
        $diningRoom = auth()->user()->profile->diningRoom;
        return view('user.pages.acerca-de', compact('diningRoom'));
    }

    public function cuenta()
    {
        $diningRoom = '';
        if (!(auth()->user()->hasRole(['super-admin', 'master-admin']))) {
            $diningRoom = auth()->user()->profile->diningRoom;
        }
        return view('user.pages.mi-cuenta', compact('diningRoom'));
    }
}
