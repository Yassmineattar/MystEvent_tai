<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'question', 
        'choice_1', 
        'choice_2', 
        'choice_3', 
        'correct_answer',
    ];
}
