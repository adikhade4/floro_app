<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUseractivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('useractivity', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->foreign();
            $table->string('old_value');
            $table->string('new_value');
            $table->string('field_name');
            $table->string('modified_by')->foreign();;
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
        Schema::dropIfExists('useractivity');
    }
}
