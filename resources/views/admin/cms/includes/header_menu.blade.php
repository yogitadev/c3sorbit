<div class="header-menu align-items-stretch d-flex justify-content-center">
    <!--begin::Menu-->
    <div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch"
        id="#kt_header_menu" data-kt-menu="true">

        <div
            class="menu-item ms-2 here {{ Request::is('admin/cms/media') || Request::is('admin/cms/media/*') ? 'show' : '' }}">
            <a class="menu-link py-3" href="{{ route('media-list') }}">
                <span class="menu-title">Media Manager</span>
            </a>
        </div>

        <div
            class="menu-item ms-2 here {{ Request::is('admin/cms/countries') || Request::is('admin/cms/countries/*') ? 'show' : '' }}">
            <a class="menu-link py-3" href="{{ route('country-list') }}">
                <span class="menu-title">Countries</span>
            </a>
        </div>

        <div
            class="menu-item ms-2 here {{ Request::is('admin/cms/awarding-bodys') || Request::is('admin/cms/awarding-bodys/*') ? 'show' : '' }}">
            <a class="menu-link py-3" href="{{ route('awarding-body-list') }}">
                <span class="menu-title">Awarding bodys</span>
            </a>
        </div>

        <div
            class="menu-item ms-2 here {{ Request::is('admin/cms/subjects') || Request::is('admin/cms/subjects/*') ? 'show' : '' }}">
            <a class="menu-link py-3" href="{{ route('subject-list') }}">
                <span class="menu-title">Subjects</span>
            </a>
        </div>

        <div
            class="menu-item ms-2 here {{ Request::is('admin/cms/lecture-schedules') || Request::is('admin/cms/lecture-schedules/*') ? 'show' : '' }}">
            <a class="menu-link py-3" href="{{ route('lecture-schedule-list') }}">
                <span class="menu-title">Lecture Schedules</span>
            </a>
        </div>

        <div
            class="menu-item ms-2 here {{ Request::is('admin/cms/assignments') || Request::is('admin/cms/assignments/*') ? 'show' : '' }}">
            <a class="menu-link py-3" href="{{ route('assignment-list') }}">
                <span class="menu-title">Assignments</span>
            </a>
        </div>
        
    </div>
    <!--end::Menu-->
</div>
