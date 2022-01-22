<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','en_name','parent_id'
    ];

    public function child()
    {
        return $this->hasMany(Category::class,'parent_id','id');
    }

    public function posts()
    {
     return $this->hasMany(Post::class);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class);
    }
}
