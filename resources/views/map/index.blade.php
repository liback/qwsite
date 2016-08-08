@extends('layouts.app')

@section('content')

<div class="panel-heading">{{ Lang::get('maps.map') }} - {{ Lang::get('maps.index') }}</div>

<div class="panel-body">
	
	<?php if (count($maps) > 0):?>
	
    	<table class="table table-hover">
    	<tr>
    	<th>{{ Lang::get('maps.id') }}</th>
    	<th>{{ Lang::get('maps.name') }}</th>
    	<th colspan="2">{{ Lang::get('maps.action') }}</th>
    	</tr>
    	@foreach ($maps->getCollection()->all() as $map)
    	<tr>
    	<td><?php echo $map->id;?></td>
    	<td><a href="{{ action('MapController@show', [$map->id]) }}"><?php echo $map->name?></a></td>
    	<td><a href="{{ action('MapController@edit', [$map->id]) }}"><button type="button" class="btn btn-xs btn-info">{{ Lang::get('maps.edit') }}</button></a></td>
    	<td>
    		{!! Form::open([
    			'route' => ['map.destroy', $map->id], 
    			'method' => 'DELETE'
    			]) !!}
    			{!! Form::submit(Lang::get('maps.delete'), ['class' => 'btn btn-xs btn-danger', 'onclick' => 'return confirm(\'Are you sure?\')']) !!}
    		{!! Form::close() !!}
    	</td>
    	</tr>
    	@endforeach
    	</table>
    	{{ $maps->links() }}
    	
	<?php else:?>
	   {{ Lang::get('no_maps_found') }}
	<?php endif;?>
</div>

@endsection('content')