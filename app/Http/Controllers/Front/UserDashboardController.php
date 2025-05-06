<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\ShippingDetail;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\OrderItem;

class UserDashboardController extends Controller
{
    public function index()
    {
        return view('frontend.userDashboard');
    }


    // Profile
    public function profile()
    {
        $user = Auth::user();
        return view('frontend.userProfile', compact('user'));
    }

    // checkout cart page
    public function checkout()
    {
        $testimonials = Testimonial::where('status', 1)->get();
        $getUser = Auth::user();
        $user = $getUser->shippingDetail;
        // dd($user);
        if (Auth::check() || $user != null) {
            $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
            if (!$cart || $cart->items->isEmpty()) {
                toastr()->error('Your cart is empty.');
                return redirect()->back();
            }
            return view('frontend.cartCheckout', compact('cart', 'testimonials', 'user'));
        }
    }

    // Update Shipping Details
    public function updateShipping(Request $request)
    {

        $validated = $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip' => 'required|string',
            'country' => 'required|string',
        ]);

        $user = Auth::user();
        $updateShipping = ShippingDetail::findOrNew($user->id);
        $updateShipping->user_id = $user->id;
        $updateShipping->name = $validated['full_name'];
        $updateShipping->email = $validated['email'];
        $updateShipping->phone = $validated['phone'];
        $updateShipping->address = $validated['address'];
        $updateShipping->city = $validated['city'];
        $updateShipping->state = $validated['state'];
        $updateShipping->zip = $validated['zip'];
        $updateShipping->country = $validated['country'];
        $updateShipping->status = 0;
        $updateShipping->save();

        toastr()->success('Shipping details updated successfully.');
        return redirect()->back();
    }

    // proceed to pay
    public function proceedToPay($id)
    {
        $userId = Auth::id();
        $cart = Cart::with('items.product')->where('user_id', $userId)->where('id', $id)->firstOrFail();
        $shippingDetails = ShippingDetail::where('user_id', $userId)->first();
        // dd($shippingDetails);
        DB::beginTransaction();

        try {
            if (!$shippingDetails) {
                toastr()->error('Shipping details not found.');
                return back();
            } else {
                $total = 0;
                foreach ($cart->items as $item) {
                    $product = $item->product;
                    $subtotal = $product->price * $item->quantity;
                    $total += $subtotal;
                }
                $afterShippingCharges = $total + 23;

                // Create order
                $order = Order::create([
                    'user_id' => $userId,
                    'total_amount' => $afterShippingCharges,
                    'status' => 'pending',
                ]);

                // Create order items
                foreach ($cart->items as $item) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $item->product_id,
                        'quantity' => $item->quantity,
                        'price' => $item->product->price,
                    ]);
                }
                $cart->delete();

                DB::commit();
                toastr()->success('Order placed successfully.');
                return redirect()->route('home');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error('Something went wrong.' . $e->getMessage());
            return back();
        }
    }


    // view Order History
    public function orders()
    {
        $orders = Order::with(['items.product.category', 'user']) // add 'user' if needed
            ->where('user_id', Auth::id())
            ->latest()
            ->get();
        // dd($orders);
        return view('frontend.orderHistory', compact('orders'));
    }
}
