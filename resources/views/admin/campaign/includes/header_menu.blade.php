<div class="header-menu align-items-stretch">
    <!--begin::Menu-->
    <div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch"
        id="#kt_header_menu" data-kt-menu="true">
        <div
            class="menu-item here {{ Request::is('admin/campaign/institutions') || Request::is('admin/campaign/institutions/*') ? 'show' : '' }}">
            <a class="menu-link py-3" href="{{ route('institution-list') }}">
                <span class="menu-title">Institutions</span>
            </a>
        </div>

        <div
            class="menu-item ms-2 here {{ Request::is('admin/campaign/campus') || Request::is('admin/campaign/campus/*') ? 'show' : '' }}">
            <a class="menu-link py-3" href="{{ route('campus-list') }}">
                <span class="menu-title">Campus</span>
            </a>
        </div>
    </div>
    <!--end::Menu-->
</div>
