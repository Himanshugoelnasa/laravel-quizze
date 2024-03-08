@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::has('success'))
            <div class="alert alert-success">
                <i class="fa fa-check-circle"></i> {{Session::get('success')}}
            </div>
            @endif
            @if(Session::has('error'))
            <div class="alert alert-danger">
                <i class="fa fa-check-circle"></i> {{Session::get('error')}}
            </div>
            @endif
            <div class="card">
                <div class="card-header text-center">Thank you for the quizze !</div>

                <div class="card-body text-center">
                    <div class="summary-div">
                        <h4>Summary</h4>
                        <p>Questions attempt - {{$userquizze->total_answered}} out of 5</p>
                        <p>Correct answers - {{$userquizze->correct_answered}}</p>
                        <p>Wrong answers -  {{(5 - $userquizze->total_unanswered) - $userquizze->correct_answered}}</p>
                        <p>Time taken - {{time_taken($userquizze->time_taken)}} min</p>

                        <div class="btn-section mt-5" role="group" aria-label="Basic example">
                            <a href="{{route('dashboard')}}" class="btn btn-primary f-left">Go to Home</a>
                            <a href="{{route('quizze_detail', $userquizze->quizze_id)}}" class="btn btn-dark f-right">See Details</a>
                        </div>
                    </div>
                </div>
                
            </div>

 
        </div>
    </div>
</div>
@endsection

@push('js')
<script>

window.onload = function () {
    window.localStorage.removeItem('seconds');
    window.localStorage.removeItem('minutes');
};
</script>
@endpush


