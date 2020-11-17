<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dependent extends Model
{
    protected $table = 'm_members_dependent';

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

    public function member()
    {
        return $this->belongsTo('App\Models\Member', 'member_id');
    }
}
