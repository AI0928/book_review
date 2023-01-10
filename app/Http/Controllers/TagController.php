<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function show(Tag $tag)
    {
        return view('tags/show')->with(['tag' => $tag]);
    //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
    }
    
    public function index(Tag $tag)//インポートしたPostをインスタンス化して$postとして使用。
    {
        return view('tags/index')->with(['reviews' => $tag->getByTags()]);  
       //blade内で使う変数'posts'と設定。'posts'の中身にgetを使い、インスタンス化した$postを代入。
    }
    
    public function create()
    {
       return view('tags/create');
    }
    
    public function store(Request $request, Tag $tag)
    {
        $tag->fill($request['tag'])->save();
        return redirect('/tags/' . $tag->id);
    }
}
