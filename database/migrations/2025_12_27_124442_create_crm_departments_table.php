<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    protected $connection = 'pbx';

    public function up(): void
    {
        Schema::create('crm_departments', function (Blueprint $table) {
            $table->id();

            // Optional relation
            $table->unsignedBigInteger('branch_id')->nullable();

            $table->string('name');

            $table->timestamps();
            $table->softDeletes();

            $table->index('branch_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('crm_departments');
    }
};
