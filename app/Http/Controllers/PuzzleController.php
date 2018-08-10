<?php

namespace App\Http\Controllers;

use App\puzzle;
use Illuminate\Http\Request;
use App\Http\Requests\StoreQuestionsOptionsRequest;
use App\Http\Requests\UpdateQuestionsOptionsRequest;

class PuzzleController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of puzzle.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $puzzle = puzzle::all();

        return view('puzzle.index', compact('puzzle'));
    }

    /**
     * Show the form for creating new puzzle.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $relations = [
            'puzzle' => \App\puzzle::get()->pluck('question_text', 'id')->prepend('Please select', ''),
        ];

        return view('puzzle.create', $relations);
    }

    /**
     * Store a newly created puzzle in storage.
     *
     * @param  \App\Http\Requests\StoreQuestionsOptionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionsOptionsRequest $request)
    {
        puzzle::create($request->all());

        return redirect()->route('puzzle.index');
    }


    /**
     * Show the form for editing puzzle.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $relations = [
            'puzzle' => \App\puzzle::get()->pluck('question_text', 'id')->prepend('Please select', ''),
        ];

        $puzzle = puzzle::findOrFail($id);

        return view('puzzle.edit', compact('puzzle') + $relations);
    }

    /**
     * Update puzzle in storage.
     *
     * @param  \App\Http\Requests\UpdateQuestionsOptionsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuestionsOptionsRequest $request, $id)
    {
        $questionsoption = puzzle::findOrFail($id);
        $questionsoption->update($request->all());

        return redirect()->route('puzzle.index');
    }


    /**
     * Display puzzle.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $relations = [
            'puzzle' => \App\puzzle::get()->pluck('question_text', 'id')->prepend('Please select', ''),
        ];

        $puzzle = puzzle::findOrFail($id);

        return view('puzzle.show', compact('puzzle') + $relations);
    }


    /**
     * Remove puzzle from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $questionsoption = puzzle::findOrFail($id);
        $questionsoption->delete();

        return redirect()->route('puzzle.index');
    }

    /**
     * Delete all selected puzzle at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = puzzle::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
