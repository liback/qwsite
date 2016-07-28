@extends('layouts.app')

@section('content')
<div class="panel-heading">User - Create</div>

<div class="panel-body">
	@include('errors.list')
	
	{!! Form::open(['url' => 'user']) !!}
    	<?php if (count($roles) > 0):?>
    		<?php foreach($roles as $role):?>
    			 <div class="checkbox">
    			    <label>
    			      {!! Form::checkbox('roles[]', $role->id) !!} <?php echo $role->name; ?>
    			    </label>
    			  </div>
    		<?php endforeach;?>
    	<?php endif;?>	
	
		@include("user._form", ['submitButtonText' => 'Create user'])
	{!! Form::close() !!}
</div>
@endsection('content')