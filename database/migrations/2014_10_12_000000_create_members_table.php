<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 30);
            $table->string('middle_name', 50)->nullable($value = true);
            $table->string('last_name', 30);
            $table->date('birthday');
            $table->string('email', 100)->unique();
            $table->string('residential_address', 150);
            $table->date('wedding_anniversary')->nullable($value = true);
            $table->string('home_phone_number')->nullable($value = true);
            $table->string('office_phone_number')->nullable($value = true);
            $table->string('cell_phone_number')->nullable($value = true);
            $table->string('password');
            $table->integer('fellowship_group_id')->nullable($value = true);
            $table->integer('discipler_id')->nullable($value = true);
            $table->integer('status_id')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('members');
    }
}
