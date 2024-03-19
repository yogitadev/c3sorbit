<div class="tab-pane fade mt-5" id="tab_get_application">
    
    <?php if($item->vista_status_id == 3 ): ?>
        <?php $str = base64_encode($item->unique_id);?>
        <p>
        Outstanding work, The application link is sent to the student via email. To be proactive, you can also forward this link to the student. As soon as the student submits the form, this screen will be updated. This means that if you see this screen, the form from the student is still incomplete. You can check the progress of the form at any time and complete it on behalf of the student.
        </p>
        <a href="<?php echo e(route('student-application', ['unique_id' => $str])); ?>">View Application Form</a>
        <!-- |
        <a class="clipboard">Click to Copy Application Link</a> -->
    <?php elseif($item->vista_status_id >= 4): ?>
        <div class="row">
            <div class="col-md-12">
                <h4>Personal Information</h4>
                <table class="table align-middle gx-5 border">
                    <tbody>
                        <tr>
                            <td>
                                <b>Have you entered EU before?</b>
                            </td>
                            <td>
                                <?php echo e($student_application->entered_eu_before ?? '-'); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Previously Enrolled At C3S?</b>
                            </td>
                            <td>
                                <?php echo e($student_application->pre_enroll ?? '-'); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Passport Number</b>
                            </td>
                            <td>
                                <?php echo e($student_application->passport_number ?? '-'); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Name</b>
                            </td>
                            <td>
                                <?php echo e($student_application->first_name ?? '-'); ?> 
                                <?php echo e($student_application->last_name ?? '-'); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Date of Birth</b>
                            </td>
                            <td>
                                <?php echo e($student_application->dob ?? '-'); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Gender</b>
                            </td>
                            <td>
                                <?php echo e($student_application->gender ?? '-'); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Country Of Birth</b>
                            </td>
                            <td>
                                <?php echo e($student_application->birth_country->name ?? '-'); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Nationality</b>
                            </td>
                            <td>
                                <?php echo e($student_application->nationality_country->name ?? '-'); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>National ID No/Citizenship</b>
                            </td>
                            <td>
                                <?php echo e($student_application->citizenship ?? '-'); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Country Of Issue</b>
                            </td>
                            <td>
                                <?php echo e($student_application->issue_country->name ?? '-'); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Valid Till</b>
                            </td>
                            <td>
                                <?php echo e($student_application->vaild_till ?? '-'); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Street 1</b>
                            </td>
                            <td>
                                <?php echo e($student_application->street_1 ?? '-'); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>City</b>
                            </td>
                            <td>
                                <?php echo e($student_application->city->name ?? '-'); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>State</b>
                            </td>
                            <td>
                                <?php echo e($student_application->state->name ?? '-'); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Country</b>
                            </td>
                            <td>
                                <?php echo e($student_application->county->name ?? '-'); ?>

                            </td>
                        </tr>
                    </tbody>
                </table>
                <h4>English Preficiency</h4>
                <table class="table align-middle gx-5 border">
                    <tbody>
                        <tr>
                            <td>
                                <b>English Proficiency test taken?</b>
                            </td>
                            <td>
                                <?php echo e($student_application->eng_test_taken); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Test Name</b>
                            </td>
                            <td>
                                <?php echo e($student_application->testname->name ?? '-'); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Test Date</b>
                            </td>
                            <td>
                                <?php echo e($student_application->test_date ?? '-'); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Score</b>
                            </td>
                            <td>
                                L => <?php echo e($student_application->l ?? '-'); ?> , R => <?php echo e($student_application->r ?? '-'); ?> , W => <?php echo e($student_application->w ?? '-'); ?> , S => <?php echo e($student_application->s ?? '-'); ?> , Overall => <?php echo e($student_application->overall ?? '-'); ?>

                            </td>
                        </tr>
                    </tbody>
                </table>
                <h4>Education records</h4>
                <table class="table align-middle gx-5 border">
                    <tbody class="">
                        <?php if(count($education_list) > 0): ?>
                            <?php $__currentLoopData = $education_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <b>Year</b>
                                    </td>
                                    <td>
                                        <?php echo e($education->year ?? '-'); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Title/Award</b>
                                    </td>
                                    <td>
                                        <?php echo e($education->title ?? '-'); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Awarding Institution/School</b>
                                    </td>
                                    <td>
                                        <?php echo e($education->awarding_school ?? '-'); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Language</b>
                                    </td>
                                    <td>
                                        <?php echo e($education->language ?? '-'); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Country</b>
                                    </td>
                                    <td>
                                        <?php echo e($education->country->name ?? '-'); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Percentage/Grades</b>
                                    </td>
                                    <td>
                                        <?php echo e($education->grade ?? '-'); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </tbody>
                </table>
                <h4>Employment history</h4>
                <table class="table align-middle gx-5 border">
                    <tbody>
                        <?php if(count($employement_history_list) > 0): ?>
                            <?php $__currentLoopData = $employement_history_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <b>From Date :</b>
                                    </td>
                                    <td>
                                        <?php if($employe->from_date != null): ?>
                                            <?php echo e($employe->from_date); ?>

                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php if($employe->is_working == 'OFF' || $employe->is_working == null ): ?>
                                    <tr>
                                        <td>
                                            <b>To Date :</b>
                                        </td>
                                        <td>
                                            <?php echo e($employe->to_date); ?>

                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <tr>
                                        <td>
                                            <b>Currently Working Here :</b>
                                        </td>
                                        <td>
                                            <?php echo e($employe->is_working); ?>

                                        </td>
                                    </tr>
                                <?php endif; ?>
                                <tr>
                                    <td>
                                        <b>Company :</b>
                                    </td>
                                    <td>
                                        <?php echo e($employe->company ?? '-'); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Designation :</b>
                                    </td>
                                    <td>
                                        <?php echo e($employe->designation ?? '-'); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Country :</b>
                                    </td>
                                    <td>
                                        <?php echo e($employe->country->name ?? '-'); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </tbody>
                </table>
                <h4>Contact Details</h4>
                <table class="table align-middle gx-5 border">
                    <tbody>
                        <tr>
                            <td>
                                <b>Email</b>
                            </td>
                            <td>
                                <?php echo e($student_application->email_id ?? '-'); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Skype ID</b>
                            </td>
                            <td>
                                <?php echo e($student_application->skype_id ?? '-'); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Mobile</b>
                            </td>
                            <td>
                                <?php echo e($student_application->mobile_no ?? '-'); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Emergency Contact Name</b>
                            </td>
                            <td>
                                -
                            </td>
                        </tr> 
                        <tr>
                            <td>
                                <b>Emergency Contact Mobile</b>
                            </td>
                            <td>
                                -
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Emergency Contact Email</b>
                            </td>
                            <td>
                                -
                            </td>
                        </tr>
                    </tbody>
                </table>
                <h4>Current Address</h4>
                <table class="table align-middle gx-5 border">
                    <tbody>
                        <tr>
                            <td>
                                <b>Street 1</b>
                            </td>
                            <td>
                                <?php if($student_application->same_passport_add == "ON"): ?>
                                    <?php echo e($student_application->street_1); ?>

                                <?php else: ?>
                                    <?php echo e($student_application->location_street1); ?>

                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>City</b>
                            </td>
                            <td>
                                <?php if($student_application->same_passport_add == "ON"): ?>
                                    <?php echo e($student_application->city->name ?? '-'); ?>

                                <?php else: ?>
                                    <?php echo e($student_application->location_city->name ?? '-'); ?>

                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>State/Provinance</b>
                            </td>
                            <td>
                                <?php if($student_application->same_passport_add == "ON"): ?>
                                    <?php echo e($student_application->state->name ?? '-'); ?>

                                <?php else: ?>
                                    <?php echo e($student_application->location_state->name ?? '-'); ?>

                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Country</b>
                            </td>
                            <td>
                                <?php if($student_application->same_passport_add == "ON"): ?>
                                    <?php echo e($student_application->country->name ?? '-'); ?>

                                <?php else: ?>
                                    <?php echo e($student_application->location_country->name ?? '-'); ?>

                                <?php endif; ?>
                            </td>
                        </tr> 
                    </tbody>
                </table>
                <h4>Financial Resources</h4>
                <table class="table align-middle gx-5 border">
                    <tbody>
                        <tr>
                            <td>
                                <b>Who is going to sponsor your studies?</b>
                            </td>
                            <td>
                                <?php echo e($student_application->sponsor_name ?? '-'); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>What are your financial sponsors (parent’s) occupation?</b>
                            </td>
                            <td>
                                <?php echo e($student_application->	sponsor_occupation ?? '-'); ?>

                            </td>
                        </tr>
                    </tbody>
                </table>
                <h4>Current Visa Information</h4>
                <table class="table align-middle gx-5 border">
                    <tbody>
                        <tr>
                            <td>
                                <b>Are you applying for visa from home contry ?</b>
                            </td>
                            <td>
                                <?php echo e($student_application->is_visa_home_country ?? '-'); ?>

                            </td>
                        </tr>
                        <?php if($student_application->is_visa_home_country == "No"): ?>
                            <tr>
                                <td>
                                    <b>Country :</b>
                                </td>
                                <td>
                                    <?php echo e($student_application->visa_country->name ?? '-'); ?>

                                
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Vista Status :</b>
                                </td>
                                <td>
                                    <?php echo e($student_application->vista_status ?? '-'); ?>

                                
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <h4>Attachments</h4>
                <table class="table align-middle gx-5 border">
                    <tbody>
                        <?php if($student_application->has_passport == "Yes"): ?>
                            <tr>
                                <td>
                                    <b>Passport Front</b>
                                </td>
                                <td>
                                    <?php 
                                        $arr = ($student_application->attachment_application)->toArray();
                                        $key = array_search('passport_front', array_column($arr, 'title'));
                                        
                                        $url = ($student_application->attachment_application[$key]->getUrl());
                                    ?>
                                    <a href="<?php echo e($url); ?>" target="_blank">
                                        Click to view
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Passport Back</b>
                                </td>
                                <td>
                                    <?php 
                                        $arr = ($student_application->attachment_application)->toArray();
                                        $key = array_search('passport_back', array_column($arr, 'title'));
                                        
                                        $url = ($student_application->attachment_application[$key]->getUrl());
                                    ?>
                                    <a href="<?php echo e($url); ?>" target="_blank">
                                        Click to view
                                    </a>
                                </td>
                            </tr>
                        <?php endif; ?>
                        <?php if($student_application->has_passport == "No" && $student_application->applied_passport == "Yes"): ?>
                            <tr>
                                <td>
                                    <b>Passport Application Conformation :</b>
                                </td>
                                <td>
                                    <?php 
                                        $arr = ($student_application->attachment_application)->toArray();
                                        $key = array_search('passport_application_conformation', array_column($arr, 'title'));
                                        
                                        $url = ($student_application->attachment_application[$key]->getUrl());

                                    ?>
                                    <a href="<?php echo e($url); ?>" target="_blank">
                                        Click to view
                                    </a>
                                </td>
                            </tr>
                        <?php endif; ?>
                        <tr>
                            <td>
                                <b>Education Document</b>
                            </td>
                            <td>
                                <?php
                                    foreach($education_list as $education) {
                                        $arr = ($student_application->attachment_application)->toArray();
                                        $key = array_search($education->title, array_column($arr, 'title'));
                                        $url = $student_application->attachment_application[$key]->getUrl();
                                        echo "<a href='".$url."' target='_blank'>Click to view</a>    ";
                                    } 
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Bank Statement</b>
                            </td>
                            <td>Click to View</td>
                        </tr>
                        <tr>
                            <td>
                                <b>Student Contract</b>
                            </td>
                            <td>Click to View</td>
                        </tr>
                        <tr>
                            <td>
                                <b>Student Declaration Form</b>
                            </td>
                            <td>Click to View</td>
                        </tr>
                    </tbody>
                </table>
                <h4>Remarks</h4>
                <table class="table align-middle gx-5 border">
                    <tbody>
                        <tr>
                            <td>
                                <b>Remarks</b>
                            </td>
                            <td>
                                <?php echo e($student_application->remark ?? '-'); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Prefered Program</b>
                            </td>
                            <td>
                                <?php echo e($student_application->programcode->program_name ?? '-'); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Intake</b>
                            </td>
                            <td>
                                <?php echo e($student_application->intake->name ?? '-'); ?>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    <?php else: ?>

        <?php echo Form::model($item, ['route' => ['get-application', $item->unique_id],'method' => 'post','class' => 'form w-100 module_form', 'autocomplete' => 'off', 'data-parsley-validate' => true, 'files' => true , 'data-token' => csrf_token() ]); ?>

            <div class="row">
                <div class="col-md-6 mb-5">
                    <label class="form-label required fs-6">Student Name</label>
                    <?php echo Form::text('name', $item->name, ['class' => 'form-control','required' => 'true']); ?>

                </div>
                <div class="col-md-6 mb-5">
                    <label class="form-label required fs-6">Email</label>
                    <?php echo Form::text('email_id', $item->email_id, ['class' => 'form-control','required' => 'true']); ?>

                </div>
            </div>
            <div class=" d-flex justify-content-start py-6 px-9">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        <?php echo Form::close(); ?>

    <?php endif; ?>
</div><?php /**PATH /home/hp/projects/edfyed/resources/views/front/lead_management/students/lead_vista/tabs/_get_application.blade.php ENDPATH**/ ?>