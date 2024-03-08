<?php

use App\Models\Quizze;
use App\Models\Question;
use App\Models\UserQuizze;
use App\Models\QuestionQuizze;

function get_question_text($id)
{
  $question = Question::find($id);
  return $question->question_text;
}

function get_question_options($id)
{
  $question = Question::find($id);
  $options = [];
  $options[] = $question->option_a;
  $options[] = $question->option_b;
  $options[] = $question->option_c;
  $options[] = $question->option_d;

  return $options;
}

function get_question_answer($id)
{
  $question = Question::find($id);
  return $question->correct_answer;
}

function time_taken($sec) {
    if($sec != 0) {
        return gmdate("i:s", $sec);
    }
}

function get_user_previous_ans($q_id) {
    return QuestionQuizze::where('question_id', '=', $q_id)
          ->where('quizze_id', '=', Session::get('quizze_id'))
          ->where('status', '=', 0)
          ->orderBy('id', 'ASC')
          ->first();
}




