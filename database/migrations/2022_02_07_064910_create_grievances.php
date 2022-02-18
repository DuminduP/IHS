<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrievances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grievances', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();;
            $table->string('title');
            $table->text('description');
            $table->text('notes')->nullable();;
            $table->integer('institution_id');
            $table->integer('sub_institution_id')->nullable();
            $table->integer('grievance_type_id');
            $table->integer('grievance_owner_id');
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
        Schema::dropIfExists('grievances');
    }
}
