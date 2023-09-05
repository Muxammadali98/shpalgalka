<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DiscountController extends Controller
{

    public function getCategories(){
        return Http::get('https://app.orzugrand.uz/api/frontend/sub-categories')->json()['data'];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories =  $categories = $this->getCategories();
        $discounts =Discount::all();

        return view('admin.discount.index',compact('discounts','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories =  $categories = $this->getCategories();
        return view('admin.discount.create',compact('categories'));
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
            'category_id'=>'required',
            'corusel_text'=>'required',
            'sub_title'=>'required',
        ]);

        $data = $request->all();

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $data['image'] = $imageName;

       Discount::create($data);

        return redirect()->route('discount.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Discount $discount)
    {
        return response()->json($discount);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Discount $discount)
    {
        $categories =  $categories = $this->getCategories();
        return view('admin.discount.update',compact('discount','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Discount $discount)
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
 
        $discount->update($data);

        return redirect()->route('discount.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Discount $discount)
    {
       $discount->delete();
       return back();
    }
}

