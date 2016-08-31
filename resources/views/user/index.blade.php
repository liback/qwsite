@extends('layouts.app')

@section('content')

<div class="panel-heading">User - Index</div>

<div class="panel-body">
	
	<?php if (count($users) > 0):?>
	
    	<table class="table table-hover">
    	<tr>
    	<th>ID</th>
    	<th>Name</th>
        <th>Role</th>
        <th>State</th>
    	<th colspan="2">Action</th>
    	</tr>
    	@foreach ($users->getCollection()->all() as $user)
    	<tr>
    	<td><?php echo $user->id;?></td>
    	<td><a href="{{ action('UserController@show', [$user->id]) }}"><?php echo $user->name?></a></td>
        <td><?php echo $user->printRoles();?></td>
        <td><?php echo $user->state;?></td>
    	<td>
            @can('edit_user', $user)
                <a href="{{ action('UserController@edit', [$user->id]) }}"><button type="button" class="btn btn-xs btn-info">Edit</button></a>
            @endcan
        </td>
    	<td>
            @can('delete_user', $user)
        		{!! Form::open([
        			'route' => ['user.destroy', $user->id], 
        			'method' => 'DELETE'
        			]) !!}
        			{!! Form::submit('Delete', ['class' => 'btn btn-xs btn-danger', 'onclick' => 'return confirm(\'Are you sure?\')']) !!}
        		{!! Form::close() !!}
            @endcan
    	</td>
    	</tr>
    	@endforeach
    	</table>
    	{{ $users->links() }}
	
	<?php else:?>
	   No users found.
	<?php endif;?>
</div>

@endsection('content')