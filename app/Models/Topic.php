<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'text',
        'text',
        'sub_category_id',
        'user_id',
    ];


    public function comments()
    {
        return $this->hasMany(Comment::class, 'topic_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
