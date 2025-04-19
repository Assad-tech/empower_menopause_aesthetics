<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteContent;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SiteContentController extends Controller
{
    public function index()
    {
        $logo = SiteContent::select('logo')->first();
        $phone = SiteContent::select('phone')->first();
        $email = SiteContent::select('email')->first();
        $address = SiteContent::select('address')->first();
        $copyright = SiteContent::select('copyright')->first();
        $footer_logo = SiteContent::select('footer_logo')->first();
        $consultation = SiteContent::select('consultation')->first();
        $footer_text = SiteContent::select('footer_text')->first();
        // dd($logo);
        return view('backend.siteContent.index', compact('logo', 'phone', 'email', 'address', 'copyright', 'footer_logo', 'consultation','footer_text'));
    }

    // update site content
    public function updateContent(Request $request)
    {
        
        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'footer_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'address' => 'nullable|string',
            'copyright' => 'nullable|string',
        ]);
        // Retrieve the first record or create a new one
        $siteContent = SiteContent::first();
        if (!$siteContent) {
            $siteContent = new SiteContent();
        }
        
        // dd($request->all());
        
        // Handle header_logo upload
        if ($request->hasFile('logo')) {
            if ($siteContent->logo && File::exists(public_path($siteContent->logo))) {
                File::delete(public_path($siteContent->logo)); // Unlink old image
            }
            $site_logo = $request->file('logo');

            // Generate a unique file name with a timestamp
            $fileName = now()->format('YmdHis') . "_" . $site_logo->getClientOriginalName();

            // Move the file to the target directory
            $site_logo->move(public_path('front/assets/images/'), $fileName);

            // Save the file name in the database
            $siteContent->logo =  $fileName;
        }
        // footer logo
        if ($request->hasFile('footer_logo')) {
            if ($siteContent->footer_logo && File::exists(public_path($siteContent->footer_logo))) {
                File::delete(public_path($siteContent->footer_logo)); // Unlink old image
            }
            $footer_logo = $request->file('footer_logo');

            // Generate a unique file name with a timestamp
            $fileName = now()->format('YmdHis') . "_" . $footer_logo->getClientOriginalName();

            // Move the file to the target directory
            $footer_logo->move(public_path('front/assets/images/'), $fileName);

            // Save the file name in the database
            $siteContent->footer_logo =  $fileName;
        }

        // Update other fields
        $siteContent->phone = $request->phone;
        $siteContent->email = $request->email;
        $siteContent->address = $request->address;
        $siteContent->copyright = $request->copyright;
        $siteContent->consultation = $request->consultation;
        $siteContent->footer_text = $request->footer_text;

        // Save the site content
        $siteContent->save();
        toastr()->success('content updated successfully!');

        return redirect()->back();
    }

    // view Social Links
    public function socialLinks()
    {
        $fb = SocialLink::select('facebook')->first();
        $insta = SocialLink::select('instagram')->first();
        $linkedin = SocialLink::select('linkedin')->first();
        // $twitter = SocialLink::select('twitter')->first();
        return view('backend.siteContent.socialLinks', compact('fb', 'insta', 'linkedin'));
    }

    // update Social Links
    public function updateSocialLinks(Request $request)
    {

        $validated = $request->validate([
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'twitter' => 'nullable|url',
        ]);
        // Save to the database (assuming a `SiteContent` or similar model exists)
        $siteContent = SocialLink::firstOrCreate();
        $siteContent->update($validated);
        toastr()->success('Social Links updated successfully!');
        return redirect()->back();
    }
}


