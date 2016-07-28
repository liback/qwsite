@extends('layouts.app')

@section('content')
<div class="panel-heading">Edit User - {{ $user->name }}</div>

<div class="panel-body">	
@include('errors.list')

{!! Form::model($user, ['method' => 'patch', 'action' => ['UserController@update', $user->id]]) !!}
	<?php if (count($roles) > 0):?>
		<?php foreach($roles as $role):?>
			 <div class="checkbox">
			    <label>
			      {!! Form::checkbox('roles[]', $role->id, $checkedRoles->contains($role->id)) !!} <?php echo $role->name; ?>
			    </label>
			  </div>
		<?php endforeach;?>
	<?php endif;?>	

	@include("user._form", ['submitButtonText' => 'Save changes'])
{!! Form::close() !!}
</div>
@endsection