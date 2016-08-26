@extends('layouts.app')

@section('content')

<div class="panel-heading">{{ Lang::get('maps.map') }} - <?php echo $map->name;?>: <?php echo $map->description;?></div>

<div class="panel-body">
	<div class="col-sm-12" style="margin: 0 0 1em 0;">
		<div class="row">
			<div class="col-xs-6 text-left">
				<?php if($prevMap):?>
					<a href="{{ URL::to('map/'. $prevMap) }}" class="btn btn-lg btn-default"><< {{ Lang::get('maps.previous') }}</a>
				<?php endif;?>
			</div>
			<div class="col-xs-6 text-right">
				<?php if($nextMap): ?>
					<a href="{{ URL::to('map/'. $nextMap) }}" class="btn btn-lg btn-default">{{ Lang::get('maps.next') }} >></a>
				<?php endif;?>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="row">
			<div class="col-sm-12">
				<table class="table table-hover">
				<tr><th style="width: 10em;">{{ Lang::get('maps.name') }}</th><td><?php echo $map->name;?></td></tr>
				<tr><th>{{ Lang::get('maps.description') }}</th><td><?php echo $map->description;?></td></tr>
				<tr><th>{{ Lang::get('maps.mod') }}</th><td><?php echo $map->mod;?></td></tr>
				<tr><th>{{ Lang::get('maps.action') }}</th>
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
		</div>
		<div class="row">
			<div class="col-sm-6">
				<h2>{{ Lang::get('qw.weapons') }}</h2>
				<table class="table table-hover">
				<tr><th>{{ Lang::get('qw.weap_ssg') }} ({{ Lang::get('qw.weap_ssg_abbrev') }})</th><td><?php echo $map->num_ssg;?></td></tr>
				<tr><th>{{ Lang::get('qw.weap_ng') }} ({{ Lang::get('qw.weap_ng_abbrev') }})</th><td><?php echo $map->num_ng;?></td></tr>
				<tr><th>{{ Lang::get('qw.weap_sng') }} ({{ Lang::get('qw.weap_sng_abbrev') }})</th><td><?php echo $map->num_sng;?></td></tr>
				<tr><th>{{ Lang::get('qw.weap_gl') }} ({{ Lang::get('qw.weap_gl_abbrev') }})</th><td><?php echo $map->num_gl;?></td></tr>
				<tr><th>{{ Lang::get('qw.weap_rl') }} ({{ Lang::get('qw.weap_rl_abbrev') }})</th><td><?php echo $map->num_rl;?></td></tr>
				<tr><th>{{ Lang::get('qw.weap_lg') }} ({{ Lang::get('qw.weap_lg_abbrev') }})</th><td><?php echo $map->num_lg;?></td></tr>
				</table>
			</div>
			<div class="col-sm-6">
				<h2>{{ Lang::get('qw.ammo') }}</h2>
				<table class="table table-hover">
				<tr><th>{{ Lang::get('qw.item_shells_small') }}</th><td><?php echo $map->num_shells_small;?></td></tr>
				<tr><th>{{ Lang::get('qw.item_shells_big') }}</th><td><?php echo $map->num_shells_big;?></td></tr>
				
				<tr><th>{{ Lang::get('qw.item_nails_small') }}</th><td><?php echo $map->num_nails_small;?></td></tr>
				<tr><th>{{ Lang::get('qw.item_nails_big') }}</th><td><?php echo $map->num_nails_big;?></td></tr>
				
				<tr><th>{{ Lang::get('qw.item_rockets_small') }}</th><td><?php echo $map->num_rockets_small;?></td></tr>
				<tr><th>{{ Lang::get('qw.item_rockets_big') }}</th><td><?php echo $map->num_rockets_big;?></td></tr>
				
				<tr><th>{{ Lang::get('qw.item_cells_small') }}</th><td><?php echo $map->num_cells_small;?></td></tr>
				<tr><th>{{ Lang::get('qw.item_cells_big') }}</th><td><?php echo $map->num_cells_big;?></td></tr>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<h2>{{ Lang::get('qw.powerups') }}</h2>
				<table class="table table-hover">
				<tr><th>{{ Lang::get('qw.powerup_quad') }}</th><td><?php echo $map->num_quad;?></td></tr>
				<tr><th>{{ Lang::get('qw.powerup_ring') }}</th><td><?php echo $map->num_ring;?></td></tr>
				<tr><th>{{ Lang::get('qw.powerup_pent') }}</th><td><?php echo $map->num_pent;?></td></tr>
				<tr><th>{{ Lang::get('qw.powerup_env_suit') }}</th><td><?php echo $map->num_env_suit;?></td></tr>
				</table>
			</div>
			<div class="col-sm-6">
				<h2>{{ Lang::get('qw.health') }} / {{ Lang::get('qw.armour') }}</h2>
				<table class="table table-hover">
				<tr><th>{{ Lang::get('qw.item_health_small') }}</th><td><?php echo $map->num_health_small;?></td></tr>
				<tr><th>{{ Lang::get('qw.item_health_big') }}</th><td><?php echo $map->num_health_big;?></td></tr>
				<tr><th>{{ Lang::get('qw.item_health_megahealth') }}</th><td><?php echo $map->num_mega_health;?></td></tr>

				<tr><th>{{ Lang::get('qw.item_armour_ga') }}</th><td><?php echo $map->num_ga;?></td></tr>
				<tr><th>{{ Lang::get('qw.item_armour_ya') }}</th><td><?php echo $map->num_ya;?></td></tr>
				<tr><th>{{ Lang::get('qw.item_armour_ra') }}</th><td><?php echo $map->num_ra;?></td></tr>
				</table>			
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<h2>{{ Lang::get('qw.miscellaneous') }}</h2>
				<table class="table table-hover">
				<tr><th>{{ Lang::get('qw.env_spawn') }}</th><td><?php echo $map->num_spawns;?></td></tr>
				<tr><th>{{ Lang::get('qw.env_teleport') }}</th><td><?php echo $map->num_teleports;?></td></tr>
				<tr><th>{{ Lang::get('qw.env_secret') }}</th><td><?php echo $map->num_secrets;?></td></tr>
				<tr><th>{{ Lang::get('qw.env_secret_door') }}</th><td><?php echo $map->num_secret_doors;?></td></tr>
				</table>
			</div>
		</div>
	</div>
	<div class="col-sm-4">
		<?php if (count($screenshots) > 0):?>
			<?php foreach($screenshots as $screenshot):?>
				<a href="{{ asset($screenshot) }}"><img src="{{ asset($screenshot) }}" style="width: 100%; height: 100%; margin: .2em 0;"/></a>
			<?php endforeach;?>
		<?php else:?>
			<p>{{ Lang::get('maps.no_screenshots_found') }}</p>
		<?php endif;?>
	</div>
</div>

@endsection('content')