<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReimburseDetail extends Model
{
    protected $table = 't_claims_detail';

    protected $hidden = [
        'created_at', 'created_by'
    ];

    public function member()
    {
        return $this->belongsTo('App\Models\Member');
    }

    public function reimburse()
    {
        return $this->belongsTo('App\Models\Reimburse', 'batch_code');
    }
}
