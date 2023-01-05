<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Reviews</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Tag Name</h1>
        <div class='create'>
            <a href='/tags/create'>create</a>
        </div>
        <div class='tags'>
            <div class='tags'>
            @foreach ($tags as $tag)
                <div class='tag'>
                    <h2 class='title'>
                        <a href="/tags/{{ $tag->id }}">{{ $tag->title }}</a>
                    </h2>
                    <p class='text'>{{ $tag->title }}</p>
                </div>
            @endforeach
            </div>
        </div>
        <div class="footer">
            <a href="/">レビュー一覧に戻る</a>
        </div>
    </body>
</html>