<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
use App\Jobs\UpdateCoupon;

class CouponsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $coupon = Coupon::where('code', $request->coupon_code)->first();

         if (!$coupon) {
              return back()->with([
                  'message'       => 'Invalid coupon code',
                  'alert-type'    => 'error',
              ]);
         }

         dispatch_now(new UpdateCoupon($coupon));

         return back()->with([
            'message' => 'Coupon has been applied',
            'alert-type' => 'success'
         ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
         session()->forget('coupon');

         return back()->with([
            'message' => 'Coupon has been removed.',
            'alert-type' => 'success'
         ]);
    }
}
