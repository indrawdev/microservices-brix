<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reimburse extends Model
{
    protected $table = 't_claims';

    protected $primaryKey = 'claim_id';

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
        return $this->hasMany('App\Models\ReimburseDetail', 'batch_code');
    }
}
