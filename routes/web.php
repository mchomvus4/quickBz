<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\ChangePassword;
use App\Models\User;
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $brands = DB::table('brands')->get();
    $abouts = DB::table('home_abouts')->first();
    return view('home', compact('brands','abouts'));
});

// Route::get('/about', function () {
//     return view('about');
// });


Route::get('/contact', [ContactController::class, 'index'])->name('con');
//Category controller/routes
Route::get('/categories',[CategoryController::class, 'categories'])->name('categories');
Route::post('/addCategory',[CategoryController::class, 'addCategory'])->name('storeCategory');
Route::get('/editCategory/{id}',[CategoryController::class, 'editCategory']);
Route::post('/updateCategory/{id}',[CategoryController::class, 'updateCategory']);
Route::get('/softdelete/{id}',[CategoryController::class, 'softdelete']);
Route::get('/restore/{id}',[CategoryController::class, 'restore']);
Route::get('/delete/{id}',[CategoryController::class, 'delete']);

//Brand controller/routes
Route::get('/brand',[BrandController::class, 'brand'])->name('brand');
Route::post('/addBrand',[BrandController::class, 'addBrand'])->name('storeBrand');
Route::get('/editBrand/{id}',[BrandController::class, 'editBrand']);
Route::post('/updateBrand/{id}',[BrandController::class, 'updateBrand']);
Route::get('/deleteBrand/{id}',[BrandController::class, 'delete']);


//Multi Images
Route::get('/multimage',[BrandController::class, 'multimage'])->name('multiImage');
Route::post('/addImage',[BrandController::class, 'addImage'])->name('store.image');

//Admin All Routes
Route::get('/slider',[HomeController::class, 'HomeSlider'])->name('slider');
Route::get('/addslider',[HomeController::class, 'addslider'])->name('addslider');
Route::post('/add',[HomeController::class, 'add'])->name('store');
Route::get('/editSlider/{id}',[HomeController::class, 'edit']);
Route::post('/updateSlider/{id}',[HomeController::class, 'update']);
Route::get('/deleteSlider/{id}',[HomeController::class, 'delete']);

//Home About All Routes
Route::get('/about',[AboutController::class, 'HomeAbout'])->name('about');
Route::get('/addabout',[AboutController::class, 'addabout'])->name('addabout');
Route::post('/addNewAbout',[AboutController::class, 'add'])->name('storeAbout');
Route::get('/editAbout/{id}',[AboutController::class, 'edit']);
Route::post('/updateAbout/{id}',[AboutController::class, 'update']);
Route::get('/deleteAbout/{id}',[AboutController::class, 'delete']);

//Admin Contact Page Routes

Route::get('/contact',[ContactController::class, 'contact'])->name('contact');
Route::get('/addcontact',[ContactController::class, 'addcontact'])->name('addcontact');
Route::post('/addNewContact',[ContactController::class, 'add'])->name('storeContact');
Route::get('/editContact/{id}',[ContactController::class, 'edit']);
Route::post('/updateContact/{id}',[ContactController::class, 'update']);
Route::get('/deleteContact/{id}',[ContactController::class, 'delete']);
Route::get('/message',[ContactController::class, 'message'])->name('message');
Route::get('/deleteMessage/{id}',[ContactController::class, 'deleteMessage']);

///Home Page Contact Routes

Route::get('/contactPage',[ContactController::class, 'contactPage'])->name('contactPage');
Route::post('/contactform',[ContactController::class, 'contactform'])->name('contactform');

//Home Page Blog Routes
Route::get('/blogPage',[BlogController::class, 'blogPage'])->name('blogPage');
//Blog controller routes
Route::get('/blog',[BlogController::class, 'blog'])->name('blog');
Route::get('/addPost',[BlogController::class, 'addPost'])->name('addPost');
Route::post('/addNewPost',[BlogController::class, 'add'])->name('storePost');
Route::get('/editBlog/{id}',[BlogController::class, 'editBlog']);
Route::post('/updateBlog/{id}',[BlogController::class, 'updateBlog']);
Route::get('/deleteBlog/{id}',[BlogController::class, 'delete']);

// Home Page Routes
Route::get('/servicePage',[ServiceController::class, 'servicePage'])->name('servicePage');
Route::get('/service',[ServiceController::class, 'service'])->name('service');
Route::get('/addService',[ServiceController::class, 'addService'])->name('addService');
Route::post('/addNewService',[ServiceController::class, 'add'])->name('storeService');
Route::get('/editService/{id}',[ServiceController::class, 'editService']);
Route::post('/updateService/{id}',[ServiceController::class, 'updateService']);
Route::get('/deleteService/{id}',[ServiceController::class, 'delete']);

//Footer Subscribe Page
Route::get('/emailAddress',[SubscribeController::class, 'emailAddress'])->name('emailAddress');
Route::post('/subscribedUser',[SubscribeController::class, 'subscribedUser'])->name('subscribedUser');
Route::get('/deleteEmail/{id}',[SubscribeController::class, 'deleteEmail']);




Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
   // $users = User::all();
    // $users= DB::table('users')->get();
    return view('admin.index');
})->name('dashboard');

Route::get('/logout',[BrandController::class, 'logout'])->name('logout');


///Change Password and user profile
Route::get('/user/password',[ChangePassword::class, 'changePassword'])->name('changePassword');
Route::post('/password/update',[ChangePassword::class, 'passwordUpdate'])->name('passwordupdate');
// Route::get('/register',[ChangePassword::class, 'registerUser'])->name('register');

///User Profile
Route::get('/user/profile',[ChangePassword::class, 'profileupdate'])->name('profileupdate');
Route::post('/user/profile/update',[ChangePassword::class, 'userprofileupdate'])->name('userprofileupdate');
