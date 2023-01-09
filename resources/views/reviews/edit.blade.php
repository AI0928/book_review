<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Reviews</title>
        <!-- Fonts -->
        
    </head>
    <body>
    <h1 class="title">編集画面</h1>
    <div class="content">
        <form action="/reviews/{{ $review->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="title">
                <h2>ReviewTitle</h2>
                <input type="text" name="review[review_title]" value="{{ $review->review_title }}"/>
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea name="review[review_text]" >{{ $review->review_text }}</textarea>
            </div>
            <div class="book_title">
                <h2>BookTitle</h2>
                <input type="text" name="review[book_title]" value="{{ $review->book_title }}"/>
            </div>
            <div class="book_image">
                <input type="file" name="book_image">
            </div>
            <input id="tags" type="text" />
            <div id="tag_box">
            
            </div>
            <div class="book_author">
                <h2>BookAuthor</h2>
                <input type="text" name="review[book_author]" value="{{ $review->book_author }}"/>
            </div>
            <div class="publisher">
                <h2>Publisher</h2>
                <input type="text" name="review[publisher]" value="{{ $review->publisher }}"/>
            </div>
            <div class="book_value">
                <h2>BookValue</h2>
                <input type="number" name="review[book_value]" value="{{ $review->book_value }}"/>
            </div>
            <div class="book_text">
                <h2>BookText</h2>
                <textarea name="review[book_text]" placeholder="本の大まかな内容">{{ $review->book_text }}</textarea>
            </div>
            <div class="point">
                <h2>Point</h2>
                <input type="number" name="review[point]" avlue="{{ $review->point}}"/>
            </div>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        <script>
            const hand_array = [@json($suggests),@json($review->tags)]
        </script>
    </div>
</body>
</x-app-layout>
</html>