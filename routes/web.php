<?php
use Illuminate\Support\Facades\Route;
// Importamos controladores de rutas
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpenseReportController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ExpenseReport;

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

// Resource
Route::resource('/expense_reports', ExpenseReportController::class);

// Controlador de ruta "Confirmar eliminación"
Route::get('/expense_reports/{id}/confirmDelete', [ExpenseReportController::class, 'confirmDelete']);

// Controlador de ruta "Confirmación de Enviar email"
Route::get('/expense_reports/{id}/confirmSendMail', [ExpenseReportController::class, 'confirmSendMail']);

// Controlador de ruta "enviar email"
Route::post('/expense_reports/{id}/sendMail', [ExpenseReportController::class, 'sendMail']);

// Controlador para Crear expenses asociados a un Reporte
Route::get('/expense_reports/{expense_report}/expenses/create', [ExpenseController::class, 'create']);

//  Controlador para Almacenar expenses asociados a un Reporte
Route::post('/expense_reports/{expense_report}/expenses', [ExpenseController::class, 'store']);

