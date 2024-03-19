<div class="header-menu align-items-stretch">
    <!--begin::Menu-->
    <div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch"
        id="#kt_header_menu" data-kt-menu="true">
        <div
            class="menu-item here {{ Request::is('admin/profile') || Request::is('admin/profile/*') ? 'show' : '' }}">
            <a class="menu-link py-3" href="{{ route('admin-profile') }}">
                <span class="menu-title">Profile</span>
            </a>
        </div>

    </div>
    <!--end::Menu-->
</div>
