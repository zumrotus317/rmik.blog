<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'image',
        'category_id',
        'order',
        'status',
        'url'
    ];
    protected $table = "sliders";

    public static $rules = [
        'title'         => 'required',
        'image'         => 'required',
        'category_id' => 'required',
        'order'         => 'required',
        'status'        => 'required',
        'url'           => 'required'
    ];

    public function category()
    {
    return $this->hasOne(Categories::class, 'id', 'category_id');
    }
    
}
