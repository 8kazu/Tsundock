<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\PostController; //外部にあるPostControllerクラスをインポート。

Route::get('/posts', [PostController::class, 'index']);

class Post extends Model
{
    use HasFactory;
}
