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


Route::get('/','Auth\LoginController@showLoginForm')->name('login');
 Route::get('login','Auth\LoginController@showLoginForm')->name('login');
 Route::post('login','Auth\LoginController@login');
 Route::post('logout','Auth\LoginController@Logout')->name('logout');
 Route::get('/home', 'HomeController@index');

 Route::get('register','Auth\RegisterController@showRegistrationForm')->name('Register');
 Route::post('register','Auth\RegisterController@register');

 Route::get('password/reset','Auth\ForgotPasswordController@showLinkRequestForm');
 Route::post('password/email','Auth\ForgotPasswordController@sendResetLinkEmail');
 Route::get('password/reset/{token}','Auth\ResetPasswordController@showResetForm');
 Route::post('password/reset','Auth\ResetPasswordController@reset');



 Route::group(['prefix' => 'settings'], function(){
    Route::get('about','AboutController@index');

    Route::get('categories','ProductCategoryController@index')->name('product-categories.index');
    Route::get('categories/create','ProductCategoryController@create')->name('product-categories.create');
    Route::post('categories/destroy/{id}','ProductCategoryController@destroy')->name('product-categories.destroy');
    Route::get('categories/show/{id}','ProductCategoryController@show')->name('product-categories.show');
    Route::get('categories/edit/{id}','ProductCategoryController@edit')->name('product-categories.edit');
    Route::post('categories/store','ProductCategoryController@store')->name('product-categories.store');
    Route::patch('categories/update','ProductCategoryController@update')->name('product-categories.update');


    Route::get('buttons', function () { return view('pages.basic-ui.buttons'); });
    Route::get('badges', function () { return view('pages.basic-ui.badges'); });
    Route::get('breadcrumbs', function () { return view('pages.basic-ui.breadcrumbs'); });
    Route::get('dropdowns', function () { return view('pages.basic-ui.dropdowns'); });
    Route::get('modals', function () { return view('pages.basic-ui.modals'); });
    Route::get('progress-bar', function () { return view('pages.basic-ui.progress-bar'); });
    Route::get('pagination', function () { return view('pages.basic-ui.pagination'); });
    Route::get('tabs', function () { return view('pages.basic-ui.tabs'); });
    Route::get('typography', function () { return view('pages.basic-ui.typography'); });
    Route::get('tooltips', function () { return view('pages.basic-ui.tooltips'); });
});

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

Route::get('change-password', 'ChangePasswordController@index');
Route::post('change-password', 'ChangePasswordController@store')->name('change.password');


Route::group(['prefix' => 'basic-ui'], function(){
    Route::get('accordions', function () { return view('pages.basic-ui.accordions'); });
    Route::get('buttons', function () { return view('pages.basic-ui.buttons'); });
    Route::get('badges', function () { return view('pages.basic-ui.badges'); });
    Route::get('breadcrumbs', function () { return view('pages.basic-ui.breadcrumbs'); });
    Route::get('dropdowns', function () { return view('pages.basic-ui.dropdowns'); });
    Route::get('modals', function () { return view('pages.basic-ui.modals'); });
    Route::get('progress-bar', function () { return view('pages.basic-ui.progress-bar'); });
    Route::get('pagination', function () { return view('pages.basic-ui.pagination'); });
    Route::get('tabs', function () { return view('pages.basic-ui.tabs'); });
    Route::get('typography', function () { return view('pages.basic-ui.typography'); });
    Route::get('tooltips', function () { return view('pages.basic-ui.tooltips'); });
});

Route::group(['prefix' => 'advanced-ui'], function(){
    Route::get('dragula', function () { return view('pages.advanced-ui.dragula'); });
    Route::get('clipboard', function () { return view('pages.advanced-ui.clipboard'); });
    Route::get('context-menu', function () { return view('pages.advanced-ui.context-menu'); });
    Route::get('popups', function () { return view('pages.advanced-ui.popups'); });
    Route::get('sliders', function () { return view('pages.advanced-ui.sliders'); });
    Route::get('carousel', function () { return view('pages.advanced-ui.carousel'); });
    Route::get('loaders', function () { return view('pages.advanced-ui.loaders'); });
    Route::get('tree-view', function () { return view('pages.advanced-ui.tree-view'); });
});


// Route::group(['prefix' => 'items'], function(){
//     Route::get('/add', function () { return view('pages.forms.basic-elements'); });
//     Route::get('/list', function () { return view('pages.forms.advanced-elements'); });
//     Route::get('edit/{id}', function () { return view('pages.forms.dropify'); });
//     Route::get('show/{id}', function () { return view('pages.forms.form-validation'); });
//     Route::get('delete/{id}', function () { return view('pages.forms.step-wizard'); });
//     Route::get('update/{id}', function () { return view('pages.forms.wizard'); });
// });


Route::group(['prefix' => 'client'], function(){
    Route::get('/', 'ClientController@index')->name('clients.index');
    Route::get('/list', 'ClientController@index')->name('clients.index');
    Route::get('/create', 'ClientController@create')->name('clients.create');
    Route::get('/show/{id}', 'ClientController@show')->name('clients.show');
    Route::get('/edit/{id}', 'ClientController@edit')->name('clients.edit');

    Route::post('/destroy/{id}', 'ClientController@destroy')->name('clients.destroy');
    Route::post('/store', 'ClientController@store')->name('clients.store');
    Route::patch('/update/{id}', 'ClientController@update')->name('clients.update');

  
});

Route::group(['prefix' => 'credit'], function(){
    Route::get('/', 'CreditController@index')->name('credits.index');
    Route::get('/list', 'CreditController@index')->name('credits.index');
    Route::get('/create', 'CreditController@create')->name('credits.create');
    Route::get('/show/{id}', 'CreditController@show')->name('credits.show');
    Route::get('/edit/{id}', 'CreditController@edit')->name('credits.edit');

    Route::post('/destroy/{id}', 'CreditController@destroy')->name('credits.destroy');
    Route::post('/store', 'CreditController@store')->name('credits.store');
    Route::patch('/update/{id}', 'CreditController@update')->name('credits.update');

  
});


Route::group(['prefix' => 'proforma'], function(){
    Route::get('/', 'ProformaController@index')->name('proformas.index');
    Route::get('/list', 'ProformaController@index')->name('proformas.index');
    Route::get('/create', 'ProformaController@create')->name('proformas.create');
    Route::get('/show/{id}', 'ProformaController@show')->name('proformas.show');
    Route::get('/edit/{id}', 'ProformaController@edit')->name('proformas.edit');

    Route::post('/destroy/{id}', 'ProformaController@destroy')->name('proformas.destroy');
    Route::post('/store', 'ProformaController@store')->name('proformas.store');
    Route::patch('/update/{id}', 'ProformaController@update')->name('proformas.update');
});

Route::get('invoice', function () { return view('pages.attachment.invoice'); });
Route::get('attachment', function () { return view('pages.attachment.invoice'); });



Route::group(['prefix' => 'expense'], function(){
    Route::get('/', 'ExpenseController@index')->name('expenses.index');
    Route::get('/list', 'ExpenseController@index')->name('expenses.index');
    Route::get('/create', 'ExpenseController@create')->name('expenses.create');
    Route::get('/show/{id}', 'ExpenseController@show')->name('expenses.show');
    Route::get('/edit/{id}', 'ExpenseController@edit')->name('expenses.edit');

    Route::post('/destroy/{id}', 'ExpenseController@destroy')->name('expenses.destroy');
    Route::post('/store', 'ExpenseController@store')->name('expenses.store');
    Route::patch('/update/{id}', 'ExpenseController@update')->name('expenses.update');
});


Route::group(['prefix' => 'sales'], function(){
    Route::get('/', 'SaleController@index')->name('sales.index');
    Route::get('/list', 'SaleController@index')->name('sales.index');
    Route::get('/create', 'SaleController@create')->name('sales.create');
    Route::get('/show/{id}', 'SaleController@show')->name('sales.show');
    Route::get('/edit/{id}', 'SaleController@edit')->name('sales.edit');

    Route::post('/destroy/{id}', 'SaleController@destroy')->name('sales.destroy');
    Route::post('/store', 'SaleController@store')->name('sales.store');
    Route::patch('/update/{id}', 'SaleController@update')->name('sales.update');
});



Route::group(['prefix' => 'lookuptype'], function(){
    Route::get('/', 'LookupTypeController@index')->name('lookup-types.index');
    Route::get('/list', 'LookupTypeController@index')->name('lookup-types.index');
    Route::get('/create', 'LookupTypeController@create')->name('lookup-types.create');
    Route::get('/show/{id}', 'LookupTypeController@show')->name('lookup-types.show');
    Route::get('/edit/{id}', 'LookupTypeController@edit')->name('lookup-types.edit');

    Route::post('/destroy/{id}', 'LookupTypeController@destroy')->name('lookup-types.destroy');
    Route::post('/store', 'LookupTypeController@store')->name('lookup-types.store');
    Route::patch('/update/{id}', 'LookupTypeController@update')->name('lookup-types.update');
});
Route::group(['prefix' => 'lookup'], function(){
    Route::get('/', 'LookupController@index')->name('lookupes.index');
    Route::get('/list', 'LookupController@index')->name('lookups.index');
    Route::get('/create', 'LookupController@create')->name('lookups.create');
    Route::get('/show/{id}', 'LookupController@show')->name('lookups.show');
    Route::get('/edit/{id}', 'LookupController@edit')->name('lookups.edit');

    Route::post('/destroy/{id}', 'LookupController@destroy')->name('lookups.destroy');
    Route::post('/store', 'LookupController@store')->name('lookups.store');
    Route::patch('/update/{id}', 'LookupController@update')->name('lookups.update');
});


Route::group(['prefix' => 'forms'], function(){
    Route::get('basic-elements', function () { return view('pages.forms.basic-elements'); });
    Route::get('advanced-elements', function () { return view('pages.forms.advanced-elements'); });
    Route::get('dropify', function () { return view('pages.forms.dropify'); });
    Route::get('form-validation', function () { return view('pages.forms.form-validation'); });
    Route::get('step-wizard', function () { return view('pages.forms.step-wizard'); });
    Route::get('wizard', function () { return view('pages.forms.wizard'); });
});

Route::group(['prefix' => 'editors'], function(){
    Route::get('text-editor', function () { return view('pages.editors.text-editor'); });
    Route::get('code-editor', function () { return view('pages.editors.code-editor'); });
});
Route::group(['prefix' => 'providers'], function(){
    Route::get('/', 'ProviderController@index')->name('providers.index');
    Route::get('/create', 'ProviderController@create')->name('providers.create');
    Route::post('providers/store', 'ProviderController@store')->name('providers.store');
    Route::Post('providers/destroy/{id}', 'ProviderController@destroy')->name('providers.destroy');
    Route::get('providers/show/{id}', 'ProviderController@show')->name('providers.show');
    Route::get('providers/edit/{id}', 'ProviderController@edit')->name('providers.edit');
    Route::patch('providers/update/{id}', 'ProviderController@update')->name('providers.update');   
});
Route::group(['prefix' => 'inventories'], function(){
    Route::get('/', 'InventoryController@index')->name('inventories.index');
    Route::get('/create', 'InventoryController@create')->name('inventories.create');
    Route::post('inventories/store', 'InventoryController@store')->name('inventories.store');
    Route::Post('inventories/destroy/{InventoryId}', 'InventoryController@destroy')->name('inventories.destroy');
    Route::get('inventories/show/{InventoryId}', 'InventoryController@show')->name('inventories.show');
    Route::get('inventories/edit/{InventoryId}', 'InventoryController@edit')->name('inventories.edit');
    Route::post('inventories/update/{InventoryId}', 'InventoryController@update')->name('inventories.update');   
    Route::post('/search', 'InventoryController@search')->name('search.inventory');   

});




Route::group(['prefix' => 'items'], function(){

    Route::get('/', 'ItemController@index')->name('items.index');
    Route::get('/details/{id}', 'ItemController@details')->name('items.details');
    Route::get('/list', 'ItemController@index')->name('Item.index');
    Route::get('/create', 'ItemController@create')->name('items.create');
    Route::post('items/store', 'ItemController@store')->name('items.store');
    Route::Post('items/destroy/{ItemId}', 'ItemController@destroy')->name('items.destroy');
    Route::get('items/show/{ItemId}', 'ItemController@show')->name('items.show');
    Route::get('items/edit/{ItemId}', 'ItemController@edit')->name('items.edit');
    Route::patch('items/update/{ItemId}', 'ItemController@update')->name('items.update'); 

});


Route::group(['prefix' => 'admin'], function(){
    Route::get('chartjs', function () { return view('pages.charts.chartjs'); });
    Route::get('/', function () { return view('pages.admin.dashboard'); });

    
    Route::get('morris', function () { return view('pages.charts.morris'); });
    Route::get('flot', function () { return view('pages.charts.flot'); });
    Route::get('google-charts', function () { return view('pages.charts.google-charts'); });
    Route::get('sparklinejs', function () { return view('pages.charts.sparklinejs'); });
    Route::get('c3-charts', function () { return view('pages.charts.c3-charts'); });
    Route::get('chartist', function () { return view('pages.charts.chartist'); });
    Route::get('justgage', function () { return view('pages.charts.justgage'); });
   
});

// Route::group(['prefix' => 'providers'], function(){
//     Route::get('basic-table', function () { return view('pages.tables.basic-table'); });
//     Route::get('data-table', function () { return view('pages.tables.data-table'); });
//     Route::get('js-grid', function () { return view('pages.tables.js-grid'); });
//     Route::get('sortable-table', function () { return view('pages.tables.sortable-table'); });
// });

Route::get('notifications', function () {
    return view('pages.notifications.index');
});

Route::group(['prefix' => 'icons'], function(){
    Route::get('material', function () { return view('pages.icons.material'); });
    Route::get('flag-icons', function () { return view('pages.icons.flag-icons'); });
    Route::get('font-awesome', function () { return view('pages.icons.font-awesome'); });
    Route::get('simple-line-icons', function () { return view('pages.icons.simple-line-icons'); });
    Route::get('themify', function () { return view('pages.icons.themify'); });
});

Route::group(['prefix' => 'maps'], function(){
    Route::get('vector-map', function () { return view('pages.maps.vector-map'); });
    Route::get('mapael', function () { return view('pages.maps.mapael'); });
    Route::get('google-maps', function () { return view('pages.maps.google-maps'); });
});

Route::group(['prefix' => 'user-pages'], function(){
    Route::get('login', function () { return view('pages.user-pages.login'); });
    Route::get('login-2', function () { return view('pages.user-pages.login-2'); });
    Route::get('multi-step-login', function () { return view('pages.user-pages.multi-step-login'); });
    Route::get('register', function () { return view('pages.user-pages.register'); });
    Route::get('register-2', function () { return view('pages.user-pages.register-2'); });
    Route::get('lock-screen', function () { return view('pages.user-pages.lock-screen'); });
    Route::get('list','UsersController@index');
});

Route::group(['prefix' => 'error-pages'], function(){
    Route::get('error-404', function () { return view('pages.error-pages.error-404'); });
    Route::get('error-500', function () { return view('pages.error-pages.error-500'); });
});

Route::group(['prefix' => 'general-pages'], function(){
    Route::get('blank-page', function () { return view('pages.general-pages.blank-page'); });
    Route::get('landing-page', function () { return view('pages.general-pages.landing-page'); });
    Route::get('profile', function () { return view('pages.general-pages.profile'); });
    Route::get('email-templates', function () { return view('pages.general-pages.email-templates'); });
    Route::get('faq', function () { return view('pages.general-pages.faq'); });
    Route::get('faq-2', function () { return view('pages.general-pages.faq-2'); });
    Route::get('news-grid', function () { return view('pages.general-pages.news-grid'); });
    Route::get('timeline', function () { return view('pages.general-pages.timeline'); });
    Route::get('search-results', function () { return view('pages.general-pages.search-results'); });
    Route::get('portfolio', function () { return view('pages.general-pages.portfolio'); });
    Route::get('user-listing', function () { return view('pages.general-pages.user-listing'); });
});

Route::group(['prefix' => 'ecommerce'], function(){
    Route::get('invoice', function () { return view('pages.ecommerce.invoice'); });
    Route::get('invoice-2', function () { return view('pages.ecommerce.invoice-2'); });
    Route::get('pricing', function () { return view('pages.ecommerce.pricing'); });
    Route::get('product-catalogue', function () { return view('pages.ecommerce.product-catalogue'); });
    Route::get('project-list', function () { return view('pages.ecommerce.project-list'); });
    Route::get('orders', function () { return view('pages.ecommerce.orders'); });
});

// For Clear cache
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

// 404 for undefined routes
Route::any('/{page?}',function(){
    return View::make('pages.error-pages.error-404');
})->where('page','.*');
Auth::routes();

