<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\ContactMessageReceived;
use App\Models\AboutOurClient;
use App\Models\AboutUs;
use App\Models\AboutUsStats;
use App\Models\Banner;
use App\Models\ContactUs;
use App\Models\FAQ;
use App\Models\Home;
use App\Models\HomeFeatured;
use App\Models\NewsLatterEmail;
use App\Models\Product;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    // homepage
    public function index()
    {
        // $content = Home::first();
        $content = Banner::where('page', 'home')->first();
        $testimonials = Testimonial::where('status', 1)->get();
        $services = Service::where('status', 1)->get()->take(3);
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
    public function viewService($slug){
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
    public function bookAConsultationView($type)
    {
        if($type == 'practitioner'){
            $heading = 'Melissa Howcroft (Practitioner)';
            $link = 'https://www.halaxy.com/book/widget/appointment/nurse/ms-melissa-howcroft/1709895/1311467';
        }else{
            $heading = 'Empower Menopause & Aesthetics (Clinic)';
            $link = 'https://www.halaxy.com/book/widget/empower-menopause-aesthetics/location/1311467';
        }
        return view('frontend.book-a-consultation-view', compact('link','heading'));
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
}
