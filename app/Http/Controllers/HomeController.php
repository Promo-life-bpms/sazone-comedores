<?php

namespace App\Http\Controllers;

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
        $anuncio = [
            'title' => 'Anuncio 1',
            'description' => 'Texto do anuncio 1',
            'image' => 'https://via.placeholder.com/150'
        ];
        $anuncio = (object) $anuncio;
        return view('user.pages.home', compact('anuncio'));
    }

    public function cupones()
    {
        return view('user.pages.cupones');
    }

    public function menu()
    {
        return view('user.pages.menu');
    }
}
