<?php

namespace App\Http\Controllers;

use App\Models\Condition;
use App\Models\Discount;
use Illuminate\Http\Request;

class ConditionController extends Controller
{
    /**
* Display a listing of the resource.
*/
public function index()
{
   $conditions = Condition::all();

   return view('admin.condition.index',compact('conditions'));
}

/**
* Show the form for creating a new resource.
*/
public function create()
{

   $discounts = Discount::all();
   return view('admin.condition.create',compact('discounts'));
}

/**
* Store a newly created resource in storage.
*/
public function store(Request $request)
{
   $this->validate($request, [
       'discount_id' => 'required ',
       'text'=>'required',
   ]);

    Condition::create($request->all());

    return redirect()->route('condition.index');
}

/**
* Display the specified resource.
*/
public function show(Condition $condition)
{
   return response()->json($condition);
}

/**
* Show the form for editing the specified resource.
*/
public function edit(Condition $condition)
{
   $discounts = Discount::all();
   return view('admin.condition.update', compact('condition','discounts'));
}

/**
* Update the specified resource in storage.
*/
public function update(Request $request, Condition $condition)
{

   $condition->update($request->all());

   return redirect()->route('condition.index');
}

/**
* Remove the specified resource from storage.
*/
public function destroy(Condition $condition)
{
  $condition->delete();
  return back();
}
}
