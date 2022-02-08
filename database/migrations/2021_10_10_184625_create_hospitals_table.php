<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospitals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate(('cascade'));
            $table->string('personnel_licence_no');
            $table->string('hospital_name');
            $table->string('hospital_address');
            $table->string('hospital_city');
            $table->string('hospital_parish');
            $table->string('hospital_email');
            $table->bigInteger('hospital_phoneno');
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
        Schema::dropIfExists('medical_personnels');
    }
}
