<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeadDetails extends Model
{
    protected $table = 'rfps_leads';

    protected $fillable = ['user_id','service_type', 'total_employee', 'reason', 'additional_benfefits','expected_decision_time', 'first_name', 'last_name', 'email_address', 'company_name', 'phone_number', 'job_title', 'work_indstry', 'country', 'state', 'city', 'preferred_method_contact', 'updated_at','status'];
 
	public $timestamps = false;
    
}
