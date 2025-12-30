<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Extension extends Model
{
    use HasFactory, SoftDeletes;

    protected $connection = 'call_server';

    protected $table = 'exten';

    public $timestamps = false;

    protected $fillable = [
        'extension',
        'exten_type',
        'password',
        'context',
        'branch',
        'phone_type',
        'department',
        'status',
        'updatedby',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function updater()
    {
        return $this->belongsTo(Agent::class, 'updatedby');
    }
}
