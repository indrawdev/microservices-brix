<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'm_clients';

    protected $primaryKey = 'client_id';

    protected $hidden = [
        'created_at', 'created_by', 'updated_by', 'updated_at',
        'group_id', 'company_status', 'source_of_prospect', 'lob_id',
        'client_address1', 'client_address2', 'city_id',
        'province_name', 'city_name', 'district', 'subdistrict',
        'client_zipcode', 'client_phone1', 'client_phone2',
        'client_fax', 'client_website', 'emp_work_loc_office',
        'emp_work_loc_office_percent', 'emp_work_loc_field',
        'emp_work_loc_field_percent', 'npwp'
    ];

    public function users()
    {
        return $this->hasMany('App\Models\User', 'client_id');
    }

    public function policies()
    {
        return $this->hasMany('App\Models\Policy', 'client_id');
    }
}
