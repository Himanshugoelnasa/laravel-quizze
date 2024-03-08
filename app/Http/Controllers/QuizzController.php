<?php

namespace App\Http\Controllers;
use App\Models\Quizze;
use App\Models\Question;
use App\Models\UserQuizze;
use App\Models\QuestionQuizze;

use Hash;
use Auth;
use Session;

use Illuminate\Http\Request;

class QuizzController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function generate_quizz() {
        $questions = Question::inRandomOrder()->limit(5)->get();
        $generate_hash = substr(str_shuffle('0123456789'), 0, 5);

        Quizze::create(['quizze_id' => $generate_hash]);

        UserQuizze::create([
            'user_id'           => Auth::user()->id,
            'quizze_id'          => $generate_hash,
            'total_answered'    => 0,
            'correct_answered'  => 0,
            'status'            => 'Incomplete'
        ]);

        foreach($questions as $question) {
            QuestionQuizze::create([
                'quizze_id'      => $generate_hash,
                'question_id'   => $question->id
            ]);
        }
        Session::put('quizze_id', $generate_hash);
        Session::put('question_count', 1);
        $question = QuestionQuizze::where('quizze_id', '=', Session::get('quizze_id'))
                    ->where('status', '=', 0)
                    ->orderBy('id', 'ASC')
                    ->first(); 

        return view('quizze', compact('question')); 
    }

    public function create_quizze() {
        $quizze_id = Session::get('quizze_id');
        $q_count = Session::get('question_count');
        if(!$quizze_id) {
            return $this->generate_quizz();
        } 
        $question = QuestionQuizze::where('quizze_id', '=', $quizze_id)
                    ->where('status', '=', 0)
                    ->orderBy('id', 'ASC')
                    ->first(); 

        return view('quizze', compact('question')); 
        
    }

    public function submit_quizze(Request $request) {

        //return $request->all();
        $quizze_id = Session::get('quizze_id');
        $q_count = Session::get('question_count');
        if($quizze_id && $request->question_id && $request->qq_id) {
            $qq_id = $request->qq_id;
            $update_quizz_question = QuestionQuizze::find($qq_id);
            if($update_quizz_question) {
                $update_quizz_question->answer = $request->answer;
                $update_quizz_question->status = 1;
                $update_quizz_question->save();

                // save in user data
                $question = Question::find($request->question_id);

                
                $user_data = UserQuizze::where('user_id', '=', Auth::user()->id)->where('quizze_id', '=', $quizze_id)->first();

                
                if($request->answer) {
                    if($request->answer == $question->correct_answer) {
                        $user_data->total_answered = $user_data->total_answered + 1; 
                        $user_data->correct_answered = $user_data->correct_answered + 1; 
                    } else {
                        $user_data->total_answered = $user_data->total_answered + 1; 
                    }
                } else {
                    $user_data->total_unanswered = $user_data->total_unanswered + 1; 
                }
                //$user_data->time_taken = 60 - $request->time_taken;
                $user_data->save();
            
                if($q_count == 5) {
                    return $this->submit_end_quizze($request);
                }
                Session::put('question_count', $q_count+1);
                return redirect()->route('create_quizze');
            }
        } else {
            return back()->withErrors('Invalid Data recieved, try again');
        }

        return $update_quizz_question;
    }

    public function end_quizze(Request $request) {
        return $this->submit_end_quizze($request);
    }
    
    protected function submit_end_quizze(Request $request){
        $quizze_id = Session::get('quizze_id');
        $quizze = QuestionQuizze::where('quizze_id', '=', $quizze_id)->get();
        foreach($quizze as $question) {
            $question->status = 1;
            $question->save();
        }

        $user_data = UserQuizze::where('user_id', '=', Auth::user()->id)->where('quizze_id', '=', $quizze_id)->first();
        if($user_data) {
            $user_data->status = 'Complete';
            $user_data->time_taken = 60 - $request->time_taken;
            $user_data->save();
        }
        Session::forget('quizze_id');
        Session::forget('question_count');

        return redirect()->route('thankyou', $quizze_id )->with('success', 'Congatulations! You have successfully taken quizze');
    }

    public function previous_quizze() {

        $quizze_id = Session::get('quizze_id');
        $q_count = Session::get('question_count');
        $previous_q = QuestionQuizze::where('quizze_id', '=',$quizze_id)
                    ->where('status', '=', 1)
                    ->orderBy('id', 'DESC')
                    ->first();
        $previous_q->status = 0;
        $previous_q->save();

        $question = Question::find($previous_q->question_id);

        $user_data = UserQuizze::where('user_id', '=', Auth::user()->id)->where('quizze_id', '=', $quizze_id)->first();

        if($previous_q->answer) {
            if($previous_q->answer == $question->correct_answer) {
                $user_data->total_answered = $user_data->total_answered - 1; 
                $user_data->correct_answered = $user_data->correct_answered - 1; 
            } else {
                $user_data->total_answered = $user_data->total_answered - 1; 
            }
        } else {
            $user_data->total_unanswered = $user_data->total_unanswered - 1; 
        }
        $user_data->save();

        Session::put('question_count', $q_count-1);
        return redirect()->route('create_quizze');

    }

    public function thankyou($id) {
        $userquizze = UserQuizze::where('user_id', '=', Auth::user()->id)->where('quizze_id', '=', $id)->first();
        if($userquizze) {
            return view('thankyou', compact('userquizze'));
        } else {
            return redirect()->route('dashboard');
        }
        
    }

    public function quizze_detail($id) {
        if($id) {
            $userquizze = UserQuizze::where('user_id', '=', Auth::user()->id)->where('quizze_id', '=', $id)->first();
            if($userquizze) {
                $quizzes = QuestionQuizze::where('quizze_id', '=', $id)->get();

                //return $quizzes->questions;
                if(!$quizzes) return redirect()->back();

                return view('quizze-detail', ['quizzes' => $quizzes, 'userquizze' => $userquizze]);
            } else {
                return abort(401,"User can't perform this action.");
            }

        } else {
            return redirect()->back();
        }
    }
}
