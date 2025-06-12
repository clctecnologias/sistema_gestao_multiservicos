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
        //, months_quantity, residence_ref
       Schema::table('payments', function (Blueprint $table) {
        $table->integer("counter_number")->nullable()->after('enterprise_service_uuid');
        $table->integer("months_quantity")->nullable()->after('counter_number');
        $table->string("residence_ref")->nullable()->after('months_quantity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
