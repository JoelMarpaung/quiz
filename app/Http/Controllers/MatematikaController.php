<?php

namespace App\Http\Controllers;

use App\Matematika;
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

}
