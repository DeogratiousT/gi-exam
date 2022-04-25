@extends('layouts.app')

@section('title', 'Gratitude India')

@section('content')
<div class="accordion" id="accordionExample">
    @foreach ($exams as $exam)
        <div class="accordion-item">
        <h2 class="accordion-header" id="{{ $exam->id }}">
            <button class="accordion-button @if(!$loop->first) collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $exam->id }}" aria-expanded="@if($loop->first) true @else false @endif" aria-controls="collapse-{{ $exam->id }}">
            {{ $exam->subject }}
            </button>
        </h2>
        <div id="collapse-{{ $exam->id }}" class="accordion-collapse collapse @if($loop->first) show @endif" aria-labelledby="{{ $exam->id }}" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <h3>{{ $exam->subject }} Exam</h3>
                <h5>Prepared by {{ $exam->lecturer }}</h5>
                <h5>Scheduled to be taken on  {{ $exam->date->diffForHumans() }}</h5>

                <h6>Technical Questions</h6>
                @foreach ($exam->questions as $question)
                    @if ($question->category == 'technical')
                        <div class="card m-4">
                            <label for="{{ $question->id }}">{{ $question->title }}</label>
                            <select name="{{ $question->id }}" id="{{ $question->id }}">
                                <option value="{{ $question->option_1 }}">{{ $question->option_1 }}</option>
                                <option value="{{ $question->option_2 }}">{{ $question->option_2 }}</option>
                                <option value="{{ $question->option_3 }}">{{ $question->option_3 }}</option>
                                <option value="{{ $question->option_4 }}">{{ $question->option_4 }}</option>
                            </select>
                        </div>                        
                    @endif
                @endforeach

                <h6>Logical Questions</h6>
                @foreach ($exam->questions as $question)
                    @if ($question->category == 'logical')
                        <div class="card m-4">
                            <label for="{{ $question->id }}">{{ $question->title }}</label>
                            <select name="{{ $question->id }}" id="{{ $question->id }}">
                                <option value="{{ $question->option_1 }}">{{ $question->option_1 }}</option>
                                <option value="{{ $question->option_2 }}">{{ $question->option_2 }}</option>
                                <option value="{{ $question->option_3 }}">{{ $question->option_3 }}</option>
                                <option value="{{ $question->option_4 }}">{{ $question->option_4 }}</option>
                            </select>
                        </div>                        
                    @endif
                @endforeach

                <h6>Aptitude Questions</h6>
                @foreach ($exam->questions as $question)
                    @if ($question->category == 'aptitude')
                        
                        <div class="card m-4">
                            <label for="{{ $question->id }}">{{ $question->title }}</label>
                            <select name="{{ $question->id }}" id="{{ $question->id }}">
                                <option value="{{ $question->option_1 }}">{{ $question->option_1 }}</option>
                                <option value="{{ $question->option_2 }}">{{ $question->option_2 }}</option>
                                <option value="{{ $question->option_3 }}">{{ $question->option_3 }}</option>
                                <option value="{{ $question->option_4 }}">{{ $question->option_4 }}</option>
                            </select>
                        </div>                        
                    @endif
                @endforeach
            </div>
        </div>
        </div>
    @endforeach
  </div>
@endsection