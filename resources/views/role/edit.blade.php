@extends('layouts.app')

@section('content')
<div class="panel-heading">Edit Role - {{ $role->name }}</div>

<div class="panel-body">	
@include('errors.list')

{!! Form::model($role, ['method' => 'patch', 'action' => ['RoleController@update', $role->id]]) !!}
	<?php if (count($permissions) > 0):?>
		<?php foreach($permissions as $perm):?>
			 <div class="checkbox">
			    <label>
			      {!! Form::checkbox('permissions[]', $perm->id, $checkedPermissions->contains($perm->id)) !!} <?php echo $perm->name; ?>
			    </label>
			  </div>
		<?php endforeach;?>
	<?php endif;?>	

	@include("role._form", ['submitButtonText' => 'Save changes'])
{!! Form::close() !!}
</div>
@endsection