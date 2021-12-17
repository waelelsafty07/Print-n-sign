<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\SiteMapController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\SubcategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ContactsController;




Auth::routes();
Route::get('/', [HomeController::class,'home'])->name('home');
Route::get('/faq', [HomeController::class,'faq'])->name('faq');
Route::get('/products', [HomeController::class,'products'])->name('products');
Route::get('/products/{id}', [HomeController::class,'productsDetails'])->name('productsDetails');
Route::get('/categories/{category_id}', [HomeController::class,'categoryProduct'])->name('categoryProduct');
Route::get('/categories/{category_id}/subcategories/{subcategory_id}', [HomeController::class,'sc_product'])->name('sc_product');
Route::get('/categories/{category_id}/subcategories', [HomeController::class,'categoryProduct'])->name('categoryProduct');
Route::get('/about-us', [HomeController::class,'about_us'])->name('AboutUs');
Route::get('/terms', [HomeController::class,'terms'])->name('terms');
Route::get('/privacy', [HomeController::class,'privacy'])->name('privacy');
// Route::get('/categories', [HomeController::class,'products'])->name('products');

//Route::get('/test',[TestController::class,'index']);
Route::post('/contact',[ContactsController::class,'store'])->middleware('recaptcha')->name('Contact_Store');


Route::prefix('admin')->middleware(['auth','CheckRole:ADMIN','ActiveAccount'])->name('admin.')->group(function () {
    Route::get('/',[AdminController::class,'index'])->name('index');


    //Route::get('/profile',[AdminController::class,'upload_image']);
    
    Route::resource('articles',ArticleController::class);
    
    Route::prefix('upload')->name('upload.')->group(function(){
        Route::post('/image',[HelperController::class,'upload_image'])->name('image');
        Route::post('/file',[HelperController::class,'upload_file'])->name('file');
        Route::post('/remove-file',[HelperController::class,'remove_files'])->name('remove-file');
    });

    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/',[ProfileController::class,'index'])->name('index');
        Route::get('/edit',[ProfileController::class,'edit'])->name('edit');
        Route::put('/update',[ProfileController::class,'update'])->name('update');
        Route::put('/update-password',[ProfileController::class,'update_password'])->name('update-password');
        Route::put('/update-email',[ProfileController::class,'update_email'])->name('update-email');
    });
    Route::prefix('notifications')->name('notifications.')->group(function () {
        Route::get('/',[NotificationsController::class,'index'])->name('index');
        Route::get('/ajax',[NotificationsController::class,'notifications_ajax'])->name('ajax');
        Route::post('/see',[NotificationsController::class,'notifications_see'])->name('see');
    });
    Route::prefix('settings')->name('settings.')->group(function () {
        Route::get('/',[SettingController::class,'index'])->name('index');
        Route::put('/update',[SettingController::class,'update'])->name('update');
    });

    Route::prefix('categories')->name('categories.')->group(function () {
        Route::get('/',[CategoriesController::class,'index'])->name('index');
        Route::get('/create',[CategoriesController::class,'create'])->name('create');
        Route::get('/edit/{id}',[CategoriesController::class,'edit'])->name('edit');
        Route::put('/edit/{id}/edit',[CategoriesController::class,'update'])->name('update');
        Route::post('/post',[CategoriesController::class,'store'])->name('store');
        Route::delete('/delete',[CategoriesController::class,'multiple'])->name('multiple');
        Route::delete('/deleteOne/{id}',[CategoriesController::class,'destroy'])->name('destroy');
        // Route::put('/update',[SettingController::class,'update'])->name('update');
        //Route SubCategories
        Route::prefix('subcategory')->name('subcategory.')->group(function(){
            Route::get('/{id}',[SubcategoriesController::class,'index'])->name('index');
            Route::get('/{id}/create',[SubcategoriesController::class,'create'])->name('create');
            Route::post('/post',[SubcategoriesController::class,'store'])->name('store');
            Route::get('/edit/{id}',[SubcategoriesController::class,'edit'])->name('edit');
            Route::put('/edit/{id}/edit',[SubcategoriesController::class,'update'])->name('update');
            Route::delete('/delete',[SubcategoriesController::class,'multiple'])->name('multiple');
            Route::delete('/deleteOne/{id}',[SubcategoriesController::class,'destroy'])->name('destroy');
        });

    });
    Route::prefix('products')->name('products.')->group(function () {
        Route::get('/',[ProductsController::class,'index'])->name('index');
        Route::get('/create',[ProductsController::class,'create'])->name('create');
        Route::get('/ajax/{id}',[SubcategoriesController::class,'ajaxList'])->name('ajaxList');
        Route::post('/post',[ProductsController::class,'store'])->name('store');

        
        Route::get('/edit/{id}',[ProductsController::class,'edit'])->name('edit');
        Route::put('/edit/{id}/edit',[ProductsController::class,'update'])->name('update');
        Route::delete('/delete',[ProductsController::class,'multiple'])->name('multiple');
        Route::delete('/deleteOne/{id}',[ProductsController::class,'destroy'])->name('destroy');
    });

    Route::prefix('contact')->name('contact.')->group(function () {
        Route::get('/',[ContactsController::class,'index'])->name('index');
    });
    
    
});


Route::get('blocked',[HelperController::class,'blocked_user'])->name('blocked');
Route::get('robots.txt',[HelperController::class,'robots']);
Route::get('manifest.json',[HelperController::class,'manifest']);
Route::get('sitemap.xml',[SiteMapController::class,'sitemap']);
Route::get('sitemaps/{name}/{page}/sitemap.xml',[SiteMapController::class,'viewer']);