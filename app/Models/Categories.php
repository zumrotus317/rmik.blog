<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $table = "categories";
    public static $rules = [
        'name' => 'required',
        'image' => 'required',
    ];
    protected $fillable = [
        'name',
        'image',
    ];
}
