<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFellowshipGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fellowship_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('group_name', 30);
            $table->string('location', 50);
            $table->unsignedInteger('group_leader_id');
            $table->foreign('group_leader_id')->references('id')->on('group_leaders');
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
        Schema::drop('fellowship_groups');
    }
}
