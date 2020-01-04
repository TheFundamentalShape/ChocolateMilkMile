<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('event_id');

            // Who this registration belongs to
            $table->unsignedInteger('user_id')->nullable();

            // The actual registrant information
            $table->string('name');
            $table->string('email');

            $table->timestamps();
            $table->timestamp('confirmed_at')->nullable();
            $table->bigInteger('confirmation_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registrations');
    }
}
