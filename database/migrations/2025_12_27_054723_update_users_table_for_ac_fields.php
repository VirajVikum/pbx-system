<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            // Fortify / Jetstream / security
            $table->string('tenant_context')->nullable()->after('password');
            $table->text('two_factor_secret')->nullable();
            $table->text('two_factor_recovery_codes')->nullable();
            $table->timestamp('two_factor_confirmed_at')->nullable();
            $table->unsignedBigInteger('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();

            // Agent / PBX related
            $table->unsignedBigInteger('agent_id')->nullable();
            $table->string('extension')->nullable();
            $table->string('user_name')->nullable()->index();
            $table->string('phone')->nullable();
            $table->string('nic')->nullable();
            $table->string('gender')->nullable();
            $table->text('address')->nullable();

            // Break management
            $table->timestamp('break_started_at')->nullable();
            $table->unsignedBigInteger('agent_break_id')->nullable();
            $table->string('agent_break_type')->nullable();

            // Relations
            $table->unsignedBigInteger('user_type_id')->nullable()->index();
            $table->unsignedBigInteger('outlet_id')->nullable()->index();
            $table->unsignedBigInteger('department_id')->nullable()->index();
            $table->unsignedBigInteger('branch_id')->nullable()->index();

            // Soft deletes
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropColumn([
                'tenant_context',
                'two_factor_secret',
                'two_factor_recovery_codes',
                'two_factor_confirmed_at',
                'current_team_id',
                'profile_photo_path',
                'agent_id',
                'extension',
                'user_name',
                'phone',
                'nic',
                'gender',
                'address',
                'break_started_at',
                'agent_break_id',
                'agent_break_type',
                'user_type_id',
                'outlet_id',
                'department_id',
                'deleted_at',
            ]);
        });
    }
};
