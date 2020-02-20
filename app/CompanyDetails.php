<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyDetails extends Model
{
    protected $table = 'rfps_company_details';

    protected $fillable = ['user_id','company_name', 'contact_number', 'response_time', 'number_of_employee','website_url'];
 
	public $timestamps = false;
    
}
