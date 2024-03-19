<!--begin::Aside-->
<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <!--begin::Brand-->
    <div class="aside-logo bg-white flex-column-auto h-100px" id="kt_aside_logo">
        <!--begin::Logo-->
        <a href="<?php echo e(route('admin-dashboard')); ?>" class="m-auto">
            <img alt="Logo" src="<?php echo e(asset('themes/admin/images/logo.gif')); ?>" class="w-100px logo" />
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
                    <a class="menu-link" href="<?php echo e(route('admin-dashboard')); ?>">

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
                    class="menu-item menu-accordion <?php echo e(Request::is('admin/cms/*') ? 'show' : ''); ?> ">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="fas fa-newspaper fs-3"></i>
                        </span>
                        <span class="menu-title">CMS</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link <?php echo e(Request::is('admin/cms/pages') || Request::is('admin/cms/pages/*') ? 'active' : ''); ?>"
                                href="<?php echo e(route('page-list')); ?>">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Pages</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link <?php echo e(Request::is('admin/cms/media') || Request::is('admin/cms/media/*') ? 'active' : ''); ?>"
                                href="<?php echo e(route('media-list')); ?>">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Media Manager</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link <?php echo e(Request::is('admin/cms/platform') || Request::is('admin/cms/platform/*') ? 'active' : ''); ?>"
                                href="<?php echo e(route('platform-list')); ?>">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Platforms</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link <?php echo e(Request::is('admin/cms/mode') || Request::is('admin/cms/mode/*') ? 'active' : ''); ?>"
                                href="<?php echo e(route('mode-list')); ?>">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Modes</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link <?php echo e(Request::is('admin/cms/countries') || Request::is('admin/cms/countries/*') ? 'active' : ''); ?>"
                                href="<?php echo e(route('country-list')); ?>">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Countries</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link <?php echo e(Request::is('admin/cms/states') || Request::is('admin/cms/states/*') ? 'active' : ''); ?>"
                                href="<?php echo e(route('state-list')); ?>">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">States</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link <?php echo e(Request::is('admin/cms/cities') || Request::is('admin/cms/cities/*') ? 'active' : ''); ?>"
                                href="<?php echo e(route('city-list')); ?>">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Cities</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link <?php echo e(Request::is('admin/cms/intakes') || Request::is('admin/cms/intakes/*') ? 'active' : ''); ?>"
                                href="<?php echo e(route('intake-list')); ?>">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Intakes</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link <?php echo e(Request::is('admin/cms/target-managers') || Request::is('admin/cms/target-managers/*') ? 'active' : ''); ?>"
                                href="<?php echo e(route('target-manager-list')); ?>">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Target Manager</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link <?php echo e(Request::is('admin/cms/region-managers') || Request::is('admin/cms/region-managers/*') ? 'active' : ''); ?>"
                                href="<?php echo e(route('region-manager-list')); ?>">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Region Manager</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link <?php echo e(Request::is('admin/cms/student-types') || Request::is('admin/cms/student-types/*') ? 'active' : ''); ?>"
                                href="<?php echo e(route('student-type-list')); ?>">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Student Types</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link <?php echo e(Request::is('admin/cms/qualifications') || Request::is('admin/cms/qualifications/*') ? 'active' : ''); ?>"
                                href="<?php echo e(route('qualification-list')); ?>">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Qualifications</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link <?php echo e(Request::is('admin/cms/job-types') || Request::is('admin/cms/job-types/*') ? 'active' : ''); ?>"
                                href="<?php echo e(route('job-type-list')); ?>">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Job Types</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link <?php echo e(Request::is('admin/cms/designations') || Request::is('admin/cms/designations/*') ? 'active' : ''); ?>"
                                href="<?php echo e(route('designation-list')); ?>">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Designations</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link <?php echo e(Request::is('admin/cms/departments') || Request::is('admin/cms/departments/*') ? 'active' : ''); ?>"
                                href="<?php echo e(route('department-list')); ?>">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Departments</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link <?php echo e(Request::is('admin/cms/awarding-bodys') || Request::is('admin/cms/awarding-bodys/*') ? 'active' : ''); ?>"
                                href="<?php echo e(route('awarding-body-list')); ?>">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Awarding Bodys</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link <?php echo e(Request::is('admin/cms/sources') || Request::is('admin/cms/sources/*') ? 'active' : ''); ?>"
                                href="<?php echo e(route('source-list')); ?>">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Sources</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link <?php echo e(Request::is('admin/cms/bank-accounts') || Request::is('admin/cms/bank-accounts/*') ? 'active' : ''); ?>"
                                href="<?php echo e(route('bank-account-list')); ?>">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Bank Accounts</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link <?php echo e(Request::is('admin/cms/shipping-partners') || Request::is('admin/cms/shipping-partners/*') ? 'active' : ''); ?>"
                                href="<?php echo e(route('shipping-partner-list')); ?>">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Shipping Partners</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link <?php echo e(Request::is('admin/cms/payment-fors') || Request::is('admin/cms/payment-fors/*') ? 'active' : ''); ?>"
                                href="<?php echo e(route('payment-for-list')); ?>">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Payment For</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link <?php echo e(Request::is('admin/cms/interview-modes') || Request::is('admin/cms/interview-modes/*') ? 'active' : ''); ?>"
                                href="<?php echo e(route('interview-mode-list')); ?>">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Interview Modes</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2"><span
                            class="menu-section text-muted text-uppercase fs-8 ls-1">Campaign Management</span></div>
                </div>
                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion <?php echo e(Request::is('admin/campaign/*') ? 'show' : ''); ?> ">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="fas fa-newspaper fs-3"></i>
                        </span>
                        <span class="menu-title">Campagin</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link <?php echo e(Request::is('admin/campaign/institutions') || Request::is('admin/campaign/institutions/*') ? 'active' : ''); ?>"
                                href="<?php echo e(route('institution-list')); ?>">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Institutions</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link <?php echo e(Request::is('admin/campaign/campus') || Request::is('admin/campaign/campus/*') ? 'active' : ''); ?>"
                                href="<?php echo e(route('campus-list')); ?>">
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
                    <a class="menu-link <?php echo e(Request::is('admin/course/programcodes') || Request::is('admin/course/programcodes/*') ? 'active' : ''); ?>" href="<?php echo e(route('programcode-list')); ?>">

                        <span class="menu-icon">
                            <i class="fas fa-inbox fs-3"></i>
                        </span>
                        <span class="menu-title">Programcodes</span>
                    </a>
                </div>

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2"><span class="menu-section text-muted text-uppercase fs-8 ls-1">Screen Management</span></div>
                </div>
                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion <?php echo e(Request::is('admin/screen-management/*') ? 'show' : ''); ?> ">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="fas fa-newspaper fs-3"></i>
                        </span>
                        <span class="menu-title">Screen</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link <?php echo e(Request::is('admin/screen-management/screens') || Request::is('admin/screen-management/screens/*') ? 'active' : ''); ?>"
                                href="<?php echo e(route('screen-list')); ?>">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Screening</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link <?php echo e(Request::is('admin/screen-management/interviews') || Request::is('admin/screen-management/interviews/*') ? 'active' : ''); ?>"
                                href="<?php echo e(route('pending-interview')); ?>">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">My Pending Interview</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link <?php echo e(Request::is('admin/screen-management/processes') || Request::is('admin/screen-management/processes/*') ? 'active' : ''); ?>"
                                href="<?php echo e(route('ol-request-list')); ?>">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Processes</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2"><span class="menu-section text-muted text-uppercase fs-8 ls-1">Letter Management</span></div>
                </div>
                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion <?php echo e(Request::is('admin/letter/*') ? 'show' : ''); ?> ">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="fas fa-newspaper fs-3"></i>
                        </span>
                        <span class="menu-title">Letter</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link <?php echo e(Request::is('admin/letter/col') || Request::is('admin/letter/col/*') ? 'active' : ''); ?>"
                                href="<?php echo e(route('studentCOL-list')); ?>">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Conditional Letter</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link <?php echo e(Request::is('admin/letter/visa-letter') || Request::is('admin/letter/visa-letter/*') ? 'active' : ''); ?>"
                                href="<?php echo e(route('studentVisaLetter-list')); ?>">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Visa Letter</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2"><span class="menu-section text-muted text-uppercase fs-8 ls-1">Payment Management</span></div>
                </div>
                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion <?php echo e(Request::is('admin/payment/*') ? 'show' : ''); ?> ">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="fas fa-newspaper fs-3"></i>
                        </span>
                        <span class="menu-title">Payment</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link <?php echo e(Request::is('admin/payment/student-payment') || Request::is('admin/payment/student-payment/*') ? 'active' : ''); ?>"
                                href="<?php echo e(route('student-payment-list')); ?>">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Primary Confirmation</span>
                            </a>
                        </div>
                        <!-- <div class="menu-item">
                            <a class="menu-link "
                                href="">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Visa Letter</span>
                            </a>
                        </div> -->
                    </div>
                </div>

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2"><span class="menu-section text-muted text-uppercase fs-8 ls-1">Enquiry Management</span></div>
                </div>

                <div class="menu-item">
                    <a class="menu-link <?php echo e(Request::is('admin/enquiries') || Request::is('admin/enquiries/*') ? 'active' : ''); ?>" href="<?php echo e(route('enquiry-list')); ?>">

                        <span class="menu-icon">
                            <i class="fas fa-inbox fs-3"></i>
                        </span>
                        <span class="menu-title">Enquiries</span>
                    </a>
                </div>

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2"><span
                            class="menu-section text-muted text-uppercase fs-8 ls-1">Vista Update Managment</span></div>
                </div>
                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion <?php echo e(Request::is('admin/vista-update-management/*') ? 'show' : ''); ?> ">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="fas fa-newspaper fs-3"></i>
                        </span>
                        <span class="menu-title">Vista Update Management</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link <?php echo e(Request::is('admin/vista-update-management/purposes') || Request::is('admin/vista-update-management/purposes/*') ? 'active' : ''); ?>"
                                href="<?php echo e(route('purpose-list')); ?>">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Purposes</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link <?php echo e(Request::is('admin/vista-update-management/results') || Request::is('admin/vista-update-management/results/*') ? 'active' : ''); ?>"
                                href="<?php echo e(route('result-list')); ?>">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Results</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link <?php echo e(Request::is('admin/vista-update-management/attachment-types') || Request::is('admin/vista-update-management/attachment-types/*') ? 'active' : ''); ?>"
                                href="<?php echo e(route('attachment-type-list')); ?>">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Attachment Types</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link <?php echo e(Request::is('admin/vista-update-management/subject-types') || Request::is('admin/vista-update-management/subject-types/*') ? 'active' : ''); ?>"
                                href="<?php echo e(route('subject-type-list')); ?>">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Subject Types</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link <?php echo e(Request::is('admin/vista-update-management/test-names') || Request::is('admin/vista-update-management/test-names/*') ? 'active' : ''); ?>"
                                href="<?php echo e(route('test-name-list')); ?>">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Test Names</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link <?php echo e(Request::is('admin/vista-update-management/refund-reasons') || Request::is('admin/vista-update-management/refund-reasons/*') ? 'active' : ''); ?>"
                                href="<?php echo e(route('refund-reason-list')); ?>">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Refund Reasons</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link <?php echo e(Request::is('admin/vista-update-management/nursing-attachment-types') || Request::is('admin/vista-update-management/nursing-attachment-types/*') ? 'active' : ''); ?>"
                                href="<?php echo e(route('nursing-attachment-type-list')); ?>">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Nursing Attachment Types </span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link <?php echo e(Request::is('admin/vista-update-management/vista-statuses') || Request::is('admin/vista-update-management/vista-statuses/*') ? 'active' : ''); ?>"
                                href="<?php echo e(route('vista-status-list')); ?>">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Vista Statues</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2"><span
                            class="menu-section text-muted text-uppercase fs-8 ls-1">IDENTITIES & ACCESS MANAGEMENT</span></div>
                </div>
                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion <?php echo e(Request::is('admin/iam/*') ? 'show' : ''); ?> ">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="fas fa-newspaper fs-3"></i>
                        </span>
                        <span class="menu-title">IAM</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link <?php echo e(Request::is('admin/iam/personnels') || Request::is('admin/iam/personnels/*') ? 'active' : ''); ?>"
                                href="<?php echo e(route('personnel-list')); ?>">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Personnel</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link <?php echo e(Request::is('admin/iam/modules') || Request::is('admin/iam/modules/*') ? 'active' : ''); ?>"
                                href="<?php echo e(route('module-list')); ?>">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Modules</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link <?php echo e(Request::is('admin/iam/roles') || Request::is('admin/iam/roles/*') ? 'active' : ''); ?>"
                                href="<?php echo e(route('role-list')); ?>">
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
                    <a class="menu-link <?php echo e(Request::is('admin/settings') || Request::is('admin/settings/*') ? 'active' : ''); ?>"
                        href="<?php echo e(route('admin-setting')); ?>">

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
<?php /**PATH /home/hp/projects/edfyed/resources/views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>