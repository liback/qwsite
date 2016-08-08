@extends('layouts.app')

@section('content')
<div class="panel-heading">{{ Lang::get('maps.edit_map') }} - {{ $map->name }}</div>

<div class="panel-body">	
@include('errors.list')

{!! Form::model($map, ['method' => 'patch', 'action' => ['MapController@update', $map->id]]) !!}
	@include("map._form", ['submitButtonText' => Lang::get('maps.save_changes')])
{!! Form::close() !!}
</div>
@endsection