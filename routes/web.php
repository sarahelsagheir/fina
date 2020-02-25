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

Route::get('/', 'LandingBageController@index');

Auth::routes(['verify' => true]);

Route::get('/home', 'BookController@index')->name('home');
Route::get('/view/{id}', 'BookController@view')->name('book.view');

Route::post('/contact', 'Admin\AdminContactController@store')->name('contact.store');



Route::get('/profile', 'ProfileController@profile')->name('profile');
Route::get('/changePassword', 'ProfileController@changePasswordForm')->name('changePassword');
Route::post('/changePassword', 'ProfileController@changePassword')->name('changePassword');
Route::get('/profilePicture', 'ProfileController@getProfileAvatar')->name('profileAvatar');
Route::post('/profilePicture', 'ProfileController@profilePictureUpload')->name('profileAvatar');
Route::get('/addBook', 'ProfileController@getBookForm')->name('addBook');////////////
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


Route::get('invoice/{amount}', 'CartController@generatePDF')->name('invoice');

Route::resource('/wishlist', 'WishlistController', ['except' => ['create', 'edit', 'show', 'update']]);

// chat
Route::get('/chat', 'HomeController@index')->name('chat');
Route::get('/contacts', 'ContactsController@normalget');
Route::get('/contact', 'ContactsController@get');

// Route::get('/contacts', 'ContactsController@normalget');
Route::get('/conversation/{id}', 'ContactsController@getMessagesFor');
Route::post('/conversation/send', 'ContactsController@send');
Route::post('/conversation/send/{id}', 'ContactsController@sendMessage')->name('send.message');


// rate
Route::get('/showRate/{user}', 'RateController@rateNotification')->name('rateNotification')->middleware('auth');
Route::get('/rateUser/{user}', 'RateController@rateUser')->name('rateUser')->middleware('auth');
Route::post('/rateUser/{user}', 'RateController@rateShow')->name('rateShow')->middleware('auth');
Route::get('/rateBorrower/{user}', 'RateController@rateBorrower')->name('rateBorrower');
Route::resource('user.rate', 'RateController')->shallow();

//------------------------------------------------------------------------------------------------------------

route::get('/approveNotification/{id}/{product}', 'NotificationController@approveNotification')->name('approve.notification');
route::get('/disapproveNotification/{id}', 'NotificationController@disapprovedNotification')->name('disapprove.notification');

Route::get('/borrow', 'ProductController@borrowIndex')->name('borrow.index')->middleware('auth');
Route::get('/borrow/{product}/{id}', 'NotificationController@borrowRequest')->name('borrow.request')->middleware('auth');


Route::get('/sharedBook', 'ProductController@sharedBook')->name('sharedBook')->middleware('auth');
Route::get('/sharedBook/recieved/{product}', 'NotificationController@recievedBook')->name('recievedBook')->middleware('auth');

Route::get("search","HomeController@search");


// __________________________________ Admin____________________________ //



Route::prefix('admin')->middleware('role:admin', 'auth')->group(function () {


    Route::get('/', 'Admin\AdminController@index')->name('admin.index');

    //create category
    Route::resource('/category', 'Admin\AdminCategoriesController');

    //manage slider
    Route::resource('/slider', 'Admin\AdminSlidersController');
    Route::post('/delete/slider', 'Admin\AdminSlidersController@deleteSlider');


    // manage books
    Route::get('/users/createBookStore', 'Admin\AdminUserController@create')->name('users.create');
    Route::post('/users', 'Admin\AdminUserController@store')->name('users.store');
    Route::resource('/book', 'Admin\AdminBooksController');
    Route::get('search', 'Admin\AdminController@mysearch');





    //manage user
    Route::get('users/{id}/user', 'Admin\AdminUserController@ban')->name('users.ban');
    Route::get('/{id}/user', 'Admin\AdminUserController@revoke')->name('users.revoke');

    Route::get('/users', 'Admin\AdminUserController@users')->name('users-control');
    Route::post('/delete/users', 'Admin\AdminUserController@delete');
    Route::get('user/search', 'Admin\AdminUserController@userSearch')->name('user.search');





    // //searching
    // Route::get('/search/{id}', ['as'=>'search', 'uses'=>'Admin\AdminController@singleSearch']);
     Route::post('/search', 'Admin\AdminController@search')->name('books.search')
;


    //users contact
    Route::get('/contact', 'Admin\AdminContactController@index');
    Route::post('/delete/messages', 'Admin\AdminContactController@delete');




    //admin Profile
    Route::get('/profile/{id}', 'Admin\ProfileController@index')->name('profile');
    Route::get('/profile/{id}/edit', 'Admin\ProfileController@edit')->name('profile.edit');
    Route::patch('/profile/update/{id}', 'Admin\ProfileController@update')->name('profile.update');


    //borrowers
    Route::get('/borrowers', 'AdminBorrowersController@borrower')->name('borrowers');
    Route::post('/sms', 'Admin\AdminSmsController@sms')->name('sms');


    //ChartJS
    Route::get('/books-ratio', 'Admin\AdminController@getBooksRation')->name('books-ratio');
    Route::get('/orders-ratio', 'Admin\AdminController@getOrdersRation')->name('orders-ratio');


    //search Orders
    Route::get('/order', 'Admin\AdminOrderController@index');
    Route::post('/order/search', 'Admin\AdminOrderController@order')->name('order');

    //chat
    Route::get('/chat', 'Admin\AdminChatController@index');




});
