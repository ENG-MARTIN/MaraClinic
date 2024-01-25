<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function redirect(){

        // if(Auth::id()){

        //     if(Auth:: user()->usertype=='admin'){
        //         return view ('dashboard');
        //     }
        //     else{
        //         return view('users.home');
        //     }
        // }
        // else{
        //     return redirect('/');
        // }

        if (Auth::check()) {
            $userType = Auth::user()->usertype;

            if ($userType == '1') {
                return view('admin.home'); // Change to your admin home view
            } elseif ($userType == '0') {
                return view('users.home');
            } else {
                return view('users.home'); // Default view for other cases
            }
        } else {
            // Consider redirecting to a default page instead of back
            return redirect('/'); // Change the URL to your desired default page
        }
    }
}
