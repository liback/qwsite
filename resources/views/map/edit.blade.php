@extends('layouts.app')

@section('content')
<div class="panel-heading">Edit Map - {{ $map->name }}</div>

<div class="panel-body">	
@include('errors.list')

{!! Form::model($map, ['method' => 'patch', 'action' => ['MapController@update', $map->id]]) !!}
	@include("map._form", ['submitButtonText' => 'Save changes'])
{!! Form::close() !!}
</div>
@endsection