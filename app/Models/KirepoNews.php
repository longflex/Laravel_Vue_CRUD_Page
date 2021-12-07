<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KirepoNews extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 
        'content',
        'is_published', 
        'created_at',
        'updated_at',
    ]; 
}
