<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Reviews</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="title">
            {{ $tag->title }}
        </h1>
        <div class="content">
            <p class='text'>{{ $tag->text }}</p>
        </div>
        <div class="footer">
            <a href="/tags/index">タグ一覧に戻る</a>
            <a href="/">レビュー一覧に戻る</a>
        </div>
    </body>
    </x-app-layout>
</html>