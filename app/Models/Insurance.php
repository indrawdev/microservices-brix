<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    protected $table = 'm_insurances';

    protected $primaryKey = 'insurance_id';

    protected $hidden = [
        'created_at', 'created_by', 'updated_by', 'updated_at',
        'insurance_address1', 'insurance_address2', 
        'insurance_phone1', 'insurance_phone2', 
        'insurance_zipcode', 'insurance_fax', 'insurance_email',
        'insurance_website', 'insurance_rating', 'insurance_npwp',
        'insurance_pic_dept', 'insurance_pic_name'
    ];

    public function policies()
    {
        return $this->hasMany('App\Models\Policy', 'insurance_id');
    }
}
