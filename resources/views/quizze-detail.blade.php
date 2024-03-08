@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                
            </div>
            <div class="card">

                    <div class="card-header text-left">
                        <h4><a href="{{route('dashboard')}}"><i class="fa fa-arrow-left text-dark"></i></a>&nbsp;&nbsp;Quizz Detail - {{$userquizze->quizze_id}}

                        <span class="f-right">Time Taken - <b>{{time_taken($userquizze->time_taken)}} Min.</b></span></h4>
                    </div>

                    <div class="card-body">
                        @foreach($quizzes as $row => $quizze)
                        <div>
                            <p>Question {{$row+1}} - {{ get_question_text($quizze->question_id) }}</p>
                            @foreach(get_question_options($quizze->question_id) as $row => $option)
                            <div class="form-check">
                                <label class="form-check-label" for="{{$row}}">
                                    
                                    @if($option == get_question_answer($quizze->question_id))
                                        <b>{{$row+1}}. {{$option}}</b>
                                        &nbsp;&nbsp;<span class="text-success">(Correct Answer)</span>
                                    @else 
                                        {{$row+1}}. {{$option}}
                                    @endif
                                </label>
                            </div>
                            @endforeach
                            <br>
                            <p><b>Your Answer - </b>
                                @if($quizze->answer)
                                    @if($quizze->answer == get_question_answer($quizze->question_id))
                                        <b class="text-success">{{$quizze->answer}}</b>
                                    @else
                                        <b class="text-danger">{{$quizze->answer}}</b>
                                    @endif
                                    
                                @else
                                    Not attempt
                                @endif
                            </p>
                            <hr>
                        </div>
                         @endforeach
                        <div class="btn-section mt-3 f-right" role="group" aria-label="Basic example">
                            <a href="{{route('dashboard')}}" class="btn btn-primary">Go to Home</a>
                            
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
@endsection

