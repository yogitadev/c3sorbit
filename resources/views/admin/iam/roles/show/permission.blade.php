@extends('admin.layouts.layout')

@section('page_title', 'View Role Permission')

@section('sub_header')
    @php
        $breadcrumb_arr = [
            'IAM' => '',
            'Roles' => route('role-list'),
            $role_item->unique_id => route('view-role', ['unique_id' => $role_item->unique_id]),
            'Permissions' => '',
        ];
    @endphp
    @include('admin.layouts.sub_header', [
        'title' => 'View Role Permission',
        'breadcrumb_arr' => $breadcrumb_arr,
    ])
@endsection


@section('header-menu')
    @include('admin.iam.includes.header_menu')
@endsection

@section('content')
    @include('flash::message')

    <div id="kt_app_content_container" class="app-container container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                @include('admin.iam.roles.show.includes._sidebar')
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="fw-bolder m-0">Permissions</h3>
                        </div>
                    </div>

                    {!! Form::open(['class' => 'module_form']) !!}
                    <div class="card-body">
                        @if (isset($module_categories) && !is_null($module_categories) > 0)

                            <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6 custom-tab" role="tablist">
                                @foreach ($module_categories as $k => $module_category_item)
                                    <li class="nav-item">
                                        <a class="nav-link {{ $loop->first ? 'active' : '' }} " data-bs-toggle="tab"
                                            href="#tab_{{ $loop->index }}" role="tab"
                                            >{{ $module_category_item->title }}</a>
                                    </li>
                                @endforeach

                            </ul>

                            <div class="tab-content">
                                @foreach ($module_categories as $k => $module_category_item)
                                    <div class="tab-pane {{ $k == 0 ? 'active' : '' }}" id="tab_{{ $k }}"
                                        role="tabpanel">
                                        <div class="row">
                                            @if (!is_null($module_category_item->modules))
                                                @foreach ($module_category_item->modules as $module_item)
                                                    <?php $permissions = Spatie\Permission\Models\Permission::where('module_id', $module_item->id)->get(); ?>
                                                    @if (!is_null($permissions))
                                                        <div class="col-md-3 mb-5">
                                                            <h5 class="mb-4">{{ $module_item->title }}</h5>


                                                            <div class="kt-checkbox-list">

                                                                <div class="form-check mb-4">
                                                                    <input class="form-check-input chk_all" type="checkbox"
                                                                        id="chk_all_{{ $module_item->id }}" />
                                                                    <label class="form-check-label"
                                                                        for="chk_all_{{ $module_item->id }}">
                                                                        All
                                                                    </label>
                                                                </div>


                                                                @foreach ($permissions as $permission_item)
                                                                    <div class="form-check mb-4">
                                                                        <input
                                                                            {{ is_array($current_permissions) && in_array($permission_item->id, $current_permissions) ? 'checked="checked"' : '' }}
                                                                            class="form-check-input chk_item"
                                                                            type="checkbox" name="permissions[]"
                                                                            value="{{ $permission_item->id }}"
                                                                            id="chk_{{ $permission_item->id }}" />
                                                                        <label class="form-check-label"
                                                                            for="chk_{{ $permission_item->id }}">
                                                                            {{ ucwords(str_replace('_', ' ', $permission_item->title)) }}
                                                                        </label>
                                                                    </div>
                                                                @endforeach

                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>


                        @endif
                    </div>
                    <div class="card-footer d-flex justify-content-end">

                        <button type="submit" class="btn btn-primary">Update Permissions</button>

                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page_js')
<script type="text/javascript">
    $(function() {
        $('.chk_all').click(function() {
            $(this).closest('.kt-checkbox-list').find('input').prop('checked', $(this).is(':checked'));
        });
    });
</script>
@endpush
