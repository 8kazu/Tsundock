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
                margin-top: -100px; /* カテゴリーリンクの位置を調整 */
                margin-right: 500px;
                color: black;
                text-align: center; /* カテゴリーリンクを中央揃え */
                white-space: nowrap; /* 改行を防止 */
                color: white; /* テキストを白色に */
                background-color: rgba(0, 0, 0, 0.6); /* 薄い黒背景にする (60%の透明度) */
                padding: 5px 10px; /* 内側に余白を追加 */
                border-radius: 5px; /* 角を丸める */
                display: inline-block; /* 要素をインラインブロックにして、コンパクトに表示 */
            }

            .content__post {
                position: absolute;
                margin-top: 20px; /* 本文の上に余白を追加 */
                text-align: center; /* 本文は中央に */
            }

            .edit {
                position: absolute;
                margin-top: 230px; 
                margin-left: 680px;
            }

            .footer {
                position: absolute;
                margin-top: 0px; 
                margin-left: 1400px;
            }

            .edit a {
                color: #00008B; /* 戻るボタンと同じ濃い青色に変更 */
                font-weight: bold; /* 文字を太字に */
                text-decoration: none; /* 下線を削除 */
                background-color: transparent; /* 背景を透明に設定 */
                padding: 5px 10px; /* 必要に応じて余白を追加 */
            }

            .edit a:hover {
                text-decoration: underline; /* ホバー時に下線を追加 */
            }

            .footer a {
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
