@extends('template')

@section('main')
    <div id="hobi">
    <h2>Tambah Hobi</h2>

    {!! Form::open(['url' => 'hobi']) !!}
    @include('hobi.form', ['submitButtonText' => 'Tambah Hobi'])
    {!! Form::close() !!}
    </div>
@stop

@section('footer')
    @include('footer')
@stop