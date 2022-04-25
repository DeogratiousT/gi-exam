<?php

namespace App\Models;

use App\Models\Exam;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'option_1', 'option_2', 'option_3', 'option_4', 'exam_id', 'category'];

    /**
     * Exam Relationship
     * @return belongsTo
     */
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}
