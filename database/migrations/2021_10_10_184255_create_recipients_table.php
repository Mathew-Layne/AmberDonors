<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipients', function (Blueprint $table) {
            $table->id();
            $table->string('recipient_name');
            $table->string('carrier_name');
            $table->string('company_name');
            $table->string('company_email');
            $table->string('company_address');
            $table->string('city');
            $table->string('parish');
            $table->string('blood_type');
            $table->bigInteger('company_phoneno');
            $table->string('status')->default('Pending');
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
        Schema::dropIfExists('recipients');
    }
}
