<?php $__env->startSection('page_title', 'Application Form'); ?>
<?php $__env->startSection('sub_header'); ?>
<div class=" row">
    <div class="col-md-1">
    <i class="fas fa-search"></i>
    </div>
    <div class=" col-md-3">
        <div class="step-counter-row">Step <span class="step-number">10/10</span></div>
        <h3>Application Preview</h3>
    </div>
</div>   
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('front.includes.formErrors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo Form::model($item, ['route' => ['application-complete', $unique_id],'method' => 'post','class' => 'form w-100 module_form', 'autocomplete' => 'off', 'data-parsley-validate' => true, 'files' => true , 'data-token' => csrf_token() ]); ?>


    <div class="row">
        <div class="col-md-5 mb-5 pt-5 ">
            <table class="table align-middle gx-5 bg-white text-dark">
                <tbody>
                    <tr>
                        <td>
                            <h2>Personal Information </h2>
                        </td>
                        <td class="d-flex justify-content-end">
                            <a href="<?php echo e(route('student-application', ['unique_id' => $unique_id])); ?>">
                                <i class="fa fa-edit text-primary"></i>
                            </a>
                        </td>
                    </tr>
                    <?php if($item->has_passport == "Yes"): ?>
                        <tr>
                            <td>
                                <b>Passport Number :</b>
                            </td>
                            <td>
                                <?php if($item->passport_number != null): ?>
                                    <?php echo e($item->passport_number); ?>

                                <?php else: ?>
                                    -
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <tr>
                        <td>
                            <b>First Name :</b>
                        </td>
                        <td>
                            <?php echo e($item->first_name); ?>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Last Name :</b>
                        </td>
                        <td>
                            <?php echo e($item->last_name); ?>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Date Of Bitrh :</b>
                        </td>
                        <td>
                            <?php echo e($item->dob); ?>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Gender :</b>
                        </td>
                        <td>
                            <?php echo e($item->gender); ?>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Citizenship :</b>
                        </td>
                        <td>
                            <?php if($item->citizenship != null): ?>
                                <?php echo e($item->citizenship); ?>

                            <?php else: ?>
                                -
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>National ID No :</b>
                        </td>
                        <td>
                            <?php echo e($item->nationality_country->name); ?>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Country Of Issue :</b>
                        </td>
                        <td>
                            <?php echo e($item->issue_country->name); ?>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Valid Till :</b>
                        </td>
                        <td>
                            <?php echo e($item->vaild_till); ?>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Street 1 :</b>
                        </td>
                        <td>
                            <?php echo e($item->street_1); ?>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>City :</b>
                        </td>
                        <td>
                            <?php echo e($item->city->name); ?>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>State :</b>
                        </td>
                        <td>
                            <?php echo e($item->state->name); ?>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Country :</b>
                        </td>
                        <td>
                            <?php echo e($item->country->name ?? '-'); ?>

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-6 mb-5 pt-5">
            <table class="table align-middle gx-5 bg-white text-dark">
                <tbody>
                    <tr>
                        <td>
                            <h2>Employement History  </h2>
                        </td>
                        <td class="d-flex justify-content-end">
                            <a href="<?php echo e(route('application-employment-history', ['unique_id' => $unique_id])); ?>">
                                <i class="fa fa-edit text-primary"></i>
                            </a>
                        </td>
                    </tr>
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
                                    <b>Designation :</b>
                                </td>
                                <td>
                                    <?php echo e($employe->designation); ?>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Country :</b>
                                </td>
                                <td>
                                    <?php echo e($employe->country->name); ?>

                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 mb-5 pt-5 bg-white text-dark">
            <table class="table align-middle gx-5">
                <tbody>
                    <tr>
                        <td>
                            <h2>English Preficiency  </h2>
                        </td>
                        <td class="d-flex justify-content-end">
                            <a href="<?php echo e(route('english-proficiency', ['unique_id' => $unique_id])); ?>">
                                <i class="fa fa-edit text-primary"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>English Preficiency Test Taken :</b>
                        </td>
                        <td>
                            <?php echo e($item->eng_test_taken); ?>

                           
                        </td>
                    </tr>
                    <?php if($item->eng_test_taken == "Yes"): ?>
                        <tr>
                            <td>
                                <b>Test Name :</b>
                            </td>
                            <td>
                                <?php echo e($item->testname->name ?? '-'); ?>

                            
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Test Date :</b>
                            </td>
                            <td>
                                <?php echo e($item->test_date); ?>

                            
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Listining :</b>
                            </td>
                            <td>
                                <?php echo e($item->l); ?>

                            
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Reading :</b>
                            </td>
                            <td>
                                <?php echo e($item->r); ?>

                            
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Writting :</b>
                            </td>
                            <td>
                                <?php echo e($item->w); ?>

                            
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Speaking :</b>
                            </td>
                            <td>
                                <?php echo e($item->s); ?>

                            
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Overall :</b>
                            </td>
                            <td>
                                <?php echo e($item->overall); ?>

                            
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-6 col-md-6 mb-5 pt-5 bg-white text-dark">
            <table class="table align-middle gx-5">
                <tbody>
                    <tr>
                        <td>
                            <h2>Contact Details  </h2>
                        </td>
                        <td class="d-flex justify-content-end">
                            <a href="<?php echo e(route('application-contact', ['unique_id' => $unique_id])); ?>">
                                <i class="fa fa-edit text-primary"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Email :</b>
                        </td>
                        <td>
                            <?php echo e($item->email_id); ?>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Mobile: </b>
                        </td>
                        <td>
                            <?php echo e($item->mobile_no); ?>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h2>Emergency Contact  </h2>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Full Name :</b>
                        </td>
                        <td>
                            -
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Mobile :</b>
                        </td>
                        <td>
                            -
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Email: </b>
                        </td>
                        <td>
                            -
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h2>Current Address  </h2>
                        </td>
                        <td class="d-flex justify-content-end">
                            <a href="<?php echo e(route('application-location', ['unique_id' => $unique_id])); ?>">
                                <i class="fa fa-edit text-primary"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Street 1 :</b>
                        </td>
                        <td>
                            <?php if($item->same_passport_add == "ON"): ?>
                                <?php echo e($item->street_1); ?>

                            <?php else: ?>
                                <?php echo e($item->location_street1); ?>

                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>City: </b>
                        </td>
                        <td>
                            <?php if($item->same_passport_add == "ON"): ?>
                                <?php echo e($item->city->name); ?>

                            <?php else: ?>
                                <?php echo e($item->location_city->name); ?>

                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>State: </b>
                        </td>
                        <td>
                            <?php if($item->same_passport_add == "ON"): ?>
                                <?php echo e($item->state->name); ?>

                            <?php else: ?>
                                <?php echo e($item->location_state->name); ?>

                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Country: </b>
                        </td>
                        <td>
                            <?php if($item->same_passport_add == "ON"): ?>
                                <?php echo e($item->country->name ?? '-'); ?>

                            <?php else: ?>
                                <?php echo e($item->location_country->name); ?>

                            <?php endif; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 mb-5 pt-5 ">
            <table class="table align-middle gx-5 bg-white text-dark">
                <tbody>
                    <tr>
                        <td>
                            <h2>Education Record   </h2>
                        </td>
                        <td class="d-flex justify-content-end">
                            <a href="<?php echo e(route('application-education', ['unique_id' => $unique_id])); ?>">
                                <i class="fa fa-edit text-primary"></i>
                            </a>
                        </td>
                    </tr>
                    <?php if(count($education_list) > 0): ?>
                        <?php $__currentLoopData = $education_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <b>Year :</b>
                                </td>
                                <td>
                                    <?php echo e($education->year); ?>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Title :</b>
                                </td>
                                <td>
                                    <?php echo e($education->title); ?>

                                </td>
                            </tr>
                        
                            <tr>
                                <td>
                                    <b>Institution/School :</b>
                                </td>
                                <td>
                                    <?php echo e($education->awarding_school); ?>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Language :</b>
                                </td>
                                <td>
                                    <?php echo e($education->language); ?>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Country :</b>
                                </td>
                                <td>
                                    <?php echo e($education->country->name); ?>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Grade :</b>
                                </td>
                                <td>
                                    <?php echo e($education->grade); ?>

                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-6 col-md-6 mb-5 pt-5 ">
            <table class="table align-middle gx-5 bg-white text-dark">
                <tbody>
                    <tr>
                        <td>
                            <h2>Financial Resources   </h2>
                        </td>
                        <td class="d-flex justify-content-end">
                            <a href="<?php echo e(route('application-financial', ['unique_id' => $unique_id])); ?>">
                                <i class="fa fa-edit text-primary"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Who is going to sponsor your studies? :</b>
                        </td>
                        <td>
                            <?php echo e($item->sponsor_name); ?>

                           
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>What are your financial sponsors (parent’s) occupation? :</b>
                        </td>
                        <td>
                            <?php echo e($item->sponsor_occupation); ?>

                           
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Are you applying for visa from home contry ? :</b>
                        </td>
                        <td>
                            <?php echo e($item->is_visa_home_country); ?>

                           
                        </td>
                    </tr>
                    <?php if($item->is_visa_home_country == "No"): ?>
                        <tr>
                            <td>
                                <b>Country :</b>
                            </td>
                            <td>
                                <?php echo e($item->visa_country->name); ?>

                            
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Vista Status :</b>
                            </td>
                            <td>
                                <?php echo e($item->vista_status ?? '-'); ?>

                            
                            </td>
                        </tr>
                    <?php endif; ?>
                    <tr>
                        <td>
                            <h2>Attchments    </h2>
                        </td>
                        <td class="d-flex justify-content-end">
                            <a href="<?php echo e(route('application-attachment', ['unique_id' => $unique_id])); ?>">
                                <i class="fa fa-edit text-primary"></i>
                            </a>
                        </td>
                    </tr>
                    <?php if($item->has_passport == "Yes"): ?>
                        <tr>
                            <td>
                                <b>Passport Front :</b>
                            </td>
                            <td>
                                <?php 
                                    $arr = ($item->attachment_application)->toArray();
                                    $key = array_search('passport_front', array_column($arr, 'title'));
                                    echo($item->attachment_application[$key]['original_file_name']);
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Passport Back :</b>
                            </td>
                            <td>
                                <?php 
                                    $arr = ($item->attachment_application)->toArray();
                                    $key = array_search('passport_back', array_column($arr, 'title'));
                                    echo($item->attachment_application[$key]['original_file_name']);
                                ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if($item->has_passport == "No" && $item->applied_passport == "Yes"): ?>
                        <tr>
                            <td>
                                <b>Passport Application Conformation :</b>
                            </td>
                            <td>
                                <?php 
                                    $arr = ($item->attachment_application)->toArray();
                                    $key = array_search('passport_application_conformation', array_column($arr, 'title'));
                                    echo($item->attachment_application[$key]['original_file_name']);
                                ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if($item->eng_test_taken == "Yes"): ?>
                        <tr>
                            <td>
                                <b>English Proficiency Doc :</b>
                            </td>
                            <td>
                                <?php 
                                    $arr = ($item->attachment_application)->toArray();
                                    $key = array_search('ep_doc', array_column($arr, 'title'));
                                    echo($item->attachment_application[$key]['original_file_name']);
                                ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <tr>
                        <td>
                            <h2>Comment    </h2>
                        </td>
                        <td class="d-flex justify-content-end">
                            <a href="<?php echo e(route('application-remarks', ['unique_id' => $unique_id])); ?>">
                                <i class="fa fa-edit text-primary"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Remark :</b>
                        </td>
                        <td>
                            <?php echo e($item->remark ?? '-'); ?>

                           
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Prefered Program :</b>
                        </td>
                        <td>
                            <?php echo e($item->programcode->program_name); ?>

                           
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Intake :</b>
                        </td>
                        <td>
                            <?php echo e($item->intake->name); ?>

                           
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-md-12">
            <?php echo Form::checkbox('term_condition', null,false,['class' => 'form-check-input mx-3', 'id' => 'term_condition', 'required' => 'true']); ?>

                <b class="required fs-6">  I accept all terms and conditions.</b>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-5">
            <ul>
                <li>
                    I agree to pay all fees for which I am liable, and have read and agree to abide by Institution´s Student rules, policies, procedures and guidelines including the Student Fees, charges and refunds policies, which are available on the Institution website. 
                </li>
                <li>
                    I agree to the refund policy which is available on the Institution website. 
                </li>
                <li>
                    I consent to information collected about me on this form being disclosed if authorised or required by law, and/or in certain circumstances the Spanish Government and/or designated authorities autho-rised by on the Institution. 
                </li>
                <li>
                    I declare that the information I have provided on this application form is true and complete and authorise on the Institution website. to obtain further information required to complete enrolment. 
                </li>
                <li>
                    I understand that I cannot change my education provider during the first year of my course, except in limited circumstances, without a written letter of release from on the Institution and an official offer of a place from another registered education provider. 
                </li>
                <li>
                    I agree that I am fully responsible for all education and living expenses, both for myself and for all my dependents that accompany me while I am studying at applied institution. 
                </li>
            </ul>
        </div>
    </div>
    <div class="d-flex justify-content-end py-6 px-9">
            <button type="submit" class="btn btn-primary">Save & Continue</button>
    </div>
<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.lead_management.students.form_applications.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/edfyed/resources/views/front/lead_management/students/form_applications/application_preview.blade.php ENDPATH**/ ?>