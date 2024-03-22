<!--begin::Aside-->
<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <!--begin::Brand-->
    <div class="aside-logo bg-white flex-column-auto h-100px" id="kt_aside_logo">
        <!--begin::Logo-->
        <a href="{{ route('admin-dashboard') }}" class="m-auto">
            <img alt="Logo" src="{{ asset('themes/admin/images/logo.gif') }}" class="w-100px logo" />
        </a>
        <!--end::Logo-->
        <!--begin::Aside toggler-->
        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle"
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="aside-minimize">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
            <span class="svg-icon svg-icon-1 rotate-180">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none">
                    <path opacity="0.5"
                        d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z"
                        fill="currentColor" />
                    <path
                        d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z"
                        fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Aside toggler-->
    </div>
    <!--end::Brand-->
    <!--begin::Aside menu-->
    <div class="aside-menu flex-column-fluid">
        <!--begin::Aside Menu-->
        <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu"
            data-kt-scroll-offset="0">
            <!--begin::Menu-->
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">

                <div class="menu-item">
                    <a class="menu-link" href="{{ route('admin-dashboard') }}">

                        <span class="menu-icon">
                            <i class="fas fa-tachometer-alt fs-3"></i>

                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </div>

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2"><span
                            class="menu-section text-muted text-uppercase fs-8 ls-1">Content Management</span></div>
                </div>
                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion {{ Request::is('admin/cms/*') ? 'show' : '' }} ">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="fas fa-newspaper fs-3"></i>
                        </span>
                        <span class="menu-title">CMS</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('admin/cms/media') || Request::is('admin/cms/media/*') ? 'active' : '' }}"
                                href="{{ route('media-list') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Media Manager</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('admin/cms/countries') || Request::is('admin/cms/countries/*') ? 'active' : '' }}"
                            href="{{ route('country-list') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Countries</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('admin/cms/awarding-bodys') || Request::is('admin/cms/awarding-bodys/*') ? 'active' : '' }}"
                                href="{{ route('awarding-body-list') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Awarding Bodys</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('admin/cms/subjects') || Request::is('admin/cms/subjects/*') ? 'active' : '' }}"
                                href="{{ route('subject-list') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Subjects</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('admin/cms/lecture-schedules') || Request::is('admin/cms/lecture-schedules/*') ? 'active' : '' }}"
                                href="{{ route('lecture-schedule-list') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Lecture Schedules</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('admin/cms/assignments') || Request::is('admin/cms/assignments/*') ? 'active' : '' }}"
                                href="{{ route('assignment-list') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Assignments</span>
                            </a>
                        </div>

                    </div>
                    
                </div>

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2"><span
                            class="menu-section text-muted text-uppercase fs-8 ls-1">Campaign Management</span></div>
                </div>
                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion {{ Request::is('admin/campaign/*') ? 'show' : '' }} ">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="fas fa-newspaper fs-3"></i>
                        </span>
                        <span class="menu-title">Campagin</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('admin/campaign/institutions') || Request::is('admin/campaign/institutions/*') ? 'active' : '' }}"
                                href="{{ route('institution-list') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Institutions</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('admin/campaign/campus') || Request::is('admin/campaign/campus/*') ? 'active' : '' }}"
                                href="{{ route('campus-list') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Campus</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2"><span class="menu-section text-muted text-uppercase fs-8 ls-1">Course Management</span></div>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ Request::is('admin/course/programcodes') || Request::is('admin/course/programcodes/*') ? 'active' : '' }}" href="{{ route('programcode-list') }}">

                        <span class="menu-icon">
                            <i class="fas fa-inbox fs-3"></i>
                        </span>
                        <span class="menu-title">Programcodes</span>
                    </a>
                </div>

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2"><span
                            class="menu-section text-muted text-uppercase fs-8 ls-1">PERSON MANAGEMENT</span></div>
                </div>
                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion {{ Request::is('admin/person/*') ? 'show' : '' }} ">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="fas fa-newspaper fs-3"></i>
                        </span>
                        <span class="menu-title">Person</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('admin/person/faculties') || Request::is('admin/person/faculties/*') ? 'active' : '' }}"
                                href="{{ route('faculty-list') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Faculties</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('admin/person/students') || Request::is('admin/person/students/*') ? 'active' : '' }}"
                                href="{{ route('student-list') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Students</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2"><span
                            class="menu-section text-muted text-uppercase fs-8 ls-1">IDENTITIES & ACCESS MANAGEMENT</span></div>
                </div>
                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion {{ Request::is('admin/iam/*') ? 'show' : '' }} ">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="fas fa-newspaper fs-3"></i>
                        </span>
                        <span class="menu-title">IAM</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('admin/iam/personnels') || Request::is('admin/iam/personnels/*') ? 'active' : '' }}"
                                href="{{ route('personnel-list') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Personnel</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('admin/iam/modules') || Request::is('admin/iam/modules/*') ? 'active' : '' }}"
                                href="{{ route('module-list') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Modules</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('admin/iam/roles') || Request::is('admin/iam/roles/*') ? 'active' : '' }}"
                                href="{{ route('role-list') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Roles</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2"><span
                            class="menu-section text-muted text-uppercase fs-8 ls-1">Web Settings</span></div>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ Request::is('admin/settings') || Request::is('admin/settings/*') ? 'active' : '' }}"
                        href="{{ route('admin-setting') }}">

                        <span class="menu-icon">
                            <i class="fas fa-cogs fs-3"></i>

                        </span>
                        <span class="menu-title">Settings</span>
                    </a>
                </div>

            </div>
            <!--end::Menu-->
        </div>
        <!--end::Aside Menu-->
    </div>
    <!--end::Aside menu-->

</div>
<!--end::Aside-->
