<?php

namespace App\Models;

use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = ['subject', 'lecturer', 'date'];

    protected $casts = [
        'date' => 'datetime'
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
