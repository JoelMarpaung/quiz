<?php

namespace App\Http\Controllers;

use App\MultipleChoice;
use App\MultipleOption;
use Illuminate\Http\Request;
use App\Http\Requests\StoreQuestionsRequest;
use App\Http\Requests\UpdateQuestionsRequest;

class MultipleChoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of MultipleChoice.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $multiple_choice = MultipleChoice::all();

        return view('multiple_choice.index', compact('multiple_choice'));
    }

    /**
     * Show the form for creating new MultipleChoice.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $relations = [
            'topics' => \App\Topic::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];

        $correct_options = [
            'option1' => 'Option #1',
            'option2' => 'Option #2',
            'option3' => 'Option #3',
            'option4' => 'Option #4',
            'option5' => 'Option #5'
        ];

        return view('multiple_choice.create', compact('correct_options') + $relations);
    }

    /**
     * Store a newly created MultipleChoice in storage.
     *
     * @param  \App\Http\Requests\StoreQuestionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionsRequest $request)
    {

        $question = MultipleChoice::create($request->all());

        foreach ($request->input() as $key => $value) {
            if(strpos($key, 'option') !== false && $value != '') {
                $status = $request->input('correct') == $key ? 1 : 0;
                MultipleOption::create([
                    'question_id' => $question->id,
                    'option'      => $value,
                    'correct'     => $status
                ]);
            }
        }

        return redirect()->route('multiple_choice.index');
    }


    /**
     * Show the form for editing MultipleChoice.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $relations = [
            'topics' => \App\Topic::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];

        $question = MultipleChoice::findOrFail($id);

        return view('multiple_choice.edit', compact('question') + $relations);
    }

    /**
     * Update Question in storage.
     *
     * @param  \App\Http\Requests\UpdateQuestionsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuestionsRequest $request, $id)
    {
        $question = MultipleChoice::findOrFail($id);
        $question->update($request->all());

        return redirect()->route('multiple_choice.index');
    }


    /**
     * Display Question.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $relations = [
            'topics' => \App\Topic::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];

        $question = MultipleChoice::findOrFail($id);

        return view('multiple_choice.show', compact('question') + $relations);
    }


    /**
     * Remove Question from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = MultipleChoice::findOrFail($id);
        $question->delete();

        return redirect()->route('multiple_choice.index');
    }

    /**
     * Delete all selected Question at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = MultipleChoice::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
