<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Quizze;
use App\Models\Question;
use App\Models\UserQuizze;
use Session;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        if(Auth::check())
        {
            $data = UserQuizze::where('user_id', '=', Auth::user()->id)->orderBy('id', 'DESC')->get();
            Session::forget('quizze_id');
            Session::forget('question_count');
            return view('home', compact('data'));
            
        }
        
        return redirect()->route('login')
            ->withErrors([
            'email' => 'Please login to access the dashboard.',
        ])->onlyInput('email');
    } 
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');;
    }    
}
