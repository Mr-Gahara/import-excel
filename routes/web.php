<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("import_excel", [UserController::class,"import_excel"]);
Route::post("import_excel", [UserController::class,"import_excel_post"])->middleware('web');

Route::get('/', function () {
    return view('import_excel');
});
