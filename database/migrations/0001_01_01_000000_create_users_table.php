<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // auto-incrementing primary key
            $table->string('name'); // name column for user's full name
            $table->string('email')->unique(); // email column, unique for each user
            $table->timestamp('email_verified_at')->nullable(); // email verification timestamp
            $table->string('password'); // password column for the user
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade'); // foreign key to roles table
            $table->rememberToken(); // for "remember me" functionality
            $table->timestamps(); // created_at and updated_at columns
        });
    }

    public function down()
    {
        Schema::dropIfExists('users'); // roll back the migration
    }
}
