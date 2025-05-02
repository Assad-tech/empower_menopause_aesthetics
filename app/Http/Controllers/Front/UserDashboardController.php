<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        return view('frontend.userDashboard');
    }

    // checkout cart page
    public function checkout()
    {
        $testimonials = Testimonial::where('status', 1)->get();
        $user = Auth::user();
        if (Auth::check()) {
            $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
            if (!$cart || $cart->items->isEmpty()) {
                toastr()->error('Your cart is empty.');
                return redirect()->back();
            }

            return view('frontend.cartCheckout',compact('cart','testimonials'));
        }
    }
}
