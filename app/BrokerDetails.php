<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrokerDetails extends Model
{
    protected $table = 'rfps_broker_details';

    protected $fillable = ['user_id','company_name', 'fax_number', 'doingBusinessAs', 'federal_ID','additional_notes','social_security', 'employer_id_number','website_url'];
 
	public $timestamps = false;
    
}
