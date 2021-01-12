<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request){
        
        if(!Auth::check() && $request->path() == 'register'){
            return view("welcome");
        }
        
        if(!Auth::check() && $request->path() != 'login'){
            return redirect("/login");
        }
        
        if(!Auth::check() && $request->path() == 'login'){
            return view("welcome");
        }
        
        $user = Auth::user();

        if($request->path() == 'login'){
            return redirect("/");
        }

        if($request->path() == 'logout'){
            Auth::logout();
            return redirect("/login");
        }
        
        if($request->path() == '/'){
            return view('welcome');
        }
        return view('welcome');
        return view("notfound");
        
        
    }

    public function register_user(Request $request){
        $this->validate($request,[
            'name'=>'required|min:3',
            'email'=>'bail|required|email|unique:users',
            'password'=>'required:min:6',
        ]);

        $password = bcrypt($request->password);
        return User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$password,
            'role_id'=>1
        ]);
    }

    public function login_user(Request $request){
        $this->validate($request, [
            "email" => "bail|required|email",
            "password" => "bail|required|min:3",
        ]);
        
        if(Auth::attempt(['email'=> $request->email, 'password'=> $request->password])){
                $user = Auth::user();
                //dd($user);
                //return $user->role->roleName;
                
                if($user->role_id == 1){
                    
                }
                return response()->json([
                    'msg' => "You are logged in",
                    'user' => $user
                ], 200);
            }else{
                return response()->json([
                    'msg'=> "Incorrect login details"
                ], 401);
            }
    }


}
