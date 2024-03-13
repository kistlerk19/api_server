<?php

use App\Helpers\Routes\RouteHelper;
use Illuminate\Http\Request;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
 */

Route::prefix('v1')
    ->group(function () {
        $directory = __DIR__ . '/api/v1';
        // Check if the directory exists
        RouteHelper::includeRouteFiles($directory);
    });
    // require __DIR__ . '/api/v1/users.php';
    // require __DIR__ . '/api/v1/posts.php';
    // require __DIR__ . '/api/v1/comments.php';

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
