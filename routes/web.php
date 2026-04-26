<?php

use App\Models\Post;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MyProfileController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Admin\ReportController as AdminReportController;

Route::get("/about", function () {
    return view("about");
});

Route::resource("tokens", TokenController::class)
    ->only(["index", "create", "store", "destroy"])
    ->middleware("auth");

Route::controller(AuthController::class)->group(function () {
    Route::get("/auth/register", "showRegister");
    Route::post("/auth/register", "register");
    //name permet de nommer la route, ce qui est utile pour générer des URLs dans les vues (et rediriger voir plus bas)
    Route::get("/auth/login", "showLogin")->name("login");
    Route::post("/auth/login", "login");
    Route::post("/auth/logout", "logout")->middleware("auth");
});

Route::get("/@{username}", [ProfileController::class, "show"])->where(
    "username",
    "[A-Za-z0-9-_]+",
);

Route::resource("posts", PostController::class)
    ->except(["index", "show"])
    //->only(["create", "store", "edit", "update", "destroy"])
    // middleware s'applique à tous par défaut
    // si l'user n'est pas connecté, il sera redirigé vers la page de login (voir la route de login plus haut)
    ->middleware("auth");

Route::resource("posts", PostController::class)->only(["index", "show"]);

Route::get("/", [HomeController::class, "index"]);

Route::match(["put", "patch"], "/likes/{post}", [
    LikeController::class,
    "update",
])->middleware("auth");

Route::singleton("my-profile", MyProfileController::class)
    ->destroyable()
    ->middleware("auth");

Route::post('/posts/{post}/report', [ReportController::class, 'store'])
    ->middleware('auth');

Route::get('/admin/reports', [AdminReportController::class, 'index'])
    ->middleware(['auth', 'admin'])
    ->name('admin.reports.index');

Route::patch('/admin/reports/post/{post}/dismiss', [AdminReportController::class, 'dismiss'])
    ->middleware(['auth', 'admin'])
    ->name('admin.reports.dismiss');

Route::delete('/admin/posts/{post}', [AdminReportController::class, 'destroy'])
    ->middleware(['auth', 'admin'])
    ->name('admin.posts.destroy');
