<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignLeads extends Model
{
    protected $table = 'rfps_lead_company_link';

    protected $fillable = ['company_id','lead_id','notification'];
 
	public $timestamps = false;
    
	
	/* public getcompanydetails(){
		 return $this->hasMany('App\User', 'id', 'company_id');
	} */
}
