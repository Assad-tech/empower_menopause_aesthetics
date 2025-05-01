<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\ContactMessageReceived;
use App\Models\AboutOurClient;
use App\Models\AboutUs;
use App\Models\AboutUsStats;
use App\Models\Banner;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\ContactUs;
use App\Models\FAQ;
use App\Models\Home;
use App\Models\HomeFeatured;
use App\Models\NewsLatterEmail;
use App\Models\Product;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    // homepage
    public function index()
    {
        // $content = Home::first();
        $content = Banner::where('page', 'home')->first();
        $testimonials = Testimonial::where('status', 1)->get();
        $services = Service::where('status', 1)->get();
        $faqs = FAQ::where('status', 1)->get();
        $about = AboutUs::first();
        // dd($content);
        return view('frontend.index', compact('content', 'testimonials', 'services', 'faqs', 'about'));
    }

    // about us
    public function aboutUs()
    {
        $banner = Banner::where('page', 'about_us')->first();
        $about = AboutUs::first();
        $aboutMe = AboutUs::find(2);
        $testimonials = Testimonial::where('status', 1)->get();
        // dd($aboutMe);
        return view('frontend.aboutUs', compact('banner', 'about', 'aboutMe', 'testimonials'));
    }

    // services
    public function services()
    {
        $banner = Banner::where('page', 'service')->first();
        $services = Service::where('status', 1)->get();
        $testimonials = Testimonial::where('status', 1)->get();
        return view('frontend.services', compact('banner', 'services', 'testimonials'));
    }

    // view Service
    public function viewService($slug)
    {
        $service = Service::where('slug', $slug)->first();
        // return $service;
        $testimonials = Testimonial::where('status', 1)->get();
        return view('frontend.viewService', compact('service', 'testimonials'));
    }

    // products
    public function products(Request $request)
    {
        $testimonials = Testimonial::where('status', 1)->get();
        $banner = Banner::where('page', 'product')->first();
        $productsQuery = Product::with('category')->where('status', 1);

        // If search term exists, filter the products
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;

            $productsQuery->where(function ($query) use ($searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('description', 'like', '%' . $searchTerm . '%')
                    ->orWhere('offer_text', 'like', '%' . $searchTerm . '%');
            })
                ->orWhereHas('category', function ($q) use ($searchTerm) {
                    $q->where('name', 'like', '%' . $searchTerm . '%');
                });
        }

        $products = $productsQuery->get();
        // dd($products);
        return view('frontend.products', compact('testimonials', 'products', 'banner'));
    }

    // view Product
    public function viewProduct($slug)
    {
        $product = Product::with('category')->where('slug', $slug)->first();
        $testimonials = Testimonial::where('status', 1)->get();
        $banner = Banner::where('page', 'product')->first();
        // dd($product);
        return view('frontend.viewProduct', compact('product', 'testimonials', 'banner'));
    }
    // faqs
    public function faqs()
    {
        $banner = Banner::where('page', 'faqs')->first();
        $faqs = FAQ::where('status', 1)->get();
        return view('frontend.faqs', compact('banner', 'faqs'));
    }

    // contact us
    public function contactUs()
    {
        $banner = Banner::where('page', 'contact')->first();
        $testimonials = Testimonial::where('status', 1)->get();
        return view('frontend.contactUs', compact('banner', 'testimonials'));
    }

    // store contact us
    public function store(Request $request)
    {
        $data =  $request->validate([
            'customer_name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'nullable|numeric',
            'message' => 'nullable|string',
        ]);

        $contact = new ContactUs();
        $contact->name = $request->customer_name;
        $contact->email = $request->email;
        $contact->phone = $request->phone_number;
        $contact->message = $request->message;
        $contact->status = 1;
        $contact->save();

        Mail::to('erricmartin3@gmail.com')->send(new ContactMessageReceived($data));
        toastr()->success('Message sent successfully.!');
        return redirect()->route('contact.us');
    }

    // book a consultation
    public function bookAConsultation()
    {
        return view('frontend.book-a-consultation');
    }

    // store emails
    public function storeEmails(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:news_latter_emails,email',
        ]);

        $email = new NewsLatterEmail();
        $email->email = $request->email;
        $email->subscribtion_status = 1;
        $email->subscribed_at = now();
        $email->save();
        toastr()->success('Email saved successfully.!');
        return redirect()->route('home');
    }


    // _______________ Product Carts Methods _________________

    
    public function addToCart($id)
    {
        $product = Product::find($id);

        if (!$product) {
            toastr()->error('Product not found!');
            return redirect()->back();
        }

        if (!Auth::check()) {
            toastr()->error('You must be logged in to add to cart.');
            return redirect()->back();
        }

        // Check if product is in stock
        if ($product->stock < 1) {
            toastr()->error('Product is out of stock.');
            return redirect()->back();
        }

        DB::beginTransaction();
        try {
            $user = Auth::user();

            // Find or create the cart for this user
            $cart = Cart::firstOrCreate([
                'user_id' => $user->id,
            ]);

            // Check if product already exists in cart
            $cartItem = CartItem::where('cart_id', $cart->id)
                ->where('product_id', $product->id)
                ->first();

            if ($cartItem) {
                // Update quantity if exists
                $cartItem->increment('quantity', 1);
            } else {
                // Create new cart item
                CartItem::create([
                    'cart_id' => $cart->id,
                    'product_id' => $product->id,
                    'quantity' => 1
                ]);
            }

            // Decrease stock by 1
            $product->decrement('stock', 1);

            DB::commit();

            toastr()->success('Product added to cart!');
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error('Failed to add product to cart.');
        }

        return redirect()->back();
    }


    public function updateCart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function removeCart(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }
}
