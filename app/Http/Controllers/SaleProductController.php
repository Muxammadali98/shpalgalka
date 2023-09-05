<?php

namespace App\Http\Controllers;

use App\Models\Sale_Product;
use Illuminate\Http\Request;

class SaleProductController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $saller= auth()->guard('api')->user();
        $data = $saller->sales->where('phone','!=',null);

        if(!empty($data)){
            foreach($data as $sale){
                foreach($sale->products as $item){
                    $item->data = $this->getProduct($item->product_id);
                };
            }
        }

        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'sale_id' => 'required |unique:sale_Products,sale_id',
            'product_id'=>'required',
        ]);

        Sale_Product::create($request->all());

        return response()->json('Sale_Product created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale_Product $sale_Product)
    {
        return response()->json($sale_Product);
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

    public function update(Request $request, Sale_Product $sale_Product)
    {

        $this->validate($request, [
            'sale_id' => 'required | sale_id|unique:sale_Products,sale_id,'.$sale_Product->id,
        ]);

        $sale_Product->update($request->all());

        return response()->json('Sale_Product updated');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Sale_Product $sale_Product)
    {
       $sale_Product->delete();
       return response()->json('sale produkt deleted');
    }
}
