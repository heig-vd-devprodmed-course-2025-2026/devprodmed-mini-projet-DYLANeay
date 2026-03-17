<?php

use App\Models\Post;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MyProfileController;
use Illuminate\Support\Facades\Route;

Route::get("/about", function () {
    return view("about");
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
