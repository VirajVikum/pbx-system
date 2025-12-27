<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    protected $connection = 'pbx';

    public function up(): void
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();

            // Optional relation (no FK constraint)
            $table->unsignedBigInteger('company_id')->nullable();

            $table->string('name');
            $table->string('code')->nullable();
            $table->boolean('status')->default(1);

            $table->timestamps();
            $table->softDeletes();

            $table->index('company_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
