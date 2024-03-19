<div class="alert alert-danger error" style="display: none;">
    <div class="alert-text">
        <p>Please change Lecture Date & Lecture Time No Slot Available.</p>
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-5 position-relative select-2-field">
        <label class="form-label fs-6 required">Select Course</label>
        {!! Form::select('programcode_id', $program_list, null, [
            'class' => 'form-select',
            'id' => 'parent_programcode_id',
            'required' => true,
            'data-control' => 'select2',
            'placeholder' => 'Please select Course',
            'data-parsley-errors-container' => '#course-error',
        ]) !!}
        <div id="course-error"></div>
    </div>
    <div class="col-md-6 mb-5 position-relative select-2-field">
        <label class="form-label fs-6 required">Select Subject</label>
        {!! Form::select('subject_id', $subject_list, null, [
            'class' => 'form-select',
            'id' => 'parent_subject_id',
            'required' => true,
            'data-control' => 'select2',
            'placeholder' => 'Please select subject',
            'data-parsley-errors-container' => '#subject-error',
        ]) !!}
        <div id="subject-error"></div>
    </div>
    <div class="col-md-6 mb-5">

        <label class="form-label required fs-6">Date</label>
        {!! Form::date('lecture_date', null, ['class' => 'form-control','required' => 'true', 'min' => date("Y-m-d"), 'id' => 'lecture_date']) !!}

    </div>
    <div class="col-md-6 mb-5">

        <label class="form-label required fs-6">Time</label>
        {!! Form::time('lecture_time', null, ['class' => 'form-control','required' => 'true', 'id' => 'lecture_time']) !!}

    </div>
</div>
<div class="separator my-5"></div>

<div class="row">
    <div class="col-md-6 mb-5">
        <label class="form-label fs-6 required">Status</label>
        {!! Form::select('status', ['Active' => 'Active', 'Inactive' => 'Inactive'], null, [
            'class' => 'form-select',
            'required' => true,
        ]) !!}
    </div>
</div>

@push('page_js')
<script type="text/javascript">
    $(function() {
        <?php if(isset($item)) { ?>
            var item = <?php echo json_encode($item); ?>;
            var title = '{{ route('edit-lecture-schedule',['unique_id' => $item->unique_id]) }}';
        <?php } else { ?>
            var title = '{{ route('create-lecture-schedule') }}';
        <?php }?>
        var timeInput = document.getElementById('lecture_time');
       
        timeInput.addEventListener('input', function() {
            var selectedTime = this.value;
            var date = $('#lecture_date').val();

            $.ajax({
                type: 'GET',
                url: title+'?date='+date+'&time='+selectedTime,
                success: function(e) {
                    if(e.length > 0) {
                        var disabledTimes = e;
                        if (disabledTimes.includes(selectedTime)) {
                            // Reset the value to an empty string
                               //$('#lecture_time').val('');
                               $('.error').show();
                               $('#save_btn').attr('disabled', 'disabled');
                        } else {
                            $('.error').show();
                            $('#save_btn').removeAttr('disabled');
                        }
                    } else {
                        $(".error").hide();
                        $('#save_btn').removeAttr('disabled');
                    }
                },
            });

        });
    });
</script>
@endpush

