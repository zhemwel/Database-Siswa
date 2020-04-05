@extends('template')

@section('main')
    <div id="siswa">
        <h2>Tambah Siswa</h2>

        {!! Form::open(['url' => 'siswa', 'files' => true]) !!}
            @include('siswa.form', ['submitButtonText' => 'Tambah Siswa'])
        {!! Form::close() !!}
    </div>
@stop

@section('footer')
    @include('footer')
@stop