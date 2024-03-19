<!-- <button type="button" class="btn btn-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
    <i class="fas fa-file-import fs-4 me-1"></i>
    Import
</button> -->
<a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_import">
    <i class="fas fa-file-import fs-4 me-1"></i>
    Import
</a>

<div class="modal fade" id="kt_modal_import" tabindex="-1" aria-hidden="true" role="dialog">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-dialog-centered mw-500px" role="document">
				<!--begin::Modal content-->
				<div class="modal-content">
					<!--begin::Modal header-->
					<div class="modal-header">
						<!--begin::Modal title-->
						<h2>Import File</h2>
						<!--end::Modal title-->
					</div>
					<!--end::Modal header-->
					<!--begin::Modal body-->
					<div class="modal-body py-lg-10 px-lg-10">
                        <div class="row mb-5">
                            <div class="col-4"><b>Template</b></div>
                            <div class="col-4"><a href="<?php echo e(asset('themes/front/sample_files/lead_management/lead_format.csv')); ?>" download="lead_format">Sample File</a></div>
                        </div>
						<!--begin::Stepper-->
                            <?php echo Form::open(['route' => ['import-student'],'method' => 'post','class' => 'form w-100 module_form', 'autocomplete' => 'off', 'data-parsley-validate' => true, 'files' => true , 'data-token' => csrf_token() ]); ?>

                            <div class="stepper stepper-pills stepper-column w-125" id="kt_modal_create_app_stepper">
                                <div class="">
                                    <label class="form-label required fs-6">Attachment</label>
                                        <?php echo Form::file('file', ['class' => 'form-control','accept' => '.csv', 'required' => true]); ?>

                                </div>
                                <div class="my-9">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </div>
                            </div>  
                        <?php echo Form::close(); ?>

						<!--end::Stepper-->
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div><?php /**PATH /home/hp/projects/edfyed/resources/views/front/lead_management/students/import/_import.blade.php ENDPATH**/ ?>