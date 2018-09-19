@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="title">Usuario</h1>
        </div>
        <div class="col-md-6">
            <form action="{{route('users.store')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="">Tipo</label>
                    <select name="role_id" class="form-control form-control-sm">
                        @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->role}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Nombres</label>
                    <input type="text" name="name" class="form-control form-control-sm">
                </div>
                <div class="form-group">
                    <label for="">Apellidos</label>
                    <input type="text" name="surname" class="form-control form-control-sm">
                </div>
                <div class="form-group">
                    <label for="">Teléfono</label>
                    <input type="text" name="phone" class="form-control form-control-sm">
                </div>
                <div class="form-group">
                    <label for="">Dirección</label>
                    <input type="text" name="address" class="form-control form-control-sm">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control form-control-sm">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control form-control-sm">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-primary">Aceptar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection