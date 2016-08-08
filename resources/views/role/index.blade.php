@extends('layouts.app')

@section('content')

<div class="panel-heading">Role - Index</div>

<div class="panel-body">
	
	<?php if (count($roles) > 0):?>
	
    	<table class="table table-hover">
    	<tr>
    	<th>ID</th>
    	<th>Name</th>
    	<th colspan="2">Action</th>
    	</tr>
    	@foreach ($roles->getCollection()->all() as $role)
    	<tr>
    	<td><?php echo $role->id;?></td>
    	<td><a href="{{ action('RoleController@show', [$role->id]) }}"><?php echo $role->name?></a></td>
    	<td><a href="{{ action('RoleController@edit', [$role->id]) }}"><button type="button" class="btn btn-xs btn-info">Edit</button></a></td>
    	<td>
    		{!! Form::open([
    			'route' => ['role.destroy', $role->id], 
    			'method' => 'DELETE'
    			]) !!}
    			{!! Form::submit('Delete', ['class' => 'btn btn-xs btn-danger', 'onclick' => 'return confirm(\'Are you sure?\')']) !!}
    		{!! Form::close() !!}
    	</td>
    	</tr>
    	@endforeach
    	</table>
    	{{ $roles->links() }}
    	
	<?php else:?>
	   No roles found.
	<?php endif;?>
</div>

@endsection('content')