<?php

namespace App\Http\Controllers;

use App\Models\Prize;
use App\Models\Prize_Saller;
use Illuminate\Http\Request;

class PrizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prizes = Prize::all();

        return view('admin.prize.index',compact('prizes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.prize.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image'=>'required | file',
            'title'=>'required',
            'description'=>'required',
        ]);
        $data = $request->all();

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $data['image'] = $imageName;

        Prize::create($data);

        return redirect()->route('prize.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prize $prize)
    {
        return response()->json($prize);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prize $prize)
    {
        return view('admin.prize.update',compact('prize'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prize $prize)
    {
        $this->validate($request, [
            'image'=>'file',
        ]);
        $data = $request->all();

        if(isset($request->image)){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }
 
        $prize->update($data);

        return redirect()->route('prize.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prize $prize)
    {
        Prize_Saller::where('prize_id',$prize->id)->delete();
        $prize->delete();
        return back();
    }
}
