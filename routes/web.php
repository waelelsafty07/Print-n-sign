<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\SiteMapController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\SubcategoriesController;



Auth::routes();
Route::get('/', function () {return view('front.index');})->name('home');
//Route::get('/test',[TestController::class,'index']);


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

     
});


Route::get('blocked',[HelperController::class,'blocked_user'])->name('blocked');
Route::get('robots.txt',[HelperController::class,'robots']);
Route::get('manifest.json',[HelperController::class,'manifest']);
Route::get('sitemap.xml',[SiteMapController::class,'sitemap']);
Route::get('sitemaps/{name}/{page}/sitemap.xml',[SiteMapController::class,'viewer']);