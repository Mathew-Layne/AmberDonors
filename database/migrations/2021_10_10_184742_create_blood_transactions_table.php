<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hospital_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('donation_camp_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('date_requested');
            $table->integer('quantity');
            $table->string('blood_type_id')->constrained('blood_types')->onDelete('cascade')->onUpdate('cascade');
            $table->string('status')->default('pending');
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
        Schema::dropIfExists('blood_transactions');
    }
}
