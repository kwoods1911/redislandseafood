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
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            $table->string('companyName');
            $table->string('companyEmail');
            $table->string('companyPhoneNumber');
            $table->string('companyAddress');
            $table->string('companyCity');
            $table->string('province');
            $table->string('postalCode');
            $table->integer('minLobsterSizes')->nullable();
            $table->integer('maxLobsterSizes')->nullable();
            $table->integer('totalLiveLobsterPounds')->nullable();
            $table->integer('totalFrozenLobsterPounds')->nullable();
            $table->integer('frozenLobsterSize')->nullable();
            $table->integer('clamMeatPounds')->nullable();
            $table->integer('shrimpMeatPounds')->nullable();
            $table->double('liveLobsterUnitPrice')->nullable();
            $table->double('frozenLobsterUnitPrice')->nullable();
            $table->double('clamMeatUnitPrice')->nullable();
            $table->double('shrimpMeatUnitPrice')->nullable();
            $table->double('totalCostOfLiveLobster', 8, 2)->nullable();
            $table->double('totalCostOfFrozenLobster', 8, 2)->nullable();
            $table->double('totalCostOfClamMeat', 8, 2)->nullable();
            $table->double('totalCostOfShrimp', 8, 2)->nullable();
            $table->double('shippingCost', 8, 2)->nullable();
            $table->double('subTotal', 8, 2)->nullable();
            $table->double('finalCost', 8, 2)->nullable();

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
