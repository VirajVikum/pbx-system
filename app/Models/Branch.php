<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    use SoftDeletes;

    protected $connection = 'pbx';
    protected $table = 'branches';

    protected $fillable = [
        'name',
        'code',
        'company_id',
        'status',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function departments()
    {
        return $this->hasMany(CrmDepartment::class, 'branch_id');
    }
}
