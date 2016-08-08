@extends('layouts.app')

@section('content')

<div class="panel-heading">Role - <?php echo $role->name;?></div>

<div class="panel-body">
			
	<table class="table table-hover">
	<tr><th>ID</th><td><?php echo $role->id;?></td></tr>
	<tr><th>Name</th><td><?php echo $role->name;?></td></tr>
	<tr><th>Action</th>
	<td><a href="{{ action('RoleController@edit', [$role->id]) }}"><button type="button" class="btn btn-xs btn-info">Edit</button></a> 
	
		{!! Form::open([
			'route' => ['role.destroy', $role->id], 
			'method' => 'DELETE'
			]) !!}
			{!! Form::submit('Delete', ['class' => 'btn btn-xs btn-danger', 'onclick' => 'return confirm(\'Are you sure?\')']) !!}
		{!! Form::close() !!}
	</td>
	</tr>
	</table>

	<h1>Permissions</h1>
	<?php if (count($role->permissions) > 0):?>

		<table class="table table-hover">
			<?php foreach($role->permissions as $perm):?>
				 <tr><td><?php echo $perm->name; ?></td></tr>
			<?php endforeach;?>
		</table>

	<?php else: ?>
		<p>This role has no permissions.</p>
	<?php endif;?>	

</div>

@endsection('content')