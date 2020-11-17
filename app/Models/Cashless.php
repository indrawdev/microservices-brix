<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cashless extends Model
{
    protected $table = 't_excess';

    protected $primaryKey = 'excess_id';

    protected $hidden = [
        'created_at', 'created_by', 'updated_by', 'updated_at'
    ];

    public function client()
    {
        return $this->belongsTo('App\Models\Client', 'client_id');
    }

    public function policy()
    {
        return $this->belongsTo('App\Models\Policy', 'policy_id');
    }

    public function details()
    {
        return $this->hasMany('App\Models\CashlessDetail', 'batch_code');
    }
}
