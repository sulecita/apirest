<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
use App\Http\Resources\StackOverflowAPI;
use App\Http\Resources\StackOverflowResource;


Route::get('/v1/stackoverflow/questions/{tagged}/{fromdate?}', function (string $tagged, string $fromDate="") {
    $questionStackOverflow = new StackOverflowAPI( $tagged );
    $questionStackOverflow->setFromDate( $fromDate );
    return new StackOverflowResource( $questionStackOverflow->getQuestions() );
});
