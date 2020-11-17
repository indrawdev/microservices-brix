<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CashlessDetail extends Model
{
    protected $table = 't_excess_detail';

    protected $hidden = [
        'created_at', 'created_by'
    ];

    public function member()
    {
        return $this->belongsTo('App\Models\Member');
    }

    public function cashless()
    {
        return $this->belongsTo('App\Models\Cashless', 'batch_code');
    }
}
