<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrievanceOwners extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grievance_owners', function (Blueprint $table) {
            $table->id();
            $table->integer('grievance_id');
            $table->string('name');
            $table->string('address');
            $table->char('mobile', 10);
            $table->string('email');
            $table->string('user_agent');
            $table->string('ip');
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
        Schema::dropIfExists('grievance_owners');
    }
}
