<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donors', function (Blueprint $table) {
            $table->id();
            $table->string('donor_name');
            $table->string('sex');
            $table->string('blood_type');
            $table->string('donor_address');
            $table->string('city');
            $table->string('parish');
            $table->string('donor_email');
            $table->bigInteger('donor_phoneno');
            $table->string('profile_pic');
            $table->integer('total_donation')->nullable();
            $table->string('last_donation_date')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('donors');
    }
}
