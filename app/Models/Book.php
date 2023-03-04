<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $fillable = [
        'title',
        'stock',
        'content',
        'category_id',
        'bookImg'
    ];

    public function category(){
        return $this->belongsTo(category::class);
    }

    public function AuthorJoinTable()
    {
        return $this->hasMany(Author_Book_Join_Table::class);
    }

    use HasFactory;
}
