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
            {{ $review->review_title }}
        </h1>
        <p>{{ $review->user_name }}</p>
        @foreach($review->tags as $tag)
            <p>{{ $tag->title }}</p>
        @endforeach
        <div class="content">
            <p class='book_title'>{{ $review->book_title }}</p>
            <p class='point'>{{ $review->point }}</p>
            <p>著者：{{ $review->book_author }}　出版社：{{$review->publisher }} 値段：{{$review->book_value }}</p>
            <td><img src="{{ asset('storage/'.$review->book_image) }}"></td>
            <div class="review_text">
                <h3>おすすめ内容</h3>
                <p>{{ $review->review_text }}</p> 
            </div>
            <div class="book_text">
                <h3>本の内容</h3>
                <p>{{ $review->book_text }}</p> 
            </div>
        </div>
        <div class="footer">
            <div class="edit"><a href="/reviews/{{ $review->id }}/edit">edit</a></div>
            <a href="/">戻る</a>
            <form action="/reviews/{{ $review->id }}" id="form_{{ $review->id }}" method="post">
            @csrf
            @method('DELETE')
            <button type="button" onclick="deleteReview({{ $review->id }})">delete</button> 
            </form>
        </div>
        <script>
        function deleteReview(id) {
            'use strict'

            if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                document.getElementById(`form_${id}`).submit();
            }
        }
        </script>
    </body>
    </x-app-layout>
</html>