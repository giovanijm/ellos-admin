<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->uuid('externalId');
            $table->string('fullName', 100);
            $table->string('socialName', 100)->nullable();
            $table->string('documentNumber', 11)->unique();
            $table->dateTime('birthDate')->nullable();
            $table->string('postalCode', 8);
            $table->string('address', 100);
            $table->string('addressNumber', 10)->nullable();
            $table->string('complement', 50)->nullable();
            $table->string('neighborhood', 50);
            $table->string('city', 50);
            $table->tinyText('state');
            $table->foreignId('statusId')->constrained('tbstatus')->onDelete('cascade');
            $table->string('origin', 10);
            $table->longText('observation')->nullable();
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('customers');
    }
};
