<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\FAQ;
use Illuminate\Http\Request;

class FAQsController extends Controller
{

    public function index()
    {
        $banners = Banner::where('page', 'faqs')->get();
        $faqs = FAQ::where('status', 1)->get();
        return view('backend.faqs.index', compact('banners','faqs'));
    }

    public function create()
    {
        return view('backend.faqs.createFaqs');
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
            'type' => 'required|string',
            // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
        ]);

        $newFAQ = new FAQ();


        // Auto-generate slug from title
        // $newFAQ->slug = Str::slug($request->title);

        // Optional: Ensure slug is unique (add increment if necessary)
        // $existingSlugCount = FAQ::where('slug', $newFAQ->slug)->count();
        // if ($existingSlugCount > 0) {
        //     $newFAQ->slug .= '-' . ($existingSlugCount + 1);
        // }


        // Image Upload
        // if ($request->hasFile('image')) {
        //     $file = $request->file('image');
        //     $fileName = time() . '_image.' . $file->getClientOriginalExtension();
        //     $file->move(public_path('front/assets/images/featured'), $fileName);
        //     $newFAQ->image = $fileName;
        // }

        $newFAQ->question = $request->question;
        // $newFAQ->icon = $request->icon;
        $newFAQ->answer = $request->answer;
        $newFAQ->type = $request->type;
        $newFAQ->status = 1;

        $newFAQ->save();

        toastr()->success('FAQ created successfully!');
        return redirect()->route('admin.manage.faqs');
    }

    public function edit($id)
    {
        $faq = FAQ::findOrFail($id);
        return view('backend.faqs.editFaqs', compact('faq'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
            //'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);


        $updateService = FAQ::findOrFail($id);

        // Always check if slug is missing or if the question has changed
        // if (empty($updateService->slug) || $request->question !== $updateService->question) {
        //     $slug = Str::slug($request->question);

        //     // Ensure unique slug
        //     $existingSlugCount = Service::where('slug', $slug)
        //         ->where('id', '!=', $id)
        //         ->count();
        //     if ($existingSlugCount > 0) {
        //         $slug .= '-' . ($existingSlugCount + 1);
        //     }

        //     $updateService->slug = $slug;
        // }

        // Image Upload (optional)
        // if ($request->hasFile('image')) {
        //     $file = $request->file('image');
        //     $fileName = time() . '_image.' . $file->getClientOriginalExtension();
        //     $file->move(public_path('front/assets/img/service'), $fileName);
        //     // Optionally unlink old image
        //     // if ($updateService->image) {
        //     //     @unlink(public_path('front/assets/img/service/' . $updateService->image));
        //     // }
        //     $updateService->image = $fileName;
        // }

        $updateService->question = $request->question;
        $updateService->answer = $request->answer;
        $updateService->type = $request->type;


        $updateService->save();

        toastr()->success('FAQ updated successfully!');
        return redirect()->route('admin.manage.faqs');
    }

    public function delete($id)
    {
        $deleteService = FAQ::findOrFail($id);
        $deleteService->delete();
        toastr()->success('FAQ deleted successfully!');
        return redirect()->route('admin.manage.faqs');
    }


    // __________ FAQs Banner _________
    // Create new FAQs Banner
    public function createBanner()
    {
        return view('backend.faqs.createBanner');
    }
    // Store new FAQs Banner
    public function storeBanner(Request $request)
    {
        // dd($request);
        $request->validate([
            'page' => 'required|in:faqs',
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

        $banner->page = $request->page ?? "faqs";
        $banner->greeting = $request->greeting;
        $banner->site_name = $request->site_name;
        $banner->banner_description = $request->banner_description;
        $banner->banner_link = $request->link_on_banner;
        $banner->link_text = $request->link_text;
        $banner->save();
        toastr()->success('Banner created successfully!');
        return redirect()->route('admin.manage.faqs');
    }

    // Edit FAQs Banner
    public function editBanner($id)
    {
        $content = Banner::where('page', 'faqs')->where('id', $id)->first();
        return view('backend.faqs.editBanner', compact('content'));
    }

    // Update FAQs Banner
    public function updateBanner(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'page' => 'required|in:faqs',
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

        $updateBanner->page = $request->page ?? "faqs";
        $updateBanner->greeting = $request->greeting;
        $updateBanner->site_name = $request->site_name;
        $updateBanner->banner_description = $request->banner_description;
        $updateBanner->banner_link = $request->link_on_banner;
        $updateBanner->link_text = $request->link_text;
        $updateBanner->save();
        toastr()->success('Banner updated successfully!');
        return redirect()->route('admin.manage.faqs');
    }

    // Delete FAQs Banner
    public function deleteBanner($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();
        toastr()->success('Banner deleted successfully!');
        return redirect()->route('admin.manage.faqs');
    }
}
