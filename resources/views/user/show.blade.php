@extends('layouts.app')

@section('content')

<div class="panel-heading">User - <?php echo $user->name;?></div>

<div class="panel-body">
			
	<table class="table table-hover">
	<tr><th>ID</th><td><?php echo $user->id;?></td></tr>
	<tr><th>Name</th><td><?php echo $user->name;?></td></tr>
	<tr><th>Role(s)</th><td><?php echo $user->printRoles();?></td></tr>
	<tr><th>Action</th>
	<td><a href="{{ action('UserController@edit', [$user->id]) }}"><button type="button" class="btn btn-xs btn-info">Edit</button></a> 
	
		{!! Form::open([
			'route' => ['user.destroy', $user->id], 
			'method' => 'DELETE'
			]) !!}
			{!! Form::submit('Delete', ['class' => 'btn btn-xs btn-danger', 'onclick' => 'return confirm(\'Are you sure?\')']) !!}
		{!! Form::close() !!}
	</td>
	</tr>
	</table>

	
</div>

@endsection('content')