<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('members', function (Blueprint $table)
        {
            $table->foreign('fellowship_group_id')
                ->references('id')
                ->on('fellowship_groups')
                ->onDelete('set null');
            // ->onUpdate('cascade');
            $table->foreign('discipler_id')
                ->references('id')
                ->on('members')
                ->onDelete('set null');
            $table->foreign('status_id')
                ->references('id')
                ->on('statuses')
                ->onDelete('set null');
                // ->onUpdate('cascade');
        });

        Schema::table('group_leaders', function (Blueprint $table)
        {
            $table->foreign('member_id')
                ->references('id')
                ->on('members')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('fellowship_group_id')
                ->references('id')
                ->on('fellowship_groups')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('fellowship_groups', function (Blueprint $table)
        {
            $table->foreign('group_leader_id')
                ->references('id')
                ->on('group_leaders')
                ->onDelete('set null')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('members', function (Blueprint $table)
        {
            $table->dropForeign(['fellowship_group_id']);
            $table->dropForeign(['discipler_id']);
            $table->dropForeign(['status_id']);
        });

        Schema::table('group_leaders', function (Blueprint $table)
        {
            $table->dropForeign(['member_id']);
            $table->dropForeign(['fellowship_group_id']);
        });

        Schema::table('fellowship_groups', function (Blueprint $table)
        {
            $table->dropForeign(['group_leader_id']);
        });
    }
}
