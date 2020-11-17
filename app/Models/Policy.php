<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    protected $table = 'm_policies';

    protected $primaryKey = 'policy_id';

    protected $hidden = [
        'created_at', 'created_by', 'updated_by', 'updated_at'
    ];

    public function client()
    {
        return $this->belongsTo('App\Models\Client', 'client_id');
    }

    public function insurance()
    {
        return $this->belongsTo('App\Models\Insurance', 'policy_id');
    }
}
