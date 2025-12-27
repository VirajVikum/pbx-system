<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agent extends Model
{
    use SoftDeletes;

    protected $connection = 'call_server';
    protected $table = 'users'; // au_users

    const CREATED_AT = 'createdat';
    const UPDATED_AT = 'updatedat';

    protected $fillable = [
        'username',
        'password',
        'fname',
        'lname',
        'usertype',
        'DOB',
        'NIC',
        'gender',
        'email',
        'addressNo',
        'addressStreet',
        'addressCity',
        'numberone',
        'numbertwo',
        'bu',
        'extension',
        'status',
        'updatedby',
    ];
}
