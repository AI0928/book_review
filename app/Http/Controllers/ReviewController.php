<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Tag;

class ReviewController extends Controller
{
    public function index(Review $review)//インポートしたPostをインスタンス化して$postとして使用。
    {
        return view('reviews/index')->with(['reviews' => $review->getByLimit()]);  
       //blade内で使う変数'posts'と設定。'posts'の中身にgetを使い、インスタンス化した$postを代入。
    }
    
    public function show(Review $review)
    {
        return view('reviews/show')->with(['review' => $review]);
    //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
    }
    
    public function create(Tag $tag)
    {
        $suggests = $tag->select(['title'])->get();
        return view('reviews/create', compact('suggests'));
    }
    
    public function store(Request $request, Review $review)
    {
        #$input = $request['review'];
        $image_path = $request->file('book_image')->store('images', 'public');
        #$image_path = $request->file('book_image')->store('public/images');
        #$review->fill($input)->save();
        $review->book_image = $image_path;
        $review->fill($request['review'])->save();
        return redirect('/reviews/' . $review->id);
    }
}
