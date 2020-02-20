<?php
namespace App\Http\Controllers\Broker;
use Auth;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;


class DashboardController extends MainBrokerController
{
    public function __construct()
    {
	$this->middleware('auth');	
         
    }
    public function index()
    { 
    	if(Auth::user()->usertype=='Broker')	
        {  
            $users = User::where('usertype', 'User')->count();
            return view('broker.pages.dashboard',compact('users'));
	}else{
	    return redirect('/');
	    }
   
    }
		
}
