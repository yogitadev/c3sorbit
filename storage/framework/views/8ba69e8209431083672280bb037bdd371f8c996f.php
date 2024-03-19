<div class="tab-pane fade mt-5" id="tab_vista_history">
    <div class="card">
        <div class="card-body py-4">
            <?php if(isset($history_list) && count($history_list) > 0): ?>
                <?php $__currentLoopData = $history_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <h2><?php echo e($hitem->title); ?></h2>
                    <div class="row">
                        <div class="col-12">
                            <table class="table align-middle gs-0 gy-3">
                                <tbody>
                                    <?php if($hitem->title == "Updated Vista"): ?>
                                        <tr>
                                            <td>
                                                <b>Purpose :</b>
                                            </td>
                                            <td>
                                                <?php echo e($hitem->purpose); ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <b>Result :</b>
                                            </td>
                                            <td>
                                                <?php echo e($hitem->result); ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <b>Remark : </b>
                                            </td>
                                            <td>
                                                <?php echo $hitem->remark; ?>

                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if($hitem->title == "Update Interview Schedule"): ?>
                                        <?php 
                                            $count = (count($hitem->acitivity_log_changes));
                                            $feedback = "-";
                                            if($count == 1) {
                                                $status = "Fail";
                                            }
                                            else if($count == 2) {
                                                $status = "Pass";
                                                $feedback = $hitem->acitivity_log_changes[0]['new_value'];

                                            } else {
                                                $status = "-";
                                            }
                                        ?>
                                        <tr>
                                            <td>
                                                <b>Status :</b>
                                            </td>
                                            <td>
                                                <?php echo e($status); ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <b>Feedback :</b>
                                            </td>
                                            <td>
                                               <?php echo $feedback; ?>

                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if( $hitem->title == "Interview Schedule"): ?>
                                        <?php 
                                            $interview = $hitem->acitivity_log_changes;
                                            $date = $interview[0]['new_value'];
                                            $time = $interview[1]['new_value'];
                                            $datetime = date("d/m/Y", strtotime($date)) ." " . $time;
                                        ?>
                                        <tr>
                                            <td>
                                                <b>Interview Date Time : </b>
                                            </td>
                                            <td>
                                                <?php echo e($datetime); ?>

                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if($hitem->title == "COL Generated"): ?>
                                    <?php
                                        if($hitem->file_name != null)
                                        $path = \Storage::url('uploads/media/offer_letter/'.$hitem->file_name);
                                    ?>
                                    <tr>
                                        <td> <b>File :</b></td>
                                        <td>
                                            <a href="<?php echo e($path); ?>" target="_blank"><i class="fas fa-file-pdf text-primary" ></i> Click to view</a>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php if($hitem->title == "Visa Letter Generated" || $hitem->title == "Visa Letter ReGenerated"): ?>
                                        <?php
                                            if($hitem->mfile_name != null) {

                                                $path = \Storage::url('uploads/media/visa_letter/'.$hitem->mfile_name);
                                               //print_r($hitem);
                                            }
                                        ?>
                                        <tr>
                                            <td> <b>File :</b></td>
                                            <td>
                                                <a href="<?php echo e($path); ?>" target="_blank"><i class="fas fa-file-pdf text-primary" ></i> Click to view</a>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <tr>
                                        <td>
                                            <b>Created Date :</b>
                                        </td>
                                        <td>
                                            <?php echo e($hitem->created_at); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>Updated By :</b>
                                        </td>
                                        <td>
                                            <?php echo e($hitem->user_first_name); ?> <?php echo e($hitem->user_last_name); ?>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="separator my-5"></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <?php if(isset($item)): ?>
                <h2>Lead Created</h2>
                <div class="row">
                    <div class="col-12">
                        <table class="table align-middle gs-0 gy-3">
                            <tbody>
                                <tr>
                                    <td>
                                        <b>Timestamp:</b>
                                    </td>
                                    <td>
                                        <?php 
                                            $date = date_create($item->lead_date);
                                            echo date_format($date,"d/m/Y h:i:s A");?> 
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Update By:</b>
                                    </td>
                                    <td>
                                        <?php echo e($item->user->first_name); ?> <?php echo e($item->user->last_name); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Vista ID:</b>
                                    </td>
                                    <td>
                                        <?php echo e($item->vista_id); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Campaign ID:</b>
                                    </td>
                                    <td>
                                        <?php if($item->campaign_id != null): ?>
                                            <?php echo e($item->campaign->original_campaign_id); ?>

                                        <?php else: ?> 
                                            -
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Platform:</b>
                                    </td>
                                    <td>
                                        <?php if($item->platform_id != null): ?>
                                            <?php echo e($item->platform->title); ?>

                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Mode:</b>
                                    </td>
                                    <td>
                                        <?php if($item->mode_id != null): ?>
                                            <?php echo e($item->mode->title); ?>

                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Country:</b>
                                    </td>
                                    <td>
                                        <?php if($item->country_id != null): ?>
                                            <?php echo e($item->country->name); ?>

                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Student Details:</b>
                                    </td>
                                    <td>
                                        <?php echo e($item->name); ?> , <?php echo e($item->mobile_number); ?> , <?php echo e($item->email_id); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Course:</b>
                                    </td>
                                    <td>
                                        <?php if($item->programcode_id != null): ?>
                                            <?php echo e($item->programcode->program_name); ?>

                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Lead Origin Date-time:</b>
                                    </td>
                                    <td>
                                        <?php 
                                            $date = date_create($item->lead_date);
                                            echo date_format($date,"d/m/Y");?> 
                                            <?php echo date("h:i:s A",strtotime($item->lead_time));?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Institution, Campus:</b>
                                    </td>
                                    <td>
                                        <?php echo e($item->institution->name ?? '-'); ?> , <?php echo e($item->campus->name ?? '-'); ?>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div><?php /**PATH /home/hp/projects/edfyed/resources/views/front/lead_management/students/lead_vista/tabs/_vista_history.blade.php ENDPATH**/ ?>