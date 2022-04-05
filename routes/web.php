<?php
use Illuminate\Support\Facades\Route;
// Importamos controladores de rutas
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;

use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// Controlador de ruta para HomeController@index
Route::get('/', [HomeController::class, 'index']);

// Retornamos ruta
Route::get('/dashboard', [DashboardController::class, 'index']);
