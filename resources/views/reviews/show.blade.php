<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Reviews</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-between">
                <div class="col">
                    <h1>{{ $review->review_title }}</h1>
                </div>
                <div class="col">
                    <p>作成者:{{ $review->user_name }}</p>    
                </div>
            </div>
            
            <ul class="list-inline">
                @foreach($review->tags as $tag)
                    <li class="list-inline-item">
                        <a class="card-link" href="/tags/{{ $tag->id }}">{{ $tag->title }}</a>
                    </li>
                @endforeach
            </ul>
            
            
            <p>本のタイトル:{{ $review->book_title }}</p>
            <p>おすすめ度:{{ $review->point }}</p>
            
            <td><img src="{{ asset('storage/'.$review->book_image) }}"></td>
            
            <div class="row">
                <div class="col-3">
                    <p>著者：{{ $review->book_author }}</p>
                </div>
                <div class="col-3">
                    <p>出版社：{{$review->publisher }}</p>
                </div>
                <div class="col-3">
                    <p>値段：{{$review->book_value }}</p>
                </div>
            </div>
            
            <div class="review_text">
                <p>おすすめ内容</p>
                <p>{{ $review->review_text }}</p> 
            </div>
            <div class="book_text">
                <p>本の内容</p>
                <p>{{ $review->book_text }}</p> 
            </div>
            <div class="footer">
                
                <a href="/">戻る</a>
                @if ($review->user_id === Auth::user()->id)
                    <div class="edit">
                        <a class="btn btn-link" href="/reviews/{{ $review->id }}/edit">edit</a>
                    </div>
                    <form action="/reviews/{{ $review->id }}" id="form_{{ $review->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deleteReview({{ $review->id }})">delete</button> 
                    </form>
                @endif
            </div>
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