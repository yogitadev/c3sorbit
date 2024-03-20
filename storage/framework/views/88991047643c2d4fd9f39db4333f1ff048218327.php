<div class="header-menu align-items-stretch">
    <!--begin::Menu-->
    <div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch"
        id="#kt_header_menu" data-kt-menu="true">
        <div
            class="menu-item here <?php echo e(Request::is('admin/iam/personnels') || Request::is('admin/iam/personnels/*') ? 'show' : ''); ?>">
            <a class="menu-link py-3" href="<?php echo e(route('personnel-list')); ?>">
                <span class="menu-title">Personnel</span>
            </a>
        </div>

    </div>
    <!--end::Menu-->
</div>
<?php /**PATH /home/hp/projects/c3sorbit/resources/views/admin/iam/includes/header_menu.blade.php ENDPATH**/ ?>