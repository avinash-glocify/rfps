<?php

namespace App\Http\Controllers\Company;

use Auth;
use App\User;
use App\Settings;
use App\CompanyDetails;
use App\Http\Requests;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image; 
use Illuminate\Support\Facades\DB;
use Mail;

class IndexController extends MainCompanyController
{
	
    public function index()
    {  
	if (Auth::check()) {
	 if(Auth::user()->usertype=='Company')	
        { 
                        
            return redirect('company/dashboard'); 
        } else {
			return redirect('/');
		}
	}
 
        return view('companies.index'); 
    }
	
	/**
     * Do user login
     * @return $this|\Illuminate\Http\RedirectResponse
     */
	 
    public function postLogin(Request $request)
    {
    	
    //echo bcrypt('123456');n
    //exit;	
    	
      $this->validate($request, [
            'email' => 'required|email', 'password' => 'required',
        ]);


        $credentials = $request->only('email', 'password');

		 
		
         if (Auth::attempt($credentials, $request->has('remember'))) {

            if(Auth::user()->usertype !='Company'){
                \Auth::logout();
				 return redirect('/company')->withErrors('No Permission.');
            }

            return $this->handleUserWasAuthenticated($request);
        }

       // return array("errors" => 'The email or the password is invalid. Please try again.');
        //return redirect('/admin');
       return redirect('/broker')->withErrors('The email or the password is invalid. Please try again.');
        
    }
    
     /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  bool  $throttles
     * @return \Illuminate\Http\Response
     */
    protected function handleUserWasAuthenticated(Request $request)
    {

        if (method_exists($this, 'authenticated')) {
            return $this->authenticated($request, Auth::user());
        }

        return redirect('company/dashboard'); 
    }
	
	public function register(Request $request)
    {
		if (Auth::check()) {
		 if(Auth::user()->usertype=='Company')	
			{ 
							
				return redirect('company/dashboard'); 
			} else {
				return redirect('/');
			}
		}
 
		$country = array(
						'' => ' -- Select -- ',
						'1' => 'USA',
						'2' => 'INDIA',
						'3' => 'Canada',
						
						);
		$state = array(
						'' => ' -- Select -- ',
						'1' => 'Alabama ',
						'2' => 'Alaska',
						'3' => 'Arizona',
						'4' => 'Arkansas',						
						);
		$city = array(
						'' => ' -- Select -- ',
						'1' => 'City 1',
						'2' => 'City 2',
						'3' => 'City 3',
						'4' => 'City 4',
						);
		
		$numbersOfEmployees = array(
						'' => ' -- Select -- ',
						'1' => '0 to 100 ',
						'2' => '100 to 200',
						'3' => '200 to 300',
						'4' => 'more than 300',						
						);
		
		$responseTime = array(
						'' => ' -- Select -- ',
						'1day' => '1 Day',
						'2days' => '2 Days',
						'3days' => '3 Days',
						'week' => '1 Week',						
						);
        return view('companies.sign_up',[ 'country' => $country,
												'state' => $state,
												'city' => $city,
												'numbersOfEmployees' => $numbersOfEmployees,
												'responseTime' => $responseTime]); 
	}
	
	public function postregister(Request $request)
    { 
	

        $data =  \Input::except(array('_token')) ;
        
        $inputs = $request->all();
        $rule=array(
                'email' => 'required|max:75|unique:users,email',
				'first_name' => 'required',
				'last_name' => 'required',
				'address' => 'required',
				'country' => 'required',
				'state' => 'required',
				'city' => 'required',
				//'number_employees' => 'required',
				'response_time' => 'required',
				'contact_number' => 'required',
                //'preferr_number_of_employee' => 'required',
				'number_of_employee' => 'required',
				'preferr_state' => 'required',
				'preferr_interest' => 'required',
                // 'preferr_industry' => 'required',
				//'website_url' => 'required',
				 'password1' => 'required',
                 );
        
       
         $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages())->withInput();
        } 
		
        $user = new User;
        $user->usertype = 'Company';
		$user->username = $inputs['email'];
        $user->email = $inputs['email'];    
        $user->first_name = $inputs['first_name'];    
        $user->last_name = $inputs['last_name'];       
        $user->address = $inputs['address'];   
		$user->address2 = $inputs['address2'];
		$user->phone_number = $inputs['contact_number'];
		$user->country = $inputs['country'];	
		$user->state = $inputs['state'];	
		$user->city = $inputs['city'];	
		
        $user->password= bcrypt($inputs['password1']); 
        $user->status='pending';
        $user->notification=1;
        $user->save();
		
		$userID = $user->id;
		
		$companyDetails = new CompanyDetails;
		$companyDetails->user_id = $userID;
		$companyDetails->company_name = $inputs['company_name'];
		$companyDetails->response_time = $inputs['response_time'];
		$companyDetails->number_of_employee = $inputs['number_of_employee'];
		$companyDetails->website_url = $inputs['website_url'];
		
		//$companyDetails->preferr_number_of_employee = serialize($inputs['preferr_number_of_employee']);
		//$companyDetails->preferr_number_of_employee = serialize($inputs['preferr_number_of_employee']);
		$companyDetails->preferr_state = serialize($inputs['preferr_state']);
		$companyDetails->preferr_interest = serialize($inputs['preferr_interest']);
		//$companyDetails->preferr_industry = serialize($inputs['preferr_industry']);
		$companyDetails->save();
		
		$data = array(
            
            'first_name' => $inputs['first_name'],
            'email' => $inputs['email'],            
            'last_name' => $inputs['last_name'],
            'contact_number'=>$inputs['contact_number'],            
            'user_type'=>'Company',            
            
             );
             $subject='Register ';
			 $email=$inputs['email'];
            Mail::send('emails.company_sign_up', $data, function ($message) use ($subject,$email){
                $message->from('netpeo@info.com', getcong('site_name'));
                $message->to($email)->subject($subject);
            });
			$sub="Register Company";
			Mail::send('emails.admin', $data, function ($message) use ($sub){
                $message->from('netpeo@info.com', getcong('site_name'));
				//$message->cc('naveen@glocify.com');
                $message->to('naveen@glocify.com')->subject($sub);
                //$message->to('naveen@glocify.com')->subject($sub);
            });
		
        \Session::flash('flash_message', 'You request has been sent successfully for approval');
		return back();
		
        
    }
    
    
    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();

        return redirect('company/');
    }
    	
     
	 

}
