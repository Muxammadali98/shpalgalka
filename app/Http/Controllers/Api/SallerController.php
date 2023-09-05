<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Saller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class SallerController extends Controller
{
    public function login(Request $request){
        $this->validate($request,[
            'phone'=>'required',
            'password'=>'required'
        ]);

        if(auth()->guard('user')->attempt(['phone'=>$request->phone,'password'=>$request->password])){ 
            $saller = auth()->guard('user')->user();
            $token = $saller->createToken('Shpalgalka')->accessToken;
               
            $saller = Saller::with(['prizs','sales'])->find(auth()->guard('user')->id());
            $saller->token = $token;

            return response()->json($saller);
        }

        return response()->json('parol xato',400);

    }

    public function destroy($id) {
        $saller = Saller::find($id);
        if(!empty($saller)){
            $saller->delete();
            return true;
        }else{
            return false;
        }
    }


    public function update(Request $request, $id){
        $saller = Saller::with(['prizs','sales'])->find($id);
        $this->validate($request,[
            'email' => 'email|unique:sallers,email,'.$saller->id,
            'phone'=>'unique:sallers,phone,'.$saller->id,
        ]);

        $data = $request->all();

        if($request->password){
            $this->validate($request,[
                    'password' => 'required|same:confirm_password',
                    'confirm_password' => 'required',
                    'old_password' => 'required',
            ]);

  
            if(Hash::check($request->old_password , $saller->password) ){
                $data['password'] = Hash::make($request->password);
            }else{
                return response()->json('parol xato');
            }
        }

        if(isset($request->image)){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        $saller->update($data);

        return response()->json($saller);
    }



}
