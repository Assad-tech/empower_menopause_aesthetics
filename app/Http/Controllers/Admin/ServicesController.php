<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServicesController extends Controller
{
    public function index()
    {
        $banners = Banner::where('page', 'service')->get();
        $allServices = Service::get();
        return view('backend.service.service', compact('allServices', 'banners'));
    }

    public function create()
    {
        return view('backend.service.createService');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'booking_location' => 'required|url',
            'booking_practitioner' => 'required|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            // 'icon' => 'nullable|string',
        ]);

        $newService = new Service();


        // Auto-generate slug from title
        $newService->slug = Str::slug($request->title);

        // Optional: Ensure slug is unique (add increment if necessary)
        $existingSlugCount = Service::where('slug', $newService->slug)->count();
        if ($existingSlugCount > 0) {
            $newService->slug .= '-' . ($existingSlugCount + 1);
        }


        // Image Upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_image.' . $file->getClientOriginalExtension();
            $file->move(public_path('front/assets/images/featured'), $fileName);
            $newService->image = $fileName;
        }

        $newService->title = $request->title;
        // $newService->icon = $request->icon;
        $newService->description = $request->description??"null";
        $newService->booking_location = $request->booking_location??"null";
        $newService->booking_practitioner = $request->booking_practitioner??"null";
        $newService->status = 1;
        $newService->save();

        toastr()->success('Service created successfully!');
        return redirect()->route('admin.manage.services');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('backend.service.editService', compact('service'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'booking_location' => 'required|url',
            'booking_practitioner' => 'required|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            // 'icon' => 'nullable|string',
        ]);


        $updateService = Service::findOrFail($id);

        // Always check if slug is missing or if the title has changed
        if (empty($updateService->slug) || $request->title !== $updateService->title) {
            $slug = Str::slug($request->title);

            // Ensure unique slug
            $existingSlugCount = Service::where('slug', $slug)
                ->where('id', '!=', $id)
                ->count();
            if ($existingSlugCount > 0) {
                $slug .= '-' . ($existingSlugCount + 1);
            }

            $updateService->slug = $slug;
        }

        // Image Upload (optional)
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_image.' . $file->getClientOriginalExtension();
            $file->move(public_path('front/assets/images/featured'), $fileName);
            $updateService->image = $fileName;
        }

        $updateService->title = $request->title;
        // $updateService->icon = $request->icon;
        $updateService->description = $request->description??"null";
        $updateService->booking_location = $request->booking_location??"null";
        $updateService->booking_practitioner = $request->booking_practitioner??"null";
        $updateService->status = $request->status;

        $updateService->save();

        toastr()->success('Service updated successfully!');
        return redirect()->route('admin.manage.services');
    }

    public function delete($id)
    {
        $deleteService = Service::findOrFail($id);
        $deleteService->delete();
        toastr()->success('Service deleted successfully!');
        return redirect()->route('admin.manage.services');
    }

    // __________ Service Banner _________
    // Create new Service Banner
    public function createBanner()
    {
        return view('backend.service.createBanner');
    }
    // Store new Service Banner
    public function storeBanner(Request $request)
    {
        // dd($request);
        $request->validate([
            'page' => 'required|in:service',
            'greeting' => 'nullable|string',
            'site_name' => 'nullable|string',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'banner_description' => 'nullable|string',
            'link_on_banner' => 'nullable|url',
            'link_text' => 'nullable|string',
        ]);

        // dd($request);
        $banner = new Banner();

        if ($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('front/assets/images/banners'), $fileName);
            $banner->banner = $fileName;
        }

        $banner->page = $request->page ?? "service";
        $banner->greeting = $request->greeting;
        $banner->site_name = $request->site_name;
        $banner->banner_description = $request->banner_description;
        $banner->banner_link = $request->link_on_banner;
        $banner->link_text = $request->link_text;
        $banner->save();
        toastr()->success('Service created successfully!');
        return redirect()->route('admin.manage.services');
    }

    // Edit Service Banner
    public function editBanner($id)
    {
        $content = Banner::where('page', 'service')->where('id', $id)->first();
        return view('backend.service.editBanner', compact('content'));
    }

    // Update Service Banner
    public function updateBanner(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'page' => 'required|in:service',
            'greeting' => 'nullable|string',
            'site_name' => 'required|string',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'banner_description' => 'nullable|string',
            'link_on_banner' => 'nullable|url',
            'link_text' => 'nullable|string',
        ]);

        $updateBanner = Banner::find($id);

        if ($request->hasFile('banner_image')) {
            if ($updateBanner->banner && file_exists(public_path('front/assets/images/banners/' . $updateBanner->banner))) {
                unlink(public_path('front/assets/images/banners/' . $updateBanner->banner));
            }
            $file = $request->file('banner_image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('front/assets/images/banners'), $fileName);
            $updateBanner->banner = $fileName;
        }

        $updateBanner->page = $request->page ?? "service";
        $updateBanner->greeting = $request->greeting;
        $updateBanner->site_name = $request->site_name;
        $updateBanner->banner_description = $request->banner_description;
        $updateBanner->banner_link = $request->link_on_banner;
        $updateBanner->link_text = $request->link_text;
        $updateBanner->save();
        toastr()->success('Service updated successfully!');
        return redirect()->route('admin.manage.services');
    }

    // Delete Service Banner
    public function deleteBanner($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();
        toastr()->success('Service deleted successfully!');
        return redirect()->route('admin.manage.services');
    }
}
