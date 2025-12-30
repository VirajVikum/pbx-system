<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $connection = 'call_server';

    public function up(): void
    {
        Schema::create('exten', function (Blueprint $table) {
            $table->id();

            $table->string('extension')->unique();
            $table->string('exten_type')->default('sip');
            $table->string('password')->nullable();
            $table->string('context')->default('internal');

            // ✅ New fields
            $table->string('phone_type')->nullable();
            $table->string('department')->nullable();
            $table->string('branch')->nullable();

            $table->boolean('status')->default(1);
            $table->string('updatedby')->nullable();
            $table->timestamps();

            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exten');
    }
};
