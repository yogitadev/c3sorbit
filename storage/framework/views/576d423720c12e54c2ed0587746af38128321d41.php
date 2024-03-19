<div class="tab-pane fade mt-5" id="tab_vista_record">
    <div class="card">
        <div class="card-body py-4">
            <?php if(isset($lead_vista_list) && count($lead_vista_list) > 0): ?>
            <div class="table-responsive">
                <table class="table align-middle table-row-dashed" id="custom-data-list" style="width=100%;">

                    <thead>
                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                            <th class="min-w-20px">
                                Sr
                            </th>
                            <th class="min-w-125px">Employee Name</th>
                            <th class="min-w-125px">
                                Entry Date
                            </th>
                            <th class="min-w-125px">
                                Entry Time
                            </th>
                            <th class="min-w-125px">
                                Purpose
                            </th>
                            <th class="min-w-125px">
                                Result
                            </th>
                            <th class="min-w-300px" >
                                Remarks
                            </th>
                        </tr>
                    </thead>

                    <tbody class="text-gray-600 fw-bold">
                        <?php $__currentLoopData = $lead_vista_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <?php echo e($key + 1); ?>

                                </td>
                                <td>
                                   <?php echo e($item->employee->first_name ?? '-'); ?>

                                   <?php echo e($item->employee->last_name ?? ' '); ?>

                                </td>
                                <td>
                                <?php echo date("d/m/Y",strtotime($item->created_at));?> <br>
                                </td>
                                <td>
                                    <?php echo date("h:i:s a",strtotime($item->created_at));?> <br>
                                </td>
                                <td>
                                    <?php echo e($item->purpose->name ?? '-'); ?>

                                </td>
                                <td>
                                    <?php echo e($item->result->name ?? '-'); ?>

                                </td>
                                <td>
                                    <div class="scroll-y mh-100px ">
                                        <?php echo $item->remark; ?>

                                    </div>
                                   
                                </td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>

                </table>
            </div>
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

        <?php if($lead_vista_list->hasPages()): ?>
            <div class="card-footer py-4">
                <div class="custom-pagination">
                    <?php echo $lead_vista_list->withQueryString()->links('pagination::bootstrap-5'); ?>

                </div>
            </div>
        <?php endif; ?>

    </div>
</div><?php /**PATH /home/hp/projects/edfyed/resources/views/front/lead_management/students/lead_vista/tabs/_vista_records.blade.php ENDPATH**/ ?>