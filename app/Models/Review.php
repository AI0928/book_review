<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Tag;

class Review extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'review_title',
        'review_text',
        'book_title',
        'book_author',
        'book_text',
        'book_value',
        'publisher',
        'point',
        'book_image',
        #'user_id',
        #'user_name',
        
    ];
    
    use HasFactory;
    
    public function getByLimit(int $limit_count = 10)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this::with('tags')->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
    }
    
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }
}

