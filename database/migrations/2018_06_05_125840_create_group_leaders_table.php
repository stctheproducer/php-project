<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupLeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_leaders', function (Blueprint $table) {
            $table->unsignedInteger('member_id');
            $table->foreign('member_id')
                ->references('id')
                ->on('members')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedInteger('fellowship_group_id');
            $table->foreign('fellowship_group_id')
                ->references('id')
                ->on('felowship_groups')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->primary([
                'member_id',
                'fellowship_group_id'
            ]);
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
        Schema::drop('group_leaders');
    }
}
