<?php

namespace App\Actions\admin\cms\subjects\exams;

use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Http\Request;

// Models
use App\Models\cms\Exam;
use App\Models\cms\ExamQuestion;

// Helper
use App\Helpers\Helper;

class UpdateAction
{
    use AsAction;

    public function handle($subject_id, Exam $item, Request $request)
    {
        $request['subject_id'] = $subject_id;
        $item->fill($request->all());
        
        $item->exam_questions()->delete();
    
        foreach( $request['question'] as $key => $val) {
            $qustion['exam_id'] = $item['id'];
            $qustion['question'] = $val;
            $qustion['option1'] = $request['option1'][$key];
            $qustion['option2'] = $request['option2'][$key];
            $qustion['option3'] = $request['option3'][$key];
            $qustion['option4'] = $request['option4'][$key];
            $qustion['correct_ans'] = $request['correct_ans'][$key];
            $data = ExamQuestion::create($qustion);
        }

        return $item;
    }
}
