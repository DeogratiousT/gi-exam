<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Laratables\QuestionsLaratables;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return Laratables::recordsOf(Question::class, QuestionsLaratables::class);
        }
        
        return view('questions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'exam_id' => 'required|exists:exams,id',
            'option_1' => 'required',
            'option_2' => 'required',
            'option_3' => 'required',
            'option_4' => 'required',
            'category' => 'required',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $validated = $validator->safe();

        Log:info($validated);

        try {
            Question::create([
                'title' => $validated['title'],
                'exam_id' => $validated['exam_id'],
                'option_1' => $validated['option_1'],
                'option_2' => $validated['option_2'],
                'option_3' => $validated['option_3'],
                'option_4' => $validated['option_4'],
                'category' => $validated['category'],
            ]);
    
            $request->session()->flash('success', 'Question Created Successfully');
    
            return response()->json(['success' => true]);
        } catch (\Throwable $th) {
            $request->session()->flash('error', "Create Failed. Please try again later");

            abort(500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $questions = Question::find($id);
        $validator = Validator::make($request->all(), [
            'subject' => 'required|string',
            'lecturer' => 'required|string',
            'date' => 'required'
        ]);
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $validated = $validator->safe();

        try {
            Question::create([
                'subject' => $validated['subject'],
                'lecturer' => $validated['lecturer'],
                'date' => $validated['date']
            ]);
    
            $request->session()->flash('success', 'Question Updated Successfully');
    
            return response()->json(['success' => true]);
        } catch (\Throwable $th) {
            $request->session()->flash('error', "Update Failed. Please try again later");

            abort(500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $questions
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $questions = Question::find($id);
        $questions->delete();

        return redirect()->route('questions.index')->with('success','Question Deleted Successfully');
    }
}
