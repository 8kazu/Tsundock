<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('新しい投稿を作成') }} <!-- ヘッダー名を必要に応じて変更 -->
                </h2>
            </x-slot>

            <h1>Blog Name</h1>
            <form action="/posts" method="POST">
                @csrf
                <div class="title">
                    <h2>タイトル</h2>
                    <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/>
                    <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
                </div>
                <div class="body">
                    <h2>本文</h2>
                    <textarea name="post[body]" placeholder="今日も1日お疲れさまでした。">{{ old('post.body') }}</textarea>
                    <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
                </div>
                <div class="category">
                    <h2>カテゴリー</h2>
                    <select name="post[category_id]">
                        <option value="">カテゴリーを選択（任意）</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <p class="category__error" style="color:red">{{ $errors->first('post.category_id') }}</p>
                </div>
                <input type="submit" value="保存"/>
            </form>
            <div class="back">[<a href="/">戻る</a>]</div>
        </x-app-layout>
    </body>
</html>

