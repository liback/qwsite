<div class="form-group">
{!! Form::label('name', Lang::get('maps.name')) !!}
{!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
{!! Form::label('description', Lang::get('maps.description')) !!}
{!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>
<div class="form-inline">
{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>