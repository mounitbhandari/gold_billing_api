<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ApiController;
use App\Http\Resources\LoginResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends ApiController
{
    function login(Request $request)
    {
//        return $request;
//        if(Auth::attempt(['email' => $request->loginId, 'password' => $request->loginPassword])){
//            $user = Auth::user();
//            $success['token'] =  $user->createToken('MyApp')->plainTextToken;
//            $success['name'] =  $user->name;
//
//            return $success;
//        }

        $user= User::where('email', $request->loginId)->first();
        // print_r($data);
        if (!$user || !Hash::check($request->loginPassword, $user->password)) {
            return $this->errorResponse('Credential does not matched',401);
        }
        $token = $user->createToken('my-app-token')->plainTextToken;
        $user->setAttribute('token',$token);
        return $this->successResponse(new LoginResource($user));
    }
}
