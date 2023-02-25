<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author_Book_Join_Table extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'author_id',
    ];

    public function author()
    {
        return $this->belongsToMany(author::class);
    }

    public function book()
    {
        return $this->belongsToMany(book::class);
    }
}
