<?php

namespace App\Http\Controllers;

use App\Http\Requests\SallerRequest;
use App\Models\Prize;
use App\Models\Prize_Saller;
use App\Models\Sale;
use App\Models\Saller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SallerController extends Controller
{

    public function index() {
        $sallers = Saller::all();
        return view('admin.saller.index',compact('sallers'));
    }


    public function create(){
        return view('admin.saller.create');
    }


    public function show(Saller $saller){
        $prizes = Prize::all();
        $saller->prizs();
        return view('admin.saller.show',compact('saller','prizes'));
    }



    public function store(SallerRequest $request){

        $data = $request->all();
        $data['password'] = Hash::make($request->password);

        if(isset($request->image)){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        $saller =  Saller::create($data);
        
        return redirect()->route('saller.index');
    }

    public function update(Request $request, Saller $saller){
        $data = $request->all();


        if(!empty($request->phone)){
            $this->validate($request,[
                'phone'=>'numeric| digits:12'
            ]);
        }


        if(empty($request->password)){
            $data['password'] = $saller->password;
        }else{
            $data['password'] = Hash::make($request->password);
        }

        if(!empty($request->prize_id)){
            Prize_Saller::create(['saller_id'=>$saller->id,'prize_id'=>$request->prize_id]);
        }

        if(isset($request->image)){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }


        $saller->update($data);
        return back();
    }

    public function deletePrize($id) {
        Prize_Saller::find($id)->delete();
        return back();
    }



    public function destroy(Saller $saller) {

            Sale::where('saller_id',$saller->id)->delete();

            $saller->delete();

            return redirect()->route('saller.index');
    }
}
