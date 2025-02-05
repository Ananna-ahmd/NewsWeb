<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $table = 'articles';
    protected $guarded = [];
    use HasFactory;
    public function Category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
