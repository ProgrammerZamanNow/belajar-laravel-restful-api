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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string("street", 200)->nullable();
            $table->string("city", 100)->nullable();
            $table->string("province", 100)->nullable();
            $table->string("country", 100)->nullable(false);
            $table->string("postal_code", 10)->nullable();
            $table->unsignedBigInteger("contact_id")->nullable(false);
            $table->timestamps();

            $table->foreign("contact_id")->on("contacts")->references("id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
