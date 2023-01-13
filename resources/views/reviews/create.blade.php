<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <meta charset="utf-8"/>
        <title>Review</title>
    </head>
    <body>
        <div class="container">
            <h1>レビュー作成</h1>
    
            <form action="/reviews"  method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="review_title">レビュータイトル</label>
                    <input id="review_title" type="text" class="form-control" name="review[review_title]" placeholder="タイトル"/>
                </div>
                
                <div class="form-group">
                    <label for="review_text">おすすめ内容</label>
                    <textarea class="form-control" name="review[review_text]"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="book_title">本のタイトル</label>
                    <input id ="book_title" class="form-control" type="text" name="review[book_title]" placeholder="タイトル"/>
                </div>
                
                <div class="form-group">
                    <label for="book_image">本の写真</label>
                    <input id="book_image" class="form-control-file" type="file" name="book_image" multiple>
                </div>
                
                <div class="form-group">
                    <label for="tags">追加するタグ</label>
                    <input id="tags" class="form-control" type="text" />
                </div>
                
                <div class="form-group">
                    <div id="tag_box">
                    
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="book_author">著者名</label>
                        <input id = "book_author" type="text" class="form-control" name="review[book_author]" placeholder="著者"/>
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label for="publisher">出版社</label>
                        <input id="publisher" type="text" class="form-control" name="review[publisher]" placeholder="出版社"/>
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label for="book_value">本の値段</label>
                        <input id="book_value" type="number" class="form-control" name="review[book_value]" />
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="book_text">本の内容</label>
                    <textarea id="book_text" class="form-control" name="review[book_text]" placeholder="本の大まかな内容"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="point">おすすめ度</label>
                    <input id="point" class="form-control" type="number" name="review[point]" />
                </div>
                
                <div class="row justify-content-between">
                    <div class="col-2">
                        <input class="btn btn-primary" type="submit" value="store"/>
                    </div>
                    <div class="col-2">
                        <a class="btn btn-link" href="/">戻る</a>
                    </div>
                </div>
                
                <input type="hidden" id="user_id" name="review[user_id]" value="{{ Auth::user()->id }}" />
                <input type="hidden" id="user_name" name="review[user_name]" value="{{ Auth::user()->name }}" />
            </form>
        </div>
        <script>
            const hand_array = [@json($suggests)];
        </script>
    </body>
    </x-app-layout>
</html>