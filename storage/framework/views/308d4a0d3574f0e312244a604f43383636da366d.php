<div class="tab-pane fade mt-5" id="tab_vista_attachment">
    <div class="card">

        <div class="card-body py-4">
            <?php if(isset($vista_document_list) && count($vista_document_list) > 0): ?>
           
                <?php echo Form::model($item, ['route' => ['move-application', $item->id],'method' => 'post','class' => 'form w-100 module_form', 'autocomplete' => 'off', 'data-parsley-validate' => true, 'files' => true , 'data-token' => csrf_token() ]); ?>

                    <button type="submit" class="btn btn-primary mb-4">Move to Application </button>
                    <table class="table align-middle table-row-dashed" id="custom-data-list">

                        <thead>
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th class="list-checkbox">
                                    <?php echo Form::checkbox('check_list',null,false,['class' => 'form-check-input selecctall']); ?>

                                </th>
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
                            <?php $__currentLoopData = $vista_document_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="list-checkbox skip-href">
                                        <?php echo Form::checkbox('selected_ids[]', $item->unique_id,false,['class' => 'form-check-input check_list checkbox1', 'disabled' => $item->is_application == '0' ? false : true ]); ?>

                                    </td>
                                    <td>
                                        <?php echo e($item->unique_id); ?>

                                    </td>
                                    <td>
                                        <?php if($item->attachment_type_id != null): ?>
                                            <?php echo e($item->attachment_type->name); ?> 
                                        <?php else: ?> 
                                            - 
                                    <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php echo e($item->file_size); ?>

                                    </td>
                                    <td>
                                        <?php echo e($item->original_file_name); ?>

                                    </td>
                                    <td class="text-end">

                                        <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions <i
                                                class="fas fa-angle-down ms-1"></i>
                                        </a>

                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fs-7 w-150px py-4"
                                            data-kt-menu="true">

                                            <div class="menu-item px-3">
                                                <?php if($item->file_type == 'image/png' || $item->file_type == 'image/jpg' || $item->file_type == 'image/jpeg' ): ?>
                                                    <a href="<?php echo e($item->getUrl()); ?>"  class="menu-link px-3" data-fancybox=""><i class="fas fa-eye me-3" aria-hidden="true"></i>View</a>
                                                <?php else: ?> 
                                                    <a href="<?php echo e($item->getUrl()); ?>"  class="menu-link px-3" download="<?php echo e($item->original_file_name); ?>"><i class="fas fa-download me-3" aria-hidden="true"></i>Download</a>
                                                <?php endif; ?>
                                            </div>

                                            <div class="menu-item px-3">
                                                <a href="<?php echo e(route('delete-lead-vista', ['unique_id' => $item->unique_id, 'lead_id' => $item->lead_id])); ?>"
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
                <?php echo Form::close(); ?>

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

        </div>

        <?php if($vista_document_list->hasPages()): ?>
            <div class="card-footer py-4">
                <div class="custom-pagination">
                    <?php echo $vista_document_list->withQueryString()->links('pagination::bootstrap-5'); ?>

                </div>
            </div>
        <?php endif; ?>

    </div>
</div>
<?php $__env->startPush('page_js'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $(document).ready(function () {
                $('.selecctall').click(function (event) {
                    if (this.checked) {
                        $('.checkbox1').each(function () {
                            this.checked = true;
                        });
                    } else {
                        $('.checkbox1').each(function () {
                            this.checked = false;
                        });
                    }
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/hp/projects/edfyed/resources/views/front/lead_management/students/lead_vista/tabs/_vista_attachment.blade.php ENDPATH**/ ?>