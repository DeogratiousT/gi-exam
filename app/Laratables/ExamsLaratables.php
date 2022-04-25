<?php

namespace App\Laratables;

class ExamsLaratables
{
    public static function laratableQueryConditions($query)
    {
        return $query->orderBy('subject');
    }
    
    public static function laratablesCustomAction($exam)
    {
        return view('exams.index_action',['exam'=>$exam])->render();
    }
}