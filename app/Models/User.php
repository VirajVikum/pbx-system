<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    // Use the correct database connection
    protected $connection = 'pbx';

    // The table name (optional if follows Laravel convention)
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    public function initials(): string
{
    if (!$this->name) {
        return '';
    }

    return Str::of($this->name)
        ->explode(' ')
        ->take(2)
        ->map(fn ($word) => Str::substr($word, 0, 1))
        ->implode('');
}
    protected $fillable = [
        'name',
        'email',
        'password',
        'tenant_context',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'two_factor_confirmed_at',
        'remember_token',
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
        'user_type_id',
        'outlet_id',
        'department_id',
        'agent_break_type',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_secret',
        'two_factor_recovery_codes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'two_factor_confirmed_at' => 'datetime',
        'break_started_at' => 'datetime',
        'password' => 'hashed',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];
}