<div class="tab-pane fade mt-5" id="tab_application_document">
    <div class="card">

        <div class="card-body py-4">
            <?php if(isset($application_document_list) && count($application_document_list) > 0): ?>
                <table class="table align-middle table-row-dashed" id="custom-data-list">

                    <thead>
                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                            <th class="min-w-125px">Unique ID</th>
                            <th class="min-w-125px">
                                Attachment Type
                            </th>
                            <th class="min-w-125px">
                                Attachment Size
                            </th>
                            <th class="min-w-125px">
                                Attachment Name
                            </th>
                            <th class="min-w-125px">
                                Action
                            </th>
                        </tr>
                    </thead>

                    <tbody class="text-gray-600 fw-bold">
                        <?php $__currentLoopData = $application_document_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <?php echo e($aitem->unique_id); ?>

                                </td>
                                <td>
                                    <?php if($aitem->attachment_type_id != null): ?>
                                        <?php echo e($aitem->attachment_type->name); ?> 
                                    <?php else: ?> 
                                        - 
                                <?php endif; ?>
                                </td>
                                <td>
                                    <?php echo e($aitem->file_size); ?>

                                </td>
                                <td>
                                    <?php echo e($aitem->original_file_name); ?>

                                </td>
                                <td class="text-end">

                                    <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions <i
                                            class="fas fa-angle-down ms-1"></i>
                                    </a>

                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fs-7 w-150px py-4"
                                        data-kt-menu="true">

                                        <div class="menu-item px-3">
                                            <?php if($aitem->file_type == 'image/png' || $aitem->file_type == 'image/jpg' || $aitem->file_type == 'image/jpeg' ): ?>
                                                <a href="<?php echo e($aitem->getUrl()); ?>"  class="menu-link px-3" data-fancybox=""><i class="fas fa-eye me-3" aria-hidden="true"></i>View</a>
                                            <?php else: ?> 
                                                <a href="<?php echo e($aitem->getUrl()); ?>"  class="menu-link px-3" download="<?php echo e($aitem->original_file_name); ?>"><i class="fas fa-download me-3" aria-hidden="true"></i>Download</a>
                                            <?php endif; ?>
                                        </div>

                                        <div class="menu-item px-3">
                                            <a href="<?php echo e(route('delete-application-document', ['unique_id' => $aitem->unique_id, 'lead_id' => $aitem->lead_id ])); ?>"
                                                data-token="<?php echo e(csrf_token()); ?>" class="menu-link px-3 delete-item-btn"
                                                data-kt-users-table-filter="delete_row"><i
                                                    class="fas fa-trash me-3"></i>Delete</a>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>

                </table>
            <?php else: ?>
                <div class="alert alert-warning d-flex align-items-center p-5 mb-10">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                    <i class="fas fa-exclamation-circle fs-1 me-4 text-warning"></i>
                    <!--end::Svg Icon-->
                    <div class="d-flex flex-column">
                        <h4 class="text-warning mb-0 fw-normal">No Data Found</h4>
                    </div>
                </div>

            <?php endif; ?>
            <?php echo Form::model($item, ['route' => ['move-edfyops', $item->id],'method' => 'post','class' => 'form w-100 module_form', 'autocomplete' => 'off', 'data-parsley-validate' => true, 'files' => true , 'data-token' => csrf_token() ]); ?>

                <?php if($item->vista_status_id == 4): ?>
                    <button type="submit" class="btn btn-primary mb-4">Send to EdfyedOps </button>
                <?php endif; ?>
            <?php echo Form::close(); ?>

        </div>

        <?php if($application_document_list->hasPages()): ?>
            <div class="card-footer py-4">
                <div class="custom-pagination">
                    <?php echo $application_document_list->withQueryString()->links('pagination::bootstrap-5'); ?>

                </div>
            </div>
        <?php endif; ?>

    </div>
</div><?php /**PATH /home/hp/projects/edfyed/resources/views/front/lead_management/students/lead_vista/tabs/_application_document.blade.php ENDPATH**/ ?>