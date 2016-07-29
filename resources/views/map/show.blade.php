@extends('layouts.app')

@section('content')

<div class="panel-heading">Map - <?php echo $map->name;?>: <?php echo $map->description;?></div>

<div class="panel-body">
	
	<div class="row">
		<div class="col-sm-8">
			<table class="table table-hover">
			<tr><th>ID</th><td><?php echo $map->id;?></td></tr>
			<tr><th>Name</th><td><?php echo $map->name;?></td></tr>
			<tr><th>Description</th><td><?php echo $map->description;?></td></tr>
			<tr><th>Action</th>
			<td><a href="{{ action('MapController@edit', [$map->id]) }}"><button type="button" class="btn btn-xs btn-info">Edit</button></a> 
			
				{!! Form::open([
					'route' => ['map.destroy', $map->id], 
					'method' => 'DELETE'
					]) !!}
					{!! Form::submit('Delete', ['class' => 'btn btn-xs btn-danger', 'onclick' => 'return confirm(\'Are you sure?\')']) !!}
				{!! Form::close() !!}
			</td>
			</tr>
			</table>
		</div>
		<div class="col-sm-4">
			<img src="{{ asset('storage/images/main_screenshot_placeholder.png') }}" style="width: 100%; height: 100%;"/>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-4">
			<h2>Weapons</h2>
			<table class="table table-hover">
			<tr><th>SSG</th><td><?php echo $map->num_ssg;?></td></tr>
			<tr><th>NG</th><td><?php echo $map->num_ng;?></td></tr>
			<tr><th>SNG</th><td><?php echo $map->num_sng;?></td></tr>
			<tr><th>GL</th><td><?php echo $map->num_gl;?></td></tr>
			<tr><th>RL</th><td><?php echo $map->num_rl;?></td></tr>
			<tr><th>LG</th><td><?php echo $map->num_lg;?></td></tr>
			</table>
		</div>
		<div class="col-sm-4">
			<h2>Ammo</h2>
			<table class="table table-hover">
			<tr><th>Shells (small)</th><td><?php echo $map->num_shells_small;?></td></tr>
			<tr><th>Shells (big)</th><td><?php echo $map->num_shells_big;?></td></tr>
			
			<tr><th>Nails (small)</th><td><?php echo $map->num_nails_small;?></td></tr>
			<tr><th>Nails (big)</th><td><?php echo $map->num_nails_big;?></td></tr>
			
			<tr><th>Rockets (small)</th><td><?php echo $map->num_rockets_small;?></td></tr>
			<tr><th>Rockets (big)</th><td><?php echo $map->num_rockets_big;?></td></tr>
			
			<tr><th>Cells (small)</th><td><?php echo $map->num_cells_small;?></td></tr>
			<tr><th>Cells (big)</th><td><?php echo $map->num_cells_big;?></td></tr>
			</table>
		</div>
		<div class="col-sm-4">
			<h2>Health / Armor</h2>
			<table class="table table-hover">
			<tr><th>Health (small)</th><td><?php echo $map->num_health_small;?></td></tr>
			<tr><th>Health (big)</th><td><?php echo $map->num_health_big;?></td></tr>
			<tr><th>Mega health</th><td><?php echo $map->num_mega_health;?></td></tr>

			<tr><th>Green armor</th><td><?php echo $map->num_ga;?></td></tr>
			<tr><th>Yellow armor</th><td><?php echo $map->num_ya;?></td></tr>
			<tr><th>Red armor</th><td><?php echo $map->num_ra;?></td></tr>
			</table>			
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6">
			<h2>Powerups</h2>
			<table class="table table-hover">
			<tr><th>Quad</th><td><?php echo $map->num_quad;?></td></tr>
			<tr><th>Ring</th><td><?php echo $map->num_ring;?></td></tr>
			<tr><th>Pent</th><td><?php echo $map->num_pent;?></td></tr>
			<tr><th>Environment suit</th><td><?php echo $map->num_env_suit;?></td></tr>
			</table>
		</div>
		<div class="col-sm-6">
			<h2>Misc.</h2>
			<table class="table table-hover">
			<tr><th>Spawns</th><td><?php echo $map->num_spawns;?></td></tr>
			<tr><th>Teleports</th><td><?php echo $map->num_teleports;?></td></tr>
			<tr><th>Secrets</th><td><?php echo $map->num_secrets;?></td></tr>
			</table>
		</div>
	</div>
</div>

@endsection('content')