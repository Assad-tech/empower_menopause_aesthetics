<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\FAQ;
use App\Models\Home;
use App\Models\Product;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $allServices = Service::where('status', 1)->get()->count();
        $allFAQs = FAQ::where('status', 1)->get()->count();
        $allContactUs = ContactUs::where('status', 1)->get()->count();
        $allProducts = Product::where('status', 1)->get()->count();
        // dd($allProducts);
        return view('backend.home.index', compact('allServices', 'allFAQs', 'allContactUs', 'allProducts'));
    }

    public function viewHome()
    {
        $homeData = Home::get();
        $testimonials = Testimonial::where('status', 1)->get();
        // dd($homeData);
        return view('backend.home.home', compact('homeData', 'testimonials'));
    }

    public function create()
    {
        return view('backend.home.createHome');
    }
    public function store(Request $request)
    {

        $request->validate([
            'greeting' => 'nullable|string',
            'site_name' => 'nullable|string',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'banner_description' => 'nullable|string',
            'link_on_banner' => 'nullable|url',
            'link_text' => 'nullable|string',
        ]);

        // dd($request);
        $home = new Home();

        if ($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('front/assets/images/banners'), $fileName);
            $home->banner = $fileName;
        }

        $home->greeting = $request->greeting;
        $home->site_name = $request->site_name;
        $home->banner_description = $request->banner_description;
        $home->banner_link = $request->link_on_banner;
        $home->link_text = $request->link_text;
        $home->save();
        toastr()->success('Home section created successfully!');
        return redirect()->back();
    }

    public function edit($id)
    {
        $content = Home::find($id);
        // dd($home);
        return view('backend.home.editHome', compact('content'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'greeting' => 'nullable|string',
            'site_name' => 'required|string',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'banner_description' => 'nullable|string',
            'link_on_banner' => 'nullable|url',
            'link_text' => 'nullable|string',
        ]);

        $home = Home::find($id);

        if ($request->hasFile('banner_image')) {
            if ($home->banner && file_exists(public_path('front/assets/images/banners/' . $home->banner))) {
                unlink(public_path('front/assets/images/banners/' . $home->banner));
            }
            $file = $request->file('banner_image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('front/assets/images/banners'), $fileName);
            $home->banner = $fileName;
        }

        $home->greeting = $request->greeting;
        $home->site_name = $request->site_name;
        $home->banner_description = $request->banner_description;
        $home->banner_link = $request->link_on_banner;
        $home->link_text = $request->link_text;
        $home->save();
        toastr()->success('Home section updated successfully!');
        return redirect()->route('admin.manage.home');
    }

    public function delete($id)
    {
        $home = Home::find($id);
        $home->delete();
        toastr()->success('Home section deleted successfully!');
        return redirect()->route('admin.manage.home');
    }


    // ________ Testimonial ________ //
    public function createTestimonial()
    {
        return view('backend.testimonial.createTestimonial');
    }

    public function storeTestimonial(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'feedback' => 'required|string',
            'type' => 'nullable|in:patient,doctor,consultant',
            'post_date' => 'nullable|date',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp',
        ]);

        $testimonial = new Testimonial();
        $testimonial->name = $request->name;
        $testimonial->rating = $request->rating;
        $testimonial->feedback = $request->feedback;
        $testimonial->type = $request->type;
        $testimonial->post_date = $request->post_date;
        // Custom Image Upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_image.' . $file->getClientOriginalExtension();
            $file->move(public_path('front/assets/images/testimonials'), $fileName);
            $testimonial->image = $fileName;
        }

        $testimonial->save();
        toastr()->success('Testimonial saved successfully!');
        return redirect()->route('admin.manage.home');
    }

    public function editTestimonial($id)
    {
        $testimonial = Testimonial::find($id);
        // dd($testimonial);
        return view('backend.testimonial.editTestimonial', compact('testimonial'));
    }

    public function updateTestimonial(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'feedback' => 'required|string',
            'type' => 'nullable|in:patient,doctor,consultant',
            'post_date' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        $testimonial = Testimonial::findOrFail($id);
        $testimonial->name = $request->name;
        $testimonial->rating = $request->rating;
        $testimonial->feedback = $request->feedback;
        $testimonial->type = $request->type;
        $testimonial->post_date = $request->post_date;

        // Handle image update
        if ($request->hasFile('image')) {
            // Delete old image if exists
            $oldImagePath = public_path('front/assets/images/testimonials/' . $testimonial->image);
            if (file_exists($oldImagePath)) {
                @unlink($oldImagePath);
            }

            // Upload new image
            $file = $request->file('image');
            $fileName = time() . '_image.' . $file->getClientOriginalExtension();
            $file->move(public_path('front/assets/images/testimonials'), $fileName);
            $testimonial->image = $fileName;
        }

        $testimonial->save();
        toastr()->success('Testimonial updated successfully!');
        return redirect()->route('admin.manage.home');
    }

    public function deleteTestimonial($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        // Delete image from storage
        $imagePath = public_path('front/assets/images/testimonials/' . $testimonial->image);
        if (file_exists($imagePath)) {
            @unlink($imagePath);
        }

        // Delete testimonial
        $testimonial->delete();

        toastr()->success('Testimonial deleted successfully!');
        return redirect()->back();
    }
}

