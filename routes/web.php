<?php

use App\Models\Post;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MyProfileController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get("/about", function () {
    return view("about");
});

Route::controller(AuthController::class)->group(function () {
    Route::get("/auth/register", "showRegister");
    Route::post("/auth/register", "register");
    Route::get("/auth/login", "showLogin");
    Route::post("/auth/login", "login");
    Route::post("/auth/logout", "logout");
});

Route::get("/@{username}", [ProfileController::class, "show"])->where(
    "username",
    "[A-Za-z0-9-_]+",
);

Route::resource("posts", PostController::class);

Route::get("/", [HomeController::class, "index"]);

Route::match(["put", "patch"], "/likes/{post}", [
    LikeController::class,
    "update",
]);

Route::singleton("my-profile", MyProfileController::class)->destroyable();
