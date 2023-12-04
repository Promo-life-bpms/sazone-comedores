<?php

namespace App\Http\Controllers;

use App\Models\DiningRoom;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_food' => 'required',
            'description_food' => 'required',
            'dining_id' => 'required',
            'time_food' => 'required',
            'image_food' => 'required',
            'availability_food' => 'required'
        ]);

        $dining = DiningRoom::find($request->dining_id);

        $menu = [
            'name' => $request->name_food,
            'description' => $request->description_food,
            'dining_room_id' => $request->dining_id,
            'time' => $request->time_food,
            'slug' => Str::slug($request->name_food),
        ];

        $file = $request->file('image_food');

        $nameFile = $menu['slug'] . '_menu.' . $file->getClientOriginalExtension();
        $path = 'dining_room/' . $dining->slug . "/menu/";

        $menu['image'] = $path . $nameFile;

        if ($file->isValid()) {
            Storage::putFileAs('public/' . $path, $file, $nameFile);
        } else {
            return redirect()->back()->with('error', 'No se ha podido crear el platillo por un problema con la imagen');
        }

        $menu = Menu::create($menu);

        $menu->daysAvailable()->attach($request->availability_food);

        return redirect()->back()->with('success_food', 'Platillo creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }
}
