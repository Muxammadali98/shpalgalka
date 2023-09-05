<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class QuestionController extends Controller
{

    public function getCategories(){
        return Http::get('https://app.orzugrand.uz/api/frontend/sub-categories')->json()['data'];
    }

    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
        $questions = Question::all();
       
        $categories =  $categories = $this->getCategories();
        return view('admin.question.index',compact('questions','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories =  $categories = $this->getCategories();
        return view('admin.question.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id'=>'required',
            'question'=>'required',
            'response'=>'required',
        ]);
        $data = $request->all();

        Question::create($data);

        return redirect()->route('question.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        return response()->json($question);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        $categories =  $categories = $this->getCategories();
        return view('admin.question.update',compact('question','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        $data = $request->all();
        $question->update($data);

        return redirect()->route('question.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
       $question->delete();
       return back();
    }
}
