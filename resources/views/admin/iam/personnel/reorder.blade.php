@extends('admin.layouts.layout')

@section('page_title', 'Reorder Users')

@section('sub_header')
    @php
        $breadcrumb_arr = [
            'Users' => route('personnel-list'),
            'Reorder' => '',
        ];
    @endphp
    @include('admin.layouts.sub_header', [
        'title' => 'Reorder Users',
        'breadcrumb_arr' => $breadcrumb_arr,
    ])
@endsection

@section('header-menu')
    @include('admin.iam.includes.header_menu')
@endsection

@section('content')
    @include('flash::message')

    <div class="row">
        <div class="col-md-3">
            {!! Form::open([
                'method' => 'GET',
                'class' => 'form w-100 module_form',
                'autocomplete' => 'off',
                'data-parsley-validate' => true,
            ]) !!}
            <div class="card mb-5 mb-xl-5">
                <div class="card-header border-0">
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Choose Users Role</h3>
                    </div>

                </div>
                <div class="card-body border-top p-9">
                    <label class="form-label fs-6">Role</label>
                    {!! Form::select(
                        'role_id',
                        $data['role_list'],
                        isset($data['selected_role_id']) ? $data['selected_role_id'] : null,
                        [
                            'id' => 'parent_role_id',
                            'class' => 'form-select',
                            'required' => true,
                            'placeholder' => 'Please select...',
                            'data-parsley-class-handler' => '#error_mode_role_id',
                        ],
                    ) !!}
                </div>

                <div id="error_mode_role_id"></div>


                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="submit" class="btn btn-primary">Select</button>
                </div>
            </div>
            {!! Form::close() !!}

        </div>

        <div class="col-md-9">
            <div class="card mb-5 mb-xl-5">
                <div class="card-header border-0">
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Reorder Users</h3>
                    </div>

                    <div class="card-toolbar m-0">
                        <a href="{{ route('personnel-list') }}" class="btn btn-danger"><i class="fas fa-angle-left fs-4 me-2"></i> Go
                            Back</a>
                    </div>
                </div>

                @if (isset($data['user_list']) && count($data['user_list']) > 0)
                    <div class="card-body border-top p-9 custom_sortable">

                        <ul class="list-group list-group-sortable">
                            @foreach ($data['user_list'] as $item)
                                <li id='{{ $item->id }}' class="list-group-item">
                                    <i class="fas fa-bars reorder-icon"></i>{{ $item->username }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @else
                    <div class="card-body border-top p-9">
                        <h4 class="text-danger text-center">No User Found</h4>
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
                    url: '{{ route('reorder-personnel') }}',
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
        });
    </script>
@endpush
