<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $fillable = [
        'title',
        'stock',
        'writer',
        'content',
        'category_id'
    ];

    public function category(){
        return $this->belongsTo(category::class);
    }

    use HasFactory;
}
