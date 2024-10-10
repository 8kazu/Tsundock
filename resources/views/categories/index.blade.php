<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Blog</title>
    <!-- フォント -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- CSSファイルのリンク -->
    <link rel="stylesheet" href="{{ asset('resources/css/style.css') }}">
    
    <!-- インラインCSSで背景画像を設定 -->
    <style>
        .posts {
            padding: 20px;
        }

        .post {
            position: relative; /* 子要素を絶対配置するために必要 */
            background-image: url('{{ asset('images/background.png') }}'); /* 投稿ごとに背景画像を設定 */
            background-size: 30% auto; /* アスペクト比を維持しながら表示 */
            background-position: center;
            background-repeat: no-repeat;
            padding: 70px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .title {
            position: relative; /* 背景画像上に配置 */
            top: -40px; /* 上から表示する位置を調整 */
            text-align: center; /* タイトルを中央に配置 */
            font-size: 24px;
            z-index: 2; /* 他の要素の上に表示 */
            color: #000; /* 背景画像とのコントラストを考慮して黒色に設定 */
        }

        .post-content {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 10px;
        }

        .category {
            position: absolute; /* 背景画像上に絶対配置 */
            top: 85px; /* 上からの位置を調整 */
            left: 700px; /* 横位置の調整 */
            z-index: 2; /* 背景画像より前に表示 */
            font-size: 18px;
            color: #fff; /* テキストを白色に設定 */
            background-color: rgba(0, 0, 0, 0.5); /* 半透明の黒背景を追加 */
            padding: 5px 10px;
            border-radius: 5px;
        }

        button {
            float: right; /* ボタンを右寄せ */
            margin-left: 500px; /* 左に余白を追加 */
            padding: 5px 10px;
            background-color: #f00;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

    </style>

</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tsundock') }}
            </h2>
            <div class="user-info">
                <span>Welcome, {{ Auth::user()->name }}</span>
            </div>
        </x-slot>

        <a href='/posts/create'>Create "Tsundock"</a>

        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <h2 class='title'>
                        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h2>
                    <div class="post-content">
                        <a class="category" href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                    </div>
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $post->id }})">delete</button>
                    </form>
                </div>
            @endforeach
        </div>

        <div class='paginate'>
            {{ $posts->links() }}
        </div>

        <script>
            function deletePost(id) {
                'use strict'
                if (confirm('削除すると復元できません。\n本当に削除しますか?')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </x-app-layout>
</body>
</html>
