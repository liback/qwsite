<div class="form-group">
{!! Form::label('name', 'Name:') !!}
{!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
{!! Form::label('email', 'E-mail:') !!}
{!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
{!! Form::label('password', 'Password:') !!}
{!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<div class="form-group">
{!! Form::label('password_confirmation', 'Password confirmation:') !!}
{!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
</div>

<div class="form-group">
{!! Form::label('state', 'State:') !!}
{!! Form::select('state', ['active' => 'active','banned' => 'banned'], isset($user->state) ? $user->state : 'active', ['class' => 'form-control']) !!}
</div>

<div class="form-inline">
{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>