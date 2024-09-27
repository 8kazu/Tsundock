<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <body>
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('編集画面') }} <!-- ヘッダー名を必要に応じて変更 -->
                </h2>
            </x-slot>

            <div class="content">
                <form action="/posts/{{ $post->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class='content__title'>
                        <h2>タイトル</h2>
                        <input type='text' name='post[title]' value="{{ $post->title }}">
                    </div>
                    <div class='content__body'>
                        <h2>本文</h2>
                        <input type='text' name='post[body]' value="{{ $post->body }}">
                    </div>
                    <input type="submit" value="保存">
                </form>
            </div>
        </x-app-layout>
    </body>
</html>

