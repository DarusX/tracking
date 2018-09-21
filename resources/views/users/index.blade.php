@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="title">{{ __('Users') }}</h1>
        </div>
        <div class="col-md-12">
                <div class="accordion" id="accordionRoles">
                        @foreach($roles as $role)
                        <div class="card">
                            <div class="card-header bg-dark">
                                <h5 class="mb-0">
                                    <button class="btn btn-dark btn-block collapsed" type="button" data-toggle="collapse" data-target="#collapse{{$role->role}}">
                                        {{$role->role}}
                                    </button>
                                </h5>
                            </div>
            
                            <div id="collapse{{$role->role}}" class="collapse" data-parent="#accordionRoles">
                                <div class="card-body">
                                    <table class="table">
                                        <thead class="bg-dark text-white">
                                            <tr>
                                                <th>{{__('Name')}}</th>
                                                <th>{{__('Email')}}</th>
                                                <th>{{__('Phone')}}</th>
                                                <th>{{__('Actions')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($role->users as $user)
                                            <tr>
                                                <td>{{$user->full_name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->phone}}</td>
                                                <td>
                                                    <a href="{{route('users.show', $user)}}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i></a>
                                                    <a href="{{route('users.edit', $user)}}" class="btn btn-sm btn-warning"><i class="fas fa-pen"></i></a>
                                                    <a href="{{route('users.destroy', $user)}}" class="btn btn-sm btn-danger destroy"><i class="fas fa-times"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
        </div>
    </div>
</div>
@endsection