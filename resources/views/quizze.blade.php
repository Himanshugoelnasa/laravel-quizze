@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
            <h4>Quizz ID - {{Session::get('quizz_id')}}
            <span id="time" class="text-dark"></span></h4>
</div>
            <div class="card">
                <form method="POST" {{ (Session::get('question_count') == 5) ? 'class="quizze-form"' : ''}} action="{{route('submit_quizze')}}">
                    @csrf()
                    <div class="card-header text-left">
                        {{Session::get('question_count')}}. {{ get_question_text($question->question_id) }}
                    </div>

                    <input type="hidden" name="qq_id" value="{{$question->id}}" />
                    <input type="hidden" class="time_taken" name="time_taken" value="" />
                    <input type="hidden" name="question_id" value="{{$question->question_id}}" />
                    <div class="card-body">
                        @foreach(get_question_options($question->question_id) as $row => $option)
                        @php
                            $answer = get_user_previous_ans($question->question_id);
                        @endphp

                        <div class="form-check question-options">
                            <input class="form-check-input" type="radio" name="answer" value="{{$option}}"
                            {{($answer && $option == $answer->answer) ? 'checked' : ''}}
                            id="{{$row}}">
                            <label class="form-check-label" for="{{$row}}">
                                {{$option}} 
                            </label>
                        </div>
                        @endforeach

                        <div class="btn-section mt-5" role="group" aria-label="Basic example">
                            @if(Session::get('question_count') != 1)
                                <a href="{{route('previous_quizze')}}" class="btn btn-secondary">Previous Question</a>
                            @endif
                            
                            @if(Session::get('question_count') == 5)
                                <button type="submit" class="btn btn-dark f-right">Submit Quizze</button>
                            @else
                                <button type="submit" class="btn btn-dark f-right">Next Question</button>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
            <div class="end-section">
                <form method="POST" class="end-quizze" action="{{route('end_quizze')}}">
                    @csrf()
                    <input type="hidden" class="time_taken" name="time_taken" value="" />
                    <button class="btn btn-lg btn-success w-20">End Quizze</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
function startTimer(duration, display) {
  var timer = duration, minutes, seconds;
  var refreshId = setInterval(function () {

    sec  = parseInt(window.localStorage.getItem("seconds"));
    min = parseInt(window.localStorage.getItem("minutes"));
    if(sec == 0 && min == 0) {
        alert('your time is over, quizz is submitting now');
        $('#time').html('');
        window.localStorage.removeItem('seconds');
        window.localStorage.removeItem('minutes');
        $(".end-quizze").submit();
        $(".quizze-form").submit();
        clearInterval(refreshId);
        $('.resend_btn').removeClass('btn-disabled');
        return false;
    }
    minutes = parseInt(timer / 60, 10)
    seconds = parseInt(timer % 60, 10);

    minutes = minutes < 10 ? "0" + minutes : minutes;
    seconds = seconds < 10 ? "0" + seconds : seconds;

    display.textContent = '(' + minutes + ":" + seconds + ')';
    total_seconds = (minutes * 60) + seconds;
    $('.time_taken').val(total_seconds);
    if (--timer < 0) {
        timer = duration;
    }
    window.localStorage.setItem("seconds",seconds)
    window.localStorage.setItem("minutes",minutes)
  }, 1000);
}

window.onload = function () {
  sec  = parseInt(window.localStorage.getItem("seconds"));
  min = parseInt(window.localStorage.getItem("minutes"));

  if(parseInt(sec)){
    var fiveMinutes = (parseInt(min*20)+sec);
  }else{
    var fiveMinutes = 60 * 1;
  }
  display = document.querySelector('#time');
  startTimer(fiveMinutes, display);
};
</script>
@endpush
