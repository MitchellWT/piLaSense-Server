<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SensorDataController;
use App\Http\Controllers\SensorSystemController;


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
    return view('index');

})->name('index');

Route::get('/admin', function () {
    return view('admin');

})->middleware(['auth'])
->name('admin');

Route::get('/sensor_systems', [SensorSystemController::class, 'index'])
->middleware(['auth'])
->name('sensor_systems.index');

Route::get('/sensor_systems/create', [SensorSystemController::class, 'create'])
->middleware(['auth'])
->name('sensor_systems.create');

Route::post('/sensor_systems', [SensorSystemController::class, 'store'])
->middleware(['auth'])
->name('sensor_systems.store');

Route::get('/sensor_systems/{sensor_system}', [SensorSystemController::class, 'show'])
->middleware(['auth'])
->name('sensor_systems.show');

Route::get('/sensor_systms/{sensor_system}/edit', [SensorSystemController::class, 'edit'])
->middleware(['auth'])
->name('sensor_systems.edit');

Route::put('/sensor_systems/{sensor_system}', [SensorSystemController::class, 'update'])
->middleware(['auth'])
->name('sensor_systems.update');

Route::delete('/sensor_systems/{sensor_system}', [SensorSystemController::class, 'destroy'])
->middleware(['auth'])
->name('sensor_systems.destroy');

require __DIR__.'/auth.php';
