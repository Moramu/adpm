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
/** Main Routes **/
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
Route::get('announce/{id}', function($id) {
    $announcement = DB::table('announcements')->find($id);
    return View::make('announce',compact('announcement'));
})->name('announce'); 
});

Route::get('/home', function()
{
    $announcements = DB::table('announcements')->where('category', 'home')
                                ->orderBy('id')
                                ->paginate(3);
    return View::make('home',compact('announcements'));
})->name('home');
Route::any('home/search','SearchController@search')->name('search');


/** Test Routes **/

/** Excel Controller **/
Route::resource('excel', 'ExcelController');

Route::get('products/additives/downloadExcel/{type}', 'ExcelController@downloadExcelAdditives');
Route::post('products/additives/excel', 'ExcelController@storeAdditives')->name('importAdditives');
Route::get('products/additives/additivesExcelIndex', 'ExcelController@additivesIndex')->name('additivesExcelIndex');

Route::get('products/corals/downloadExcel/{type}', 'ExcelController@downloadExcelCorals');
Route::post('products/corals/excel', 'ExcelController@storeCoral')->name('importCorals');
Route::get('products/products/corals/coralExcelIndex', 'ExcelController@coralIndex')->name('coralExcelIndex');

Route::get('products/aquariums/downloadExcel/{type}', 'ExcelController@downloadExcelAquariums');
Route::post('products/aquariums/excel', 'ExcelController@storeAquariums')->name('importAquariums');
Route::get('products/aquariums/aquariumsExcelIndex', 'ExcelController@aquariumsIndex')->name('aquariumsExcelIndex');

Route::get('products/chillers/downloadExcel/{type}', 'ExcelController@downloadExcelChillers');
Route::post('products/chillers/excel', 'ExcelController@storeChillers')->name('importChillers');
Route::get('products/chillers/chillersExcelIndex', 'ExcelController@chillersIndex')->name('chillersExcelIndex');

Route::get('products/filters/downloadExcel/{type}', 'ExcelController@downloadExcelFilters');
Route::post('products/filters/excel', 'ExcelController@storeFilters')->name('importFilters');
Route::get('products/filters/filtersExcelIndex', 'ExcelController@filtersIndex')->name('filtersExcelIndex');

Route::get('products/food/downloadExcel/{type}', 'ExcelController@downloadExcelFood');
Route::post('products/food/excel', 'ExcelController@storeFood')->name('importFood');
Route::get('products/food/foodExcelIndex', 'ExcelController@foodIndex')->name('foodExcelIndex');

Route::get('products/heaters/downloadExcel/{type}', 'ExcelController@downloadExcelHeaters');
Route::post('products/heaters/excel', 'ExcelController@storeHeaters')->name('importHeaters');
Route::get('products/heaters/heatersExcelIndex', 'ExcelController@heatersIndex')->name('heatersExcelIndex');

Route::get('products/lightings/downloadExcel/{type}', 'ExcelController@downloadExcelLightings');
Route::post('products/lightings/excel', 'ExcelController@storeLightings')->name('importLightings');
Route::get('products/lightings/lightingsExcelIndex', 'ExcelController@lightingsIndex')->name('lightingsExcelIndex');

Route::get('products/sterilizers/downloadExcel/{type}', 'ExcelController@downloadExcelSterilizers');
Route::post('products/sterilizers/excel', 'ExcelController@storeSterilizers')->name('importSterilizers');
Route::get('products/sterilizers/sterilizersExcelIndex', 'ExcelController@sterilizersIndex')->name('sterilizersExcelIndex');


/** ----------------------------------------------- Services ------------------------------------ **/
Route::get('/services', function () {
    $announcements = DB::table('announcements')->where('category', 'services')
                                ->orderBy('id')
                                ->paginate(3);

    return View::make('services.services',compact('announcements'));
})->name('services');


/** Reef Controller **/
Route::resource('services/reef','ReefController');
Route::post('services/reef/create/reefFormAjax','ReefController@reefFormAjax');
Route::patch('services/reef/{id}/edit/reefFormAjax','ReefController@reefFormAjax');

/** Project Controller **/
Route::resource('services/project','ProjectController');

/** Water Parameters Controller **/
Route::resource('services/waterparam','WaterParamController');


/** ----------------------------------------------- Products ------------------------------------ **/
Route::get('/products', function()
{
    $announcements = DB::table('announcements')->where('category', 'products')
                                ->orderBy('id')
                                ->paginate(3);

    return View::make('products.products',compact('announcements'));
})->name('products');



/** Additives Controller **/
Route::resource('products/additives','AdditiveController');
Route::get('products/additives/quantity/{id}','AdditiveController@showQuantity');
Route::post('products/additives/quantity/{id}','AdditiveController@updateQuantity')->name('additiveUpdateQuantity');

/** Aquarium Controller **/
Route::resource('products/aquariums','AquariumController');
Route::get('products/aquariums/quantity/{id}','AquariumController@showQuantity');
Route::post('products/aquariums/quantity/{id}','AquariumController@updateQuantity')->name('aquariumUpdateQuantity');

/** Chiller Controller **/
Route::resource('products/chillers','ChillerController');
Route::get('products/chillers/quantity/{id}','ChillerController@showQuantity');
Route::post('products/chillers/quantity/{id}','ChillerController@updateQuantity')->name('chillerUpdateQuantity');

/** Coral Controller **/
Route::resource('products/corals','CoralController');
Route::get('products/corals/quantity/{id}','CoralController@showColors');
Route::post('products/corals/quantity/{id}','CoralController@updateColors')->name('coralUpdateQuantity');


/** Filter Controller **/
Route::resource('products/filters','FilterController');
Route::get('products/filters/quantity/{id}','FilterController@showQuantity');
Route::post('products/filters/quantity/{id}','FilterController@updateQuantity')->name('filterUpdateQuantity');

/** Fish Controller **/
Route::resource('products/fish', 'FishController');
Route::get('products/fish/addSizePrice/{id}','FishController@addSizePrice');
Route::post('products/fish/addSizePrice','FishController@storeSizePrice')->name('storeSizePrice');
Route::get('products/fish/updateSizePrice/{id}','FishController@showSizePrice');
Route::post('products/fish/updateSizePrice/{id}','FishController@updateSizePrice')->name('updateSizePrice');
Route::get('products/fish/destroySize/{id}','FishController@destroySize')->name('destroySize');
Route::get('products/fish/create/{id}','FishController@fishFormAjax');
Route::get('products/fish/quantity/{id}','FishController@showQuantity')->name('fishShowQuantity');

/** Food Controller **/
Route::resource('products/food','FoodController');
Route::get('products/food/quantity/{id}','FoodController@showQuantity');
Route::post('products/food/quantity/{id}','FoodController@updateQuantity')->name('foodUpdateQuantity');

/** Heater Controller **/
Route::resource('products/heaters','HeaterController');
Route::get('products/heaters/quantity/{id}','HeaterController@showQuantity');
Route::post('products/heaters/quantity/{id}','HeaterController@updateQuantity')->name('heaterUpdateQuantity');

/** Light Controller **/
Route::resource('products/lightings','LightingController');
Route::get('products/lightings/quantity/{id}','LightingController@showQuantity');
Route::post('products/lightings/quantity/{id}','LightingController@updateQuantity')->name('lightingUpdateQuantity');

/** Sterilizer Controller **/
Route::resource('products/sterilizers','SterilizerController');
Route::get('products/sterilizers/quantity/{id}','SterilizerController@showQuantity');
Route::post('products/sterilizers/quantity/{id}','SterilizerController@updateQuantity')->name('sterilizerUpdateQuantity');


/** ----------------------------------------------- Access ------------------------------------ **/

/** Super_admin acces **/
Route::get('/sadmin', 'SuperAdminController@index')->name('sadmin');
 
Route::group( ['middleware' => ['auth','role:super_admin']], function()
{   

Route::resource('sadmin/settings/users','UserController');
Route::resource('sadmin/settings/announcement','AnnouncementController');
  
Route::get('sadmin/settings', function () {
    return view('settings.settings');
})->name('settings');


});





/** Admin acces **/
Route::get('/admin', 'AdminController@index');

/** Simple user **/
