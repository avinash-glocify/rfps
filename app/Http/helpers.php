<?php
use App\Settings;
use App\LeadDetails;
use App\User;

 
if (! function_exists('getcong')) {

    function getcong($key)
    {
    	 
        $settings = Settings::findOrFail('1'); 

        return $settings->$key;
    }
}

if (!function_exists('classActivePath')) {
    function classActivePath($path)
    {
        $path = explode('.', $path);
        $segment = 2;
        foreach($path as $p) {
            if((request()->segment($segment) == $p) == false) {
                return '';
            }
            $segment++;
        }
        return ' active';
    }
}

if (!function_exists('classActivePathSite')) {
    function classActivePathSite($path)
    {
        $path = explode('.', $path);
        $segment = 1;
        foreach($path as $p) {
            if((request()->segment($segment) == $p) == false) {
                return '';
            }
            $segment++;
        }
        return 'active';
    }
}


/*
* count total notification leads_counts.
* @return leads counts.
*/
if (!function_exists('admin_notify_total_leads')) {
    function admin_notify_total_leads()
    {
       $leads_counts =  LeadDetails::where('notification',1)->where('publish_status','Publish')->count();
	   
	   return  $leads_counts;
    }
}

/*
* count total notification brokers_counts.
* @return brokers counts.
*/
if (!function_exists('admin_notify_total_brokers')) {
    function admin_notify_total_brokers()
    {
       $brokers_counts =  User::where('usertype','Broker')->where('notification',1)->count();
	   return  $brokers_counts;
    }
}

/*
* count total notification providers_counts.
* @return providers counts.
*/
if (!function_exists('admin_notify_total_providers')) {
    function admin_notify_total_providers()
    {
       $providers_counts =  User::where('usertype','Company')->where('notification',1)->count();
	   
	   return  $providers_counts;
    }
}


