<div class="form-group">
{!! Form::label('name', 'Name:') !!}
{!! Form::text('name', Input::get('name'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
{!! Form::label('description', 'Description:') !!}
{!! Form::text('description', Input::get('description'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
{!! Form::label('mod', 'Mod:') !!}
{!! Form::select('mod', $mods, Input::get('mod'), ['placeholder' => '-- All mods --']) !!}
</div>

<div class="form-inline">
{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>