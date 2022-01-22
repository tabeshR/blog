<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','email','comment','commentable_type',
        'commentable_id','approved','en_name','en_comment','lang'
    ];

    public function commentable()
    {
        return $this->morphTo();
    }
}
