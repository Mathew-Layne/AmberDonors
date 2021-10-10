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
            $table->foreignId('medical_personnel_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('dateout');
            $table->integer('quantity');
            $table->foreignId('recipient_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('blood_type');
            $table->string('blood_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
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
