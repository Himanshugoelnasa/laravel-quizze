<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionQuizze extends Model
{
    use HasFactory;
    protected $fillable = [
        'quizze_id',
        'question_id',
        'answer',
        'status'
    ];

  
}
