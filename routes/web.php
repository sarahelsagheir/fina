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

Route::get('/','LandingBageController@index');

Auth::routes(['verify' => true]);

Route::get('/home', 'BookController@index')->name('home');
Route::get('/view/{id}', 'BookController@view')->name('book.view');

Route::get("search","HomeController@search");

Route::get('/profile', 'ProfileController@profile')->name('profile');
Route::get('/changePassword', 'ProfileController@changePasswordForm')->name('changePassword');
Route::post('/changePassword', 'ProfileController@changePassword')->name('changePassword');
Route::get('/profilePicture', 'ProfileController@getProfileAvatar')->name('profileAvatar');
Route::post('/profilePicture', 'ProfileController@profilePictureUpload')->name('profileAvatar');
// Route::get('/addBook', 'ProfileController@getBookForm')->name('addBook');
Route::post('/addBook', 'ProfileController@addBook')->name('addBook');

Route::get('/Books', 'ProfileController@getBooks')->name('books');
Route::delete('/Books/{id}', 'ProfileController@deleteBook')->name('deleteBook');



Route::get('/addToCart/{product}', 'CartController@addToCart')->name('cart.add');
Route::get('/shopping-cart', 'CartController@showCart')->name('cart.show');
Route::get('/checkout/{amount}', 'CartController@checkout')->name('cart.checkout')->middleware('auth');
Route::post('/charge', 'CartController@charge')->name('cart.charge');
Route::get('/orders', 'OrderController@index')->name('order.index');
Route::delete('/products/{product}', 'CartController@destroy')->name('product.remove');
Route::put('/products/{product}', 'CartController@update')->name('product.update');


Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('login/google', 'Auth\LoginController@redirectToGoogle');
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');

Route::get('login/twitter', 'Auth\LoginController@redirectToTwitter');
Route::get('login/twitter/callback', 'Auth\LoginController@handleTwitterCallback');


Route::get('invoice/{amount}','CartController@generatePDF')->name('invoice');

Route::resource('/wishlist', 'WishlistController', ['except' => ['create', 'edit', 'show', 'update']]);


// chat
Route::get('/chat', 'HomeController@index')->name('chat');
Route::get('/contacts', 'ContactsController@get');
Route::get('/conversation/{id}', 'ContactsController@getMessagesFor');
Route::post('/conversation/send', 'ContactsController@send');
Route::post('/conversation/send/{id}', 'ContactsController@sendMessage')->name('send.message');


// rate 
Route::get('/showRate/{user}', 'RateController@rateNotification')->name('rateNotification')->middleware('auth');
Route::get('/rateUser/{user}', 'RateController@rateUser')->name('rateUser')->middleware('auth');
Route::post('/rateUser/{user}', 'RateController@rateShow')->name('rateShow')->middleware('auth');
Route::get('/rateBorrower/{user}', 'RateController@rateBorrower')->name('rateBorrower')->middleware('auth');

//------------------------------------------------------------------------------------------------------------

route::get('/approveNotification/{id}/{product}','NotificationController@approveNotification')->name('approve.notification');
route::get('/disapproveNotification/{id}','NotificationController@disapprovedNotification')->name('disapprove.notification');

Route::get('/borrow', 'ProductController@borrowIndex')->name('borrow.index')->middleware('auth');
Route::get('/borrow/{product}/{id}', 'NotificationController@borrowRequest')->name('borrow.request')->middleware('auth');


Route::get('/sharedBook', 'ProductController@sharedBook')->name('sharedBook')->middleware('auth');
Route::get('/sharedBook/recieved/{product}', 'NotificationController@recievedBook')->name('recievedBook')->middleware('auth');


