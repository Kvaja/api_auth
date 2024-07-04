<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;
use App\Models\Student;


use Hash;

class ApiController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'email' =>'required|email|unique:users',
            'password' => 'required|confirmed',
            
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>$request->password

        ]);

        return response()->json([
            'status' =>'success',
            'message' =>'user registerd successfully',
            'data' => []
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' =>'required|email',
            'password' => 'required',
            
        ]);

        $user = User::where('email',$request->email)->first();
    

        if(!empty($user))
        {
            if(Hash::check($request->password, $user->password))
            {
                $token = $user->createToken('mytoken')->plainTextToken;

                return response()->json([
                    'status' => true,
                    'message' => 'User Logged in',
                    'token' => $token,
                    'data' => []
                ]);

            }
            else{

                return response()->json([
                    'status' => false,
                    'message' => 'Please pass Email and Password',
                    'data' => []
                ]);
            }

        }
        else{

            return response()->json([
                'status' => false,
                'message' => 'Wrong Email or Password',
                'data' => []
            ]);
        }

      

    }

    public function Showstudent()
    {
        $student = Student::with('contact')->get();
        return response()->json($student);

    }


}
