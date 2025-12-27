<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('call_server')->create('users', function (Blueprint $table) {
            $table->id();

            $table->string('username')->unique();
            $table->string('password');

            $table->string('fname');
            $table->string('lname')->nullable();

            $table->string('usertype')->default('Agent');

            $table->dateTime('DOB')->nullable();
            $table->string('NIC')->nullable();
            $table->string('gender')->nullable();

            $table->string('email')->nullable();

            $table->string('addressNo')->nullable();
            $table->string('addressStreet')->nullable();
            $table->string('addressCity')->nullable();

            $table->string('numberone')->nullable();
            $table->string('numbertwo')->nullable();

            $table->string('bu')->nullable();
            $table->string('extension')->nullable();

            $table->timestamp('createdat')->nullable();
            $table->timestamp('updatedat')->nullable();
            $table->unsignedBigInteger('updatedby')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->unsignedBigInteger('branch_id')->nullable();

            $table->boolean('status')->default(1);

            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::connection('call_server')->dropIfExists('users');
    }
};
