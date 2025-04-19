<?php

// app/Http/Controllers/Admin/ProductController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with('category')->latest()->get();
        $banners = Banner::where('page', 'product')->get();

        // dd($products);
        return view('backend.product.index', compact('products', 'banners'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('backend.product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'apply_rating' => 'required|in:1,2,3,4,5',
            'description' => 'nullable|string',
            'offer_text' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'discount_percentage' => 'nullable|numeric|min:0|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
        ]);

        // dd($request->all());
        $imageName = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '_product.' . $file->getClientOriginalExtension();
            $file->move(public_path('front/assets/images/products'), $imageName);
        }

        Product::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'category_id' => $request->category_id,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'offer_text' => $request->offer_text,
            'rating' => $request->apply_rating,
            'discount_percentage' => $request->discount_percentage,
            'image' => $imageName,
            'status' => 1,
        ]);
        toastr()->success('Product created successfully.');
        return redirect()->route('admin.manage.products');
    }

    public function edit($id)
    {

        $categories = Category::all();
        $product = Product::with('category')->findOrFail($id);
        return view('backend.product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'apply_rating' => 'required|in:1,2,3,4,5',
            'offer_text' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'stock' => 'required|integer|min:0',
            'discount_percentage' => 'nullable|numeric|min:0|max:100',
        ]);

        $product = Product::findOrFail($id);
        // dd($request->all());
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('front/assets/images/products'), $imageName);
            $product->image = $imageName;
        }

        $product->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'category_id' => $request->category_id,
            'description' => $request->description,
            'price' => $request->price,
            'offer_text' => $request->offer_text,
            'rating' => $request->apply_rating,
            'stock' => $request->stock,
            'discount_percentage' => $request->discount_percentage,
            'status' => $request->status ?? $product->status,
        ]);

        toastr()->success('Product updated successfully.');
        return redirect()->route('admin.manage.products');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        toastr()->success('Product deleted successfully.');
        return redirect()->route('admin.manage.products');
    }

    // __________ Priduct Banner _________
    // Create new Priduct Banner 
    public function createBanner()
    {
        return view('backend.product.createBanner');
    }
    // Store new Priduct Banner
    public function storeBanner(Request $request)
    {
        // dd($request);
        $request->validate([
            'page' => 'required|in:product',
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

        $banner->page = $request->page ?? "product";
        $banner->greeting = $request->greeting;
        $banner->site_name = $request->site_name;
        $banner->banner_description = $request->banner_description;
        $banner->banner_link = $request->link_on_banner;
        $banner->link_text = $request->link_text;
        $banner->save();
        toastr()->success('Banner created successfully!');
        return redirect()->route('admin.manage.products');
    }

    // Edit Priduct Banner
    public function editBanner($id)
    {
        $content = Banner::where('page', 'product')->where('id', $id)->first();
        return view('backend.product.editBanner', compact('content'));
    }

    // Update Priduct Banner
    public function updateBanner(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'page' => 'required|in:product',
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

        $updateBanner->page = $request->page ?? "product";
        $updateBanner->greeting = $request->greeting;
        $updateBanner->site_name = $request->site_name;
        $updateBanner->banner_description = $request->banner_description;
        $updateBanner->banner_link = $request->link_on_banner;
        $updateBanner->link_text = $request->link_text;
        $updateBanner->save();
        toastr()->success('Banner updated successfully!');
        return redirect()->route('admin.manage.products');
    }

    // Delete Priduct Banner
    public function deleteBanner($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();
        toastr()->success('Banner deleted successfully!');
        return redirect()->route('admin.manage.products');
    }
}
