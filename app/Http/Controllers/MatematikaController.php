<?php

namespace App\Http\Controllers;

use App\Matematika;
use App\QuizMatematika;
use App\QuizMatematikaAnswer;
use App\MatematikaQuestion;
use Illuminate\Support\Facades\Input;
use App\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class MatematikaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quiz = Matematika::where('user_id','=',Auth::user()->id)->get();
        return view('matematika.index')->withQuiz($quiz);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topic = \App\Topic::get()->pluck('title', 'id')->prepend('Please select', '');
        return view('matematika.quizcreate')->withTopic($topic);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $matematika = new Matematika([
            'title' => $request->input('title'),
            'topic_id' => $request->input('topic_id'),
            'user_id' => Auth::user()->id,
            'time' => $request->input('time'),
            'num_question' => $request->input('num_question'),
            'description' => $request->input('description')
        ]);
        $matematika->save();
        return redirect()->route('matematika.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Matematika  $matematika
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['matematika'] = Matematika::findOrFail($id);
        $this->data['questions'] = MatematikaQuestion::where('matematika_id','=',$id)->get();
        return view('matematika.quizshow', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Matematika  $matematika
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['topic']= Topic::all();
        $this->data['matematika'] = Matematika::findOrFail($id);
        return view('matematika.quizedit', $this->data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Matematika  $matematika
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $matematika = Matematika::findOrFail($id);
        $matematika->update($request->all());

        return redirect()->route('matematika.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Matematika  $matematika
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matematika = Matematika::findOrFail($id);
        $matematika->delete();

        return redirect()->route('matematika.index');

    }
    public function createQuestion($id)
    {
        $this->data['matematika_id'] = $id;
        $matematika = Matematika::findOrFail($id);
        $this->data['num_question'] = $matematika->num_question;
        return view('matematika.questioncreate', $this->data);
    }

    public function storeQuestion(Request $request, $id)
    {
        $input = Input::all();
        $score = 0;
        $question = $input['question'];
        foreach ($question as $key => $value) {
            $question = new MatematikaQuestion;
            $question->matematika_id = $id;
            $question->question = $input['question'][$key];
            $question->point = $input['point'][$key];
            $score = $score + $input['point'][$key];
            $question->option_a = $input['option_a'][$key];
            $question->option_b = $input['option_b'][$key];
            $question->option_c = $input['option_c'][$key];
            $question->option_d = $input['option_d'][$key];
            $question->option_e = $input['option_e'][$key];
            $question->correct = $input['correct'][$key];
            $question->save();
        }

        $matematika = Matematika::findOrFail($id);
        $matematika->score = $score;
        $matematika->save();
        return redirect()->route('matematika.show', $id);
    }

    public function showQuestion($id)
    {
        $this->data['question'] = MatematikaQuestion::findOrFail($id);
        return view('matematika.questionshow', $this->data);
    }

    public function editQuestion($id)
    {
        $this->data['question'] = MatematikaQuestion::findOrFail($id);
        return view('matematika.questionedit', $this->data);
    }

    public function updateQuestion(Request $request, $id)
    {
        $matematika = MatematikaQuestion::findOrFail($id);
        $matematika->update($request->all());

        return redirect()->route('matematika.show', $matematika->matematika_id);

    }


    public function quizIndex()
    {
        $quiz = Matematika::all();
        return view('matematika.quiz.index')->withQuiz($quiz);
    }

    public function quizPlay($id)
    {
        $this->data['matematika'] = Matematika::findOrFail($id);
        $this->data['questions'] = MatematikaQuestion::where('matematika_id','=',$id)->get();
        return view('matematika.quiz.play', $this->data);
    }

    public function quizStore(Request $request, $id){
        $quiz = new QuizMatematika([
            'user_id' => Auth::user()->id,
            'matematika_id' => $id
        ]);
        $quiz->save();
        $matematika = Matematika::findOrFail($id);
        $totalscore = 0;
        $totalcorrect = 0;
        foreach ($request->input('questions', []) as $key => $question) {
            $data = MatematikaQuestion::findOrFail($question);
            $status = 0;
            $score = 0;
            if ($request->input('answers.' . $question) != null
                && $request->input('answers.' . $question) == $data->correct
            ) {
                $status = 1;
                $score = $data->point;
                $totalcorrect++;
            }
            QuizMatematikaAnswer::create([
                'user_id' => Auth::id(),
                'matematika_id' => $id,
                'quiz_id' => $quiz->id,
                'question_id' => $question,
                'correct' => $status,
                'score' => $score,
                'answer' => $request->input('answers.' . $question),
            ]);
            $totalscore = $totalscore + $score;
        }
        $result = ($totalscore/$matematika->score)*100;
        $quiz->update([
            'total_correct' => $totalcorrect,
            'result' => $result,
            'score' => $totalscore,
            ]);

        return redirect()->route('quizmatematika.index');
    }

    public function quizView($id)
    {
        $this->data['matematika'] = Matematika::findOrFail($id);
        $this->data['quiz'] = QuizMatematika::where('matematika_id', '=', $id,'and','user_id','=',Auth::user()->id)->orderBy('id','desc')->get();;
        return view('matematika.quiz.view', $this->data);
    }
}

