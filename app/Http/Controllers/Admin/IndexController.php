<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image; 
use Illuminate\Support\Facades\DB;
use Session;
class IndexController extends MainAdminController
{
	
    public function index()
    {   
    	if (Auth::check()) {
			if(Auth::user()->usertype=='Company')	
        { 
                        
            return redirect('admin/dashboard'); 
		}else {
			return redirect('admin/dashboard');
		}
        }
 
        return view('admin.index');
    }
	
	/**
     * Do user login
     * @return $this|\Illuminate\Http\RedirectResponse
     */
	 
    public function postLogin(Request $request)
    {
    	
  
    	
      $this->validate($request, [
            'email' => 'required|email', 'password' => 'required',
        ]);


        $credentials = $request->only('email', 'password');

		 
		
         if (Auth::attempt($credentials, $request->has('remember'))) {

            if(Auth::user()->usertype !='Admin'){
                \Auth::logout();
				 return redirect('/admin')->withErrors('No Permission.');
            }

            return $this->handleUserWasAuthenticated($request);
        }

       // return array("errors" => 'The email or the password is invalid. Please try again.');
        //return redirect('/admin');
       return redirect('/admin')->withErrors('The email or the password is invalid. Please try again.');
        
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

        //return redirect('admin/dashboard'); 
        return redirect('admin/AllLeads'); 
    }
    
    
    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();

        return redirect('admin/');
    }
	
	public function forgotpass(){
		 return view('admin.password');
	}
    public function resetpassword($id){
		 return view('admin.resetpassword',compact('id',$id));
	}	
    public function forgotemail(Request $request){
		  $this->validate($request, [
            'email' => 'required|email'
          ]);
		  
		  $data=$request->all();
		  unset($data['_token']);
		  
		  if($data['email'])
		  {
			 $user=User::where('email',$data['email'])->where('usertype','Admin')->first();
             if(!empty($user))
		     {
				$data = array(

				'first_name' => $user['first_name'],                   
				'last_name' => $user['last_name'],
				'id'       =>$user['id']   

				);
				$subject='Reset Password ';
				$email=$user['email'];
				\Mail::send('emails.password', $data, function ($message) use ($subject,$email){
				$message->from('netpeo@info.com', getcong('site_name'));
				$message->to($email)->subject($subject);
				}); 
				\Session::flash('flash_message', 'You request has been sent successfully ');
				return back();
			 }
             else
			 {
				\Session::flash('flash_message', 'You are not admin. ');
				return back(); 
			 }			 
             
		  }
		  
		  
           //$user = User::where('email', $email)->first();
		 return redirect('/admin/password')->withErrors('The email is invalid. Please try again.');
	} 
		
    public function newpass(Request $request)
	{
		    $data =  $request->all();
			unset($data['_token']);
            $rule  =  array(
                    'password'       => 'required|confirmed',
                    'password_confirmation'       => 'required'
                ) ;
 
            $validator = \Validator::make($data,$rule);
 
            if ($validator->fails())
            {
                    return redirect()->back()->withErrors($validator->messages());
            }
		$user = User::findOrFail(base64_decode($data['id']));	
	    $user->password = bcrypt($data['password']);
		$user->timestamps = false;
        
        //echo "<pre>";print_r($user);die;		
		$user->save();

	    Session::flash('flash_message', 'Password Successfully updated!');

        return redirect()->back();
			
		 //echo "<pre>";print_r($request->all());die;
	}

}
