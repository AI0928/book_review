<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
    <head>
        <meta charset="utf-8">
        <title>Review</title>
    </head>
    <body>
        <h1>TagName</h1>
        <form action="/tags"  method="POST" enctype="multipart/form-data">
            @csrf
            <div class="title">
                <h2>Name</h2>
                <input type="text" name="tag[title]" placeholder="TagName"/>
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea name="tag[text]"></textarea>
            </div>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/tags/index">戻る</a>
        </div>
    </body>
    </x-app-layout>
</html>