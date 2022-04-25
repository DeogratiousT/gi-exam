<?php

namespace App\Laratables;

class QuestionsLaratables
{
    public static function laratableQueryConditions($query)
    {
        return $query->orderBy('title');
    }
    
    public static function laratablesCustomAction($question)
    {
        return view('questions.index_action',['question'=>$question])->render();
    }
}