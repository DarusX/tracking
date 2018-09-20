@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="title">{{ __('Users') }}</h1>
        </div>
        @foreach($users as $user)
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-user-alt"></i> {{$user->full_name}}</h5>
                    <p class="card-text"><i class="fas fa-envelope"></i> {{$user->email}}</p>
                    <p class="card-text"><i class="fas fa-user-cog"></i> {{$user->role->role}}</p>
                    <p class="card-text"><i class="fas fa-mobile-alt"></i> {{$user->phone}}</p>
                    <p class="card-text"><i class="fas fa-map-marker"></i> {{$user->address}}</p>

                    <a href="{{route('users.edit', $user)}}" class="btn btn-warning"><i class="fas fa-pen-alt"></i> {{__('Edit')}}</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection