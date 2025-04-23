<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutOurClient;
use App\Models\AboutUs;
use App\Models\AboutUsStats;
use App\Models\Banner;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $about = AboutUs::first();
        $aboutMe = AboutUs::find(2);

        $banners = Banner::where('page', 'about_us')->get();
        // dd($banners);
        return view('backend.aboutUs.index', compact('about', 'banners', 'aboutMe'));
    }

    public function updateAboutUs(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'about_us_heading' => 'required|string',
            'about_us_description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);

        // Retrieve or create About Us entry
        $about = AboutUs::firstOrCreate([]);

        // Handle Image upload if provided
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_about_us.' . $file->getClientOriginalExtension();

            $file->move(public_path('front/assets/images/'), $fileName);

            // Delete old image if exists
            if (!empty($about->image) && file_exists(public_path('front/assets/images' . $about->image))) {
                unlink(public_path('front/assets/images/' . $about->image));
            }

            $about->image = $fileName;
        }

        $about->heading = $validated['about_us_heading'];
        $about->description = $validated['about_us_description'];
        $about->save();

        toastr()->success('About Us details updated successfully!');
        return redirect()->route('admin.manage.about-us');
    }

    public function updateAboutMe(Request $request, $id = null)
    {
        // dd($request->all());
        $validated = $request->validate([
            'about_me_heading' => 'required|string',
            'about_me_description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);

        // Retrieve or create About Us entry
        $about = AboutUs::findOrNew($id);

        // Handle Image upload if provided
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_about_me.' . $file->getClientOriginalExtension();
            $file->move(public_path('front/assets/images'), $fileName);

            // Delete old image if exists
            if (!empty($about->image) && file_exists(public_path('front/assets/images/' . $about->image))) {
                unlink(public_path('front/assets/images/' . $about->image));
            }

            $about->image = $fileName;
        }

        $about->heading = $validated['about_me_heading'];
        $about->description = $validated['about_me_description'];
        $about->save();

        toastr()->success('About Me details updated successfully!');
        return redirect()->route('admin.manage.about-us');
    }


    // __________ Banner _________
    // Create new Banner
    public function createBanner()
    {
        return view('backend.aboutUs.createBanner');
    }
    // Store new Banner
    public function storeBanner(Request $request)
    {
        // dd($request);
        $request->validate([
            'page' => 'required|in:about_us',
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

        $banner->page = $request->page ?? "about_us";
        $banner->greeting = $request->greeting;
        $banner->site_name = $request->site_name;
        $banner->banner_description = $request->banner_description;
        $banner->banner_link = $request->link_on_banner;
        $banner->link_text = $request->link_text;
        $banner->save();
        toastr()->success('Banner created successfully!');
        return redirect()->route('admin.manage.about-us');
    }

    // Edit Banner
    public function editBanner($id)
    {
        $content = Banner::where('page', 'about_us')->where('id', $id)->first();
        return view('backend.aboutUs.editBanner', compact('content'));
    }

    // Update Banner
    public function updateBanner(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'page' => 'required|in:about_us',
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

        $updateBanner->page = $request->page ?? "about_us";
        $updateBanner->greeting = $request->greeting;
        $updateBanner->site_name = $request->site_name;
        $updateBanner->banner_description = $request->banner_description;
        $updateBanner->banner_link = $request->link_on_banner;
        $updateBanner->link_text = $request->link_text;
        $updateBanner->save();
        toastr()->success('Banner updated successfully!');
        return redirect()->route('admin.manage.about-us');
    }

    // Delete Banner
    public function deleteBanner($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();
        toastr()->success('Banner deleted successfully!');
        return redirect()->route('admin.manage.about-us');
    }
}
