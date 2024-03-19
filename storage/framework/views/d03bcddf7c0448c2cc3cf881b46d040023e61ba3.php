<div class="header-menu align-items-stretch">
    <!--begin::Menu-->
    <div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch"
        id="#kt_header_menu" data-kt-menu="true">
        <div
            class="menu-item here <?php echo e(Request::is('admin/vista-update-management/purposes') || Request::is('admin/vista-update-management/purposes/*') ? 'show' : ''); ?>">
            <a class="menu-link py-3" href="<?php echo e(route('purpose-list')); ?>">
                <span class="menu-title">Purposes</span>
            </a>
        </div>

        <div
            class="menu-item ms-2 here <?php echo e(Request::is('admin/vista-update-management/results') || Request::is('admin/vista-update-management/results/*') ? 'show' : ''); ?>">
            <a class="menu-link py-3" href="<?php echo e(route('result-list')); ?>">
                <span class="menu-title">Results</span>
            </a>
        </div>

        <div
            class="menu-item ms-2 here <?php echo e(Request::is('admin/vista-update-management/attachment-types') || Request::is('admin/vista-update-management/attachment-types/*') ? 'show' : ''); ?>">
            <a class="menu-link py-3" href="<?php echo e(route('attachment-type-list')); ?>">
                <span class="menu-title">Attachment Types</span>
            </a>
        </div>

        <div
            class="menu-item ms-2 here <?php echo e(Request::is('admin/vista-update-management/subject-types') || Request::is('admin/vista-update-management/subject-types/*') ? 'show' : ''); ?>">
            <a class="menu-link py-3" href="<?php echo e(route('subject-type-list')); ?>">
                <span class="menu-title">Subject Types</span>
            </a>
        </div>

        <div
            class="menu-item ms-2 here <?php echo e(Request::is('admin/vista-update-management/test-names') || Request::is('admin/vista-update-management/test-names/*') ? 'show' : ''); ?>">
            <a class="menu-link py-3" href="<?php echo e(route('test-name-list')); ?>">
                <span class="menu-title">Test Names</span>
            </a>
        </div>

        <div
            class="menu-item ms-2 here <?php echo e(Request::is('admin/vista-update-management/refund-reasons') || Request::is('admin/vista-update-management/refund-reasons/*') ? 'show' : ''); ?>">
            <a class="menu-link py-3" href="<?php echo e(route('refund-reason-list')); ?>">
                <span class="menu-title">Refund Reasons</span>
            </a>
        </div>

        <div
            class="menu-item ms-2 here <?php echo e(Request::is('admin/vista-update-management/nursing-attachment-types') || Request::is('admin/vista-update-management/nursing-attachment-types/*') ? 'show' : ''); ?>">
            <a class="menu-link py-3" href="<?php echo e(route('nursing-attachment-type-list')); ?>">
                <span class="menu-title">Nursing Attachment Types</span>
            </a>
        </div>

        <div
            class="menu-item ms-2 here <?php echo e(Request::is('admin/vista-update-management/vista-statuses') || Request::is('admin/vista-update-management/vista-statuses/*') ? 'show' : ''); ?>">
            <a class="menu-link py-3" href="<?php echo e(route('vista-status-list')); ?>">
                <span class="menu-title">Vista Statuses</span>
            </a>
        </div>

    </div>
    <!--end::Menu-->
</div>
<?php /**PATH /home/hp/projects/edfyed/resources/views/admin/vista_update_management/includes/header_menu.blade.php ENDPATH**/ ?>