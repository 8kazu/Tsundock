<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- フォント -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Posts') }} <!-- ヘッダー名を必要に応じて変更 -->
                </h2>
            </x-slot>

            <div class="content">
                <h1 class="title">
                    {{ $post->title }}
                </h1>
                <div class="content__post">
                    <h3>本文</h3>
                    <p>{{ $post->body }}</p>
                </div>
                <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                <div class="edit">
                    <a href="/posts/{{ $post->id }}/edit">Edit</a>
                </div>
            </div>

            <div class="footer">
                <a href="/">戻る</a>
            </div>
        </x-app-layout>
    </body>
</html>

