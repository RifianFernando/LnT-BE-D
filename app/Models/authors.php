<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class authors extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'birth_of_date'
    ];

    public function BookJoinTable()
    {
        return $this->hasMany(Author_Book_Join_Table::class);
    }
}
