<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('description');
            $table->integer('num_ssg');
            $table->integer('num_ng');
            $table->integer('num_sng');
            $table->integer('num_gl');
            $table->integer('num_rl');
            $table->integer('num_lg');
            $table->integer('num_shells_small');
            $table->integer('num_shells_big');
            $table->integer('num_nails_small');
            $table->integer('num_nails_big');
            $table->integer('num_cells_small');
            $table->integer('num_cells_big');
            $table->integer('num_rockets_small');
            $table->integer('num_rockets_big');
            $table->integer('num_health_small');
            $table->integer('num_health_big');
            $table->integer('num_mega_health');
            $table->integer('num_ga');
            $table->integer('num_ya');
            $table->integer('num_ra');
            $table->integer('num_quad');
            $table->integer('num_ring');
            $table->integer('num_pent');
            $table->integer('num_env_suit');
            $table->integer('num_spawns');
            $table->integer('num_teleports');
            $table->integer('num_secrets');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('maps');
    }
}
