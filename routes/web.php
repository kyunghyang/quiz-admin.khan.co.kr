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

Route::get('/test', function () {
    $kakao = new \App\Models\Kakao();

    $kakao->send("01030217486", [
        "user_name" => "123",
        "job_name" => "123",
        "state" => "123",
        "reason" => "123",
        "job_type" => "123",
        "job_id" => "123",
    ], "application");
});

Route::get('/', function () {
    return view('welcome');
});

Route::middleware("auth")->group(function(){
    Route::get('/dietProducts/create', [\App\Http\Controllers\DietProductController::class, "create"]);
    Route::patch('/dietProducts/attach', [\App\Http\Controllers\DietProductController::class, "attach"]);
    Route::patch('/dietProducts/detach', [\App\Http\Controllers\DietProductController::class, "detach"]);
    Route::patch('/dietIncludeProducts', [\App\Http\Controllers\DietIncludeProductController::class, "update"]);

});

Route::get("/register", function(){
    return redirect("/nova/register");
});

Route::get('/', function () {
    return redirect("/nova");
});

Route::get("/login", function(){
    return redirect("/nova/login");
})->name("login");

Route::get("/nova/register", function(){
    return view("auth.register");
});


Route::post("/register", "App\Http\Controllers\AdminController@store");
