<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceMemberController;
use App\Http\Controllers\ServiceEnquiryController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\MembershipEnquiryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\StackController;
use App\Http\Livewire\Counter;
use App\Http\Livewire\Index;
use App\Http\Livewire\Post;
use App\Models\Admin;
// use App\Models\Tenant as ModelsTenant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

// use Stancl\Tenancy\Tenant;



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

Route::get('index/lv',Index::class);
// Route::get('tenant/create',function(){
// Log::info("tenant/create");
// $tenant = ModelsTenant::create([
//     'id' => '1', // This will be the identifier
// ]);

// $tenant->domains()->create([
//     'domain' => 'tenant1.yourapp.com',
// ]);
// Log::info("tenant completed");
// });

// Route::middleware('tenant')->group(function () {
//     Route::get('/pageadmin', function () {
//         $tenant = request()->attributes->get('tenant');
//         Log::info("tenant");
//         Log::info($tenant);
//         return "Welcome to the dashboard of tenant: " . $tenant->name;
//     });
// });


Route::get('/counter', Counter::class);
Route::get('stack/check',[StackController::class,'index']);
Route::get('test',[StackController::class,'test']);
// Route::get('/','App\Http\Controllers\FrontendController@index')->name('frontendviews.index');
Route::get('/about','App\Http\Controllers\FrontendController@about')->name('frontendviews.about');
Route::get('/service','App\Http\Controllers\FrontendController@service')->name('frontendviews.services');
Route::get('/membership','App\Http\Controllers\FrontendController@membership')->name('frontendviews.membership');
Route::get('/contact','App\Http\Controllers\FrontendController@contactUs')->name('frontendviews.contact');
Route::get('/service/details/{slug_name}','App\Http\Controllers\FrontendController@serviceDetails')->name('frontendviews.service.details');
Route::post('/mail','App\Http\Controllers\FrontendController@enquiry')->name('frontendviews.mail.id');
Route::post('/contact/mail','App\Http\Controllers\FrontendController@contactEnquiry')->name('frontendviews.contact.mail');
Route::post('/service/mail/{id}','App\Http\Controllers\FrontendController@enquiry')->name('frontendviews.service.mail');
Route::post('/membership/mail','App\Http\Controllers\FrontendController@membershipEnquiry')->name('frontendviews.membership_mail');
Route::get('/search','App\Http\Controllers\FrontendController@service')->name('frontendviews.search');
Route::get('/error','App\Http\Controllers\FrontendController@error')->name('frontend.error');


Route::get('login', [AuthController::class,'login'])->name('login');
Route::post('check/credentials',[AuthController::class,'checkCredentials'])->name('check.credentials');

Route::prefix('/dmw')->middleware('auth:admin')->group(function () {

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::resource('/banners', BannerController::class);
Route::resource('/admins', AdminController::class);
Route::resource('/services', ServiceController::class);
Route::resource('/service/members', ServiceMemberController::class);
Route::resource('/enquiries', EnquiryController::class);
Route::resource('/service_enquiries', ServiceEnquiryController::class);
Route::resource('/membership_enquiries', MembershipEnquiryController::class);


Route::get('/banners/status/{id}', 'App\Http\Controllers\BannerController@status')->name('banners.status');
Route::get('/admins/status/{id}','App\Http\Controllers\AdminController@status')->name('admins.status');
Route::get('/services/status/{id}','App\Http\Controllers\ServiceController@status')->name('services.status');
Route::get('/service/members/status/{id}','App\Http\Controllers\ServiceMemberController@status')->name('members.status');
Route::get('/enquiries/status/{id}','App\Http\Controllers\EnquiryController@status')->name('enquiries.status');
Route::get('/membership_enquiries/status/{id}','App\Http\Controllers\MembershipEnquiryController@status')->name('membership_enquiries.status');
Route::get('/service/enquiries/status/{id}','App\Http\Controllers\ServiceEnquiryController@status')->name('service.enquiries.status');
Route::get('/active_enquiries/status/{id}','App\Http\Controllers\EnquiryController@status')->name('active_enquiries.status');
Route::get('/deactive_enquiries/status/{id}','App\Http\Controllers\EnquiryController@status')->name('deactive_enquiries.status');
Route::get('/enquiries/view/{id}','App\Http\Controllers\EnquiryController@showEnquiry')->name('enquiries.view');
});


Route::get('auth/google',[GoogleAuthController::class,'redirect'])->name('google.auth');
Route::get('/',[GoogleAuthController::class,'googleCallback'])->name('google.auth.callback');

Route::get('/post',Post::class);
// Route::get('post/create',)


Route::get('testing',function(){
    return "testin";
});
