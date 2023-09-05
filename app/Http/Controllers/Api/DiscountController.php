<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\Sale_Product;
use Illuminate\Support\Facades\Http;

class DiscountController extends Controller
{
    public function  getProduct($slug){
        $product = Http::get('https://app.orzugrand.uz/api/frontend/favorites?ids[0]='.$slug)->json(); 

        if(isset($product['data'][0])){
            return  $product['data'][0];
        }
    }
    public function index()
    {
        $discounts =Discount::with('conditions')->get();

        return response()->json($discounts);
    }
    public function show($id)
    {
        $discounts =Discount::with('conditions')->find($id);

        return response()->json($discounts);
    }
    public function questions($id)
    {
        $questions =Question::where('category_id',$id)->get();

        return response()->json($questions);
    }
    public function sales()
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


    public function saves()  {
        $sales = auth()->guard('api')->user()->sales;

        $data = $sales->where('phone',null)->first();

        if(!empty($data)){
            foreach($data->products as $item){
                $item->data = $this->getProduct($item->product_id);
            };
        }

        return response()->json($data);
        
    }

    public function update(Request $request, $id)
    {
        $sale_Product =Sale_Product::find($id);

        $this->validate($request, [
            'sale_id' => ' sale_id|unique:sale_Products,sale_id,'.$sale_Product->id,
        ]);

        $sale_Product->update($request->all());

        return response()->json(true);
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        $sale_Product =Sale_Product::find($id);
       $sale_Product->delete();
       return response()->json(true);
    }




}
