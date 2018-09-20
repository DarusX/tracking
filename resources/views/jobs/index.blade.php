@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="title">{{__('Jobs')}}</h1>
        </div>
        @foreach($statuses as $status)
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    {{$status->status}}
                </div>
                <div class="card-body">
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($status->jobs as $job)
                    <div class="list-group-item">
                        <span class="badge badge-warning">{{$job->created_at->diffForHumans()}}</span>
                        <p>{{$job->brand}} - {{$job->model}} </p>
                    </div>
                    @endforeach
                </ul>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection