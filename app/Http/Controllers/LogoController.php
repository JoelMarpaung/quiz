<?php

namespace App\Http\Controllers;

use App\Logo;
use Illuminate\Http\Request;
use App\Http\Requests\StoreQuestionsOptionsRequest;
use App\Http\Requests\UpdateQuestionsOptionsRequest;

class LogoController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of Logo.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Logo = Logo::all();

        return view('Logo.index', compact('Logo'));
    }

    /**
     * Show the form for creating new Logo.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $relations = [
            'Logo' => \App\Logo::get()->pluck('question_text', 'id')->prepend('Please select', ''),
        ];

        return view('Logo.create', $relations);
    }

    /**
     * Store a newly created Logo in storage.
     *
     * @param  \App\Http\Requests\StoreQuestionsOptionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionsOptionsRequest $request)
    {
        Logo::create($request->all());

        return redirect()->route('Logo.index');
    }


    /**
     * Show the form for editing Logo.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $relations = [
            'Logo' => \App\Logo::get()->pluck('question_text', 'id')->prepend('Please select', ''),
        ];

        $Logo = Logo::findOrFail($id);

        return view('Logo.edit', compact('Logo') + $relations);
    }

    /**
     * Update Logo in storage.
     *
     * @param  \App\Http\Requests\UpdateQuestionsOptionsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuestionsOptionsRequest $request, $id)
    {
        $questionsoption = Logo::findOrFail($id);
        $questionsoption->update($request->all());

        return redirect()->route('Logo.index');
    }


    /**
     * Display Logo.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $relations = [
            'Logo' => \App\Logo::get()->pluck('question_text', 'id')->prepend('Please select', ''),
        ];

        $Logo = Logo::findOrFail($id);

        return view('Logo.show', compact('Logo') + $relations);
    }


    /**
     * Remove Logo from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $questionsoption = Logo::findOrFail($id);
        $questionsoption->delete();

        return redirect()->route('Logo.index');
    }

    /**
     * Delete all selected Logo at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Logo::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
