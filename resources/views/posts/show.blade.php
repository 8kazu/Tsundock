<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- フォント -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <style>
            .image-container {
                position: relative;
                width: 50%; /* 画像の幅を50%に設定 */
                margin: 0 auto; /* 画像を中央揃え */
            }

            .image-container img {
                width: 100%; /* 画像の幅をコンテナに合わせる */
                height: auto; /* 高さを自動調整 */
            }

            .content {
                position: absolute;
                top: 40%; /* コンテンツをもう少し上に */
                left: 50%;
                transform: translateX(-50%);
                padding: 20px;
                border-radius: 10px;
                color: black; /* テキストの色を黒に */
                max-width: 90%;
                text-align: center;
            }

            .title {
                position: absolute;
                top: -80px; /* タイトルの位置を座標で指定 */
                left: 0;
                right: 0;
                margin: 0 auto; /* タイトルを中央揃え */
                text-align: center;
                font-size: 36px; /* タイトルのフォントサイズを大きくする */
                font-weight: bold; /* 太字にする */
            }

            .content a {
                display: block; /* ブロック表示にして横書きの流れを保つ */
                margin-top: -40px; /* カテゴリーリンクの位置を調整 */
                margin-right: 500px;
                color: black;
                text-align: center; /* カテゴリーリンクを中央揃え */
            }

            .content__post {
                position: absolute;
                margin-top: 20px; /* 本文の上に余白を追加 */
                text-align: center; /* 本文は中央に */
            }

            .edit {
                position: absolute;
                margin-top: 300px; 
                margin-left: 650px;
                
            }

            .footer {
                position: absolute;
                margin-top: 0px; 
                margin-left: 1400px;
            }

            .edit a, .footer a {
                color: #00008B; /* ボタンの色を濃い青に変更 (dark blue) */
                font-weight: bold; /* 文字を太字に */
            }
        </style>
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Book') }}
                </h2>
            </x-slot>

            <div class="image-container">
                <img src="{{ asset('images/detail.png') }}" alt="Detail Image">  <!-- 画像を表示 -->
                <div class="content">
                    <h1 class="title">
                        {{ $post->title }}
                    </h1>
                    <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                    <div class="content__post">
                        <p>{{ $post->body }}</p>
                    </div>
                    
                    <div class="edit">
                        <a href="/posts/{{ $post->id }}/edit">Edit</a>
                    </div>
                </div>
            </div>

            <div class="footer">
                <a href="/">戻る</a>
            </div>
        </x-app-layout>
    </body>
</html>
