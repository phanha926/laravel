<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;
    protected $table = 'tbl_music';
    protected $fillable = [
        'title',
        'description',
        'location'
    ];
    
}
