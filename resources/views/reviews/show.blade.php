<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
        <div class="content">
            <p class='book_title'>{{ $review->book_title }}</p>
            <p class='point'>{{ $review->point }}</p>
            <p class='point'>著者：{{ $review->book_author }}　出版社：{{$review->publisher }} 値段：{{$review->book_value }}</p>
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
            <a href="/">戻る</a>
        </div>
    </body>
</html>