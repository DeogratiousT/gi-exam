<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $exams = Exam::all();
        return view('index', ['exams'=>$exams]);
    }
}
