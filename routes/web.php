<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SportRetrievalController;
use App\Http\Controllers\LeagueRetrievalController;

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

// Route::get('/', function () {
//     return view('welcome');
//     // return ['value' => 'Alcides'];
// });

Route::get('/', [SportRetrievalController::class, 'index']);
Route::get('/league/{sport}', [LeagueRetrievalController::class, 'indexBySport'])->where(['id' => '[0-9]+'])->name('show.league');