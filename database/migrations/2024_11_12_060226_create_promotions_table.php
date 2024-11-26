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
        Schema::create('promotions', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('employee_id')->nullable()->index('fk_promotions_employees');
            $table->string('previous_position', 100)->nullable();
            $table->string('new_position', 100)->nullable();
            $table->date('promotion_date')->nullable();
            $table->integer('previous_salary')->nullable();
            $table->integer('new_salary')->nullable();
            $table->string('reason', 150)->nullable();
            $table->integer('approved_by')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
