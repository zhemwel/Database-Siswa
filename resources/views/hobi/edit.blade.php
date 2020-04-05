@extends('template')

@section('main')
<div id="hobi">
    <h2>Edit Hobi</h2>

    {!! Form::model($hobi, ['method' => 'PATCH', 'action' => ['HobiController@update', $hobi->id]]) !!}
    @include('hobi.form', ['submitButtonText' => 'Update Hobi'])
    {!! Form::close() !!}
</div>
@stop

@section('footer')
    @include('footer')
@stop