<?php
namespace App\Http\Controllers\Company;
use Auth;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;


class DashboardController extends MainCompanyController
{
    public function __construct()
    {
	$this->middleware('auth');	
         
    }
    public function index()
    { 
    	if(Auth::user()->usertype=='Company')	
        {  
            $users = User::where('usertype', 'User')->count();
            return view('companies.pages.dashboard',compact('users'));
	}else{
	    return redirect('/');
	    }
   
    }
		
}
