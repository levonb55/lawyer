<?php

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

use Illuminate\Support\Facades\Artisan;

//Public Routes
Route::get('/','PageController@index')->name('home');
Route::get('/about','PageController@getAbout')->name('about');
Route::get('/terms','PageController@getTerms')->name('terms');
Route::get('/affiliate','PageController@getAffiliate')->name('affiliate');
Route::get('/privacy','PageController@getPrivacy')->name('privacy');
Route::get('/ask','PageController@getAsk')->name('ask');
Route::get('/why','PageController@getWhyPage')->name('why');
Route::post('/subscribe-to-newsletter','PageController@subscribeToNewsletter')->name('subscribe.newsletter');
Route::get('/contact','ContactController@create')->name('contact.create');
Route::post('/contact','ContactController@send')->name('contact.send');
Route::get('/lawyer-register','Auth\RegisterController@registerClient')->name('client.register');
Route::get('/lawyers/categories','LawyerController@getLawyersCategories')->name('lawyers.categories');
Route::get('/lawyers/category/{category?}','LawyerController@getLawyersByCategory')->name('lawyers.category');
Route::get('/lawyers/{user}','LawyerController@show')->name('lawyers.show');
Route::get('/lawyers/reviews/{user}/page/{number}','ReviewController@paginateReviews')->name('reviews.page');
Route::get('/lawyers/publications/{publication}','PublicationController@getPublication')->name('publications.show');
Route::post('/lawyers/name/search','LawyerController@searchLawyersByName')->name('lawyers.search-name');

//Authentication Routes
Auth::routes();

//Private Routes
Route::middleware('auth')->group(function () {
    Route::get('/users/dashboard/{user}','UserController@getUserDashboard')->name('user.dashboard');
    Route::get('/users/settings/{user}','UserController@getUserSettings')->name('user.settings');
    Route::get('/users/bookings/{user}','UserController@getUserBookings')->name('user.bookings');
    Route::put('/users/update/{user}','UserController@update')->name('user.update');
    Route::post('/reviews/lawyers/{user}','ReviewController@storeReview')->name('reviews.store');
    Route::post('/lawyers/{user}/publications','PublicationController@storePublications')->name('publications.store');
    Route::delete('/lawyers/publications/{publication}','PublicationController@deletePublication')->name('publications.destroy');

    //Messages
    Route::get('/messages','MessageController@index')->name('messages');
    Route::post('/messages/store','MessageController@store')->name('messages.store');
    Route::get('/users/messages/{contact}/{scroll}','MessageController@show')->name('messages.show');
    Route::put('/messages/{message}/read','MessageController@markAsRead')->name('messages.read');
    Route::post('/calling', 'MessageController@makeCall');
    Route::post('/reject-call', 'MessageController@rejectCall');
});

//Admin Routes
Route::middleware('admin')->group(function () {
    Route::group(['prefix' => 'admin','namespace' => 'Admin'], function () {
        Route::get('/dashboard','AdminController@index')->name('admin_dashboard');

        Route::group(['prefix' => 'categories'], function () {
            Route::get('/','CategoryController@index')->name('admin_categories');
            Route::post('/create','CategoryController@store')->name('categories_store');
            Route::put('/update/{category}','CategoryController@update')->name('categories_update');
            Route::delete('/delete/{category}','CategoryController@delete')->name('categories_delete');
            Route::get('/edit/{category}', 'CategoryController@edit')->name('categories_edit');
        });

        Route::get('/content', 'VariableController@index')->name('admin.variables.index');
        Route::get('/content/{variable}/edit', 'VariableController@edit')->name('admin.variables.edit');
        Route::put('/content/{variable}/', 'VariableController@update')->name('admin.variables.update');
        Route::get('referrals', 'AdminController@getReferrals')->name('admin.referrals');
        Route::get('news-subscribers', 'NewsSubscriberController@index')->name('admin.news-subscribers.index');
        Route::delete('news-subscribers/{newsSubscriber}', 'NewsSubscriberController@destroy')->name('admin.news-subscribers.destroy');
    });
});

//Artisan commands
Route::get('/route-clear', function () {
    Artisan::call('route:clear');
    return 'Route is cleared';
});
