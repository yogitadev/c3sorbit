<div class="card card-xl-stretch mb-xl-8">
    <div class="card-header border-0 pt-0">
        <h3 class="card-title align-items-start flex-column"><span class="card-label fw-bolder text-dark">Action
                Menu</span></h3>
    </div>
    <div class="card-body pt-0">

        <a href="{{ route('view-role', ['unique_id' => $role_item->unique_id]) }}"
            class="d-flex align-items-sm-center gap-4 mb-3 detail_sidebar_menu {{ Request::is('*/view') ? 'active' : '' }}">
            <i class="fas fa-list"></i>
            <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                <div class="flex-grow-1 me-2"><span class="text-gray-800 fs-6 fw-bold">Personnel</span></div><span
                    class="badge badge-light fw-bolder"></span>
            </div>
        </a>

        @can('roles.update_permission')
        <a href="{{ route('view-role-permissions',['unique_id'=>$role_item->unique_id]) }}" class="d-flex align-items-sm-center gap-4 mb-3 detail_sidebar_menu {{ Request::is('*/permissions') ? 'active' : '' }}">
            <i class="fas fa-user-tag"></i>

            <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                <div class="flex-grow-1 me-2"><span class="text-gray-800 fs-6 fw-bold">Permissions</span></div>
            </div>
        </a>
        @endcan

    </div>
</div>
