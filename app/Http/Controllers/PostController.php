<?php

namespace App\Http\Controllers;
use App\Models\Post; //カリキュラム16
use Illuminate\Http\Request;

//class PostController extends Controller
//{
    //
//}

//use宣言は外部にあるクラスをPostController内にインポートできる。 //この場合、App\Models内のPostクラスをインポートしている。
//use App\Models\Post;
/**
* Post一覧を表示する
*
* @param Post Postモデル
* @return array Postモデルリスト */
//public function index(Post $post)//インポートしたPostをインスタンス化して$postとして使用。
//{
//	return $post->get();//$postの中身を戻り値にする。
//}


class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]); //blade内で使う変数'posts'と設定。'posts'の中身にgetを使い、インスタンス化した$postを代入。
   	//getPaginateByLimit()はPost.phpで定義したメソッド
    }
}
?>
