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
});
*/
Auth::routes();

Route::get('/', 'ShopController@showWelcomePage');
Route::get('/ajaxloggedIn', 'ShopController@showWelcomePage');
Route::get('/shop/list', 'ShopController@showShopPage')->name('shop');
Route::get('/searchItemsByCategory/{id}', 'ShopController@searchItemsByCategory')->name('items.searchItemsByCategory');
Route::get('/searchItemsByPrice/{lower}&{upper}', 'ShopController@searchItemsByPrice')->name('items.searchItemsByPrice');
Route::get('/addItemToCart/{id}', 'ShopController@addItemToCart')->name('items.addItemToCart');
Route::get('/itemsInCart', 'ShopController@itemsInCart')->name('items.itemsInCart');
Route::get('/removeItemsFromCart/{id}', 'ShopController@removeItemsFromCart')->name('removeItemsFromCart');
Route::get('/showItemDetails/{id}', 'ShopController@showItemDetails')->name('items.showDetails');


Route::get('/setSystemElementsIfNotExisted', 'Auth\LoginController@setSystemElementsIfNotExisted');
Route::post('/user/logout', 'Auth\LoginController@logout')->name('user.logout');










/*----------OLD ROUTES-----------------------*/

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/resources/manage-more', 'HomeController@manageMore')->name('resources.manageMore');

/*------------------USERS----------------------------------------------*/
Route::get('/users/index', 'UserController@index')->name('users.index');
Route::get('/users/create', 'UserController@create')->name('users.create');
Route::get('/users-edit/{id}', 'UserController@edit')->name('users.edit');
Route::get('/users/{id}', 'UserController@show')->name('users.show');
Route::post('/users/store', 'UserController@store')->name('users.store');
Route::post('/users/{id}', 'UserController@update')->name('users.update');
Route::get('/users-confirm-delete/{id}', 'UserController@delete')->name('users.delete');
Route::get('/users-delete/{id}', 'UserController@destroy')->name('users.destroy');
Route::get('/getUser/{id}', 'UserController@getUser')->name('users.getUser');
Route::get('/users-changeStatus/{id}', 'UserController@changeStatus')->name('users.changeStatus');
Route::post('/users-manageAccounts', 'UserController@manageAccounts')->name('users.manageAccounts');
Route::get('/users-manageAccounts', 'UserController@manageAccountsPage')->name('users.manageAccounts');

/*------------------Currency Types-------------------*/
Route::get('/currency_types/create', 'Currency_typeController@create')->name('currency_types.create');
Route::get('/currency_types/{id}', 'Currency_typeController@show')->name('currency_types.show');
Route::get('/currency_types-edit/{id}', 'Currency_typeController@edit')->name('currency_types.edit');
Route::post('/currency_types/{id}', 'Currency_typeController@update')->name('currency_types.update');
Route::get('/currency_types', 'Currency_typeController@index')->name('currency_types.index');
Route::post('/currency_types', 'Currency_typeController@store')->name('currency_types.store');
Route::get('/currency_types-confirm-delete/{id}', 'Currency_typeController@delete')->name('currency_types.delete');
Route::get('/currency_types-delete/{id}', 'Currency_typeController@destroy')->name('currency_types.destroy');
/*---------------------------------------------------------------------*/
/*------------------Delivery places-------------------*/
Route::get('/delivery_places/create', 'delivery_placeController@create')->name('delivery_places.create');
Route::get('/delivery_places/{id}', 'delivery_placeController@show')->name('delivery_places.show');
Route::get('/delivery_places-edit/{id}', 'delivery_placeController@edit')->name('delivery_places.edit');
Route::post('/delivery_places/{id}', 'delivery_placeController@update')->name('delivery_places.update');
Route::get('/delivery_places', 'delivery_placeController@index')->name('delivery_places.index');
Route::post('/delivery_places', 'delivery_placeController@store')->name('delivery_places.store');
Route::get('/delivery_places-confirm-delete/{id}', 'delivery_placeController@delete')->name('delivery_places.delete');
Route::get('/delivery_places-delete/{id}', 'delivery_placeController@destroy')->name('delivery_places.destroy');
/*---------------------------------------------------------------------*/
/*------------------order_types-------------------*/
/*------------------terms_of_paymentS----------------------------------------------*/
Route::get('/terms_of_payments/create', 'terms_of_paymentController@create')->name('terms_of_payments.create');
Route::get('/terms_of_payments/{id}', 'terms_of_paymentController@show')->name('terms_of_payments.show');
Route::get('/terms_of_payments-edit/{id}', 'terms_of_paymentController@edit')->name('terms_of_payments.edit');
Route::post('/terms_of_payments/{id}', 'terms_of_paymentController@update')->name('terms_of_payments.update');
Route::get('/terms_of_payments', 'terms_of_paymentController@index')->name('terms_of_payments.index');
Route::post('/terms_of_payments', 'terms_of_paymentController@store')->name('terms_of_payments.store');
Route::get('/terms_of_payments-confirm-delete/{id}', 'terms_of_paymentController@delete')->name('terms_of_payments.delete');
Route::get('/terms_of_payments-delete/{id}', 'terms_of_paymentController@destroy')->name('terms_of_payments.destroy');

/*------------------brands-------------------------*/
Route::get('/brands/create', 'BrandController@create')->name('brands.create');
Route::get('/brands/{id}', 'BrandController@show')->name('brands.show');
Route::get('/brands-edit/{id}', 'BrandController@edit')->name('brands.edit');
Route::post('/brands/{id}', 'BrandController@update')->name('brands.update');
Route::get('/brands', 'BrandController@index')->name('brands.index');
Route::post('/brands', 'BrandController@store')->name('brands.store');
Route::get('/brands-confirm-delete/{id}', 'BrandController@delete')->name('brands.delete');
Route::get('/brands-delete/{id}', 'BrandController@destroy')->name('brands.destroy');

/*------------------brands-------------------------*/
Route::get('/mode_ls/create', 'Mode_lController@create')->name('mode_ls.create');
Route::get('/mode_ls/{id}', 'Mode_lController@show')->name('mode_ls.show');
Route::get('/mode_ls-edit/{id}', 'Mode_lController@edit')->name('mode_ls.edit');
Route::post('/mode_ls/{id}', 'Mode_lController@update')->name('mode_ls.update');
Route::get('/mode_ls', 'Mode_lController@index')->name('mode_ls.index');
Route::post('/mode_ls', 'Mode_lController@store')->name('mode_ls.store');
Route::get('/mode_ls-confirm-delete/{id}', 'Mode_lController@delete')->name('mode_ls.delete');
Route::get('/mode_ls-delete/{id}', 'Mode_lController@destroy')->name('mode_ls.destroy');

/*------------------production_lineS----------------*/
/*------------------items----------------------------------------------*/
Route::get('/items/create', 'ItemController@create')->name('items.create');
Route::get('/items/{id}', 'ItemController@show')->name('items.show');
Route::get('/items-edit/{id}', 'ItemController@edit')->name('items.edit');
Route::post('/items/{id}', 'ItemController@update')->name('items.update');
Route::get('/items', 'ItemController@index')->name('items.index');
Route::post('/items', 'ItemController@store')->name('items.store');
Route::get('/items-confirm-delete/{id}', 'ItemController@delete')->name('items.delete');
Route::get('/items-delete/{id}', 'ItemController@destroy')->name('items.destroy');

/*------------------categories----------------------------------------------*/
Route::get('/categories/create', 'CategoryController@create')->name('categories.create');
Route::get('/categories/{id}', 'CategoryController@show')->name('categories.show');
Route::get('/categories-edit/{id}', 'CategoryController@edit')->name('categories.edit');
Route::post('/categories/{id}', 'CategoryController@update')->name('categories.update');
Route::get('/categories', 'CategoryController@index')->name('categories.index');
Route::post('/categories', 'CategoryController@store')->name('categories.store');
Route::get('/categories-confirm-delete/{id}', 'CategoryController@delete')->name('categories.delete');
Route::get('/categories-delete/{id}', 'CategoryController@destroy')->name('categories.destroy');

/*------------------accountS----------------------------------------------*/
Route::get('/accounts/create', 'accountController@create')->name('accounts.create');
Route::get('/accounts/{id}', 'accountController@show')->name('accounts.show');
Route::get('/accounts-edit/{id}', 'accountController@edit')->name('accounts.edit');
Route::post('/accounts/{id}', 'accountController@update')->name('accounts.update');
Route::get('/accounts', 'accountController@index')->name('accounts.index');
Route::post('/accounts', 'accountController@store')->name('accounts.store');
Route::get('/accounts-confirm-delete/{id}', 'accountController@delete')->name('accounts.delete');
Route::get('/accounts-delete/{id}', 'accountController@destroy')->name('accounts.destroy');

/*------------------delivery_noteS----------------------------------------------*/
Route::get('/delivery_notes/create', 'delivery_noteController@create')->name('delivery_notes.create');
Route::get('/delivery_notes/{id}', 'delivery_noteController@show')->name('delivery_notes.show');
Route::get('/delivery_notes-edit/{id}', 'delivery_noteController@edit')->name('delivery_notes.edit');
Route::post('/delivery_notes/{id}', 'delivery_noteController@update')->name('delivery_notes.update');
Route::get('/delivery_notes', 'delivery_noteController@index')->name('delivery_notes.index');
Route::post('/delivery_notes', 'delivery_noteController@store')->name('delivery_notes.store');
Route::get('/delivery_notes-confirm-delete/{id}', 'delivery_noteController@delete')->name('delivery_notes.delete');
Route::get('/delivery_notes-delete/{id}', 'delivery_noteController@destroy')->name('delivery_notes.destroy');
/*------------------permissionS----------------------------------------------*/
Route::get('/permissions/create', 'permissionController@step1')->name('permissions.step1');
Route::get('/permissions-allow/{id}', 'permissionController@step2')->name('permissions.step2');
/*Route::get('/permissions-save', 'permissionController@step3')->name('permissions.step3');
Route::get('/permissions-checkAll', 'permissionController@checkAll')->name('permissions.checkAll');
*/
/*---approvement permissions*/
Route::get('/permissions-manage-save', 'permissionController@saveManagements')->name('permissions.manage.save');
Route::get('/permissions-manage-checkAll', 'permissionController@checkAllManagements')->name('permissions.manage.checkAll');
/*---approvement permissions*/
Route::get('/permissions-approve-save', 'permissionController@saveAprovements')->name('permissions.approve.save');
Route::get('/permissions-approve-checkAll', 'permissionController@checkAllApprovements')->name('permissions.approve.checkAll');
/*---authorize permissions*/
Route::get('/permissions-authorize-save', 'permissionController@saveAuthrizations')->name('permissions.authorize.save');
Route::get('/permissions-authorize-checkAll', 'permissionController@checkAllAuthrizations')->name('permissions.authorize.checkAll');
/*---receive permissions*/
Route::get('/permissions-receive-save', 'permissionController@saveReceivers')->name('permissions.receive.save');
Route::get('/permissions-receive-checkAll', 'permissionController@checkAllReceivers')->name('permissions.receive.checkAll');
/*---check permissions*/
Route::get('/permissions-check-save', 'permissionController@saveCheckers')->name('permissions.check.save');
Route::get('/permissions-check-checkAll', 'permissionController@checkAllCheckers')->name('permissions.check.checkAll');
/*---inspect permissions*/
Route::get('/permissions-inspect-save', 'permissionController@saveInspectors')->name('permissions.inspect.save');
Route::get('/permissions-inspect-checkAll', 'permissionController@checkAllInspectors')->name('permissions.inspect.checkAll');


/*---POPULATES SIDEBAR ----*/
Route::get('/list-permitted-resources', 'permissionController@listPermittedResources')->name('list.permitted.resources');

/*
Route::get('/permissions/create', 'PermissionController@create')->name('permissions.create');
Route::post('/permissions', 'PermissionController@store')->name('permissions.store');*/

/*-------------------LOGO and IMAGE-------------*/
Route::resource('backEndLogo', 'BackEndLogoController', ['only'=>['index', 'edit', 'update']]);
Route::resource('logoImage', 'LogoImageController', ['only'=>['index', 'edit', 'update']]);
Route::resource('logo', 'LogoController', ['only'=>['index', 'edit', 'update']]);
/*--not implemented yet--*/
Route::get('/backEndLogo/create', 'backEndLogoController@create')->name('backEndLogo.create');
Route::get('/logoImage/create', 'logoImageController@create')->name('logoImage.create');
Route::get('/logo/create', 'logoController@create')->name('logo.create');

Route::get('/getLiveCount', 'HomeController@getLiveCount');
/*-------------------END OF COUNTERS-------------*/

Route::get('/settings', 'SettingController@index')->name('settings.index');
Route::post('/settings/{id}', 'SettingController@update')->name('settings.update');

/*--------------incomes -------------*/
Route::get('/incomes-update', 'IncomeController@updateIncomes')->name('incomes.update');
Route::get('/incomes-index', 'IncomeController@index')->name('incomes.index');
Route::get('/incomes-clear', 'IncomeController@clearIncomes')->name('incomes.clear');
/*------------end of incomes --------*/








