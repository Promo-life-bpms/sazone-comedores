<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DayFood;
use App\Models\DiningRoom;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $diningRoom = DiningRoom::first();
        $users = $diningRoom->users;
        $menuDays = DayFood::all();
        
        $advertisements = $diningRoom->advertisements;

        return view('admin.pages.home', compact('diningRoom', 'users', 'menuDays', 'advertisements'));
    }
}
