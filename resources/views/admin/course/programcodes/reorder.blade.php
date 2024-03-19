@extends('admin.layouts.layout')

@section('page_title', 'Reorder Programcodes')

@section('sub_header')
    @php
        $breadcrumb_arr = [
            'Programcodes' => route('programcode-list'),
            'Reorder' => '',
        ];
    @endphp
    @include('admin.layouts.sub_header', [
        'title' => 'Reorder Programcode',
        'breadcrumb_arr' => $breadcrumb_arr,
    ])
@endsection

@section('header-menu')
    @include('admin.course.includes.header_menu')
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
                        <h3 class="fw-bolder m-0">Choose Programcode Institution</h3>
                    </div>

                </div>
                <div class="card-body border-top p-9">
                    <label class="form-label required fs-6">Institution</label>
                    {!! Form::select(
                        'institution_id',
                        $data['institution_list'],
                        isset($data['selected_institution_id']) ? $data['selected_institution_id'] : null,
                        [
                            'id' => 'parent_institution_id',
                            'class' => 'form-select',
                            'required' => true,
                            'placeholder' => 'Please select...',
                            'data-parsley-class-handler' => '#error_mode_institution_id',
                        ],
                    ) !!}
                </div>

                <div id="error_mode_institution_id"></div>
            </div>

            <div class="card mb-5 mb-xl-5">
                <div class="card-header border-0">
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Choose Programcode Campus</h3>
                    </div>

                </div>
                <div class="card-body border-top p-9">
                    <label class="form-label required fs-6">Campus</label>
                    {!! Form::select(
                        'campus_id',
                        $data['campus_list'],
                        isset($data['selected_campus_id']) ? $data['selected_campus_id'] : null,
                        [
                            'id' => 'parent_campus_id',
                            'class' => 'form-select',
                            'required' => true,
                            'placeholder' => 'Please select campus...',
                            'data-parsley-class-handler' => '#error_mode_campus_id',
                        ],
                    ) !!}
                </div>

                <div id="error_mode_campus_id"></div>


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
                        <h3 class="fw-bolder m-0">Reorder Programcode</h3>
                    </div>

                    <div class="card-toolbar m-0">
                        <a href="{{ route('programcode-list') }}" class="btn btn-danger"><i class="fas fa-angle-left fs-4 me-2"></i> Go
                            Back</a>
                    </div>
                </div>

                @if (isset($data['program_code_list']) && count($data['program_code_list']) > 0)
                    <div class="card-body border-top p-9 custom_sortable">

                        <ul class="list-group list-group-sortable">
                            @foreach ($data['program_code_list'] as $item)
                                <li id='{{ $item->id }}' class="list-group-item">
                                    <i class="fas fa-bars reorder-icon"></i>{{ $item->program_name }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @else
                    <div class="card-body border-top p-9">
                        <h4 class="text-danger text-center">No Campus Found</h4>
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
                    url: '{{ route('reorder-programcode') }}',
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

            $(document.body).on("change","#parent_institution_id",function(){
            //console.log(this.value);
            var insti_id = this.value;
            $.ajax({
                    type: 'GET',
                    url: '{{ route('programcode-list') }}'+'?institute=true&institution_id='+insti_id,
                    
                    success: function(e) {
                        //console.log(e);

                        $('#parent_campus_id')
                            .find("option").remove().end().append($('<option value = "">Please select Campus</option>'));  
                        $.each(e, function(key, value) {   
                            $('#parent_campus_id')
                                .append($('<option>', { value : key })
                                .text(value)); 
                        });
                    },
                });
        });
        });
    </script>
@endpush
