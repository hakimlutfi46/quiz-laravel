<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'quiz_id', 'question', 'answer_a', 'answer_b', 'answer_c', 'answer_d', 'correct'
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}
