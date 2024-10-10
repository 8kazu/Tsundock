<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>New "Tsundock"</title>
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
                background-color: rgba(255, 255, 255, 0.8); /* 半透明の白背景 */
                border-radius: 10px;
                color: black;
                max-width: 90%;
                text-align: center;
            }

            h2 {
                font-size: 24px;
                margin-bottom: 10px;
            }

            input[type="text"] {
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

            select {
                width: 100%;
                padding: 15px;
                margin-bottom: 20px;
                border-radius: 8px;
                border: 2px solid #ccc;
                font-size: 18px;
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

            .back a {
                color: blue;
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('New "Tsundock"') }}
                </h2>
            </x-slot>

            <div class="image-container">
                <img src="{{ asset('images/detail.png') }}" alt="Detail Image"> <!-- 画像を表示 -->
                <div class="content">
                    <form action="/posts" method="POST">
                        @csrf
                        <div class="title">
                            <h2>Title</h2>
                            <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/>
                            <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
                        </div>
                        <div class="category">
                            <h2>Category</h2>
                            <select name="post[category_id]">
                                <option value="">カテゴリーを選択</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <p class="category__error" style="color:red">{{ $errors->first('post.category_id') }}</p>
                        </div>
                        <div class="body">
                            <h2>About</h2>
                            <textarea name="post[body]" placeholder="ex.)表示のイラストがとても魅力的。">{{ old('post.body') }}</textarea>
                            <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
                        </div>
                        
                        <input type="submit" value="Tsundock"/>
                    </form>
                    <div class="back">[<a href="/">戻る</a>]</div>
                </div>
            </div>
        </x-app-layout>
    </body>
</html>
