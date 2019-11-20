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


//Public Routes
Route::get('/','PageController@index')->name('home');
Route::get('/contact','PageController@getContact')->name('contact');
Route::get('/about','PageController@getAbout')->name('about');
Route::get('/terms','PageController@getTerms')->name('terms');
Route::get('/affiliate','PageController@getAffiliate')->name('affiliate');
Route::get('/privacy','PageController@getPrivacy')->name('privacy');
Route::get('/ask','PageController@getAsk')->name('ask');
Route::get('/client-register','Auth\RegisterController@registerClient')->name('client.register');
Route::get('/lawyers/categories','LawyerController@getLawyersCategories')->name('lawyers.categories');
Route::get('/lawyers/categories/{category}','LawyerController@getLawyersByCategory')->name('lawyers.category');
Route::get('/lawyers/{user}','LawyerController@show')->name('lawyers.show');
Route::get('/lawyers/reviews/{user}/page/{number}','ReviewController@paginateReviews')->name('reviews.page');
Route::get('/lawyers/publications/{publication}','PublicationController@getPublication')->name('publications.show');
Route::post('/lawyers/search/{category}','LawyerController@searchLawyers')->name('lawyers.search');
Route::get('/lawyers/search/{category}/{search}','LawyerController@getSearchedLawyers')->name('lawyers.get-search');
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
    Route::post('/pusher/auth', 'MessageController@authenticate');
});

//Route::get('/client-register','Auth\RegisterController@registerClient')->name('client.register');
////Route::get('users/dashboard','User\UserController@index')->middleware('auth');
//Route::get('/lawyers/{lawyer}','Lawyer\LawyerController@showLawyerProfile')->name('lawyer.profile');
//
//
//
//Route::group(['namespace' => 'Site'], function () {
//    Route::group(['namespace' => 'Main'], function () {
//        Route::get('/','MainController@index')->name('welcome');
//        Route::get('/about','MainController@about')->name('about');
//        Route::get('/affiliate','MainController@affiliate')->name('affiliate');
//        Route::get('/lawyers','MainController@lawyers')->name('all_lawyers');
//        Route::get('/lawyers/category','MainController@lawyersCategory')->name('lawyers_by_category');
////        Route::get('/lawyers/profile','MainController@lawyerProfile')->name('lawyer_profile');
//        Route::get('/single','MainController@single')->name('single');
//        Route::get('/terms','MainController@terms')->name('terms');
//        Route::get('/privacy','MainController@privacy')->name('privacy');
//        Route::get('/contact','MainController@contact')->name('contact');
//        Route::get('/ask','MainController@ask')->name('ask');
//    });
//});
//
//Route::middleware('user')->group(function () {
//    Route::group(['prefix' => 'user','namespace' => 'User'], function () {
//        Route::get('/dashboard','UserController@index');
//    });
//});
//Route::middleware('lawyer')->group(function () {
//    Route::group(['prefix' => 'lawyer','namespace' => 'Lawyer'], function () {
//        Route::get('/dashboard/{lawyer}','LawyerController@index')->name('lawyer.dashboard');
//        Route::get('/dashboard/profile/{lawyer}','LawyerController@showLawyerDashboardProfile')->name('lawyer.dashboard-profile');
//        Route::get('/messages','LawyerController@messages')->name('lawyer_messages');
//        Route::get('/calendar','LawyerController@calendar')->name('lawyer_calendar');
//        Route::put('/{user}','LawyerController@update')->name('lawyer.update');
//
//    });
//});
Route::middleware('admin')->group(function () {
    Route::group(['prefix' => 'admin','namespace' => 'Admin'], function () {
        Route::get('/dashboard','AdminController@index')->name('admin_dashboard');
        Route::group(['prefix' => 'home','namespace' => 'Home'], function () {
            //welcome
            Route::get('/home_first','HomeController@homeFirst')->name('home_first');
            Route::get('/home_second','HomeController@homeSecond')->name('home_second');
            Route::get('/home_third','HomeController@homeThird')->name('home_third');
            //about
            Route::get('/about_first','HomeController@aboutFirst')->name('about_first');
            Route::get('/about_second','HomeController@aboutSecond')->name('about_second');
            Route::get('/about_third','HomeController@aboutThird')->name('about_third');
            //terms
            Route::get('/terms','TermsController@index')->name('admin_terms');
            Route::post('/terms/store','TermsController@store')->name('add_term');
            //privacy
            Route::get('/privacy','PrivacyController@index')->name('admin_privacy');
            Route::post('/privacy/store','PrivacyController@store')->name('add_privacy');

            Route::post('/content/update/{id}','HomeController@update')->name('update_home_content');
            Route::get('/content/delete/{id}','HomeController@delete')->name('delete_content');



        });
        Route::group(['prefix' => 'categories'], function () {
            Route::get('/','CategoryController@index')->name('admin_categories');
            Route::post('/create','CategoryController@store')->name('categories_store');
            Route::put('/update/{category}','CategoryController@update')->name('categories_update');
            Route::delete('/delete/{category}','CategoryController@delete')->name('categories_delete');
            Route::get('/edit/{category}', 'CategoryController@edit')->name('categories_edit');
        });

        Route::get('referrals', 'AdminController@getReferrals')->name('admin.referrals');

    });
});

//Artisan commands
Route::get('/route-clear', function () {
    $exitCode = \Illuminate\Support\Facades\Artisan::call('route:clear');
});
