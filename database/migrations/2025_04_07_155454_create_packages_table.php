<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->index()->constrained()->cascadeOnDelete();
            $table->foreignId('transport_id')->index()->constrained()->cascadeOnDelete();
            $table->string('code')->unique();
            $table->string('barcode')->unique();
            $table->double('weight')->default(0);
            $table->double('weight_price')->default(0);
            $table->double('total_price')->default(0);
            $table->text('note')->nullable();
            $table->unsignedInteger('type')->default(0);
            $table->unsignedInteger('status')->default(0);
            $table->unsignedInteger('payment_status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
