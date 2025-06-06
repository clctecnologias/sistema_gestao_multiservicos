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
        
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('username')->nullable();
        $table->string('email')->unique();
        $table->timestamp('email_verified_at')->nullable();
        $table->string('password');
        $table->integer('reset_password_code')->nullable();

        $table->uuid('role_uuid');
        $table->uuid('customer_uuid')->nullable();
        $table->uuid('employee_uuid')->nullable();

        $table->foreign('role_uuid')->references('uuid')->on('roles');
        $table->foreign('customer_uuid')->references('uuid')->on('customers');
        $table->foreign('employee_uuid')->references('uuid')->on('employees');

        $table->rememberToken();
        $table->timestamps();
});
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
