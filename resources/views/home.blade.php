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
                <div class="card-header text-center">{{ __('Welcome to Quizzes') }}</div>

                <div class="card-body">
                    <div class="alert text-center" role="alert">
                        <p>This is demo quizze where you can have test yourself with some php based questions.</p>
                        <p>This is time based where you have 1 min. and total number of questions are 5</p>
                        <p>Click below button to start test, Enjoy!</p>
                        <a href="{{route('create_quizze')}}" type="button" class="btn btn-dark">Click here to Take Quizz</a>
                    </div>
                </div>
            </div>

            <div class="card mt-5">
                <div class="card-header text-left">My Quizzes</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered table-striped">
                            <thead>
                                <th>#</th>
                                <th>Quizze ID</th>
                                <th>Total Answered</th>
                                <th style="width:10%">Score (Correct Answers)</th>
                                <th>Time (In Minutes)</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                @foreach($data as $row => $quizz)
                                <tr>
                                    <td>{{$row+1}}</td>
                                    <td>{{$quizz->quizze_id}}</td>
                                    <td>{{$quizz->total_answered}} / 5</td>
                                    <td>
                                        <span class="text-success">{{$quizz->correct_answered}}</span> 
                                    </td>
                                    <td>{{time_taken($quizz->time_taken)}} / 1:00 </td>
                                    <td>
                                        @if($quizz->status == 'Complete')
                                            <span class="badge text-success quizz-res">{{$quizz->status}}</span>
                                        @else
                                            <span class="badge text-danger quizz-res">{{$quizz->status}}</span>
                                        @endif
                                    </td>
                                    <td><a href="{{route('quizze_detail', $quizz->quizze_id)}}" class="btn btn-sm btn-primary">See Datails</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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


