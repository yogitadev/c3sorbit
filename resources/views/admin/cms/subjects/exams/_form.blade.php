<div class="row">
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Exam Date</label>
        {!! Form::date('exam_date', null, ['class' => 'form-control', 'required' => true, 'min' => date("Y-m-d") ]) !!}
    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Exam Duration (Min.)</label>
        {!! Form::number('exam_duration', null, ['class' => 'form-control', 'required' => true]) !!}
    </div>
</div>
@if(isset($item))
    @foreach($question_list as $key => $val)
        <?php echo "<div class='row' id='row".$key."'>"; ?>
            <div class="col-md-12 mb-5">
                <label class="form-label required fs-6">Question</label>
                {!! Form::text('question', $val['question'], ['class' => 'form-control', 'required' => true, 'name' => 'question[]']) !!}
            </div>
            <div class="col-md-6 mb-5">
                <label class="form-label required fs-6">Option1</label>
                {!! Form::text('option1', $val['option1'], ['class' => 'form-control', 'required' => true, 'name' => 'option1[]']) !!}
            </div>
            <div class="col-md-6 mb-5">
                <label class="form-label required fs-6">Option2</label>
                {!! Form::text('option2', $val['option2'], ['class' => 'form-control', 'required' => true, 'name' => 'option2[]']) !!}
            </div>
            <div class="col-md-6 mb-5">
                <label class="form-label required fs-6">Option3</label>
                {!! Form::text('option3', $val['option3'], ['class' => 'form-control', 'required' => true, 'name' => 'option3[]']) !!}
            </div>
            <div class="col-md-6 mb-5">
                <label class="form-label required fs-6">Option4</label>
                {!! Form::text('option4', $val['option4'], ['class' => 'form-control', 'required' => true, 'name' => 'option4[]']) !!}
            </div>
            <div class="col-md-6 mb-5">
                <label class="form-label fs-6 required">Correct Answer</label>
                {!! Form::select('correct_ans', ['a' => 'a', 'b' => 'b', 'c' => 'c', 'd' => 'd'], $val['correct_ans'], [
                    'class' => 'form-select',
                    'required' => true,
                    'name' => 'correct_ans[]'
                ]) !!}
            </div>
            @if($key == 0) 
            <div class="col-md-6 mb-5">
                <br>
                <a type="button" class="btn btn-primary mt-2" name="add" id="add"><i class="fas fa fa-plus"></i>Add More</a> 
            </div>
            @else 
                <?php echo ('<div class="col-md-6"><br><a type="button" id="add'.$key.'" class="btn_add mt-5"><i class="fas fa fa-plus"></i></a><a type="button" class="btn_remove ms-2" name="remove" id="'.$key.'"><i class="fas fa fa-trash"></i></a></div>'); ?>
            @endif
        </div>
    @endforeach
@else
    <div class="row" id="row0">
        <div class="col-md-12 mb-5">
            <label class="form-label required fs-6">Question</label>
            {!! Form::text('question', null, ['class' => 'form-control', 'required' => true, 'name' => 'question[]']) !!}
        </div>
        <div class="col-md-6 mb-5">
            <label class="form-label required fs-6">Option1</label>
            {!! Form::text('option1', null, ['class' => 'form-control', 'required' => true, 'name' => 'option1[]']) !!}
        </div>
        <div class="col-md-6 mb-5">
            <label class="form-label required fs-6">Option2</label>
            {!! Form::text('option2', null, ['class' => 'form-control', 'required' => true, 'name' => 'option2[]']) !!}
        </div>
        <div class="col-md-6 mb-5">
            <label class="form-label required fs-6">Option3</label>
            {!! Form::text('option3', null, ['class' => 'form-control', 'required' => true, 'name' => 'option3[]']) !!}
        </div>
        <div class="col-md-6 mb-5">
            <label class="form-label required fs-6">Option4</label>
            {!! Form::text('option4', null, ['class' => 'form-control', 'required' => true, 'name' => 'option4[]']) !!}
        </div>
        <div class="col-md-6 mb-5">
            <label class="form-label fs-6 required">Correct Answer</label>
            {!! Form::select('correct_ans', ['a' => 'a', 'b' => 'b', 'c' => 'c', 'd' => 'd'], null, [
                'class' => 'form-select',
                'required' => true,
                'name' => 'correct_ans[]'
            ]) !!}
        </div>
        <div class="col-md-6 mb-5">
            <br>
            <a type="button" class="btn btn-primary mt-2" name="add" id="add"><i class="fas fa fa-plus"></i>Add More</a> 
        </div>
    </div>
@endif
<div id="dynamic_field"></div>
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
            var item_array = <?php
                 if(isset($question_list)) 
                 echo json_encode($question_list);
                 else
                 echo json_encode([]);
                ?>;
            var count = item_array.length;
            
            $(document).ready(function(){
               
                $(document).on('click','.btn_add', function(){
                    if(count == 0) {

                        var i =0;
                        var j = 0;
                    } else {
                        var i = count;
                        var j = count;
                    }
                        var inputs = $('.items');
                        var ans = $(this).attr('id').split('add')[1];
                        i = parseInt(ans);
                        j = i+1;
                        
                        $('#row'+i).after('<div id="row'+j+'" class="row"><div class="col-md-12 mb-5"><label class="form-label required fs-6">Question</label><input class="form-control" required="" name="question[]" type="text"></div><div class="col-md-6 mb-5"><label class="form-label required fs-6">Option1</label><input class="form-control" required="" name="option1[]" type="text"></div><div class="col-md-6 mb-5"><label class="form-label required fs-6">Option2</label><input class="form-control" required="" name="option2[]" type="text"></div><div class="col-md-6 mb-5"><label class="form-label required fs-6">Option3</label><input class="form-control" required="" name="option3[]" type="text"></div><div class="col-md-6 mb-5"><label class="form-label required fs-6">Option4</label><input class="form-control" required="" name="option4[]" type="text"></div><div class="col-md-6 mb-5"><label class="form-label fs-6 required">Correct Answer</label><select class="form-select" required="" name="correct_ans[]"><option value="a">a</option><option value="b">b</option><option value="c">c</option><option value="d">d</option></select></div><div class="col-md-6"><br><a type="button" id="add'+j+'" class="btn_add mt-5"><i class="fas fa fa-plus"></i></a><a type="button" class="btn_remove ms-2" name="remove" id="'+ j +'"><i class="fas fa fa-trash"></i></a></div></div>');
                   
                });
                $('#add').click(function() {
                    var i=0;
                    var append_row = '';
                    
                    // Get inputs created (if any)
                    var inputs = $('.items');
                    // Verify if there are 1000 or more inputs
                    if(inputs.length >= 1000) {
                        console.log('Only 1000 inputs allowed');
                        return;
                    }
                    // Get last input to avoid duplicated IDs / names
                    if(inputs.last().length > 0) {
                        // Split name to get only last part of name, the numeric one
                        //console.log(inputs.last()[0].name);
                        i = parseInt(inputs.last()[0].name.split('_')[1]);
                   }
                    i++;
                   
                    if(i==1)
                    appdend_row = 'row0';
                   else 
                   appdend_row = 'row'+(i-1);
                    $('#'+appdend_row).after('<div id="row'+i+'" class="row"><div class="col-md-12 mb-5"><label class="form-label required fs-6">Question</label><input class="form-control" required="" name="question[]" type="text"></div><div class="col-md-6 mb-5"><label class="form-label required fs-6">Option1</label><input class="form-control" required="" name="option1[]" type="text"></div><div class="col-md-6 mb-5"><label class="form-label required fs-6">Option2</label><input class="form-control" required="" name="option2[]" type="text"></div><div class="col-md-6 mb-5"><label class="form-label required fs-6">Option3</label><input class="form-control" required="" name="option3[]" type="text"></div><div class="col-md-6 mb-5"><label class="form-label required fs-6">Option4</label><input class="form-control" required="" name="option4[]" type="text"></div><div class="col-md-6 mb-5"><label class="form-label fs-6 required">Correct Answer</label><select class="form-select" required="" name="correct_ans[]"><option value="a">a</option><option value="b">b</option><option value="c">c</option><option value="d">d</option></select></div><div class="col-md-6"><br><a type="button" id="add'+i+'" class="btn_add mt-5 "><i class="fas fa fa-plus"></i></a><a type="button" class="btn_remove ms-2" name="remove" id="'+ i +'"><i class="fas fa fa-trash"></i></a></div></div>');
                   

                });
                
                $(document).on('click', '.btn_remove', function() {
                    var button_id = $(this).attr("id");
                    $('#row' + button_id + '').remove();
                });
            });
        });
    </script>
   
@endpush
