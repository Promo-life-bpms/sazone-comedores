<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function store(Request $request)  {

        

        $coupon = new Coupon();
        $coupon->fill($request->all());
        $coupon->save();


        return redirect()->back()->with('success', 'Se han actualizado los colores correctamente');

    }
}
