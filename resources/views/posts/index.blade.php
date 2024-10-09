<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- フォント -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Blog Name') }} <!-- ヘッダー名を必要に応じて変更 -->
                </h2>
		<div class="user-info">
                    <!-- ユーザー名を表示 -->
                    <span>Welcome, {{ Auth::user()->name }}</span>
                </div>
            </x-slot>

            <a href='/posts/create'>Create New Post</a>

            <div class='posts'>
                @foreach ($posts as $post)
                    <div class='post'>
                        <h2 class='title'>
                            <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                        </h2>
                        <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                        <p class='body'>{{ $post->body }}</p>
                        <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="deletePost({{ $post->id }})">delete</button>
                        </form>
                    </div>
                @endforeach
            </div>
	
	{{-- 
	    <h2>タグ一覧</h2>
            <div>
                @foreach ($tags as $tag)
                    <div>
                	<a href="https://teratail.com/tags/{{ $tag['id'] }}">
                    		{{ $tag['name'] }}
               	 	</a>
            	    </div>
                @endforeach
            </div>
	--}}

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