<?php

namespace App\Http\Controllers;

use App\MultipleOption;
use Illuminate\Http\Request;
use App\Http\Requests\StoreQuestionsOptionsRequest;
use App\Http\Requests\UpdateQuestionsOptionsRequest;

class MultipleOptionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of QuestionsOption.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $multiple_options = MultipleOption::all();

        return view('multiple_options.index', compact('multiple_options'));
    }

    /**
     * Show the form for creating new QuestionsOption.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $relations = [
            'multiple_choice' => \App\MultipleChoice::get()->pluck('question_text', 'id')->prepend('Please select', ''),
        ];

        return view('multiple_options.create', $relations);
    }

    /**
     * Store a newly created QuestionsOption in storage.
     *
     * @param  \App\Http\Requests\StoreQuestionsOptionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionsOptionsRequest $request)
    {
        MultipleOption::create($request->all());

        return redirect()->route('multiple_options.index');
    }


    /**
     * Show the form for editing QuestionsOption.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $relations = [
            'multiple_choice' => \App\MultipleChoice::get()->pluck('question_text', 'id')->prepend('Please select', ''),
        ];

        $multiple_options = MultipleOption::findOrFail($id);

        return view('multiple_options.edit', compact('multiple_options') + $relations);
    }

    /**
     * Update QuestionsOption in storage.
     *
     * @param  \App\Http\Requests\UpdateQuestionsOptionsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuestionsOptionsRequest $request, $id)
    {
        $questionsoption = MultipleOption::findOrFail($id);
        $questionsoption->update($request->all());

        return redirect()->route('multiple_options.index');
    }


    /**
     * Display QuestionsOption.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $relations = [
            'multiple_choice' => \App\MultipleChoice::get()->pluck('question_text', 'id')->prepend('Please select', ''),
        ];

        $multiple_option = MultipleOption::findOrFail($id);

        return view('multiple_options.show', compact('multiple_options') + $relations);
    }


    /**
     * Remove QuestionsOption from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $questionsoption = MultipleOption::findOrFail($id);
        $questionsoption->delete();

        return redirect()->route('multiple_options.index');
    }

    /**
     * Delete all selected QuestionsOption at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = MultipleOption::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
