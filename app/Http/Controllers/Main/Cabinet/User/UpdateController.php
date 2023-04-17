<?php

namespace App\Http\Controllers\Main\Cabinet\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function updateName(){

        $data = request()->validate([
            'name' => 'required|string'
        ]);
        $user = auth()->user()->update($data);
        return redirect()->back();
    }

    public function updatePassword(Request $request){
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);


        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password changed successfully!");
    }

    public function updateUserImage(){


        $data = request()->validate([
            'image'=>'file',
        ]);

        if (isset($data['image'])){
            $data['image'] = Storage::put('/public/images',$data['image']);
            $user = auth()->user()->update($data);
        }

        return redirect()->back();
    }


}
