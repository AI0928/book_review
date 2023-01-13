<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Http\Requests\ReviewRequest;
use App\Models\Tag;

class ReviewController extends Controller
{
    public function index(Request $reqest)//インポートしたPostをインスタンス化して$postとして使用。
    {
        $keyword = $reqest->input('keyword');
        
        $query = Review::query();
        
        if(!empty($keyword)){
            $query->with('tags')->where('review_title', 'LIKE', "%{$keyword}%")
            ->orWhere('book_title', 'LIKE', "%{$keyword}%")
            ->orWhere('book_author', 'LIKE', "%{$keyword}%")
            ->orderBy('updated_at', 'DESC');
        }
        
        
        $reviews = $query->paginate(15)->withQueryString();

        return view('reviews/index', compact('reviews', 'keyword'));  
       //blade内で使う変数'posts'と設定。'posts'の中身にgetを使い、インスタンス化した$postを代入。
    }
    
    public function show(Review $review)
    {
        return view('reviews/show')->with(['review' => $review]);
    //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
    }
    
    public function create(Tag $tag)
    {
        $suggests = $tag->get();
        return view('reviews/create', compact('suggests'));
    }
    
    public function edit(Review $review, Tag $tag)
    {
        $suggests = $tag->get();
        return view('reviews/edit' , compact('suggests'))->with(['review' => $review]);
    }
    
    public function update(ReviewRequest $request, Review $review)
    {
        $image_path = $request->file('book_image')->store('images', 'public');
        
        $review->book_image = $image_path;
        $input_review = $request['review'];
        $review->fill($input_review)->save();
        
        
        $new_tag = new Tag;
        $tags_array = $new_tag->get()->toArray();
        $review->tags()->detach();
        
        foreach ($request['tags_array'] as $request_tag){
            
            $tag_id = array_search($request_tag, array_column( $tags_array, "title" ));
            //dd( $tag_id);
            if ($tag_id != false){
                //既存のタグのIDだけ送ったパターン。
                
                $review->tags()->attach($tags_array[$tag_id]['id']);
            }
            else {
                $new_tag->title = $request_tag;
                $new_tag->text = $request_tag;
                $new_tag->save();
                $review->tags()->attach($new_tag->id);
            }
        }
        return redirect('/reviews/' . $review->id);
    }
    
    public function store(Request $request, Review $review)
    {
        $image_path = $request->file('book_image')->store('images', 'public');
        $review->book_image = $image_path;
        $review->fill($request['review'])->save();
        
        $new_tag = new Tag;
        $tags_array = $new_tag->get()->toArray();
        
        foreach ($request['tags_array'] as $request_tag){
            
            
            $tag_id = array_search($request_tag, array_column( $tags_array, "title" ));
            //dd(gettype($tag_id));
            if (gettype($tag_id) == "integer"){
                //既存のタグのIDだけ送ったパターン。
                
                $review->tags()->attach($tags_array[$tag_id]['id']);
            }
            else {
                $new_tag->title = $request_tag;
                $new_tag->text = $request_tag;
                $new_tag->save();
                $review->tags()->attach($new_tag->id);
            }
        }
        return redirect('/reviews/' . $review->id);
    }
    
    public function delete(Review $review)
    {
        $review->delete();
        return redirect('/');
    }
}