<?php

namespace App\Http\Controllers\Broker;

use Auth;
use App\User;
use App\BrokerDetails;
use App\Http\Requests;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image; 
use Illuminate\Support\Facades\DB;
use Mail;
class IndexController extends MainBrokerController
{
	
    public function index()
    {  
	if (Auth::check()) {
	 if(Auth::user()->usertype=='Broker')	
        { 
                        
            return redirect('broker/dashboard'); 
        } else{
			return redirect('/'); 
		}
	}
 
        return view('broker.index'); 
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

           if(Auth::user()->usertype !='Broker'){
                \Auth::logout();
				 return redirect('/broker')->withErrors('No Permission.');
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

        return redirect('broker/dashboard'); 
    }
    
    public function register(Request $request)
    {
		if (Auth::check()) {
	 if(Auth::user()->usertype=='Broker')	
        { 
                        
            return redirect('broker/dashboard'); 
        } else {
			return redirect('/');
		}
	}
 
        return view('broker.sign_up'); 
	}
	
	public function postregister(Request $request)
    { 
	
	
	$data =  \Input::except(array('_token')) ;
        
        $inputs = $request->all();
        $rule=array(
                'email' => 'required|max:75|unique:users,email',
                'company_name' => 'required',
                'first_name' => 'required',
                'last_name' => 'required',
                'address' => 'required',
                'country' => 'required',
                'state' => 'required',
                'city' => 'required',
                'contact_number' => 'required',
                'doingBusinessAs' => 'required',
                'federal_ID' => 'required',
                'social_security' => 'required',
                'employer_id_number' => 'required',
                'additional_notes' => 'required',
				'password1' => 'required',
                
                 );
        
       
         $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages())->withInput();
        }    
        $user = new User;
        $user->usertype = 'Broker';
        $user->email = $inputs['email'];    
        $user->first_name = $inputs['first_name'];    
        $user->last_name = $inputs['last_name'];    
        $user->phone_number = $inputs['contact_number']; 
		$user->address = $inputs['address'];   
		$user->address2 = $inputs['address1'];
		//$user->phone_number = $inputs['contact_number'];
		$user->country = $inputs['country'];	
		$user->state = $inputs['state'];	
		$user->city = $inputs['city'];	
        $user->password= bcrypt($inputs['password1']); 
        $user->status='pending';
        $user->notification=1;
        $user->save();
        
		$userID = $user->id;
		
		$brokerDetails = new BrokerDetails;
		$brokerDetails->user_id = $userID;
		$brokerDetails->company_name = trim($inputs['company_name']);
		$brokerDetails->fax_number = $inputs['fax_number'];
		$brokerDetails->doingBusinessAs = $inputs['doingBusinessAs'];
		$brokerDetails->federal_ID = $inputs['federal_ID'];
		$brokerDetails->additional_notes = $inputs['additional_notes'];
		$brokerDetails->social_security = $inputs['social_security'];
		$brokerDetails->employer_id_number = $inputs['employer_id_number'];
		$brokerDetails->website_url = $inputs['website_url'];
		$brokerDetails->save();
        $data = array(
            
            'first_name' => $inputs['first_name'],
            'email' => $inputs['email'],            
            'last_name' => $inputs['last_name'],
            'contact_number'=>$inputs['contact_number'],            
            'user_type'=>'Broker',            
            
             );
            $subject='New Registration';
            $email=$inputs['email'];
			
            Mail::send('emails.broker_sign_up', $data, function ($message) use ($subject,$email){
                $message->from('netpeo@info.com', getcong('site_name'));
				$message->to($email)->subject($subject);
                //$message->to('lalchand.glocify@gmail.com')->subject($subject);
            });
		    $sub="Register Broker";
			Mail::send('emails.admin', $data, function ($message) use ($sub){
                $message->from('netpeo@info.com', getcong('site_name'));
				 //$message->cc('naveen@glocify.com');
				 $message->to('naveen@glocify.com')->subject($sub);
                //$message->to('lalchand.glocify@gmail.com')->subject($sub);
               
            });
	
            \Session::flash('flash_message', 'You are successfully regester');
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

        return redirect('broker/');
    }
    	
     
	 

}
