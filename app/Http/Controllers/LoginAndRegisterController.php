<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

use Illuminate\Http\Request;

class LoginAndRegisterController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $data = $request->input();
            if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']])){
                return redirect()->route('image.index');
            } else {
                return redirect()->route('image.login')->with('flash_message_error', 'Invalid Username or Password');
            }

        }

        return view('login');

    }


    public function register( Request $request){
        if($request->isMethod('post')){
            $rules = [
                'name' => 'required|min:2',
                'email' => 'unique:users|email|required',
                'password' => 'required|min:6',
                'confirm_password'=>'required_with:password|same:password|min:6',

            ];
            $this->validate($request, $rules);
            $data = $request->all();
            $user =  new User();
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = bcrypt($data['password']);
            // $user->slug = str_slug($data['name']);
            // $token =str_random(60);
            // $user->extra_token = $token;
            if(  $user->save()){
                return redirect(route('image.register'))->with('success','You have been registered sucessfully');
            }else{
                return redirect(route('image.register'))->with('error','Registration Failed<br>Please try again!!');
            }
        }
        return view('register');
    }








    public function logout()
    {
        Session::flush();
        return redirect()->route('image.login')->with('flash_message_success', 'Logout Successful');
    }


}
