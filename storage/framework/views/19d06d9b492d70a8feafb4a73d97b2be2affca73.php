<ul class="nav">
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('students.update_vista')): ?>
        <li class="nav-item">
            <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary active fw-bold px-4 me-1" data-bs-toggle="tab" href="#tab_update_vista">Update Vista</a>
        </li>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('students.vista_status')): ?>
        <li class="nav-item">
            <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bold px-4 me-1" data-bs-toggle="tab" href="#tab_vista_status">Vista Status</a>
        </li>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('students.get_application')): ?>
        <li class="nav-item">
            <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bold px-4 me-1" data-bs-toggle="tab" href="#tab_get_application">Get Application</a>
        </li>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('students.vista_record')): ?>
        <li class="nav-item">
            <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bold px-4 me-1" data-bs-toggle="tab" href="#tab_vista_record">Vista Records</a>
        </li>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('students.vista_attachment')): ?>
        <li class="nav-item">
            <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bold px-4 me-1" data-bs-toggle="tab" href="#tab_vista_attachment">Vista Attachment</a>
        </li>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('students.application_document')): ?>
        <li class="nav-item">
            <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bold px-4 me-1" data-bs-toggle="tab" href="#tab_application_document">Application Documents</a>
        </li>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('students.vista_history')): ?>
        <li class="nav-item">
            <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bold px-4" data-bs-toggle="tab" href="#tab_vista_history">Vista History</a>
        </li>
    <?php endif; ?>
</ul><?php /**PATH /home/hp/projects/edfyed/resources/views/front/lead_management/students/lead_vista/tabs/_tab.blade.php ENDPATH**/ ?>