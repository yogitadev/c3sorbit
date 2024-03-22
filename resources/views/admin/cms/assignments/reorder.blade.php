@extends('admin.layouts.layout')

@section('page_title', 'Reorder Assignments')

@section('sub_header')
    @php
    $breadcrumb_arr = [
        'Assignments' => route('subject-list'),
        'Reorder' => '',
    ];
    @endphp
    @include('admin.layouts.sub_header', [
        'title' => 'Reorder Assignments',
        'breadcrumb_arr' => $breadcrumb_arr,
    ])
@endsection

@section('header-menu')
    @include('admin.cms.includes.header_menu')
@endsection

@section('content')
    @include('flash::message')

    <div class="row">
        <div class="col-md-6">
            {!! Form::open([
                'method' => 'GET',
                'class' => 'form w-100 module_form',
                'autocomplete' => 'off',
                'data-parsley-validate' => true,
            ]) !!}
            <div class="card mb-5 mb-xl-5">
                <div class="card-header border-0">
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Choose Assignment Faculty</h3>
                    </div>

                </div>
                <div class="card-body border-top p-9">
                    <label class="form-label required fs-6">Faculty</label>
                    {!! Form::select(
                        'faculty_id',
                        $data['faculty_list'],
                        isset($data['selected_faculty_id']) ? $data['selected_faculty_id'] : null,
                        [
                            'id' => 'parent_faculty_id',
                            'class' => 'form-select',
                            'required' => true,
                            'placeholder' => 'Please select...',
                            'data-parsley-class-handler' => '#error_mode_faculty_id',
                        ],
                    ) !!}
                </div>

                <div id="error_mode_faculty_id"></div>
            </div>

            <div class="card mb-5 mb-xl-5">
                <div class="card-header border-0">
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Choose Assignment Subject</h3>
                    </div>

                </div>
                <div class="card-body border-top p-9">
                    <label class="form-label required fs-6">Subject</label>
                    {!! Form::select(
                        'subject_id',
                        $data['subject_list'],
                        isset($data['selected_subject_id']) ? $data['selected_subject_id'] : null,
                        [
                            'id' => 'parent_subject_id',
                            'class' => 'form-select',
                            'required' => true,
                            'placeholder' => 'Please select subject...',
                            'data-parsley-class-handler' => '#error_mode_subject_id',
                        ],
                    ) !!}
                </div>

                <div id="error_mode_subject_id"></div>


                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="submit" class="btn btn-primary">Select</button>
                </div>
            </div>
            {!! Form::close() !!}

        </div>

        <div class="col-md-6">
            <div class="card mb-5 mb-xl-5">
                <div class="card-header border-0">
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Reorder Assignment</h3>
                    </div>

                    <div class="card-toolbar m-0">
                        <a href="{{ route('assignment-list') }}" class="btn btn-danger"><i class="fas fa-angle-left fs-4 me-2"></i> Go
                            Back</a>
                    </div>
                </div>

                @if (isset($data['assignment_list']) && count($data['assignment_list']) > 0)
                    <div class="card-body border-top p-9 custom_sortable">

                        <ul class="list-group list-group-sortable">
                            @foreach ($data['assignment_list'] as $item)
                                <li id='{{ $item->id }}' class="list-group-item">
                                    <i class="fas fa-bars reorder-icon"></i>{{ $item->assignment_title }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @else
                    <div class="card-body border-top p-9">
                        <h4 class="text-danger text-center">No Assignment Found</h4>
                    </div>
                @endif

                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="submit" class="btn btn-primary" id="btn-update-order" disabled>Update Order</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('page_js')
    <script type="text/javascript" src="{{ asset('themes/admin/third_party/sortable/jquery.sortable.min.js') }}"></script>

    <script type="text/javascript">
        $(function() {
            $items = [];
            $('.list-group-sortable').sortable({
                placeholderClass: 'list-group-item'
            }).bind('sortupdate', function(e, ui) {
                $('#btn-update-order').removeAttr('disabled');
                $.each(e.target.children, function(index, val) {
                    $items.push(val.id);
                })
            });
            $('#btn-update-order').click(function() {
                $.ajax({
                    type: 'POST',
                    url: '{{ route('reorder-assignment') }}',
                    data: {
                        'items': $items,
                        '_token': '{{ csrf_token() }}',
                    },
                    success: function(e) {
                        $items = [];
                        window.location.reload();
                    },
                });
            });

            $(document.body).on("change","#parent_faculty_id",function(){
            //console.log(this.value);
            var faculty_id = this.value;
            $.ajax({
                    type: 'GET',
                    url: '{{ route('assignment-list') }}'+'?faculty=true&faculty_id='+faculty_id,
                    
                    success: function(e) {
                        //console.log(e);

                        $('#parent_subject_id')
                            .find("option").remove().end().append($('<option value = "">Please select Subject</option>'));  
                        $.each(e, function(key, value) {   
                            $('#parent_subject_id')
                                .append($('<option>', { value : key })
                                .text(value)); 
                        });
                    },
                });
        });
        });
    </script>
@endpush
