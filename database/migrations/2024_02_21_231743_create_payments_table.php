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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_amount');
            $table->float('installments');
            $table->string('token');
            $table->string('payment_method_id');
            $table->string('payer_entity_type')->default('individual');
            $table->string('payer_type')->default('customer');
            $table->string('payer_email');
            $table->string('payer_identification_type');
            $table->string('payer_identification_number');
            $table->string('notification_url')->default('https://webhook.site/82817158-40c3-4f3c-851c-b7abb99c43ab');
            $table->date('created_at');
            $table->date('updated_at');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
