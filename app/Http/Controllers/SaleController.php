<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Sale_Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SaleController extends Controller
{

    public function  getProduct($slug){
        $product = Http::get('https://app.orzugrand.uz/api/frontend/favorites?ids[0]='.$slug)->json();
        if(isset($product['data'][0])){
            return  $product['data'][0];
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sale::query();

        $sales->where('status',0);
        
        $sales->whereNotNull('phone');

        $sales = $sales->get();

        return view('admin.sale.index',compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sale.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        if(!empty($request->phone)){
            Sale::where('saller_id',auth()->guard('api')->id())->whereNull('phone')->update(['phone'=>$request->phone]);
            return response()->json('update');
        }

        $this->validate($request, [
            'saller_id' => 'required',
            'product_id'=>'required',
            'count'=>'required',
            'date'=>'required'
        ]);

        $sale = Sale::where('phone',$request->phone)->where('saller_id',$request->saller_id)->first();
        if(empty($sale)){
            $sale = Sale::create($request->all());
        }

        $product = Sale_Product::where('product_id',$request->product_id)->where('sale_id',$sale->id)->first();
        $data = $request->all();

        $data['sale_id'] = $sale->id;

        if(empty($product)){
            Sale_Product::create($data);
        }else{
              $product->count += $request->count; 
              $product->save();
        }
        return response()->json(true);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {

        

        
        
            foreach($sale->products as $product){

                $product->data = $this->getProduct($product->product_id);
            }

        return view('admin.sale.show',compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sale $sale)
    {
        $sale->update($request->all());

        return response()->json('Sale updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $sale = Sale::find($id)->delete();
        Sale_Product::where('sale_id',$id)->delete();
       return response()->json('sale deleted');
    }

    public function success($id) {
        $product = Sale::find($id);
        $product->update(['status'=>1]);
        return redirect()->route('home');
    }

    public function erorr($id) {
        $product = Sale::find($id);
         $product->update(['status'=>2]);
        return redirect()->route('home');
    }
}
