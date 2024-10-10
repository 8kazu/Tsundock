<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>編集画面</title>
        <!-- フォント -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <style>
            .image-container {
                position: relative;
                width: 50%;
                margin: 0 auto;
            }

            .image-container img {
                width: 100%;
                height: auto;
            }

            .content {
                position: absolute;
                top: 50%; /* コンテンツを垂直方向に中央揃え */
                left: 50%; /* コンテンツを水平方向に中央揃え */
                transform: translate(-50%, -50%); /* 中央揃えのための調整 */
                padding: 20px;
                background-color: rgba(255, 255, 255, 0.8); /* 半透明の白背景（必要に応じて有効化） */
                border-radius: 10px;
                color: black;
                max-width: 90%;
                text-align: center;
            }

            h2 {
                font-size: 24px;
                margin-bottom: 10px;
            }

            input[type="text1"] {
                width: 100%; /* 幅はコンテナ全体を使う */
                padding: 15px; /* 内側の余白を大きくする */
                margin-bottom: 20px;
                border-radius: 8px; /* 枠の角を少し丸める */
                border: 2px solid #ccc; /* 枠線を太くする */
                font-size: 18px; /* 文字サイズを大きくする */
            }

            textarea {
                width: 800px; /* 横長に設定 */
                height: 100px; /* 縦の高さは小さくする */
                padding: 15px;
                margin-bottom: 20px;
                border-radius: 8px;
                border: 2px solid #ccc;
                font-size: 18px;
                resize: horizontal; /* 横方向のみリサイズ可能 */
                overflow-x: auto; /* 横にスクロールができるようにする */
                word-wrap: normal; /* 横スクロール時、単語を改行せずに表示 */
            }

            input[type="submit"] {
                position: absolute;
                margin-top: 100px; 
                margin-left: 300px;
                background-color: #00008B; /* ボタンの色を濃い青に */
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

            input[type="submit"]:hover {
                background-color: #000066; /* ボタンのホバー時の色を少し濃く */
            }
        </style>
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Edit') }}
                </h2>
            </x-slot>

            <div class="image-container">
                <img src="{{ asset('images/detail.png') }}" alt="Detail Image"> <!-- 画像を表示 -->
                <div class="content">
                    <form action="/posts/{{ $post->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class='content__title'>
                            <h2>Title</h2>
                            <input type='text1' name='post[title]' value="{{ $post->title }}">
                        </div>
                        <div class='content__body'>
                            <h2>About</h2>
                            <textarea name='post[body]'>{{ $post->body }}</textarea>
                        </div>
                        <input type="submit" value="保存">
                    </form>
                </div>
            </div>
        </x-app-layout>
    </body>
</html>
