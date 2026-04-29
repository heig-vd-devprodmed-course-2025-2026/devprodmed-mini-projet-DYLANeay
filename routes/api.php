<?php

use App\Http\Controllers\Api\v1\ApiPostController;
use App\Http\Controllers\Api\v1\ApiReportController;

Route::get("/user", function (Request $request) {
    return $request->user();
})->middleware("auth:sanctum");

Route::post("/v1/posts/{post}/report", [
    ApiReportController::class,
    "store",
])->middleware(["auth:sanctum", "abilities:report:create"]);

Route::apiResource("v1/posts", ApiPostController::class)
    ->middlewareFor(["index", "show"], ["auth:sanctum", "abilities:posts:read"])
    ->middlewareFor(["store"], ["auth:sanctum", "abilities:posts:create"])
    ->middlewareFor(["update"], ["auth:sanctum", "abilities:posts:update"])
    ->middlewareFor(["destroy"], ["auth:sanctum", "abilities:posts:delete"]);
