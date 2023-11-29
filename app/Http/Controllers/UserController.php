<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function register(Request $request){
        $phone = User::select('phone as userLogin')->whereNotNull('phone');
        $email_phone = User::select('email as userLogin')->whereNotNull('email')->union($phone)->get();
        $check_email_phone = $email_phone->where('userLogin', $request->user_login)->first();
        if(empty($check_email_phone)){
            $users = new User;
            if (filter_var($request->user_login, FILTER_VALIDATE_EMAIL)) {
                $users->email = $request->user_login;
            }else{
                $users->phone = $request->user_login;
            }
            $users->password = Hash::make($request->password);
            $users->save();
            Auth::loginUsingId($users->id);
            return redirect()->route('page.information');
        }else{
            return back()->with('errorMailorPhone', 'Email or Phone is used')->withInput();
        }
    }
    public function information(Request $request){
        $users = User::find(auth()->id());
        $users->username = $request->username;
        $users->fname = $request->fname;
        $users->lname = $request->lname;
        $users->gender = $request->gender;
        $users->birthday = $request->birthday;
        $users->save();
        return redirect()->route('page.home');
    }
    public function set_reward(){
        $users = User::find(auth()->id());
        $users->get_reward = 1;
        $users->save();
        return back();
    }
    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect()->route('page.index');
    }
    public function login(Request $request){
        // dd($request->all());
        if (Auth::attempt(['email' => $request->user_login, 'password' => $request->password])) {
            if(auth()->user()->username == "" || auth()->user()->fname == "" || auth()->user()->lname == "" || auth()->user()->gender == "" || auth()->user()->	birthday == ""){
                return redirect()->route('page.information');
            }
            return redirect()->route('page.home');
        }
        if (Auth::attempt(['phone' => $request->user_login, 'password' => $request->password])) {
            if(auth()->user()->username == "" || auth()->user()->fname == "" || auth()->user()->lname == "" || auth()->user()->gender == "" || auth()->user()->	birthday == ""){
                return redirect()->route('page.information');
            }
            return redirect()->route('page.home');
        }
        
        return back()->with('errorMailorPhone', 'Email or Phone not math')->withInput();
    }
}
