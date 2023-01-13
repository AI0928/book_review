<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
    <head>
        <meta charset="utf-8">
        <title>Reviews</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container g-2">
            <h1>レビュー一覧</h1>
            <div>
                <form action="{{ route('index') }}" method="GET" class="form-row">
                    <div class="col-10">
                        @if(empty($keyword))
                            @php
                                $keyword = '';
                            @endphp
                        @endif
                        <input class="form-control" type="text" name="keyword" value="{{ $keyword }}">
                    </div>
                    <div class="col-2">
                        <input class="btn btn-primary" type="submit" value="検索">
                    </div>
                </form>
            </div>
        
            <div class='create'>
                <a class="btn btn-link" href='/reviews/create'>レビュー作成</a>
            </div>
        
            @foreach ($reviews as $review)
                <div class="p-3 border bg-light">
                    <div class="card">
                        <div class="card-body">
                            <a class="card-link" href="/reviews/{{ $review->id }}">
                                <h2 class="card-title">{{ $review->review_title }}</h2>
                            </a>
                            <h3 class="card-subtitle mb-2 text-muted">{{ $review->book_title }}</h3>
                            <ul class="list-inline">
                            @foreach($review->tags as $tag)
                                <li class="list-inline-item">
                                    <a class="card-link" href="/tags/{{ $tag->id }}">{{ $tag->title }}</a>
                                </li>
                            @endforeach
                            </ul>
                           <p class="card-text">おすすめ度:{{ $review->point }}</p>
                       </div>
                    </div>
                </div>
            @endforeach
        </div>
    </body>
    </x-app-layout>
</html>