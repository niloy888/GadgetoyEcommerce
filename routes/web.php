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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Front End
Route::get('/', 'GadgetoyEcommerceController@index')->name('/');
Route::get('/about/', 'GadgetoyEcommerceController@about')->name('about');
Route::get('/contact-us/', 'GadgetoyEcommerceController@contactUs')->name('contact-us');
Route::post('/contact/form/', 'GadgetoyEcommerceController@contactSubmit')->name('contact-submit');
Route::get('/news-feed/', 'GadgetoyEcommerceController@newsFeed')->name('news-feed');
Route::get('/product/{id}/{category_id}', 'GadgetoyEcommerceController@productDetails')->name('product');
Route::get('/category/{id}', 'GadgetoyEcommerceController@category')->name('category');
Route::get('/brand/{id}', 'GadgetoyEcommerceController@brand')->name('brand-products');
Route::post('/product/review','GadgetoyEcommerceController@productReview')->name('product-review');


//Client
Route::get('/client-login', 'Client\ClientController@login')->name('client-login');
Route::post('/login-process', 'Client\ClientController@loginProcess')->name('login-process');
Route::get('/client-register', 'Client\ClientController@register')->name('client-register');
Route::post('/registration-process', 'Client\ClientController@registerProcess')->name('registration-process');
Route::get('/client-logout', 'Client\ClientController@logout')->name('client-logout');
Route::get('/client/profile', 'Client\ClientController@editProfile')->name('client-profile');
Route::post('/client/update-profile', 'Client\ClientController@updateProfile')->name('client-update-profile');
Route::get('/order-list','Client\ClientController@orderList')->name('order-list');
Route::get('/order-list2/{id}','Client\ClientController@orderList2')->name('order-list2');
Route::get('/order-details/{id}','Client\ClientController@orderDetails')->name('order-details');


Route::post('/cart/add', 'Client\CartController@addToCart')->name('add-to-cart');
Route::get('/cart/show', 'Client\CartController@showCart')->name('show-cart');
Route::post('/cart/update', 'Client\CartController@updateCart')->name('update-cart');
Route::get('/cart/delete/{id}', 'Client\CartController@deleteCart')->name('delete-cart-item');
Route::post('/order/confirm', 'Client\OrderController@confirmOrder')->name('confirm-order');






//Admin
Route::get('/admin/category/add', 'Admin\CategoryController@addCategory')->name('add-category');
Route::post('/admin/category/new', 'Admin\CategoryController@newCategory')->name('new-category');
Route::get('/admin/category/manage', 'Admin\CategoryController@manageCategory')->name('manage-category');
Route::get('/admin/category/edit/{id}','Admin\CategoryController@editCategory')->name('edit-category');
Route::post('/admin/category/update','Admin\CategoryController@updateCategory')->name('update-category');
Route::post('/admin/category/delete','Admin\CategoryController@deleteCategory')->name('delete-category');
Route::get('/admin/category/unpublished-category/{id}','Admin\CategoryController@unpublishedCategory')->name('unpublished-category');
Route::get('/admin/category/published-category/{id}','Admin\CategoryController@publishedCategory')->name('published-category');


Route::get('/admin/brand/add','Admin\BrandController@addBrand')->name('add-brand');
Route::post('/admin/brand/new','Admin\BrandController@newBrand')->name('new-brand');
Route::get('/admin/brand/manage','Admin\BrandController@manageBrand')->name('manage-brand');
Route::get('/admin/brand/edit-brand/{id}','Admin\BrandController@editBrand')->name('edit-brand');
Route::post('/admin/brand/update','Admin\BrandController@updateBrand')->name('update-brand');
Route::post('/admin/brand/delete','Admin\BrandController@deleteBrand')->name('delete-brand');
Route::get('/admin/brand/unpublished-brand/{id}','Admin\BrandController@unpublishedBrand')->name('unpublished-brand');
Route::get('/admin/brand/published-brand/{id}','Admin\BrandController@publishedBrand')->name('published-brand');


Route::get('/admin/manage/vendor', 'Admin\VendorController@manageVendor')->name('manage-vendors');
Route::get('/admin/accept-request/{id}', 'Admin\VendorController@acceptVendor')->name('accept-vendor');
Route::get('/admin/cancel-vendor/{id}', 'Admin\VendorController@cancelVendor')->name('cancel-vendor');
Route::post('/admin/delete/vendor/', 'Admin\VendorController@deleteVendor')->name('delete-vendor');


Route::get('/admin/manage/orders', 'Admin\OrderController@manageOrders')->name('admin-manage-orders');
Route::get('/admin/manage/order/details/{id}','Admin\OrderController@orderDetails')->name('admin-manage-order-details');
Route::get('/admin/order/accept/{id}','Admin\OrderController@acceptOrder')->name('admin-order-accept');
Route::get('/admin/delete/single-order/{id}','Admin\OrderController@deleteSingleOrder')->name('admin-delete-single-order');
Route::get('/admin/delete/order/{id}','Admin\OrderController@deleteOrder')->name('admin-delete-order');


Route::get('/admin/manage/messages', 'Admin\MessageController@manageMessages')->name('admin-manage-messages');
Route::get('/admin/manage/message/details/{id}','Admin\MessageController@messageDetails')->name('admin-manage-message-details');
Route::get('/admin/delete/message/{id}','Admin\MessageController@deleteMessage')->name('admin-delete-message');

//Vendor
Route::get('/vendor-login', 'Vendor\AuthController@vendorLogin')->name('vendor-login');
Route::get('/vendor-register', 'Vendor\AuthController@vendorRegister')->name('vendor-register');
Route::post('/vendor-save', 'Vendor\AuthController@vendorSave')->name('vendor-save');
Route::post('/vendor-dashboard', 'Vendor\AuthController@vendorNewLogin')->name('vendor-new-login');
Route::get('/vendor-logout','Vendor\AuthController@vendorLogout')->name('vendor-logout');
Route::get('/vendor-dashboard','Vendor\AuthController@vendorDashboard')->name('vendor-dashboard');


Route::get('/vendor/product/add','Vendor\ProductController@addProduct')->name('add-product');
Route::post('/vendor/product/new','Vendor\ProductController@newProduct')->name('new-product');
Route::get('/vendor/product/manage','Vendor\ProductController@manageProduct')->name('manage-product');
Route::get('/vendor/product/edit/{id}','Vendor\ProductController@editProduct')->name('edit-product');
Route::post('/vendor/product/update','Vendor\ProductController@updateProduct')->name('update-product');
Route::post('/vendor/product/delete','Vendor\ProductController@deleteProduct')->name('delete-product');
Route::get('/vendor/product/unpublish/{id}','Vendor\ProductController@unpublishedProduct')->name('unpublished-product');
Route::get('/vendor/product/publish/{id}','Vendor\ProductController@publishedProduct')->name('published-product');


Route::get('/vendor/manage/order','Vendor\OrderController@manageOrder')->name('vendor-manage-order');
Route::get('/vendor/accept/order/{id}','Vendor\OrderController@acceptOrder')->name('vendor-order-accept');
Route::get('/vendor/cancel/order/{id}','Vendor\OrderController@cancelOrder')->name('vendor-order-cancel');
Route::get('/vendor/delivered/order/{id}','Vendor\OrderController@deliveredOrder')->name('vendor-order-delivered');
