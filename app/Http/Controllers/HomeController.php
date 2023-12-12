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
        $diningRoom = DiningRoom::first();
        $menuDays = DayFood::all();
        $advertisements = $diningRoom->advertisements;

        return view('user.pages.home', compact('diningRoom', 'menuDays', 'advertisements'));
    }

    public function cupones()
    {
        return view('user.pages.cupones');
    }

    public function menu()
    {
        return view('user.pages.menu');
    }

    public function acerca()
    {
        return view('user.pages.acerca-de');
    }

    public function cuenta()
    {
        return view('user.pages.mi-cuenta');
    }
}
