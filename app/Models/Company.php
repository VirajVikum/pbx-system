<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $connection = 'pbx';
    protected $table = 'companies';

    protected $fillable = [
        'name',
        'status',
    ];

    public function branches()
    {
        return $this->hasMany(Branch::class, 'company_id');
    }
}
