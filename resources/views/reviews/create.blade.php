<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Review</title>
    </head>
    <body>
        <h1>ReviewName</h1>
        <form action="/reviews" method="POST">
            @csrf
            <div class="title">
                <h2>ReviewTitle</h2>
                <input type="text" name="review[review_title]" placeholder="タイトル"/>
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea name="review[review_text]" placeholder="今日も1日お疲れさまでした。"></textarea>
            </div>
            <div class="book_title">
                <h2>BookTitle</h2>
                <input type="text" name="review[book_title]" placeholder="タイトル"/>
            </div>
            <div class="book_author">
                <h2>BookAuthor</h2>
                <input type="text" name="review[book_author]" placeholder="著者"/>
            </div>
            <div class="publisher">
                <h2>Publisher</h2>
                <input type="text" name="review[publisher]" placeholder="出版社"/>
            </div>
            <div class="book_value">
                <h2>BookValue</h2>
                <input type="number" name="review[book_value]" />
            </div>
            <div class="book_text">
                <h2>BookText</h2>
                <textarea name="review[book_text]" placeholder="本の大まかな内容"></textarea>
            </div>
            <div class="point">
                <h2>Point</h2>
                <input type="number" name="review[point]" />
            </div>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>