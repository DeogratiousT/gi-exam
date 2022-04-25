<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;
use App\Laratables\ExamsLaratables;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Support\Facades\Validator;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return Laratables::recordsOf(Exam::class, ExamsLaratables::class);
        }
        
        return view('exams.index');
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
            'subject' => 'required|string',
            'lecturer' => 'required|string',
            'date' => 'required'
        ]);
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $validated = $validator->safe();

        try {
            Exam::create([
                'subject' => $validated['subject'],
                'lecturer' => $validated['lecturer'],
                'date' => $validated['date']
            ]);
    
            $request->session()->flash('success', 'Exam Created Successfully');
    
            return response()->json(['success' => true]);
        } catch (\Throwable $th) {
            $request->session()->flash('error', "Create Failed. Please try again later");

            abort(500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $exam = Exam::find($id);
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
            Exam::create([
                'subject' => $validated['subject'],
                'lecturer' => $validated['lecturer'],
                'date' => $validated['date']
            ]);
    
            $request->session()->flash('success', 'Exam Updated Successfully');
    
            return response()->json(['success' => true]);
        } catch (\Throwable $th) {
            $request->session()->flash('error', "Update Failed. Please try again later");

            abort(500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exam = Exam::find($id);
        $exam->delete();

        return redirect()->route('exams.index')->with('success','Exam Deleted Successfully');
    }
}
