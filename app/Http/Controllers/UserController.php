<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function login(Request $request)
    {



        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            $success['name'] =  $user->name;

            return $success;
        }




        $user= User::where('email', $request->loginId)->first();
        // print_r($data);
        if (!$user || !Hash::check($request->loginPassword, $user->password)) {
            return response()->json(['success'=>0,'data'=>null, 'message'=>'Credential does not matched'], 200,[],JSON_NUMERIC_CHECK);
        }

        $token = $user->createToken('my-app-token')->plainTextToken;
        $user->setAttribute('token',$token);
        return $user;

    }
}
