@if (isset($hobi))
{!! Form::hidden('id', $hobi->id) !!}
@endif

@if ($errors->any())
<div class="form-group {{ $errors->has('nama_hobi') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif

{!! Form::label('nama_hobi', 'Nama Hobi:', ['class' => 'control-label']) !!}
{!! Form::text('nama_hobi', null, ['class' => 'form-control']) !!}

@if ($errors->has('nama_hobi'))
<span class="help-block">{{ $errors->first('nama_hobi') }}</span>
@endif
</div>

<div class="form-group">
{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>