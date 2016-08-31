@extends('layouts.app')

@section('content')
<div class="panel-heading">Edit Profile - {{ $user->name }}</div>

<div class="panel-body">	
	@include('errors.list')

	{!! Form::model($user, ['method' => 'patch', 'action' => ['UserController@updateprofile', $user->id]]) !!}
		@include("user._editprofileform", ['submitButtonText' => 'Save changes'])
	{!! Form::close() !!}
</div>
@endsection