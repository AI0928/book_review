<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Review;

class Tag extends Model
{
    use HasFactory;
    
    
    protected $fillable = [
        'title',
        'text',
    ];
    
    public function getByLimit(int $limit_count = 10)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
    }
    
    public function getByTags(int $limit_count = 10)
    {
        return $this->reviews()->with('tags')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    public function reviews()
    {
        return $this->belongsToMany('App\Models\Review');
    }
}
