<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('tags');
});


Route::resource('cooling_types', App\Http\Controllers\CoolingTypesController::class);
Route::resource('cpu_family_socket_series', App\Http\Controllers\CpuFamilySocketSeriesController::class);
Route::resource('fan_types', App\Http\Controllers\FanTypesController::class);
Route::resource('form_factors', App\Http\Controllers\FormFactorsController::class);
Route::resource('radiator_sizes', App\Http\Controllers\RadiatorSizesController::class);
Route::resource('ram_capacity_sizes', App\Http\Controllers\RamCapacitySizesController::class);
Route::resource('ram_types', App\Http\Controllers\RamTypesController::class);
Route::resource('ram_type_speeds', App\Http\Controllers\RamTypeSpeedsController::class);
Route::resource('ram_capacity', App\Http\Controllers\RamCapacityController::class);
Route::resource('series', App\Http\Controllers\SeriesController::class);
Route::resource('storage_types_format', App\Http\Controllers\StorageTypesFormatController::class);
Route::resource('tiers', App\Http\Controllers\TiersController::class);
Route::resource('/', App\Http\Controllers\TagController::class);
