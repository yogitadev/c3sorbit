<div class="table-responsive">
    <table class="table align-middle table-row-dashed" id="custom-data-list">
        <thead>
            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                <th class="min-w-125px">
                    Student Name: 
                </th>
                <th class="min-w-125px">Current Coordinator: </th>
                <th class="min-w-125px">
                Vista ID
                </th>
                <th class="min-w-125px">
                Application Stage
                </th>
                <th class="min-w-125px">
                Campus
                </th>
            </tr>
        </thead>
        <tbody class="text-gray-600 fw-bold">
                <tr>
                    <td>
                        <?php echo e($item->name); ?>

                    </td>
                    <td>
                    
                    </td>
                    <td>
                    <?php echo e($item->vista_id); ?> 
                    </td>
                    <td>
                        <?php echo e($item->vista_status->name); ?>

                    </td>
                    <td>
                        <?php if($item->campus_id!= null): ?>  
                            <?php echo e($item->campus->name); ?> 
                        <?php else: ?> 
                            -
                        <?php endif; ?>
                    </td>
                </tr>
        </tbody>
    </table>
    <table class="table align-middle table-row-dashed" id="custom-data-list">
        <thead>
            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                <th class="min-w-125px">
                    Program
                </th>
                <th class="min-w-125px">Agency Name: </th>
                <th class="min-w-125px">
                Email ID
                </th>
                <th class="min-w-125px">
                Intake 
                </th>
                <th class="min-w-125px">
                Current Time
                </th>
            </tr>
        </thead>
        <tbody class="text-gray-600 fw-bold">
                <tr>
                    <td>
                        <?php echo e($item->programcode->program_name ?? '-'); ?>

                    </td>
                    <td>
                    
                    </td>
                    <td>
                    <?php echo e($item->email_id); ?> <br>
                    <?php echo e($item->mobile_number); ?>

                    </td>
                    <td>
                       C : <?php echo e($student_application->intake->name ?? '-'); ?>

                    </td>
                    <td>
                        <?php 
                        $date = date_create($item->lead_date);
                        echo date_format($date,"d/m/Y");?> 
                        <?php echo date("h:i:s a",strtotime($item->lead_time));?> <br>
                        <?php echo e($item->country->name ?? '-'); ?> 
                    </td>
                </tr>
        </tbody>
    </table>
</div>
<div class="separator my-5"></div><?php /**PATH /home/hp/projects/edfyed/resources/views/front/lead_management/students/lead_vista/_student_details.blade.php ENDPATH**/ ?>