<div class="header-menu align-items-stretch">
    <!--begin::Menu-->
    <div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch"
        id="#kt_header_menu" data-kt-menu="true">
        <div class="menu-item here <?php echo e(Request::is('admin/person/faculties') || Request::is('admin/person/faculties/*') ? 'show' : ''); ?>">
            <a class="menu-link py-3" href="<?php echo e(route('faculty-list')); ?>">
                <span class="menu-title">Faculties</span>
            </a>
        </div>
        <div class="menu-item ms-2 here <?php echo e(Request::is('admin/person/students') || Request::is('admin/person/students/*') ? 'show' : ''); ?>">
            <a class="menu-link py-3" href="<?php echo e(route('student-list')); ?>">
                <span class="menu-title">Students</span>
            </a>
        </div>

    </div>
    <!--end::Menu-->
</div>
<?php /**PATH /home/hp/projects/c3sorbit/resources/views/admin/person/includes/header_menu.blade.php ENDPATH**/ ?>