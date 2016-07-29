@extends('layouts.app')

@section('content')

<div class="panel-heading">Map - Index</div>

<div class="panel-body">
	
	<?php if (count($maps) > 0):?>
	
    	<table class="table table-hover">
    	<tr>
    	<th>ID</th>
    	<th>Name</th>
    	<th colspan="2">Action</th>
    	</tr>
    	@foreach ($maps->getCollection()->all() as $map)
    	<tr>
    	<td><?php echo $map->id;?></td>
    	<td><?php echo $map->name?></td>
    	<td><a href="{{ action('MapController@edit', [$map->id]) }}"><button type="button" class="btn btn-xs btn-info">Edit</button></a></td>
    	<td>
    		{!! Form::open([
    			'route' => ['map.destroy', $map->id], 
    			'method' => 'DELETE'
    			]) !!}
    			{!! Form::submit('Delete', ['class' => 'btn btn-xs btn-danger', 'onclick' => 'return confirm(\'Are you sure?\')']) !!}
    		{!! Form::close() !!}
    	</td>
    	</tr>
    	@endforeach
    	</table>
    	{{ $maps->links() }}
    	
	<?php else:?>
	   No maps found.
	<?php endif;?>
</div>

@endsection('content')