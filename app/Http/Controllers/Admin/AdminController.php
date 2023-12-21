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
        $diningRoom = DiningRoom::find(auth()->user()->profile->dining_room_id);
        $users = $diningRoom->users;
        $menuDays = DayFood::all();
        $advertisements = $diningRoom->advertisements;
        $allFood = [];
        foreach ($menuDays as $day) {
            foreach ($day->menus($diningRoom->id) as $food) {
                $food->daysAvailable;
                $allFood[] = $food;
            }
        }


        return view('admin.home', compact('diningRoom', 'users', 'menuDays', 'advertisements', 'allFood'));
    }
}
