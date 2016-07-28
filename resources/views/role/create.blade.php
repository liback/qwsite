@extends('layouts.app')

@section('content')
<div class="panel-heading">Role - Create</div>

<div class="panel-body">
	@include('errors.list')
	
	{!! Form::open(['url' => 'role']) !!}
    	<?php if (count($permissions) > 0):?>
    		<?php foreach($permissions as $perm):?>
    			 <div class="checkbox">
    			    <label>
    			      {!! Form::checkbox('permissions[]', $perm->id) !!} <?php echo $perm->name; ?>
    			    </label>
    			  </div>
    		<?php endforeach;?>
    	<?php endif;?>	
	
		@include("role._form", ['submitButtonText' => 'Create role'])
	{!! Form::close() !!}
</div>
@endsection('content')