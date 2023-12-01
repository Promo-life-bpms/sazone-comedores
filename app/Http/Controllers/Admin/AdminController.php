<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DinningRoom;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dinningRoom = DinningRoom::first();
        return view('admin.pages.home', compact('dinningRoom'));
    }
}
