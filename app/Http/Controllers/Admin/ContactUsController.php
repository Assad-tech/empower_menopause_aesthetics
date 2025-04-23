<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        $banners = Banner::where('page', 'contact')->get();
        $messages = ContactUs::where('status', 1)->get();
        return view('backend.contact.index', compact('banners','messages'));
    }

    function destroy($id)
    {

        $contact = ContactUs::find($id);
        $contact->delete();
        toastr()->success('Query Deleted Successfully ');
        return redirect()->route('admin.manage.contact-us');
    }

    // __________ Contact us Banner _________
    // Create new Contact us Banner 
    public function createBanner()
    {
        return view('backend.contact.createBanner');
    }
    // Store new Contact us Banner
    public function storeBanner(Request $request)
    {
        // dd($request);
        $request->validate([
            'page' => 'required|in:contact',
            'greeting' => 'nullable|string',
            'site_name' => 'nullable|string',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
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

        $banner->page = $request->page ?? "contact";
        $banner->greeting = $request->greeting;
        $banner->site_name = $request->site_name;
        $banner->banner_description = $request->banner_description;
        $banner->banner_link = $request->link_on_banner;
        $banner->link_text = $request->link_text;
        $banner->save();
        toastr()->success('Banner created successfully!');
        return redirect()->route('admin.manage.contact-us');
    }

    // Edit Contact us Banner
    public function editBanner($id)
    {
        $content = Banner::where('page', 'contact')->where('id', $id)->first();
        return view('backend.contact.editBanner', compact('content'));
    }

    // Update Contact us Banner
    public function updateBanner(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'page' => 'required|in:contact',
            'greeting' => 'nullable|string',
            'site_name' => 'required|string',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'banner_description' => 'nullable|string',
            'link_on_banner' => 'nullable|url',
            'link_text' => 'nullable|string',
        ]);

        $updateBanner = Banner::find($id);

        // dd($updateBanner);
        if ($request->hasFile('banner_image')) {
            if ($updateBanner->banner && file_exists(public_path('front/assets/images/banners/' . $updateBanner->banner))) {
                unlink(public_path('front/assets/images/banners/' . $updateBanner->banner));
            }
            $file = $request->file('banner_image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('front/assets/images/banners'), $fileName);
            $updateBanner->banner = $fileName;
        }

        $updateBanner->page = $request->page ?? "contact";
        $updateBanner->greeting = $request->greeting;
        $updateBanner->site_name = $request->site_name;
        $updateBanner->banner_description = $request->banner_description;
        $updateBanner->banner_link = $request->link_on_banner;
        $updateBanner->link_text = $request->link_text;
        $updateBanner->save();
        toastr()->success('Banner updated successfully!');
        return redirect()->route('admin.manage.contact-us');
    }

    // Delete Contact us Banner
    public function deleteBanner($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();
        toastr()->success('Banner deleted successfully!');
        return redirect()->route('admin.manage.contact-us');
    }
}


