@extends('admin.layouts.layout')

@section('page_title', 'Reorder Faculties')

@section('sub_header')
    @php
        $breadcrumb_arr = [
            'Faculties' => route('faculty-list'),
            'Reorder' => '',
        ];
    @endphp
    @include('admin.layouts.sub_header', [
        'title' => 'Reorder Faculties',
        'breadcrumb_arr' => $breadcrumb_arr,
    ])
@endsection

@section('header-menu')
    @include('admin.person.includes.header_menu')
@endsection

@section('content')
    @include('flash::message')

    <div class="card mb-5 mb-xl-5">
        <div class="card-header border-0">
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">Reorder Faculties</h3>
            </div>

            <div class="card-toolbar m-0">
                <a href="{{ route('faculty-list') }}" class="btn btn-danger"><i
                        class="fas fa-angle-left fs-4 me-2"></i> Go
                    Back</a>
            </div>
        </div>

        @if (isset($list) && count($list) > 0)
            <div class="card-body border-top p-9 custom_sortable">

                <ul class="list-group list-group-sortable">
                    @foreach ($list as $item)
                        <li id='{{ $item->id }}' class="list-group-item">
                            <i class="fas fa-bars reorder-icon"></i>{{ $item->username }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @else
            <div class="card-body border-top p-9">
                <h4 class="text-danger text-center">No Faculties Found</h4>
            </div>
        @endif

        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <button type="submit" class="btn btn-primary" id="btn-update-order" disabled>Update Order</button>
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
                    url: '{{ route('reorder-faculty') }}',
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
