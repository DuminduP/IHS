<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrievanceHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grievance_history', function (Blueprint $table) {
            $table->id();
            $table->integer('grievance_id');
            $table->string('title');
            $table->text('description');
            $table->text('notes')->nullable();
            $table->integer('institution_id');
            $table->integer('sub_institution_id')->nullable();
            $table->integer('grievance_type_id');
            $table->integer('grievance_owner_id');
            $table->integer('staff_id');
            $table->binary('qr_code')->nullable();
            $table->enum('status', ['Open', 'In-prograss', 'Rejected', 'Out of scope', 'Done']);
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
        Schema::dropIfExists('grievance_history');
    }
}
