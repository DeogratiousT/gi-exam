<button class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#edit-exam-{{ $exam->id }}-modal">
    <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
    <span class="svg-icon svg-icon-muted svg-icon-2hx">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
        <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z" fill="black"/>
        <path d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z" fill="black"/>
        <path d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z" fill="black"/>
        </svg>
    </span>
    <!--end::Svg Icon-->
</button>

<button class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm me-1" data-bs-toggle="modal" data-bs-target="#delete-exam-{{ $exam->id }}-modal">
    <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen027.svg-->
    <span class="svg-icon svg-icon-danger svg-icon-2hx">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
        <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black"/>
        <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black"/>
        <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black"/>
        </svg>
    </span>
    <!--end::Svg Icon-->
</button>

<!--start:: Edit Modal -->
<div class="modal fade" id="edit-exam-{{ $exam->id }}-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Exam</h4>

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
                <form action="" method="">
                    @csrf

                    <div class="col-12">
                        <div class="form-group mb-4">
                            <label class="form-label" for="subject_{{ $exam->id }}">Subject</label>
                            <input type="text" name="subject_{{ $exam->id }}" id="subject_{{ $exam->id }}" class="form-control" value="{{ $exam->subject }}"/>
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label" for="lecturer_{{ $exam->id }}">Lecturer</label>
                            <input type="text" name="lecturer_{{ $exam->id }}" id="lecturer_{{ $exam->id }}" class="form-control" value="{{ $exam->lecturer }}"/>
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label" for="date_{{ $exam->id }}">Date</label>
                            <input type="datetime-local" name="date_{{ $exam->id }}" id="date_{{ $exam->id }}" class="form-control"/>
                        </div>

                        <button type="submit" class="btn btn-primary" onclick="editExam(this , {{ $exam->id }})">
                            <span class="indicator-label">Continue</span>
                        </button>
                    </div> 
                </form>
            </div>
        </div>
    </div>
</div>
<!--end:: Create Modal -->

<!--start:: Delete Modal -->
<div class="modal fade" tabindex="-1" id="delete-exam-{{ $exam->id }}-modal" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete {{ $exam->subject }}</h4>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-danger ms-2" data-bs-dismiss="modal" aria-label="Close">
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
                <form action="{{ route('exams.destroy', $exam) }}" method="POST" id="delete-exam-{{ $exam->id }}-form">
                    @csrf
                    @method('DELETE')

                    <p>Deleting this exam deletes all is related Quetions</p>

                    <button type="submit" class="btn btn-danger" onclick="deleteExam(this)">
                        <span class="indicator-label">Continue</span>
                    </button>
                    </div> 
                </form>
            </div>
        </div>
    </div>
</div>
<!--end:: Delete Modal -->

<script>
    function deleteExam(obj){
        event.preventDefault();

        obj.parentNode.submit();
    }

    function editExam(obj, exam){
        event.preventDefault();
        let requestBody = {
            _method: 'PUT',
            subject : document.getElementById('subject_' + exam).value,
            lecturer : document.getElementById('lecturer_' + exam).value,
            date : document.getElementById('date_' + exam).value,
        }

        let url = '{{ route("exams.update", ":exam") }}';
        url = url.replace(':exam', exam);

        axios.post(url, requestBody)
        .then((response) => {
        if (response.data.success) {
            window.location.replace("{{ route('exams.index') }}");
            
        }else if(response.data.errors){
            
            document.getElementById('create-errors').innerHTML = response.data.errors;               

            let editExamModal = document.getElementById('edit-exam-' + exam + '-modal');
            let modal = bootstrap.Modal.getInstance(editExamModal);
            modal.show();
            }
        })
        .catch((error) => {
            window.location.replace("{{ route('exams.index') }}");
        });
    }

</script>