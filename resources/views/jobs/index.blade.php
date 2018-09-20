@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="title">{{__('Jobs')}}</h1>
        </div>
        @foreach($statuses as $status)
        <div class="col-md-4 pb-4">
            @switch($loop->iteration)
            @case(1)
                <div class="card bg-danger">
                    <div class="card-header text-white">
            @break
            @case(2)
                <div class="card bg-warning">
                    <div class="card-header">
            @break
            @case(3)
                <div class="card bg-success">
                    <div class="card-header text-white">
            @break
            @default
                <div class="card bg-dark">
                    <div class="card-header text-white">
            @break
            @endswitch
                    {{$status->status}}
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($status->jobs as $job)
                    <div class="list-group-item">
                        <span class="badge badge-dark">{{$job->created_at}}</span>
                        <p>{{$job->brand}} - {{$job->model}} </p>
                        <p>{{$job->issue}}</p>
                        <a href="{{route('jobs.edit', $job)}}" class="btn btn-sm btn-warning"><i class="fas fa-pen-alt"></i> {{__('Edit')}}</a>
                        <a href="{{route('jobs.show', $job)}}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> {{__('Show')}}</a>
                    </div>
                    @endforeach
                </ul>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection