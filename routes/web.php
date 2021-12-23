<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SportRetrievalController;
use App\Http\Controllers\LeagueRetrievalController;
use App\Http\Controllers\TeamRetrievalController;

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

Route::get('/', [SportRetrievalController::class, 'index']);
Route::get('/league/{sport}', [LeagueRetrievalController::class, 'indexBySport'])->name('show.league');
Route::get('/league/{league_id}/teams', [TeamRetrievalController::class, 'indexByLeague'])->where(['league_id' => '[0-9]+'])->name('index.teams');