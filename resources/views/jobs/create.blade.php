@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="title">{{__('Job')}}</h1>
        </div>
        <div class="col-md-6">
            <form action="{{route('jobs.store')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="">{{__('Client')}}</label>
                    <select name="owner_id" class="form-control form-control-sm">
                        @foreach($clients as $client)
                        <option value="{{$client->id}}">{{$client->full_name}}</option>
                        @endforeach
                    </select>
                </div>
                <legend>{{__('Device')}}</legend>
                <div class="form-group">
                    <label for="">{{__('Brand')}}</label>
                    <input type="text" name="brand" class="form-control form-control-sm">
                </div>
                <div class="form-group">
                    <label for="">{{__('Model')}}</label>
                    <input type="text" name="model" class="form-control form-control-sm">
                </div>
                <div class="form-group">
                    <label for="">{{__('Issue')}}</label>
                    <textarea name="issue" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> {{__('Save')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection