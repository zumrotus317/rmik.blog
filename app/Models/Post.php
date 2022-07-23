<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'thumbnail',
        'category_id',
        'is_headline',
        'status',
        'content',
    ];
    
    public static $rules = [
        'title'          => 'required',
        'thumbnail'     => 'required',
        'category_id' => 'required',
        'is_headline'   => 'required',
        'status'        => 'required',
        'content'       => 'required'
    ];
    
    protected $table = "posts";
    
    
    public function category()
    {
        return $this->hasOne(Categories::class, 'id', 'category_id');
    }
}
