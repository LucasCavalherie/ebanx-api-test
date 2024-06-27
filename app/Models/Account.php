<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $primaryKey = 'account_id';
    protected $fillable = [
        'account_id',
        'balance'
    ];
}