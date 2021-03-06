<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'photo_path'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function topics()
    {
        return $this->hasMany(Topic::class, 'sub_category_id');
    }
}
