@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="title">{{__('Job')}}</h1>
        </div>
        <div class="col-md-6">
            <form action="{{route('jobs.update', $job)}}" method="post">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <legend>{{__('Device')}}</legend>
                <div class="form-group">
                    <label for="">{{__('Brand')}}</label>
                    <input type="text" name="brand" class="form-control form-control-sm" value="{{$job->brand}}">
                </div>
                <div class="form-group">
                    <label for="">{{__('Model')}}</label>
                    <input type="text" name="model" class="form-control form-control-sm" value="{{$job->model}}">
                </div>
                <div class="form-group">
                    <label for="">{{__('Issue')}}</label>
                    <textarea name="issue" rows="10" class="form-control">{{$job->issue}}</textarea>
                </div>
                <legend>{{__('Status')}}</legend>
                <div class="form-group">
                    <label for="">{{__('Status')}}</label>
                    <select name="status_id" class="form-control form-control-sm">
                        @foreach($statuses as $status)
                        <option value="{{$status->id}}" {{($job->status == $status)?'selected':''}}>{{$status->status}}</option>
                        @endforeach
                    </select>
                </div>
                <legend>{{__('Worker')}}</legend>
                <div class="form-group">
                    <label for="">{{__('Worker')}}</label>
                    <select name="repairer_id" class="form-control form-control-sm">
                        <option></option>
                        @foreach($workers as $worker)
                        <option value="{{$worker->id}}" {{($job->repairer == $worker)?'selected':''}}>{{$worker->full_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <a href="{{route('jobs.index')}}" class="btn btn-sm btn-danger"><i class="fas fa-times"></i>
                        {{__('Cancel')}}</a>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> {{__('Save')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection