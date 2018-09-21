@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="title">{{__('Jobs')}}</h1>
        </div>
        @foreach($statuses as $status)
        <div class="col-md-4 pb-4">
            @switch($status->status)
                @case('Esperando')
                    @todo(['status' => $status])
                    @endtodo
                @break
                @case('Reparando')
                    @working(['status' => $status])
                    @endworking
                @break
                @case('Almacenado')
                    @done(['status' => $status])
                    @enddone
                @break
            @endswitch
        </div>
        @endforeach
    </div>
</div>
@endsection