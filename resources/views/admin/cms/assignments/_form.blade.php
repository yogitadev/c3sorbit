<div class="row">
    <div class="col-md-6 mb-5 position-relative select-2-field">
        <label class="form-label fs-6 required">Select Faculty</label>
        {!! Form::select('faculty_id', $faculty_list, null, [
            'class' => 'form-select',
            'id' => 'parent_faculty_id',
            'required' => true,
            'data-control' => 'select2',
            'placeholder' => 'Please select Faculty',
            'data-parsley-errors-container' => '#faculty-error',
        ]) !!}
        <div id="faculty-error"></div>
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
    <div class="col-md-12 mb-5">
        <label class="form-label required fs-6">Assignment Title</label>
        {!! Form::text('assignment_title', null, ['class' => 'form-control', 'required' => true]) !!}
    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Start Date</label>
        {!! Form::date('start_date', null, ['class' => 'form-control', 'min' => date("Y-m-d"), 'required' => true]) !!}
    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">End Date</label>
        {!! Form::date('end_date', null, ['class' => 'form-control', 'min' => date("Y-m-d"), 'required' => true]) !!}
    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Document</label>
        {!! Form::file('media', ['class' => 'form-control','accept' => '.doc, .dox, .pdf','required' => isset($item) && !is_null($item->media) ? false : true ]) !!}

        @if (isset($item) && !is_null($item) && !is_null($item->media))
            <div class="thumb">
                <!-- <a data-fancybox href="{{ $item->media->getUrl() }}">
                    <img src="{{ $item->media->fitThumbUrl() }}" class="img-thumbnail" class="clearfix" />
                </a> -->
                <a href="{{ $item->media->getUrl() }}"  class="menu-link px-3" download="{{$item->media->original_file_name}}"><i class="fas fa-download me-3" aria-hidden="true"></i>Download</a>
            </div>
        @endif

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
        $(document.body).on("change","#parent_faculty_id",function(){
            //console.log(this.value);
            var faculty_id = this.value;
            $.ajax({
                    type: 'GET',
                    url: '{{ route('assignment-list') }}'+'?faculty=true&faculty_id='+faculty_id,
                    
                    success: function(e) {
                        //console.log(e);

                        $('#parent_subject_id')
                            .find("option").remove().end().append($('<option value = "">Please select Subject</option>'));  
                        $.each(e, function(key, value) {   
                            $('#parent_subject_id')
                                .append($('<option>', { value : key })
                                .text(value)); 
                        });
                    },
                });
        });
    });
</script>
@endpush
