<div class="header-menu align-items-stretch d-flex justify-content-center">
    <!--begin::Menu-->
    <div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch"
        id="#kt_header_menu" data-kt-menu="true">
        <div
            class="menu-item here <?php echo e(Request::is('admin/cms/pages') || Request::is('admin/cms/pages/*') ? 'show' : ''); ?>">
            <a class="menu-link py-3" href="<?php echo e(route('page-list')); ?>">
                <span class="menu-title">Pages</span>
            </a>
        </div>

        <div
            class="menu-item ms-2 here <?php echo e(Request::is('admin/cms/media') || Request::is('admin/cms/media/*') ? 'show' : ''); ?>">
            <a class="menu-link py-3" href="<?php echo e(route('media-list')); ?>">
                <span class="menu-title">Media Manager</span>
            </a>
        </div>

        <div
            class="menu-item ms-2 here <?php echo e(Request::is('admin/cms/platforms') || Request::is('admin/cms/platforms/*') ? 'show' : ''); ?>">
            <a class="menu-link py-3" href="<?php echo e(route('platform-list')); ?>">
                <span class="menu-title">Platforms</span>
            </a>
        </div>

        <div
            class="menu-item ms-2 here <?php echo e(Request::is('admin/cms/modes') || Request::is('admin/cms/modes/*') ? 'show' : ''); ?>">
            <a class="menu-link py-3" href="<?php echo e(route('mode-list')); ?>">
                <span class="menu-title">Modes</span>
            </a>
        </div>

        <div
            class="menu-item ms-2 here <?php echo e(Request::is('admin/cms/countries') || Request::is('admin/cms/countries/*') ? 'show' : ''); ?>">
            <a class="menu-link py-3" href="<?php echo e(route('country-list')); ?>">
                <span class="menu-title">Countries</span>
            </a>
        </div>

        <div
            class="menu-item ms-2 here <?php echo e(Request::is('admin/cms/states') || Request::is('admin/cms/states/*') ? 'show' : ''); ?>">
            <a class="menu-link py-3" href="<?php echo e(route('state-list')); ?>">
                <span class="menu-title">States</span>
            </a>
        </div>

        <div
            class="menu-item ms-2 here <?php echo e(Request::is('admin/cms/cities') || Request::is('admin/cms/cities/*') ? 'show' : ''); ?>">
            <a class="menu-link py-3" href="<?php echo e(route('city-list')); ?>">
                <span class="menu-title">Cities</span>
            </a>
        </div>

        <div
            class="menu-item ms-2 here <?php echo e(Request::is('admin/cms/intakes') || Request::is('admin/cms/intakes/*') ? 'show' : ''); ?>">
            <a class="menu-link py-3" href="<?php echo e(route('intake-list')); ?>">
                <span class="menu-title">Intakes</span>
            </a>
        </div>

        <div
            class="menu-item ms-2 here <?php echo e(Request::is('admin/cms/target-managers') || Request::is('admin/cms/target-managers/*') ? 'show' : ''); ?>">
            <a class="menu-link py-3" href="<?php echo e(route('target-manager-list')); ?>">
                <span class="menu-title">Target Managers</span>
            </a>
        </div>

        <div
            class="menu-item ms-2 here <?php echo e(Request::is('admin/cms/region-managers') || Request::is('admin/cms/region-managers/*') ? 'show' : ''); ?>">
            <a class="menu-link py-3" href="<?php echo e(route('region-manager-list')); ?>">
                <span class="menu-title">Region Managers</span>
            </a>
        </div>

        <div
            class="menu-item ms-2 here <?php echo e(Request::is('admin/cms/student-types') || Request::is('admin/cms/student-types/*') ? 'show' : ''); ?>">
            <a class="menu-link py-3" href="<?php echo e(route('student-type-list')); ?>">
                <span class="menu-title">Student Types</span>
            </a>
        </div>

        <div
            class="menu-item ms-2 here <?php echo e(Request::is('admin/cms/qualifications') || Request::is('admin/cms/qualifications/*') ? 'show' : ''); ?>">
            <a class="menu-link py-3" href="<?php echo e(route('qualification-list')); ?>">
                <span class="menu-title">Qualifications</span>
            </a>
        </div>

        <div
            class="menu-item ms-2 here <?php echo e(Request::is('admin/cms/job-types') || Request::is('admin/cms/job-types/*') ? 'show' : ''); ?>">
            <a class="menu-link py-3" href="<?php echo e(route('job-type-list')); ?>">
                <span class="menu-title">Job Types</span>
            </a>
        </div>

        <div
            class="menu-item ms-2 here <?php echo e(Request::is('admin/cms/designations') || Request::is('admin/cms/designations/*') ? 'show' : ''); ?>">
            <a class="menu-link py-3" href="<?php echo e(route('designation-list')); ?>">
                <span class="menu-title">Designations</span>
            </a>
        </div>

        <div
            class="menu-item ms-2 here <?php echo e(Request::is('admin/cms/departments') || Request::is('admin/cms/departments/*') ? 'show' : ''); ?>">
            <a class="menu-link py-3" href="<?php echo e(route('department-list')); ?>">
                <span class="menu-title">Departments</span>
            </a>
        </div>

        <div
            class="menu-item ms-2 here <?php echo e(Request::is('admin/cms/awarding-bodys') || Request::is('admin/cms/awarding-bodys/*') ? 'show' : ''); ?>">
            <a class="menu-link py-3" href="<?php echo e(route('awarding-body-list')); ?>">
                <span class="menu-title">Awarding bodys</span>
            </a>
        </div>

        <div
            class="menu-item ms-2 here <?php echo e(Request::is('admin/cms/sources') || Request::is('admin/cms/sources/*') ? 'show' : ''); ?>">
            <a class="menu-link py-3" href="<?php echo e(route('source-list')); ?>">
                <span class="menu-title">Sources</span>
            </a>
        </div>

        <div
            class="menu-item ms-2 here <?php echo e(Request::is('admin/cms/bank-accounts') || Request::is('admin/cms/bank-accounts/*') ? 'show' : ''); ?>">
            <a class="menu-link py-3" href="<?php echo e(route('bank-account-list')); ?>">
                <span class="menu-title">Bank Accounts</span>
            </a>
        </div>

        <div
            class="menu-item ms-2 here <?php echo e(Request::is('admin/cms/shipping-partners') || Request::is('admin/cms/shipping-partners/*') ? 'show' : ''); ?>">
            <a class="menu-link py-3" href="<?php echo e(route('shipping-partner-list')); ?>">
                <span class="menu-title">Shipping Partners</span>
            </a>
        </div>

        <div
            class="menu-item ms-2 here <?php echo e(Request::is('admin/cms/payment-fors') || Request::is('admin/cms/payment-fors/*') ? 'show' : ''); ?>">
            <a class="menu-link py-3" href="<?php echo e(route('payment-for-list')); ?>">
                <span class="menu-title">Payment For</span>
            </a>
        </div>

        <div
            class="menu-item ms-2 here <?php echo e(Request::is('admin/cms/interview-modes') || Request::is('admin/cms/interview-modes/*') ? 'show' : ''); ?>">
            <a class="menu-link py-3" href="<?php echo e(route('interview-mode-list')); ?>">
                <span class="menu-title">Interview Modes</span>
            </a>
        </div>

    </div>
    <!--end::Menu-->
</div>
<?php /**PATH /home/hp/projects/edfyed/resources/views/admin/cms/includes/header_menu.blade.php ENDPATH**/ ?>