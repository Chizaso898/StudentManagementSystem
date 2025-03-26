<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id(); // auto-incrementing primary key
            $table->string('name'); // role name (e.g., 'Admin', 'Student')
            $table->string('slug')->unique(); // unique slug for role (e.g., 'admin', 'student')
            $table->timestamps(); // created_at and updated_at columns
        });
    }

    public function down()
    {
        Schema::dropIfExists('roles'); // roll back the migration
    }
}
