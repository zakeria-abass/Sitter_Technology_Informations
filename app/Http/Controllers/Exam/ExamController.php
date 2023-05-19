<?php

namespace App\Http\Controllers\Exam;

use App\Http\Controllers\Controller;
use App\Models\Exam\Exams;
use App\Models\Exam\Questions;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    //

    public function index($id)
    {
        $exams = Exams::with('question')->where('course_id', $id)->get();
        return view('admin_dashboard.coach.Exam.exam', compact('id', 'exams'));
    }


    public function create($id)
    {

        return view('admin_dashboard.coach.Exam.add_exam', compact('id'));
    }


    public function store(Request $request, $id)
    {


        $total = $request->count_questions * $request->correct;

        if ($request->status) {
            $status = 1;
        } else {
            $status = 0;

        }
        Exams::create([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'user_id' => auth()->user()->id,
            'course_id' => $id,
            'count_questions' => $request->count_questions,
            'correct' => $request->correct,
            'wrong' => $request->wrong,
            'time' => $request->time,
            'note' => $request->note,
            'total' => $total,
            'status' => $status,
        ]);


        return redirect()->route('index_Exam', $id);


    }


    public function createQuestions($id)
    {

        $exam = Exams::select('count_questions', 'id')->find($id);

        return view('admin_dashboard.coach.Exam.answer', compact('exam'));
    }


    public function storeQuestion(Request $request, $id)
    {

        $question = $request->question;
        $a = $request->a;
        $b = $request->b;
        $c = $request->c;
        $d = $request->d;
        $answer_correct = $request->answer_correct;


        for ($i = 0; $i < count($question); $i++) {

            $data = [
                'exam_id' => $id,
                'question' => $question[$i],
                'a' => $a[$i],
                'b' => $b[$i],
                'c' => $c[$i],
                'd' => $d[$i],
                'answer_correct' => $answer_correct[$i],
            ];

            Questions::create($data);
        }


        return back();
    }


    public function showAnswer($id)
    {

        $Answer = Exams::with('question', 'course')->where('id', $id)->first();
        $Exams = Questions::with('exam')->where('exam_id', $id)->get();

        return view('admin_dashboard.coach.Exam.show_answer', compact('Answer', 'Exams'));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exam = Exams::with('question','course')->find($id);

        return view('admin_dashboard.coach.Exam.edit_answer', compact('exam'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $question = $request->question;
        $question_id = $request->question_id;
        $a = $request->a;
        $b = $request->b;
        $c = $request->c;
        $d = $request->d;
        $answer_correct = $request->answer_correct;


        for ($i = 0; $i < count($question); $i++) {

            $data = [
                'exam_id' => $id,
                'question' => $question[$i],
                'a' => $a[$i],
                'b' => $b[$i],
                'c' => $c[$i],
                'd' => $d[$i],
                'answer_correct' => $answer_correct[$i],
            ];

            Questions::where('id',$question_id[$i])->update($data);
        }


        return redirect()->route('index.Videos',$request->course_id);

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Lectures\Lectures $lectures
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Exams::destroy($id);
        return  back();
    }




    /***********************************************/


    public function edit_Exam($id){

        $exam=Exams::find($id);

        return view('admin_dashboard.coach.Exam.edit_exam', compact('exam'));

    }



    public function update_Exam(Request  $request,$id){

        $total = $request->count_questions * $request->correct;

        if ($request->status) {
            $status = 1;
        } else {
            $status = 0;

        }

        if ($request->note) {
            $note = $request->note;
        } else {
            $note = Null;

        }
        Exams::where('id',$id)->update([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'count_questions' => $request->count_questions,
            'correct' => $request->correct,
            'wrong' => $request->wrong,
            'time' => $request->time,
            'note' => $note,
            'total' => $total,
            'status' => $status,
        ]);


        return redirect()->route('coach.index');
    }
}
