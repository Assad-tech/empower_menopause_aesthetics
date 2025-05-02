<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FAQsController;
use App\Http\Controllers\Admin\FeaturedController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\SiteContentController;
use App\Http\Controllers\Front\AuthController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\UserDashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Guest routes
Route::middleware('guest:web')->group(function () {
    // User Auth
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'index')->name('user.login');
        Route::post('/login-post', 'login')->name('user.login.submit');
        Route::get('/register', 'register')->name('user.register');
        Route::post('/register-post', 'store')->name('user.register.submit');
    });
});

Route::middleware('guest:admin')->prefix('admin')->group(function () {
    // Admin Auth
    Route::controller(AdminAuthController::class)->group(function () {
        Route::get('/login', 'index')->name('admin.login');
        Route::post('/login', 'login')->name('admin.login.submit');
    });
});

// Authenticated user routes
Route::middleware('auth:web')->group(function () {
    Route::controller(UserDashboardController::class)->group(function () {
        Route::get('/home', 'index')->name('user.home');
        Route::get('/profile', 'profile')->name('user.profile');
        Route::get('/checkout', 'checkout')->name('checkout');
    });
    Route::controller(AuthController::class)->group(function () {
        Route::get('/logout', 'logout')->name('user.logout');
    });
});

// Authenticated admin routes
Route::middleware('auth:admin')->prefix('admin')->group(function () {

    Route::controller(AdminAuthController::class)->group(function () {
        Route::get('/profile', 'profile')->name('admin.profile');
        Route::post('/update-profile', 'updateProfile')->name('admin.profile.update');
        Route::get('/logout', 'logout')->name('admin.logout');
    });
    // Admin Dashboard Routes
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('admin.dashboard');
        // Manage Home Banner, Testimonials
        Route::get('/testimonials', 'viewHome')->name('admin.manage.home');
        Route::get('/add/home', 'create')->name('admin.add.home');
        Route::post('/store/home', 'store')->name('admin.store.home');
        Route::get('/edit/home/{id}', 'edit')->name('admin.edit.home');
        Route::post('/update/home/{id}', 'update')->name('admin.update.home');
        Route::get('/delete/home/{id}', 'delete')->name('admin.delete.home');
        // Testimonials
        Route::get('/create/testimonials', 'createTestimonial')->name('admin.create.testimonials');
        Route::post('/store/testimonials', 'storeTestimonial')->name('admin.store.testimonials');
        Route::get('/edit/testimonials/{id}', 'editTestimonial')->name('admin.edit.testimonials');
        Route::post('/update/testimonials/{id}', 'updateTestimonial')->name('admin.update.testimonials');
        Route::get('/delete/testimonials/{id}', 'deleteTestimonial')->name('admin.delete.testimonials');
    });

    //Site Content Routes
    Route::controller(SiteContentController::class)->group(function () {
        Route::get('/site-content', 'index')->name('admin.site-content');
        Route::post('/update/site-content', 'updateContent')->name('admin.site-content.update');

        Route::get('/social-links', 'socialLinks')->name('admin.social-links');
        Route::post('/update/social-links', 'updateSocialLinks')->name('admin.social-links.update');

        // Banners Routes
        Route::get('/banners', 'banners')->name('admin.banners');
        Route::get('/add/banner', 'create')->name('admin.add.banner');
        Route::post('/store/banner', 'store')->name('admin.store.banner');
        Route::get('/edit/banner/{id}', 'edit')->name('admin.edit.banner');
        Route::post('/update/banner/{id}', 'update')->name('admin.update.banner');
        Route::get('/delete/banner/{id}', 'delete')->name('admin.delete.banner');

        // News Latter Emails
        Route::get('/news-latter-emails', 'getemails')->name('admin.get.emails');
        Route::get('/delete/news-latter-email/{id}', 'deleteEmail')->name('admin.delete.email');
    });
    // About Us Routes
    Route::controller(AboutUsController::class)->group(function () {
        // Banner
        // Route::get('about-us/add-banner/', 'createBanner')->name('admin.about-us.create.banner');
        // Route::post('/about-us/banner/store', 'storeBanner')->name('admin.about-us.store.banner');
        // Route::get('/about-us/banner/edit/{id}', 'editBanner')->name('admin.about-us.edit.banner');
        // Route::post('/about-us/banner/update/{id}', 'updateBanner')->name('admin.about-us.update.banner');
        // Route::get('/about-us/banner/delete/{id}', 'deleteBanner')->name('admin.about-us.delete.banner');
        // About Us
        Route::get('/about-us', 'index')->name('admin.manage.about-us');
        Route::post('/about-us/update', 'updateAboutUs')->name('admin.update.about-us');
        Route::post('/about-me/update/{id?}', 'updateAboutMe')->name('admin.update.about-me');

        // Stats
        // Route::get('/about-us/stats/create', 'createStats')->name('admin.about-us.create.stats');
        // Route::post('/about-us/stats/store', 'storeStats')->name('admin.about-us.store.stats');
        // Route::get('/about-us/stats/edit/{id}', 'editStats')->name('admin.about-us.edit.stats');
        // Route::post('/about-us/stats/update/{id}', 'updateStats')->name('admin.about-us.update.stats');
        // Route::get('/about-us/stats/delete/{id}', 'deleteStats')->name('admin.about-us.delete.stats');
        // Company Logos and links 
        // Route::get('/about-us/client/create', 'createClient')->name('admin.about-us.create.client');
        // Route::post('/about-us/client/store', 'storeClient')->name('admin.about-us.store.client');
        // Route::get('/about-us/client/edit/{id}', 'editClient')->name('admin.about-us.edit.client');
        // Route::post('/about-us/client/update/{id}', 'updateClient')->name('admin.about-us.update.client');
        // Route::get('/about-us/client/delete/{id}', 'deleteClient')->name('admin.about-us.delete.client');
    });
    // Services Routes
    Route::controller(ServicesController::class)->group(function () {
        // Banner
        // Route::get('services/add-banner/', 'createBanner')->name('admin.services.create.banner');
        // Route::post('/services/banner/store', 'storeBanner')->name('admin.services.store.banner');
        // Route::get('/services/banner/edit/{id}', 'editBanner')->name('admin.services.edit.banner');
        // Route::post('/services/banner/update/{id}', 'updateBanner')->name('admin.services.update.banner');
        // Route::get('/services/banner/delete/{id}', 'deleteBanner')->name('admin.services.delete.banner');
        // Services
        Route::get('/services', 'index')->name('admin.manage.services');
        Route::get('/add/service', 'create')->name('admin.add.service');
        Route::post('/store/service', 'store')->name('admin.store.service');
        Route::get('/edit/service/{id}', 'edit')->name('admin.edit.service');
        Route::post('/update/service/{id}', 'update')->name('admin.update.service');
        Route::get('/delete/service/{id}', 'delete')->name('admin.delete.service');
    });
    // Categories Routes
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/categories', 'index')->name('admin.manage.categories');
        Route::get('/add/category', 'create')->name('admin.add.category');
        Route::post('/store/category', 'store')->name('admin.store.category');
        Route::get('/edit/category/{id}', 'edit')->name('admin.edit.category');
        Route::post('/update/category/{id}', 'update')->name('admin.update.category');
        Route::get('/delete/category/{id}', 'destroy')->name('admin.delete.category');
    });
    // Products Routes
    Route::controller(ProductController::class)->group(function () {
        // Banner
        Route::get('product/add-banner/', 'createBanner')->name('admin.product.create.banner');
        Route::post('/product/banner/store', 'storeBanner')->name('admin.product.store.banner');
        Route::get('/product/banner/edit/{id}', 'editBanner')->name('admin.product.edit.banner');
        Route::post('/product/banner/update/{id}', 'updateBanner')->name('admin.product.update.banner');
        Route::get('/product/banner/delete/{id}', 'deleteBanner')->name('admin.product.delete.banner');
        // Products
        Route::get('/products', 'index')->name('admin.manage.products');
        Route::get('/add/product', 'create')->name('admin.add.product');
        Route::post('/store/product', 'store')->name('admin.store.product');
        Route::get('/edit/product/{id}', 'edit')->name('admin.edit.product');
        Route::post('/update/product/{id}', 'update')->name('admin.update.product');
        Route::get('/delete/product/{id}', 'destroy')->name('admin.delete.product');
    });
    // FAQs Routes
    Route::controller(FAQsController::class)->group(function () {
        // Banner
        Route::get('faqs/add-banner/', 'createBanner')->name('admin.faqs.create.banner');
        Route::post('/faqs/banner/store', 'storeBanner')->name('admin.faqs.store.banner');
        Route::get('/faqs/banner/edit/{id}', 'editBanner')->name('admin.faqs.edit.banner');
        Route::post('/faqs/banner/update/{id}', 'updateBanner')->name('admin.faqs.update.banner');
        Route::get('/faqs/banner/delete/{id}', 'deleteBanner')->name('admin.faqs.delete.banner');
        // FAQs
        Route::get('/faqs', 'index')->name('admin.manage.faqs');
        Route::get('/faqs/add', 'create')->name('admin.add.faqs');
        Route::post('/faqs/store', 'store')->name('admin.store.faqs');
        Route::get('/faqs/edit/{id}', 'edit')->name('admin.edit.faqs');
        Route::post('/faqs/update/{id}', 'update')->name('admin.update.faqs');
        Route::get('/faqs/delete/{id}', 'delete')->name('admin.delete.faqs');
    });
    // Contact Us Routes
    Route::controller(ContactUsController::class)->group(function () {
        // Banner
        Route::get('contact-us/add-banner/', 'createBanner')->name('admin.contact-us.create.banner');
        Route::post('/contact-us/banner/store', 'storeBanner')->name('admin.contact-us.store.banner');
        Route::get('/contact-us/banner/edit/{id}', 'editBanner')->name('admin.contact-us.edit.banner');
        Route::post('/contact-us/banner/update/{id}', 'updateBanner')->name('admin.contact-us.update.banner');
        Route::get('/contact-us/banner/delete/{id}', 'deleteBanner')->name('admin.contact-us.delete.banner');
        // Contact Us
        Route::get('/contact-us', 'index')->name('admin.manage.contact-us');
        Route::get('/contact-us/delete/{id}', 'destroy')->name('admin.delete.contact-us');
    });
});




// Frontend Routes
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/about-us', 'aboutUs')->name('about.us');
    Route::get('/services', 'services')->name('services');
    Route::get('/services/view/{slug}', 'viewService')->name('view.service');
    Route::get('/products', 'products')->name('products');
    Route::get('/products/view/{slug}', 'viewProduct')->name('view.product');
    
    Route::get('/cart/view-cart/', 'viewCart')->name('view.cart');
    Route::post('cart/add-to-cart', 'addToCart')->name('add.to.cart');
    Route::patch('/cart/update/{id}', 'updateCart')->name('cart.update');
    Route::delete('/cart/remove/{id}', 'removeCart')->name('cart.remove');

    Route::get('/faqs', 'faqs')->name('faqs');
    Route::get('/contact-us', 'contactUs')->name('contact.us');
    Route::post('/contact-us/store', 'store')->name('contact.store');
    Route::get('/book-a-consultation', 'bookAConsultation')->name('book.consultation');
    Route::post('/emails/store', 'storeEmails')->name('emails.store');
});
