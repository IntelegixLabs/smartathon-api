<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    protected $responseHelper;

    public function __construct()
    {
        $this->responseHelper = new ResponseHelper();
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'c_password' => 'required|same:password'
        ]);

        if($validator->fails())
        {
            return $this->responseHelper->error(false, $validator->errors(), 401);
        }

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_user' => 1
        ]);

        return $this->responseHelper->payload(['message' => 'Registered Successfully!']);
    }

    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            $user = Auth::user();

            $response = [
                'token' => $user->createToken('MyApp')->plainTextToken,
                'name' => $user->full_name,
                'message' => 'Authorized'
            ];

            return $this->responseHelper->payload($response);
        }

        return $this->responseHelper->payload(['message' => 'Wrong email or password'], 401);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return $this->responseHelper->payload(['message' => 'Logged out successfully!']);
    }
}
