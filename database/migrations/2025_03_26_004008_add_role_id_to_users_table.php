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
        Schema::table('users', function (Blueprint $table) {
            // Adding the 'role_id' column to the 'users' table
            $table->unsignedBigInteger('role_id')->nullable(); // You can change nullable() to notNullable() if role_id should always have a value
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Dropping the 'role_id' column if the migration is rolled back
            $table->dropColumn('role_id');
        });
    }
};
