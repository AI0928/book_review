<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Reviews</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Review Name</h1>
            <a href='/reviews/create'>create</a>
        <div class='posts'>
            <div class='posts'>
            @foreach ($reviews as $review)
                <div class='review'>
                    <h2 class='title'>
                        <a href="/reviews/{{ $review->id }}">{{ $review->review_title }}</a>
                    </h2>
                    <p class='book_title'>{{ $review->book_title }}</p>
                    <p class='point'>{{ $review->point }}</p>
                </div>
            @endforeach
            </div>
        </div>
    </body>
</html>