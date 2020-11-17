<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'm_members';

    protected $primaryKey = 'member_id';

    protected $hidden = [
        'created_at', 'created_by', 'updated_by', 'updated_at',
        'addition_date', 'change_date', 'deletion_date', 'bank_id',
        'deleted_by', 'deleted_at', 'account_number', 'account_holder'
    ];

    public function client()
    {
        return $this->belongsTo('App\Models\Client', 'client_id');
    }

    public function policy()
    {
        return $this->belongsTo('App\Models\Policy', 'policy_id');
    }

    public function reimburses()
    {
        return $this->hasMany('App\Models\ReimburseDetail', 'member_id');
    }

    public function cashlesses()
    {
        return $this->hasMany('App\Models\CashlessDetail', 'member_id');
    }

    public function dependents()
    {
        return $this->hasMany('App\Models\Dependent', 'member_id');
    }
}
