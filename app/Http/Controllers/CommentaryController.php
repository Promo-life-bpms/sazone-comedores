<?php

namespace App\Http\Controllers;

use App\Models\Commentary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class CommentaryController extends Controller
{
    public function storeCommentary(Request $request)  {

        $create_commentary = new Commentary();
        $create_commentary->comment = $request->comment; 
        $create_commentary->user_id = auth()->user()->id; 
        $create_commentary->detail = null; 
        $create_commentary->save();
        return Redirect::back()->with('mensaje', 'comentario creado satisfactoriamente');

    }
}
