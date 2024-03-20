<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('quote', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('minLobsterSizes')->nullable();
            $table->integer('maxLobsterSizes')->nullable();
            $table->integer('totalLiveLobsterPounds')->nullable();
            $table->integer('totalFrozenLobsterPounds')->nullable();
            $table->integer('frozenLobsterSize')->nullable();
            $table->integer('clamMeatPounds')->nullable();
            $table->integer('shrimpMeat')->nullable();
            $table->string('companyName');
            $table->string('companyEmail');
            $table->string('companyPhoneNumber');
            $table->string('companyAddress');
            $table->string('province');
            $table->string('postalCode');


            
            $table->string('totalCost');
            $table->string('shippingAmount');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quote');
    }
};
