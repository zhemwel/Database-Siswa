@extends('template')

@section('main')
<div id="user">
<h2>Edit User</h2>

{!! Form::model($user, ['method' => 'PATCH', 'action' => ['UserController@update', $user->id]]) !!}
@include('user.form', ['submitButtonText' => 'Update User'])
{!! Form::close() !!}
</div>
@stop

@section('footer')
@include('footer')
@stop