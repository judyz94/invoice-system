<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public $successStatus = 200;

    /**
     * Login API
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] =  $user->createToken('InvoiceSystem')-> accessToken;
            return response()->json([
                'message' => 'Successful login',
                'success' => $success],
                $this->successStatus);
        }
        else {
            return response()->json(['error'=>'Unauthorized'], 401);
        }
    }

    /**
     * Register user API
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'document' => ['required', 'string', 'unique:users'],
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('InvoiceSystem')-> accessToken;

        $success['name'] =  $user->name;
        $success['document'] =  $user->document;
        $success['email'] =  $user->email;

        return response()->json([
            'message' => 'User successfully created',
            'success'=> $success],
            $this->successStatus);
    }

    /**
     * Details user auth
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function details()
    {
        $user = Auth::user();

        return response()->json(['success' => $user], $this-> successStatus);
    }

    /**
     * Logout API
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json(['message' => 'Successfully logout']);
    }
}

