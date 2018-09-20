@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="title">{{__('Job')}}</h1>
        </div>
        <div class="col-md-4">
            <h2 class="title">{{__('Device')}}</h2>
            <div class="form-group">
                <label for="">{{__('Brand')}}</label>
                <input type="text" class="form-control" value="{{$job->brand}}" readonly>
            </div>
            <div class="form-group">
                <label for="">{{__('Model')}}</label>
                <input type="text" class="form-control" value="{{$job->model}}" readonly>
            </div>
            <div class="form-group">
                <label for="">{{__('Issue')}}</label>
                <textarea class="form-control" rows="5" readonly>{{$job->issue}}</textarea>
            </div>
        </div>
        <div class="col-md-4">
            <h2 class="title">{{__('Status')}}</h2>
            <ul class="list-group">
                @foreach($job->logs as $log)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <p class="mb-0"><i class="fas fa-long-arrow-alt-down"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$log->status->status}}</p>
                    <span class="badge badge-dark">{{$log->created_at->diffForHumans()}}</span>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection