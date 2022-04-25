@extends('layouts.app')

@section('title', 'Gratitude India Questions')

@section('page-imports')
    <link href="{{ asset('assests/datatables/datatables.bundle.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <button  class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#create-question-modal">
        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
        <span class="svg-icon svg-icon-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
            </svg>
        </span>
        <!--end::Svg Icon-->New Question
    </button>

    <div class="card">
        <div class="card-body">
            <table id="questions-laratable" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                <thead>
                    <tr class="fw-bolder fs-6 text-gray-800 px-7">
                        <th>Title</th>
                        <th>Exam</th>
                        <th>Category</th>
                        <th>Option 1</th>
                        <th>Option 2</th>
                        <th>Option 3</th>
                        <th>Option 4</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div> <!-- end card-body -->
    </div> <!-- end card -->

    <!--start:: Create Modal -->
    <div class="modal fade" tabindex="-1" id="create-question-modal" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create Question</h4>
    
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <!--begin::Svg Icon | path: assets/media/icons/duotune/abstract/abs012.svg-->
                        <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.3" d="M6.7 19.4L5.3 18C4.9 17.6 4.9 17 5.3 16.6L16.6 5.3C17 4.9 17.6 4.9 18 5.3L19.4 6.7C19.8 7.1 19.8 7.7 19.4 8.1L8.1 19.4C7.8 19.8 7.1 19.8 6.7 19.4Z" fill="black"/>
                            <path d="M19.5 18L18.1 19.4C17.7 19.8 17.1 19.8 16.7 19.4L5.40001 8.1C5.00001 7.7 5.00001 7.1 5.40001 6.7L6.80001 5.3C7.20001 4.9 7.80001 4.9 8.20001 5.3L19.5 16.6C19.9 16.9 19.9 17.6 19.5 18Z" fill="black"/>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
    
                <div class="modal-body row">
                    <form action="{{ route('questions.store') }}" method="post">
                        @csrf
                        <p id="create-error" class="text-danger"></p>
                        <div class="col-12">

                            <div class="form-group mb-4">
                                <label class="form-label" for="exam_id">Exam</label>
                                <select name="exam_id" id="exam_id" class="form-control">
                                    @foreach ($exams as $exam)
                                        <option value="{{ $exam->id }}">{{ $exam->subject }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-4">
                                <label class="form-label" for="category">Category</label>
                                <select name="category" id="category" class="form-control">
                                    <option value="technical">technical</option>                                    
                                    <option value="aptitude">aptitude</option>                                    
                                    <option value="logical">logical</option>                                    
                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-label" for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}"/>
                            </div>

                            <div class="form-group mb-4">
                                <label class="form-label" for="option_1">Option 1</label>
                                <input type="text" name="option_1" id="option_1" class="form-control" value="{{ old('option_1') }}"/>
                            </div>

                            <div class="form-group mb-4">
                                <label class="form-label" for="option_2">Option 2</label>
                                <input type="text" name="option_2" id="option_2" class="form-control" value="{{ old('option_1') }}"/>
                            </div>

                            <div class="form-group mb-4">
                                <label class="form-label" for="option_1">Option 3</label>
                                <input type="text" name="option_3" id="option_3" class="form-control" value="{{ old('option_3') }}"/>
                            </div>

                            <div class="form-group mb-4">
                                <label class="form-label" for="option_1">Option 4</label>
                                <input type="text" name="option_4" id="option_4" class="form-control" value="{{ old('option_4') }}"/>
                            </div>

                            <button type="submit" id="exams_submit" class="btn btn-primary">
                                <span class="indicator-label">Continue</span>
                            </button>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end:: Create Modal -->
@endsection

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('assests/datatables/datatables.bundle.js') }}"></script>
    <script>
        $(document).ready(function(){
            $("#questions-laratable").DataTable({
                serverSide: true,
                ajax: "{{ route('questions.index') }}",
                columns: [                
                        { name: 'title' },
                        { name: 'exam.subject' , orderable: false },
                        { name: 'category' },
                        { name: 'option_1' },
                        { name: 'option_2' },
                        { name: 'option_3' },
                        { name: 'option_4' },
                        { name: 'action' , orderable: false, searchable: false }
                ],
                "language": {
                "lengthMenu": "Show _MENU_",
                },
                "dom":
                "<'row'" +
                "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
                "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
                ">" +

                "<'table-responsive'tr>" +

                "<'row'" +
                "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                ">"
            });
        });

    </script>

    <script>
        let subButton = document.getElementById('exams_submit');

        subButton.addEventListener('click', 
        (event) => {
            event.preventDefault();

            let sexam = document.getElementById('exam_id');
            let scategory = document.getElementById('category');

            let requestBody = {
                exam_id : sexam.options[sexam.selectedIndex].value,
                category : scategory.options[scategory.selectedIndex].value,
                title : document.getElementById('title').value,
                option_1 : document.getElementById('option_1').value,
                option_2 : document.getElementById('option_3').value,
                option_3 : document.getElementById('option_3').value,
                option_4 : document.getElementById('option_4').value
            }

            axios.post("{{ route('questions.store') }}", requestBody)
            .then((response) => {
                console.log(response.data);
                if (response.data.success) {
                    window.location.replace("{{ route('questions.index') }}");
                    
                }else if(response.data.errors){                    
                    document.getElementById('create-errors').innerHTML = response.data.errors;               
                    
                    let createExamModal = document.getElementById('create-question-modal');
                    let modal = bootstrap.Modal.getInstance(createExamModal);
                    modal.show();
                }
            })
            .catch((error) => {
                window.location.replace("{{ route('questions.index') }}");
            })
        });
    </script>
@endpush