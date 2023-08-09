<?php

use App\Http\Controllers\admin\AddcurrencyController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\admin\BedRommController;
use App\Http\Controllers\admin\LocationController;
use App\Http\Controllers\SocialControllerFacebook;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\DeveloperController;
use App\Http\Controllers\admin\PaymentPlaneController;
use App\Http\Controllers\admin\TypesOfPrpertyController;
use App\Http\Controllers\admin\ListingPropertyController;
use App\Http\Controllers\admin\AddBudgetController;
use App\Http\Controllers\admin\AllusersController;
use App\Http\Controllers\admin\ChatBotusersController;
use App\Http\Controllers\admin\completionController;
use App\Http\Controllers\admin\InterestpropertyController;
use App\Http\Controllers\ContactController;
use App\Models\Interestproperty;

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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function() {

});

Route::controller(App\Http\Controllers\Frontend\UserPropertyController::class)->group(function () {
 
    Route::post('user_propertys', 'store');
    Route::post('user_propertysTwo', 'store_two');


});

Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    
    Route::get('/chatboxusershow', [App\Http\Controllers\admin\dashboardController::class, 'chatboxusershows']);
    Route::DELETE('/chatboxusershow/delete', [App\Http\Controllers\admin\dashboardController::class, 'destroy_chatuser'])->name('chatboxuser_delete');
    Route::DELETE('/chatboxuserdelete', [App\Http\Controllers\admin\dashboardController::class, 'deleteAll_chatuser'])->name('chatusersDeleteAll');


    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::controller(DeveloperController::class)->group(function () {
        Route::get('/developer', 'index')->name('rooms');
        Route::get('developer/create', 'create');  
        Route::post('/developer/create', 'stores');
        Route::put('/developer/{id}', 'update');
        Route::get('/developer/{id}/edit', 'edit');
        Route::DELETE('/developer/delete', 'destroy')->name('developer_delete');
        Route::DELETE('/developer','deleteAll')->name('developerDeleteAll');
        Route::get('/developer_checkbox','developer_checkbox')->name('developer_checkbox');

    });


    Route::controller(TypesOfPrpertyController::class)->group(function () {
        Route::get('/type_property', 'index')->name('type_property');
        Route::get('type_property/create', 'create');  
        Route::post('/type_property/create', 'stores');
        Route::put('/type_property/{id}', 'update');
        Route::get('/type_property/{id}/edit', 'edit');
        Route::DELETE('/type_property/delete', 'destroy')->name('type_property_delete');
        Route::DELETE('/type_property','deleteAll')->name('type_propertyDeleteAll');
        Route::get('/wswitch_button_proterty','type_property_checkbox')->name('type_property_checkbox');
    });

    Route::controller(BedRommController::class)->group(function () {
        Route::get('/bedrooms', 'index')->name('bedrooms');
        Route::get('bedrooms/create', 'create');  
        Route::post('/bedrooms/create', 'stores');
        Route::put('/bedrooms/{id}', 'update');
        Route::get('/bedrooms/{id}/edit', 'edit');
        Route::DELETE('/bedrooms/delete', 'destroy')->name('bedrooms_delete');
        Route::DELETE('/bedrooms','bedroomsDeleteAll')->name('bedroomsDeleteAll');
        Route::get('/switch_bedrooms','type_property_checkbox')->name('switch_bedrooms_checkbox');
    });


    Route::controller(completionController::class)->group(function () {
        Route::get('/completions', 'index')->name('completions');
        Route::get('/completions/create', 'create');  
        Route::post('/completions/create', 'stores');
        Route::put('/completions/{id}', 'update');
        Route::get('/completions/{id}/edit', 'edit');
        Route::DELETE('/completions/delete', 'destroy')->name('completions_delete');
        Route::DELETE('/completions','completionsDeleteAll')->name('completionsDeleteAll');
        Route::get('/switch_completions','type_property_checkbox')->name('switch_completions_checkbox');
    });


    Route::controller(AddcurrencyController::class)->group(function () {
        Route::get('/addcurrencys', 'index')->name('addcurrencys');
        Route::get('addcurrencys/create', 'create');  
        Route::post('/addcurrencys/create', 'stores');
        Route::put('/addcurrencys/{id}', 'update');
        Route::get('/addcurrencys/{id}/edit', 'edit');
        Route::DELETE('/addcurrencys/delete', 'destroy')->name('addcurrencys_delete');
        Route::DELETE('/addcurrencys','addcurrencysDeleteAll')->name('addcurrencysDeleteAll');
        Route::get('/switch_addcurrencys','type_property_checkbox')->name('switch_addcurrencys_checkbox');
    });


    Route::controller(AddBudgetController::class)->group(function () {
        Route::get('/addbudget', 'index')->name('addbudget');
        Route::get('addbudget/create', 'create');  
        Route::post('/addbudget/create', 'stores');
        Route::put('/addbudget/{id}', 'update');
        Route::get('/addbudget/{id}/edit', 'edit');
        Route::DELETE('/addbudget/delete', 'destroy')->name('addbudget_delete');
        Route::DELETE('/addbudget','addbudgetDeleteAll')->name('addbudgetDeleteAll');
        Route::get('/switch_addbudget','type_property_checkbox')->name('switch_addbudget_checkbox');
    });


    Route::controller(PaymentPlaneController::class)->group(function () {
        Route::get('/payment_planes', 'index')->name('payment_planes');
        Route::get('payment_planes/create', 'create');  
        Route::post('/payment_planes/create', 'stores');
        Route::put('/payment_planes/{id}', 'update');
        Route::get('/payment_planes/{id}/edit', 'edit');
        Route::DELETE('/payment_planes/delete', 'destroy')->name('payment_planes_delete');
        Route::DELETE('/payment_planes','payment_planesDeleteAll')->name('payment_planesDeleteAll');
        Route::get('/switch_payment_planes','payment_planes_checkbox')->name('switch_payment_planes_checkbox');
    });


    Route::controller(LocationController::class)->group(function () {
        Route::get('/locations', 'index')->name('locations');
        Route::get('locations/create', 'create');  
        Route::post('/locations/create', 'stores');
        Route::put('/locations/{id}', 'update');
        Route::get('/locations/{id}/edit', 'edit');
        Route::DELETE('/locations/delete', 'destroy')->name('locations_delete');
        Route::DELETE('/locations','locationDeleteAll')->name('locationsDeleteAll');
        Route::get('/switch_locations','locations_checkbox')->name('switch_locations_checkbox');
    });


    Route::controller(ListingPropertyController::class)->group(function () {
        Route::get('/listing_property', 'index')->name('listing_property');
        Route::get('listing_property/create', 'create');  
        Route::post('/listing_property/create', 'stores');
        Route::put('/listing_property/{id}', 'update');
        // Route::post('/append_budget','append_budget');
        // Route::post('/append_budget_edit','append_budget_edit');
        Route::get('/listing_property/{id}/edit', 'edit');
        Route::DELETE('/listing_property/delete', 'destroy')->name('listing_property_delete');
        Route::DELETE('/listing_property','listing_propertyDeleteAll')->name('listing_propertyDeleteAll');
        Route::get('/switch_listing_property','listing_property_checkbox')->name('switch_listing_checkbox');
        Route::DELETE('/one_image_delete','ajax_one_image_delete')->name('one_image_delete');
        Route::DELETE('/one_video_delete','ajax_one_video_delete')->name('one_video_delete');
    });

    Route::controller(AllusersController::class)->group(function () {
        Route::get('/users', 'index')->name('users');
        Route::get('users/create', 'create');  
        Route::post('/users/create', 'stores');
        Route::put('/users/{id}', 'update');
        Route::get('/users/{id}/edit', 'edit');
        Route::DELETE('/users/delete', 'destroy')->name('users_delete');
        Route::DELETE('/users','usersDeleteAll')->name('usersDeleteAll');
        Route::get('/switch_users','type_users_checkbox')->name('switch_users_checkbox');
    });


    Route::controller(ChatBotusersController::class)->group(function () {
        Route::get('/chatusers', 'index')->name('chatusers');
        Route::get('chatusers/create', 'create');  
        Route::put('/chatusers/{id}', 'update');
        Route::get('/chatusers/{id}/edit', 'edit');
        Route::DELETE('/chatusers/delete', 'destroy')->name('chatusers_delete');
        Route::DELETE('/chatusers','chatusersDeleteAll')->name('chatusersDeleteAll');
    });

    Route::controller(InterestpropertyController::class)->group(function () {
        Route::get('/interestusers', 'index')->name('chatusers');
        Route::DELETE('/interestusers/delete', 'destroy')->name('interestusers_delete');
        Route::DELETE('/interestusers','interestusersDeleteAll')->name('interestusersDeleteAll');
       
    });




});

    Route::controller(App\Http\Controllers\Frontend\SearchController::class)->group(function () {
        Route::post('/search-property','searching_property')->name('searching_property');
        Route::get('/email-search/{user_property}/{user_bedroom}/{user_currency}/{user_payment_plan}/{user_location}/{user_desired_size}/{user_budget}','email_search')->name('email_search');
    });



    Route::controller(App\Http\Controllers\Frontend\FrondendController::class)->group(function () {
        Route::get('/forms','form');
        Route::get('/form_two','formtwo');
        Route::get('/contacts','contact');
        Route::get('/propert_types','propert_type');
        Route::get('/propert_details/{id}','propert_detail');
        Route::get('/developers','developers');
        Route::get('/developer_detail/{id}','developer_detail');
        Route::post('/model_filter_list/{id}','model_filter_lists');
        Route::post('/model_filter_list_developer_details/{id}','model_filter_list_developer_details');
        Route::post('/model_filter_optionOne/{id}','model_filter_optionOne');
        Route::post('/model_filter_optiontwo/{id}','model_filter_optiontwo');

    });
    
    

    Route::controller(App\Http\Controllers\Frontend\ChatBoxController::class)->group(function () {
        Route::post('/chatbox_data','chatbox_datas');
        Route::post('/interest_property_form','interest_property_forms');
        Route::post('/interest_property_form_two','interest_property_forms_two');
    });

    Route::controller(App\Http\Controllers\Frontend\DeveloperFilterController::class)->group(function () {
        Route::post('/filter_list','filter_list');
        Route::post('/filter_list_empty','filter_list_empty');
        Route::post('/filter_list_two','filter_list_two');
        Route::get('/check_loaction/{id}','check_loaction');

    });




    Route::get('auth/google', [SocialController::class, 'googleRedirect'])->name('google.login');
    Route::get('auth/google/callback', [SocialController::class, 'loginWithGoogle']);

    Route::get('auth/facebook', [SocialControllerFacebook::class, 'facebookRedirect']);
    Route::get('auth/facebook/callback', [SocialControllerFacebook::class, 'loginWithFacebook']);