<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ApiController;
use App\Http\Resources\LoginResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    function getCurrentUser(Request $request){
        return $request->user();
    }
    public function updatePassword(Request $request){
        $input = $request->all();
        $userid=$request->user()->id;

        $rules = array(
            'oldPassword' => 'required',
            'newPassword' => 'required|min:6',
            'confirm_password' => 'required|same:newPassword',
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->first(),400);
        }
        try {
            if ((Hash::check(request('oldPassword'), Auth::user()->password)) == false) {
                return $this->errorResponse("Check your old password.",400);
            } else if ((Hash::check(request('newPassword'), Auth::user()->password)) == true) {
                return $this->errorResponse("Please enter a password which is not similar then current password.",400);
            } else {
                User::where('id', $userid)->update(['password' => Hash::make($input['newPassword'])]);
                return $this->successResponse(array(),"Password updated successfully.");
            }
        } catch (\Exception $ex) {
            if (isset($ex->errorInfo[2])) {
                $msg = $ex->errorInfo[2];
            } else {
                $msg = $ex->getMessage();
            }
            return $this->errorResponse($msg,400);
        }
    }
    function getBearerToken(Request $request){
        return $request->bearerToken();
    }
    function actualToken(Request $request){
        return  request()->user()->currentAccessToken()->token;
    }
    function logout(Request $request){
        return $request->user()->currentAccessToken()->delete();
    }
    public function revoke_all(Request $request){
        //revoke all tokens from current user
        $user = request()->user();
        $result = $user->tokens()->delete();
        return $this->successResponse($result);
    }

}
