<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

//カリキュラム15
//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('/posts', [PostController::class, 'index']);

//カリキュラム16
//Route::get('/', function() {
//    return view('posts.index');
//});
Route::get('/', [PostController::class, 'index']);
Route::get('/posts/{post}', [PostController::class ,'show']); // '/posts/{対象データのID}'にGetリクエストが来たら、PostControllerのshowメソッドを実行する

?>
