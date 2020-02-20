<?php
namespace App\Http\Controllers\Front;
use Auth;
use App\User;
use Mail;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image; 
use Validator;

class HomeController extends Controller
{
	
     public function index()
    {   
    	
        return view('front.pages.home');
    } 
	public function signin()
    {   
    	
        return view('front.pages.signin');
    }
	public function signin_req(Request $request)
    { 
	$type= $request->company;
			if($type=='broker')
			{
			 return redirect('/signup-broker');
			} else if($type=='company')
			{
				return redirect('/signup-company');
			} else{
				\Session::flash('flash_message', 'select atleast one option');
		return back();
			}
		 	 
		 
	 
		 
         //return view('front.pages.signup');
    }
	
	public function postLogin(Request $request)
    {
    	
    //echo bcrypt('123456');n
    //exit;	
	
    	
      $this->validate($request, [
            'email' => 'required|email', 'password' => 'required',
        ]);


        $credentials = $request->only('email', 'password');

		 
		
         if (Auth::attempt($credentials, $request->has('remember'))) {

           if(Auth::user()->usertype !='Broker' && Auth::user()->usertype !='Company'){
                \Auth::logout();
				 return redirect('/')->withErrors('No Permission.');
            }

            return $this->handleUserWasAuthenticated($request);
        }

       // return array("errors" => 'The email or the password is invalid. Please try again.');
        //return redirect('/admin');
       return redirect('/')->withErrors('The email or the password is invalid. Please try again.');
        
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
		if(Auth::user()->usertype=='Broker' && Auth::user()->status=='approved')
		{
         //return redirect('broker/dashboard'); 
         return redirect('broker/allbrokerleads'); 
		} else if(Auth::user()->usertype=='Company' && Auth::user()->status=='approved')
		{
			//return redirect('company/dashboard'); 
			return redirect('company/comapnyleads'); 
		} else{
			if(Auth::user()->usertype=='Company')
			{
				\Auth::logout();
				 return redirect('/')->withErrors('Your account is not approved by admin.');
			}else if(Auth::user()->usertype=='Broker')
            {
				\Auth::logout();
				 return redirect('/')->withErrors('Your account is not approved by admin.');
			}  				
			else{
			\Auth::logout();
				 return redirect('/')->withErrors('No Permission.');
			}	 
		}
    }
	
   public function dashboard()
    {
        
if(Auth::user()->usertype=='Broker')
		{
        return redirect('broker/allbrokerleads'); 
		} else if(Auth::user()->usertype=='Company')
		{
			return redirect('company/comapnyleads'); 
		} else if(Auth::user()->usertype=='Admin'){
			return redirect('admin/dashboard'); 
		}else{
			\Auth::logout();
				 return redirect('/')->withErrors('No Permission.');
		}
    }

	
 public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
	
	
	/////support ticket///
	
	public function support_ticket()
    {   
    	
        return view('front.pages.support_ticket');
    } 
	public function postsupport_ticket(Request $request)
    {   
    	$data =  \Input::except(array('_token')) ;
        
        $inputs = $request->all();
        $rule=array(
                'email' => 'required',
                'name' => 'required',
                'role' => 'required',
                'subject' => 'required',
                'phone_number' => 'required',
                'message' => 'required',
                 );
        
       
         $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 

			$support_auto_id = DB::table('settings')->where('id',1)->pluck('support_id_auto_incriment');
			 $support_id=$support_auto_id[0];
           $subject='Support ID:'.$support_id.'-'.$inputs['subject'];
		$data = array(
            
            'name' => $inputs['name'],
            'email' => $inputs['email'],            
            'support_id' => $support_id,            
            'role' => $inputs['role'],
            'subject1'=>$inputs['subject'],            
            'phone_number'=>$inputs['phone_number'],            
            'message1'=>$inputs['message'],            
            
             );
			 
			 $email=$inputs['email'];
            \Mail::send('emails.company_broker_support', $data, function ($message) use ($subject,$email){
                $message->from('netpeo@info.com', getcong('site_name'));
                $message->to($email)->subject($subject);
            });
            
			\Mail::send('emails.admin_support_email', $data, function ($message) use ($subject,$email){
                $message->from($email, getcong('site_name'));
				$message->cc('naveen@glocify.com');
                $message->to('layne@netpeo.com')->subject($subject);
            });
			DB::table('rfps_support')->insert(['name' => $inputs['name'], 'email' => $inputs['email'],'role' => $inputs['role'],'subject' => $inputs['subject'],'message' => $inputs['message'],'phone_number' => $inputs['phone_number'],'support_id' => $support_id]);
			DB::table('settings')->where('id',1) ->update(['support_id_auto_incriment' => $support_id+1]);
            $subject='Support ID:'.$support_id.'-'.$inputs['subject'];
            
		
        \Session::flash('flash_message', 'Thanks a lot for Contact NET PEO Support');
		return back();
		
    } 
	
	public function login()
	{
		 return redirect('/')->withErrors('You Are Not Logged In, Please Login First');
	}
	
	/////end////////
    	
}
