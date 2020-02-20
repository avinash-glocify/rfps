<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use DB;
use App\CompanyDetails;
use App\BrokerDetails;
use App\LeadDetails;
use App\AssignLeads;
use App\Rates;
use App\Quote;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Session;
use Mail;
use Intervention\Image\Facades\Image; 
use PDF;
class AdminController extends MainAdminController
{
    private $country = array(
                        '' => ' -- Select -- ',
                        '1' => 'USA',
                        
                        );
    private $state = array('' => ' -- Select -- ','AL'=>'ALABAMA','AK'=>'ALASKA','AS'=>'AMERICAN SAMOA',    'AZ'=>'ARIZONA','AR'=>'ARKANSAS','CA'=>'CALIFORNIA','CO'=>'COLORADO','CT'=>'CONNECTICUT','DE'=>'DELAWARE','DC'=>'DISTRICT OF COLUMBIA','FM'=>'FEDERATED STATES OF MICRONESIA','FL'=>'FLORIDA',
    'GA'=>'GEORGIA','GU'=>'GUAM GU','HI'=>'HAWAII','ID'=>'IDAHO','IL'=>'ILLINOIS','IN'=>'INDIANA','IA'=>'IOWA','KS'=>'KANSAS','KY'=>'KENTUCKY','LA'=>'LOUISIANA','ME'=>'MAINE','MH'=>'MARSHALL ISLANDS',    'MD'=>'MARYLAND','MA'=>'MASSACHUSETTS','MI'=>'MICHIGAN','MN'=>'MINNESOTA','MS'=>'MISSISSIPPI','MO'=>'MISSOURI','MT'=>'MONTANA','NE'=>'NEBRASKA','NV'=>'NEVADA','NH'=>'NEW HAMPSHIRE','NJ'=>'NEW JERSEY',
    'NM'=>'NEW MEXICO','NY'=>'NEW YORK','NC'=>'NORTH CAROLINA','ND'=>'NORTH DAKOTA','MP'=>'NORTHERN MARIANA ISLANDS','OH'=>'OHIO','OK'=>'OKLAHOMA','OR'=>'OREGON','PW'=>'PALAU','PA'=>'PENNSYLVANIA',
    'PR'=>'PUERTO RICO','RI'=>'RHODE ISLAND','SC'=>'SOUTH CAROLINA','SD'=>'SOUTH DAKOTA','TN'=>'TENNESSEE','TX'=>'TEXAS','UT'=>'UTAH','VT'=>'VERMONT','VI'=>'VIRGIN ISLANDS','VA'=>'VIRGINIA',    'WA'=>'WASHINGTON','WV'=>'WEST VIRGINIA','WI'=>'WISCONSIN',    'WY'=>'WYOMING','AE'=>'ARMED FORCES AFRICA \ CANADA \ EUROPE \ MIDDLE EAST','AA'=>'ARMED FORCES AMERICA (EXCEPT CANADA)','AP'=>'ARMED FORCES PACIFIC');
    private $city = array('' => ' -- Select -- ','New York'=>'New York','Los Angeles'=>'Los Angeles','Chicago'=>'Chicago','Houston'=>'Houston','Philadelphia'=>'Philadelphia','Phoenix'=>'Phoenix',
    'San Antonio'=>'San Antonio','San Diego'=>'San Diego','Dallas'=>'Dallas','San Jose'=>'San Jose','Austin'=>'Austin','Jacksonville'=>'Jacksonville','San Francisco'=>'San Francisco','Indianapolis'=>'Indianapolis','Columbus'=>'Columbus','Fort Worth'=>'Fort Worth','Charlotte'=>'Charlotte','Seattle'=>'Seattle','Denver'=>'Denver','El Paso'=>'El Paso','Detroit'=>'Detroit','Washington'=>'Washington','Boston'=>'Boston','Memphis'=>'Memphis','Nashville'=>'Nashville','Portland, Ore'=>'Portland, Ore','Oklahoma City'=>'Oklahoma City','Las Vegas'=>'Las Vegas','Baltimore'=>'Baltimore',    
    'Louisville'=>'Louisville',    'Milwaukee'=>'Milwaukee','Albuquerque'=>'Albuquerque','Tucson'=>'Tucson',    
    'Fresno'=>'Fresno','Sacramento'=>'Sacramento','Kansas City, Mo'=>'Kansas City, Mo','Long Beach'=>'Long Beach','Mesa'=>'Mesa','Atlanta'=>'Atlanta','Colorado Springs'=>'Colorado Springs','Virginia Beach'=>'Virginia Beach','Raleigh'=>'Raleigh','Omaha'=>'Omaha','Miami'=>'Miami','Oakland'=>'Oakland','Minneapolis'=>'Minneapolis','Tulsa'=>'Tulsa','Wichita'=>'Wichita','New Orleans'=>    'New Orleans',    
    'Arlington, Texas'=>'Arlington, Texas'    );
        
    private $numbersOfEmployees = array(
                        '' => ' -- Select -- ',
                        '1' => '0 to 100 ',
                        '2' => '100 to 200',
                        '3' => '200 to 300',
                        '4' => 'more than 300',                        
                        );
        
    private $responseTime = array(
                        '' => ' -- Select -- ',
                        '1day' => '1 Day',
                        '2days' => '2 Days',
                        '3days' => '3 Days',
                        'week' => '1 Week',                        
                        );
    private $jobTittle = array(
                        '' => 'Choose Below...',
                        '1' => 'Workers Compensation Coverage',
                        '2' => 'Payroll/Technology',
                        '3' => 'Multi-state',
                        '4' => 'Currently with a Peo and Shopping',    
                        '5'    => 'HR/Compliance',
                        '6'    => 'Time and Attendance',    
                        );
                        
    private $workIN = array(
                        '' => 'Choose Below...',
                        '1' => 'Advertising/Marketing/PR',
                        '2' => 'Agriculture',
                        '3' => 'Biotech/Pharmaceuticals',
                        '4' => 'Computers - Hardware',    
                        '5'    => 'Computers - Software',
                        '6'    => 'Construction/General Contracting',
                        '7'    => 'Consulting',
                        '8'    => 'Education',
                        '9'    => 'Equipment Sales &amp; Service',
                        '10' => 'Financial Services',
                        '11'  => 'Government',
                        '12' => 'Healthcare',
                        '13'    => 'Information Services',
                        '14'    => 'Insurance',
                        '15'    => 'Legal',
                        '16'    => 'Manufacturing',
                        '17'    => 'Media/Entertainment/Publishing',
                        '18'    => 'Non-Profit',
                        '19'    => 'Other Services',
                        '20'    => 'Real Estate',
                        '21'    => 'Restaurant',
                        '22'    => 'Retail',
                        '23'    => 'Telecom/Utilities',
                        '24'    => 'Transportation/Logistics',
                        '25'    => 'Travel/Hospitality',
                        '26'    => 'Wholesale'                            
                        );
        private $status = array(
                        'pending' => 'Pending',
                        'approved' => 'Approved',                    
                        );
        private $userType = array(
                            '' => ' -- Select -- ',
                            'Broker' => 'Broker',
                            'Company' => 'Company',
                            'Admin' => 'Admin',
                        );
            
    public function __construct()
    {
         $this->middleware('auth');    
         
    }
    public function index()
    { 
	
	if(Auth::user()->usertype !='Admin')
		{
	        return redirect('/admin');
		}
		
        return view('admin.pages.dashboard');
    }
    
    public function profile()
    { 
        return view('admin.pages.profile');
    }
    
    
    public function addCompany(Request $request){ 
	
	if(Auth::user()->usertype !='Admin')
		{
	        return redirect('/admin');
		}
		
        
        return view('admin.pages.add_company',[ 'country' => $this->country,
                                                'state' => $this->state,
                                                'city' => $this->city,
                                                'numbersOfEmployees' => $this->numbersOfEmployees,
                                                'responseTime' => $this->responseTime,
                                                'jobTittle' => $this->jobTittle,
                                                'workIN' => $this->workIN
                                                ]);
    }
    
    public function allCompany(Request $request){ 
	
	if(Auth::user()->usertype !='Admin')
		{
	        return redirect('/admin');
		}
        $matchTHis = ['usertype'=>'Company'];
        $getALlCompanies =  user::where($matchTHis)->orderBy('id','desc')->get();
        
        return view('admin.pages.all_company', ['getALlCompanies' => $getALlCompanies]);
    }
    
    public function deleteCompany(Request $request){ 
	if(Auth::user()->usertype !='Admin')
		{
	        return redirect('/admin');
		}
        
        if($task = user::findOrFail($request->id)){
            $task->delete($request->id);
            \Session::flash('flash_message', 'Provider has been deleted successfully.');
        }else{
            \Session::flash('flash_message', 'Please try again. Something went wrong.');
        }
         
        return back();
    }
    
    public function updateCompanyData(Request $request){
		if(Auth::user()->usertype !='Admin')
		{
	        return redirect('/admin');
		}
		
        
        $data =  \Input::except(array('_token')) ;
        
        $inputs = $request->all();
        
        
        $rule=array(
               // 'email' => 'required|max:75|unique:users,email',            
                'company_name' => 'required',
                'address' => 'required|min:5',
                'country' => 'required',
                'state' => 'required',
                'city' => 'required',
                'number_of_employee' => 'required',
                'response_time' => 'required',
                //'preferr_number_of_employee' => 'required',
                //'preferr_state' => 'required',
                'preferr_interest' => 'required',
                'preferr_industry' => 'required',
                 );
        
       
        $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        }
        
        $userData = user::with('companydetails')->findOrFail($request->id);; 
        if($userData->notification==1)
        {
          $userData->notification=0;    
        }    
       // $userData->email = $inputs['email'];    
        $userData->first_name = $inputs['first_name'];   
        $userData->last_name = $inputs['last_name'];      
        $userData->address = $inputs['address']; 
        $userData->address2 = $inputs['address2'];
        $userData->phone_number = $inputs['phone_number'];
        $userData->country = $inputs['country'];    
        $userData->state = $inputs['state'];    
        $userData->city = $inputs['city'];    
        $userData->status = $inputs['status'];
        $userData->companydetails->company_name = $inputs['company_name'];
        $userData->companydetails->response_time = $inputs['response_time'];
        $userData->companydetails->number_of_employee = $inputs['number_of_employee'];
        $userData->companydetails->website_url = $inputs['website_url']; 
        //$userData->companydetails->preferr_number_of_employee = serialize($inputs['preferr_number_of_employee']);
        //$userData->companydetails->preferr_state = serialize($inputs['preferr_state']);
        $userData->companydetails->preferr_interest = serialize($inputs['preferr_interest']);
        $userData->companydetails->preferr_industry = serialize($inputs['preferr_industry']);
        $userData->companydetails->save();
        $userData->save();
        if($inputs['status']=='approved'){
            $data = array(
            
            'first_name' => $inputs['first_name'],
            'email' => $inputs['email'],            
            'last_name' => $inputs['last_name'],
                        
            'user_type'=>'Company',            
            
             );
             $subject='Approved By NetPeo Admin ';
             $email=$inputs['email'];
            \Mail::send('emails.company_status', $data, function ($message) use ($subject,$email){
                $message->from('netpeo@info.com', getcong('site_name'));
                $message->to($email)->subject($subject);
            });
        }
        
        
        
        \Session::flash('flash_message', 'Update Successfully.');
        return back();
        
    }
    public function updateCompany(Request $request){
		
		if(Auth::user()->usertype !='Admin')
		{
	        return redirect('/admin');
		}
		
        $userData = user::with('companydetails')->findOrFail($request->id);
        $userData->companydetails->preferr_state = unserialize($userData->companydetails->preferr_state);
        //$userData->companydetails->preferr_number_of_employee = unserialize($userData->companydetails->preferr_number_of_employee);
        $userData->companydetails->preferr_interest = unserialize($userData->companydetails->preferr_interest);
        $userData->companydetails->preferr_industry = unserialize($userData->companydetails->preferr_industry);
    

        
        return view('admin.pages.edit_company', ['userData' => $userData, 
                                                'country' => $this->country,
                                                'state' => $this->state,
                                                'city' => $this->city,
                                                'numbersOfEmployees' => $this->numbersOfEmployees,
                                                'responseTime' => $this->responseTime,
                                                'status' => $this->status,
                                                'jobTittle' => $this->jobTittle,
                                                'workIN' => $this->workIN                                                
                                                ]);
    }
    
    public function viewCompany(Request $request){
		
		if(Auth::user()->usertype !='Admin')
		{
	        return redirect('/admin');
		}
		
        $userData = user::with('companydetails')->findOrFail($request->id);
        $userData->companydetails->preferr_state = unserialize($userData->companydetails->preferr_state);
        $userData->companydetails->preferr_number_of_employee = unserialize($userData->companydetails->preferr_number_of_employee);
        $userData->companydetails->preferr_interest = unserialize($userData->companydetails->preferr_interest);
        $userData->companydetails->preferr_industry = unserialize($userData->companydetails->preferr_industry);
    

        
        return view('admin.pages.view_company', ['userData' => $userData, 
                                                'country' => $this->country,
                                                'state' => $this->state,
                                                'city' => $this->city,
                                                'numbersOfEmployees' => $this->numbersOfEmployees,
                                                'responseTime' => $this->responseTime,
                                                'status' => $this->status,
                                                'jobTittle' => $this->jobTittle,
                                                'workIN' => $this->workIN

                                                ]);
    }
    
    // broker data
    public function addBroker(Request $request){  
	
if(Auth::user()->usertype !='Admin')
		{
	        return redirect('/admin');
		}	
    
        return view('admin.pages.add_broker',[ 'country' => $this->country,
                                                'state' => $this->state,
                                                'city' => $this->city
                                                ]);
    }
    public function brokerregister(Request $request)
    { 
	if(Auth::user()->usertype !='Admin')
		{
	        return redirect('/admin');
		}
        $data =  \Input::except(array('_token')) ;
        
        $inputs = $request->all();
    
        $rule=array(
                'email' => 'required|max:75|unique:users,email',
                'password' => 'required|min:5',                
                'company_name' => 'required',
                'address' => 'required|min:5',
                'country' => 'required',
                'state' => 'required',
                'city' => 'required',                
                'doingBusinessAs' => 'required',
                'federal_ID' => 'required',
                'social_security' => 'required',
                'employer_id_number' => 'required',
                'additional_notes' => 'required'
                 );
        
       
        $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
        
        $user = new User;
        $user->usertype = 'Broker';
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
        
        $user->password= bcrypt($inputs['password']); 
        $user->status='pending';
        $user->save();
        
        $userID = $user->id;
        
        $brokerDetails = new BrokerDetails;
        $brokerDetails->user_id = $userID;
        $brokerDetails->fax_number = $inputs['fax_number'];
        $brokerDetails->company_name = $inputs['company_name'];
        $brokerDetails->doingBusinessAs = $inputs['doingBusinessAs'];
        $brokerDetails->federal_ID = $inputs['federal_ID'];
        $brokerDetails->social_security = $inputs['social_security'];
        $brokerDetails->employer_id_number = $inputs['employer_id_number'];
        $brokerDetails->additional_notes = $inputs['additional_notes'];
        $brokerDetails->website_url = $inputs['website_url'];
        $brokerDetails->save();
        
        
        \Session::flash('flash_message', 'You request has been sent successfully for approval');
        return back();
        
    }
    public function allBroker(Request $request){ 
	if(Auth::user()->usertype !='Admin')
		{
	        return redirect('/admin');
		}
        $matchTHis = ['usertype'=>'Broker'];
        $getALlCompanies =  user::where($matchTHis)->orderBy("id","desc")->get();
        //$getNotification=0;
        
        return view('admin.pages.all_broker', ['getALlBroker' => $getALlCompanies]);
    }
    
    public function deleteBroker(Request $request){ 
	if(Auth::user()->usertype !='Admin')
		{
	        return redirect('/admin');
		}
        
        if($task = user::findOrFail($request->id)){
            $task->delete($request->id);
            \Session::flash('flash_message', 'Broker has been deleted successfully.');
        }else{
            \Session::flash('flash_message', 'Please try again. Something went wrong.');
        }
         
        return back();
    }
    
    public function updateBrokerData(Request $request){
    
        if(Auth::user()->usertype !='Admin')
		{
	        return redirect('/admin');
		}
        $data =  \Input::except(array('_token')) ;
        
        $inputs = $request->all();
        
        
        $rule=array(        
                'company_name' => 'required',
                'address' => 'required|min:5',
                'country' => 'required',
                'state' => 'required',
                'city' => 'required',                
                'doingBusinessAs' => 'required',
                'federal_ID' => 'required',
                'social_security' => 'required',
                'employer_id_number' => 'required',
                'additional_notes' => 'required'
                 );
        
       
        $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        }
        
        $userData = user::with('brokerdetails')->findOrFail($request->id);; 
       // $userData->email = $inputs['email'];  
        if($userData->notification==1)
        {
            $userData->notification=0;
        }            
        $userData->first_name = $inputs['first_name'];   
        $userData->last_name = $inputs['last_name'];      
        $userData->address = $inputs['address']; 
        $userData->address2 = $inputs['address2'];
        $userData->phone_number = $inputs['phone_number'];
        $userData->country = $inputs['country'];    
        $userData->state = $inputs['state'];    
        $userData->city = $inputs['city'];    
        $userData->status = $inputs['status'];    
        
        $userData->brokerdetails->fax_number = $inputs['fax_number'];
        $userData->brokerdetails->company_name = $inputs['company_name'];
        $userData->brokerdetails->doingBusinessAs = $inputs['doingBusinessAs'];
        $userData->brokerdetails->federal_ID = $inputs['federal_ID']; 
        $userData->brokerdetails->social_security = $inputs['social_security'];
        $userData->brokerdetails->employer_id_number = $inputs['employer_id_number'];
        $userData->brokerdetails->additional_notes = $inputs['additional_notes'];
        $userData->brokerdetails->website_url = $inputs['website_url']; 
        
        $userData->brokerdetails->save();
        
        
        $userData->save();
        
        if($inputs['status']=='approved')
        {
            $data = array(            
                'first_name' => $inputs['first_name'],                        
                'last_name' => $inputs['last_name'],            
             );
             $subject='Approved By NetPeo Admin';
             $email=$inputs['email'];
            \Mail::send('emails.broker_status', $data, function ($message) use ($subject,$email){
                $message->from('netpeo@info.com', getcong('site_name'));
                $message->to($email)->subject($subject);
            });
        }    
        
        \Session::flash('flash_message', 'Update Successfully.');
        return back(); 
    }
    public function updateBroker(Request $request){
		
		if(Auth::user()->usertype !='Admin')
		{
	        return redirect('/admin');
		}
		
        $userData = user::with('brokerdetails')->findOrFail($request->id);
        
        return view('admin.pages.edit_broker', ['userData' => $userData, 
                                                'country' => $this->country,
                                                'state' => $this->state,
                                                'city' => $this->city,                                                
                                                'status' => $this->status
                                                
                                                ]);
    }
    public function viewBroker(Request $request){
		
		if(Auth::user()->usertype !='Admin')
		{
	        return redirect('/admin');
		}
		
        $userData = user::with('brokerdetails')->findOrFail($request->id);
        
        
        return view('admin.pages.view_broker', ['userData' => $userData, 
                                                'country' => $this->country,
                                                'state' => $this->state,
                                                'city' => $this->city,                                            
                                                'status' => $this->status
                                                ]);
    }
    // End Broker Data
    
    
    public function updateProfile(Request $request)
    {  
	
	if(Auth::user()->usertype !='Admin')
		{
	        return redirect('/admin');
		}
              
        $user = User::findOrFail(Auth::user()->id);
 
        
        $data =  \Input::except(array('_token')) ;
        
        $rule=array(
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'unique:users,email,' . Auth::user()->id,
                'password' => 'confirmed',
                //'image_icon' => 'mimes:jpg,jpeg,gif,png'
                    );
        
            $validator = \Validator::make($data,$rule);
 
            if ($validator->fails())
            {
                    return redirect()->back()->withErrors($validator->messages());
            }
        

        $inputs = $request->all();
        
        $icon = $request->file('user_icon');
        
        /*if($icon){
            
            
             $filename  = str_slug($inputs['name'], '-').'-'.time().'.'.$icon->getClientOriginalExtension();

             $path = public_path('upload/members/');
             
              $icon->move($path,$filename);
              
             $user->image_icon = 'upload/members/' . $filename;
        
                 
           // $user->image_icon = $hardPath;
        }*/
        
        /* if($icon){
            $tmpFilePath = 'upload/members/';

            $hardPath =  str_slug($inputs['first_name'], '-').'-'.md5(time());

            $img = Image::make($icon);

            $img->fit(250, 250)->save($tmpFilePath.$hardPath.'-b.jpg');
            //$img->fit(80, 80)->save($tmpFilePath.$hardPath. '-s.jpg');

            $user->image_icon = $tmpFilePath.$hardPath.'-b.jpg';
        }
        
        
        $user->first_name = $inputs['first_name']; 
        $user->last_name = $inputs['last_name']; 
        $user->email = $inputs['email']; 
        $user->mobile = $inputs['mobile'];
        $user->contact_email = $inputs['contact_email'];
        $user->website = $inputs['website'];           
        $user->address = $inputs['address']; 
        $user->facebook_url = $inputs['facebook_url'];
        $user->twitter_url = $inputs['twitter_url'];
        $user->linkedin_url = $inputs['linkedin_url'];
        $user->dribbble_url = $inputs['dribbble_url'];
        $user->instagram_url = $inputs['instagram_url']; */
        
        
       // $user->fill($input)->save();
        $user->first_name = $inputs['first_name']; 
        $user->last_name = $inputs['last_name']; 
        $user->email = $inputs['email'];
        $user->password = bcrypt($inputs['password']);        
        $user->save();

        Session::flash('flash_message', 'Successfully updated!');

        return redirect()->back();
    }
    
    public function updatePassword(Request $request)
    { 
	
	if(Auth::user()->usertype !='Admin')
		{
	        return redirect('/admin');
		}
         
            //$user = User::findOrFail(Auth::user()->id);
        
        
            $data =  \Input::except(array('_token')) ;
            $rule  =  array(
                    'password'       => 'required|confirmed',
                    'password_confirmation'       => 'required'
                ) ;
 
            $validator = \Validator::make($data,$rule);
 
            if ($validator->fails())
            {
                    return redirect()->back()->withErrors($validator->messages());
            }
        
               /* $val=$this->validate($request, [
                    'password' => 'required|confirmed',
            ]);  */      
         
        $credentials = $request->only('password', 'password_confirmation'
            );
            
        $user = \Auth::user();
        $user->password = bcrypt($credentials['password']);
        $user->save();

        Session::flash('flash_message', 'Successfully updated!');

        return redirect()->back();
    }
    
    
    // Start Lead data
    public function addLead(Request $request){ 
        
		if(Auth::user()->usertype !='Admin')
		{
	        return redirect('/admin');
		}
        
        return view('admin.pages.add_lead',[ 'country' => $this->country,
                                                'state' => $this->state,
                                                'city' => $this->city,
                                                'numbersOfEmployees' => $this->numbersOfEmployees,
                                                'workIN' => $this->workIN,
                                                'jobTittle' => $this->jobTittle
                                                ]);
    }
    public function leadregister(Request $request)
    { 
    
	if(Auth::user()->usertype !='Admin')
		{
	        return redirect('/admin');
		}
        $data =  \Input::except(array('_token')) ;
        
        $inputs = $request->all();
        
        
        $userID = Auth::user()->id;
        $rule=array(
                'email' => 'required|max:75',
                'total_employee' => 'required',                
                'reason' => 'required',
                'expected_decision_time' => 'required',
                'additional_benfefits' => 'required',
                'first_name' => 'required',
                'last_name' => 'required',                
                'company_name' => 'required',
                'phone_number' => 'required',
                'preferred_method_contact' => 'required',
                'job_title' => 'required',
                'work_indstry' => 'required'
                 );
        
       
        $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
        
        $user = new LeadDetails;
        $user->user_id = $userID;
        $user->service_type = $inputs['service_type'];
        $user->total_employee = $inputs['total_employee'];    
        $user->reason = serialize($inputs['reason']);    
        $user->additional_benfefits = serialize($inputs['additional_benfefits']);       
        $user->expected_decision_time = $inputs['expected_decision_time'];   
        $user->first_name = $inputs['first_name'];
        $user->last_name = $inputs['last_name'];
        $user->email_address = $inputs['email'];    
        $user->company_name = $inputs['company_name'];    
        $user->phone_number = $inputs['phone_number'];    
        
        $user->job_title = $inputs['job_title'];
        $user->work_indstry = $inputs['work_indstry'];
        $user->country = $inputs['country'];
        $user->state = $inputs['state'];
        $user->city = $inputs['city'];
        $user->preferred_method_contact = serialize($inputs['preferred_method_contact']);
        
        $user->status='pending';
        $user->save();
        
        
        \Session::flash('flash_message', 'Lead has been submit successfully for approval');  
        return redirect()->back();        
    }
    
        
    public function saveAssignedLead(Request $request) {
		
		if(Auth::user()->usertype !='Admin')
		{
	        return redirect('/admin');
		}
    
	
	/* $data = array(
            
                'first_name' => 'fdgfd',
                'email' => 'fdgfgd',            
                'last_name' => 'gfdf',
                'contact_number'=>'fdgdg',            
                'user_type'=>'Company',            
                
                 );
                
                  $subject='New Assigend';
                 $ema='dfdfdf'; 

                 \Mail::send('emails.assign', $data, function ($message) use ($subject,$ema){
                $message->from('lalchand.glocify@gmail.com', getcong('site_name'));
                $message->to('lalchand.glocify@gmail.com')->subject($subject);
                });  */
				
				//die;
        $checkedValue = json_decode($request->chkedArr);
        //echo "<pre>";print_r($checkedValue);die;
        $lead_id = $request->leadID;
        
        foreach($checkedValue as $singlvalue){
        
            /* DB::table('rfps_lead_company_link')->insert([
                'company_id' => (int)$singlvalue,
                'lead_id' => (int)$lead_id, //pass your userID here
            ]); */
             $user = User::where('id',$singlvalue)->get();
            
            foreach($user as $inputs)
            {
                 
                $data = array(
            
                'first_name' => $inputs->first_name,
                'email' => $inputs->email,            
                'last_name' => $inputs->last_name,
                'contact_number'=>$inputs->contact_number,            
                'user_type'=>'Company',            
                
                 );
                
                  $subject='New Assigend';
                 $ema=$inputs->email; 
				//$ema = 'lalchand.glocify@gmail.com';
                 \Mail::send('emails.assign', $data, function ($message) use ($subject,$ema){
                $message->from('info@glocify.com', getcong('site_name'));
                $message->to($ema)->subject($subject);
                });  
            } 
            
            
            
            
            $asignlead = new AssignLeads;
            $asignlead->company_id = (int)$singlvalue;
            $asignlead->lead_id = (int)$lead_id;
            $asignlead->notification = 1;
            $asignlead->save();    
        }
        
        \Session::flash('flash_message', 'Lead has been assigned successfully.');
    }
    
    public function getCompamyForLeadAssign(Request $request) {
    
        $leadData = LeadDetails::findOrFail($request->leadID);
    
    
        $number_of_employee = $leadData->total_employee;
        $state = $leadData->state;
        $interest = unserialize($leadData->reason);
        $indstry = $leadData->work_indstry;
        $leads=AssignLeads::where('lead_id',$request->leadID)->get();
        
        foreach($leads as $id)
        {
            $lead[]=$id['company_id'];
            $CompanyDetails = CompanyDetails::whereNotIn('user_id',$lead)->get();

        } 
        if(empty($CompanyDetails) )
        {
            $CompanyDetails = CompanyDetails::all();  
        }
        foreach($CompanyDetails as $Singlevalue):
        
            $company_rating = 0;
            $preferr_number_of_employee = unserialize($Singlevalue->preferr_number_of_employee);
            $preferr_state =  unserialize($Singlevalue->preferr_state);
            $preferr_interest = unserialize($Singlevalue->preferr_interest);
            $preferr_industry = unserialize($Singlevalue->preferr_industry);
            
            if(is_array($preferr_interest) == true){
                            
                $getCommonInterest = array_intersect($interest,$preferr_interest);
                if(count($getCommonInterest) > 3)
                    $company_rating += 1.5;
                elseif(count($getCommonInterest) <= 3 && count($getCommonInterest) > 0)
                    $company_rating += 0.5;        
            }
            
            if(is_array($preferr_state) == true){
                if(in_array($state,$preferr_state)){
                    $company_rating += 1.5;    
                }
            }
            
            if(is_array($preferr_number_of_employee) == true){
                
                if(in_array($number_of_employee,$preferr_number_of_employee)){
                    $company_rating += 1;    
                }
            } 
            
            if(is_array($preferr_industry) == true){
                            
                if(in_array($indstry,$preferr_industry)){
                    $company_rating += 1;    
                }
            } 
            
              $company_rating;
            $Singlevalue->start_rating = intval($company_rating);
        endforeach;
        $CompanyDetails = $CompanyDetails->sortByDesc('start_rating');
        $outputHtml = ''; 
        
    /*     echo '<pre>';
        print_r($CompanyDetails);
        die; */
            
        $outputHtml .='<table class="assign_history" id="pag">
                    <thead>
                        <tr>
                            <th>Company Name</th>
                            <th>Ratings</th>
                            <th> </th>
                        </tr>
                    </thead>';
        foreach($CompanyDetails as $singleCompany){
            $outputHtml .= '<tr>
                            <td>'.$singleCompany->company_name.'</td>
                            <td>
                                <span class="ratings">';
                                if($singleCompany->start_rating == 0){
                                    $outputHtml .='<i class="fa fa-star" aria-hidden="true"></i>';
                                }
                                if($singleCompany->start_rating == 1){
                                    $outputHtml .='<i class="fa fa-star" aria-hidden="true"></i>';
                                }
                                if($singleCompany->start_rating == 2){
                                    $outputHtml .='<i class="fa fa-star" aria-hidden="true"></i>';
                                    $outputHtml .='<i class="fa fa-star" aria-hidden="true"></i>';
                                }
                                if($singleCompany->start_rating == 3){
                                    $outputHtml .='<i class="fa fa-star" aria-hidden="true"></i>';
                                    $outputHtml .='<i class="fa fa-star" aria-hidden="true"></i>';
                                    $outputHtml .='<i class="fa fa-star" aria-hidden="true"></i>';
                                }
                                if($singleCompany->start_rating == 4){
                                    $outputHtml .='<i class="fa fa-star" aria-hidden="true"></i>';
                                    $outputHtml .='<i class="fa fa-star" aria-hidden="true"></i>';
                                    $outputHtml .='<i class="fa fa-star" aria-hidden="true"></i>';
                                    $outputHtml .='<i class="fa fa-star" aria-hidden="true"></i>';
                                }
                                if($singleCompany->start_rating == 5){
                                    $outputHtml .='<i class="fa fa-star" aria-hidden="true"></i>';
                                    $outputHtml .='<i class="fa fa-star" aria-hidden="true"></i>';
                                    $outputHtml .='<i class="fa fa-star" aria-hidden="true"></i>';
                                    $outputHtml .='<i class="fa fa-star" aria-hidden="true"></i>';
                                    $outputHtml .='<i class="fa fa-star" aria-hidden="true"></i>';
                                }
                $outputHtml .= '</span>
                            </td>
                            <td><input class="company_check_list" name="company_check_list[]" value="'.$singleCompany->user_id.'" type="checkbox"><input type="hidden" value="'.$request->leadID.'" name="lead_id" id="lead_id" /></td>
                        </tr>';
                        
                        
        
        } 
        $outputHtml .='</tbody>
                </table>';
        return $outputHtml;
    }
    
    public function allLeads(Request $request){ 
	
	if(Auth::user()->usertype !='Admin')
		{
	        return redirect('/admin');
		}
		
        $getAllleads =  LeadDetails::all()->sortByDesc("id")->where('publish_status','Publish');
                
        return view('admin.pages.all_leads', ['getAllleads' => $getAllleads]);
    }
    
    public function deleteLead(Request $request){ 
        
        if($task = LeadDetails::findOrFail($request->id)){
            $task->delete($request->id);
            \Session::flash('flash_message', 'Lead has been deleted successfully.');
        }else{
            \Session::flash('flash_message', 'Lead try again. Something went wrong.');
        }
         
        return back();
    }
    
    public function updateLeadData(Request $request){
    
	if(Auth::user()->usertype !='Admin')
		{
	        return redirect('/admin');
		}
        
        $data =  \Input::except(array('_token')) ;
        
        $inputs = $request->all();
        
        
         $rule=array(
                'email' => 'required|max:75',
                'total_employee' => 'required',                
                'reason' => 'required',
                'expected_decision_time' => 'required',
                'additional_benfefits' => 'required',
                'first_name' => 'required',
                'last_name' => 'required',                
                'company_name' => 'required',
                'phone_number' => 'required',
                'preferred_method_contact' => 'required',
                'job_title' => 'required',
                'work_indstry' => 'required'
                 );
        
       
        $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        }
        
        $user = LeadDetails::findOrFail($request->id);
        if($user->notification==1)
        {
            $user->notification=0;
        }            
        $user->service_type = $inputs['service_type'];
        $user->total_employee = $inputs['total_employee'];    
        $user->reason = serialize($inputs['reason']);    
        $user->additional_benfefits = serialize($inputs['additional_benfefits']);       
        $user->expected_decision_time = $inputs['expected_decision_time'];   
        $user->first_name = $inputs['first_name'];
        $user->last_name = $inputs['last_name'];
        $user->email_address = $inputs['email'];    
        $user->company_name = $inputs['company_name'];    
        $user->phone_number = $inputs['phone_number'];    
        $user->job_title = $inputs['job_title'];
        $user->work_indstry = $inputs['work_indstry'];
        $user->country = $inputs['country'];
        $user->state = $inputs['state'];
        $user->city = $inputs['city'];
        $user->preferred_method_contact = serialize($inputs['preferred_method_contact']);
        $user->updated_at = date("Y-m-d H:i:s");
        $user->status=$inputs['status'];
        
        $user->save();
        
        \Session::flash('flash_message', 'Lead Updated Successfully.');
        return redirect('admin/AllLeads'); 
    }
    public function updateLead(Request $request){
		
		if(Auth::user()->usertype !='Admin')
		{
	        return redirect('/admin');
		}
		
        $leadData = LeadDetails::findOrFail($request->id);
        
        $leadData->reason = unserialize($leadData->reason);
        $leadData->additional_benfefits = unserialize($leadData->additional_benfefits);
        $leadData->preferred_method_contact = unserialize($leadData->preferred_method_contact);
        
        
        return view('admin.pages.edit_lead', ['leadData' => $leadData, 
                                                'country' => $this->country,
                                                'state' => $this->state,
                                                'city' => $this->city,                                                
                                                'status' => $this->status,
                                                'numbersOfEmployees' => $this->numbersOfEmployees,
                                                'jobTittle' => $this->jobTittle,
                                                'workIN' => $this->workIN
                                                
                                                ]);
    }
    public function viewLead(Request $request){
		
		if(Auth::user()->usertype !='Admin')
		{
	        return redirect('/admin');
		}
		
        $leadData = LeadDetails::findOrFail($request->id);
        $leadData->notification = 0;
		$leadData->save();

        $leadData->reason = unserialize($leadData->reason);
        $leadData->additional_benfefits = unserialize($leadData->additional_benfefits);
        $leadData->preferred_method_contact = unserialize($leadData->preferred_method_contact);
        
        
        $alldata_lead = DB::table('rfps_leads')
                            ->leftjoin('rfps_workers_compensation', 'rfps_leads.id', '=', 'rfps_workers_compensation.lead_WORKERSCOMPENSATION_id')
                            ->leftjoin('rfps_workers_compensation_contact', 'rfps_workers_compensation.id', '=', 'rfps_workers_compensation_contact.compensation_id')
                            ->leftjoin('rfps_compensation_indivisual_included', 'rfps_workers_compensation.id', '=', 'rfps_compensation_indivisual_included.compensation_id')
                            ->leftjoin('rfps_compensation_premium_state', 'rfps_workers_compensation.id', '=', 'rfps_compensation_premium_state.compensation_id')
                            ->leftjoin('rfps_compensation_prior', 'rfps_workers_compensation.id', '=', 'rfps_compensation_prior.compensation_id')
                            ->leftjoin('rfps_compensation_rating', 'rfps_workers_compensation.id', '=', 'rfps_compensation_rating.compensation_id')
                            ->leftjoin('rfps_Proposal_Information_Questionnaire', 'rfps_leads.id', '=', 'rfps_Proposal_Information_Questionnaire.lead_id_Questionnaire')
                            ->where('rfps_leads.id',$request->id)
                            ->select('rfps_workers_compensation.*','rfps_workers_compensation_contact.*','rfps_compensation_indivisual_included.*','rfps_compensation_premium_state.*','rfps_compensation_prior.*','rfps_compensation_rating.*','rfps_Proposal_Information_Questionnaire.*')
                            ->get();
                            
                            
        return view('admin.pages.view_lead', ['leadData' => $leadData, 
                                                'country' => $this->country,
                                                'state' => $this->state,
                                                'city' => $this->city,                                                
                                                'status' => $this->status,
                                                'numbersOfEmployees' => $this->numbersOfEmployees,
                                                'jobTittle' => $this->jobTittle,
                                                'workIN' => $this->workIN,
                                                'alldata_lead'=>$alldata_lead[0],
                                                ]);
    }
    // End Lead Data
	public function DownloadPdf(Request $request){
		if(Auth::user()->usertype !='Admin')
		{
	        return redirect('/admin');
		}
		$formname = $request->form_name;
		$Formid = $request->formid;
		$alldata_lead = array();
		$alldata_lead['formname'] = $formname;
		if($formname == 'Questionnaire_form'){			
			$alldata_lead1 = DB::table('rfps_leads')
			->leftjoin('rfps_Proposal_Information_Questionnaire', 'rfps_leads.id', '=', 'rfps_Proposal_Information_Questionnaire.lead_id_Questionnaire')
			->select('rfps_Proposal_Information_Questionnaire.*')			
			->where('rfps_leads.id',$Formid)
            ->get();
			$alldata_lead1 = collect($alldata_lead1)->map(function($x){ return (array) $x; })->toArray();
			$alldata_lead['form_data'] = $alldata_lead1[0];			
		} else {
			$alldata_lead1 = DB::table('rfps_leads')
                            ->leftjoin('rfps_workers_compensation', 'rfps_leads.id', '=', 'rfps_workers_compensation.lead_WORKERSCOMPENSATION_id')
                            ->leftjoin('rfps_workers_compensation_contact', 'rfps_workers_compensation.id', '=', 'rfps_workers_compensation_contact.compensation_id')
                            ->leftjoin('rfps_compensation_indivisual_included', 'rfps_workers_compensation.id', '=', 'rfps_compensation_indivisual_included.compensation_id')
                            ->leftjoin('rfps_compensation_premium_state', 'rfps_workers_compensation.id', '=', 'rfps_compensation_premium_state.compensation_id')
                            ->leftjoin('rfps_compensation_prior', 'rfps_workers_compensation.id', '=', 'rfps_compensation_prior.compensation_id')
                            ->leftjoin('rfps_compensation_rating', 'rfps_workers_compensation.id', '=', 'rfps_compensation_rating.compensation_id')
                            ->where('rfps_leads.id',$Formid)
                            ->select('rfps_workers_compensation.*','rfps_workers_compensation_contact.*','rfps_compensation_indivisual_included.*','rfps_compensation_premium_state.*','rfps_compensation_prior.*','rfps_compensation_rating.*')
                            ->get();
			$alldata_lead1 = collect($alldata_lead1)->map(function($x){ return (array) $x; })->toArray();			
			$alldata_lead['form_data'] = $alldata_lead1[0];
		}		
		$pdf = PDF::loadView('admin.pages.download_lead', [ 'alldata_lead' => $alldata_lead ]);
		$pdf->setPaper('A4','portrait');
		$filename = $formname.'_'.$Formid.'.pdf';
		$filepath = URL::to('/')."/public/".$filename;
		if(file_exists($filepath)){
			unlink($filepath);
		}		
		$pdf->save(public_path($filename));
		
		return response()->json([
			'success' => true,
			'filepath' => $filepath
		]);
	}
    // Start User data
    public function addUser(Request $request){  

		if(Auth::user()->usertype !='Admin')
		{
	        return redirect('/admin');
		}
		
        return view('admin.pages.add_user',[ 'country' => $this->country,
                                                'state' => $this->state,
                                                'city' => $this->city,
                                                'userType' => $this->userType,
                                                'status' => $this->status                                                   
                                            ]);
    }
    public function userregister(Request $request)
    { 
    
	if(Auth::user()->usertype !='Admin')
		{
	        return redirect('/admin');
		}
		
        $data =  \Input::except(array('_token')) ;
        
        $inputs = $request->all();
        
        $rule=array(
                'email' => 'required|max:75|unique:users,email',
                'usertype' => 'required',
                'password' => 'required|min:5',                
                'first_name' => 'required',
                'address' => 'required|min:5',
                'country' => 'required',
                'state' => 'required',
                'city' => 'required',
                'status' => 'required',
                 );
        
       
        $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
        
        $user = new User;
        $user->username = $inputs['email'];  
        $user->usertype = $inputs['usertype'];  
        $user->email = $inputs['email'];    
        $user->first_name = $inputs['first_name'];   
        $user->last_name = $inputs['last_name'];      
        $user->address = $inputs['address']; 
        $user->address2 = $inputs['address2'];
        $user->phone_number = $inputs['contact_number'];
        $user->country = $inputs['country'];    
        $user->state = $inputs['state'];    
        $user->city = $inputs['city'];    
        $user->status = $inputs['status'];    
        $user->save();
        
        
        \Session::flash('flash_message', 'New Account has been crated successfully');
        return redirect('admin/AllUsers');
        
    }
    public function allUsers(Request $request){ 
	
	if(Auth::user()->usertype !='Admin')
		{
	        return redirect('/admin');
		}
        $getAllUsers =  User::all()->sortByDesc("id");
        
        return view('admin.pages.all_user', ['getAllUsers' => $getAllUsers]);  
    }
    
    public function deleteUser(Request $request){ 
	
		
		if(Auth::user()->usertype !='Admin')
		{
	        return redirect('/admin');
		}
        
        if($task = User::findOrFail($request->id)){
            $task->delete($request->id);
            \Session::flash('flash_message', 'User Account has been deleted successfully.');
        }else{
            \Session::flash('flash_message', 'Please try again. Something went wrong.');
        }
         
        return back();
    }
    
    public function updateUserData(Request $request){
		
		if(Auth::user()->usertype !='Admin')
		{
	        return redirect('/admin');
		}
    
        
        $data =  \Input::except(array('_token')) ;
        
        $inputs = $request->all();
        
        
        $rule=array(
                //'email' => 'required|max:75|unique:users,email',
                'usertype' => 'required',
                //'password' => 'required|min:5',                
                'first_name' => 'required',
                'address' => 'required|min:5',
                'country' => 'required',
                'state' => 'required',
                'city' => 'required',
                'status' => 'required',
                 );
        
       
        $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        }
        
        $user = User::findOrFail($request->id);; 
        //$user->username = $inputs['email'];  
        $user->usertype = $inputs['usertype'];  
        //$user->email = $inputs['email'];    
        $user->first_name = $inputs['first_name'];   
        $user->last_name = $inputs['last_name'];      
        $user->address = $inputs['address']; 
        $user->address2 = $inputs['address2'];
        $user->phone_number = $inputs['phone_number'];
        $user->country = $inputs['country'];    
        $user->state = $inputs['state'];    
        $user->city = $inputs['city'];    
        $user->status = $inputs['status'];    
        $user->save();
        
        \Session::flash('flash_message', 'User Account Updated Successfully.');
        return redirect('admin/AllUsers'); 
    }
    public function updateUser(Request $request){
		
		if(Auth::user()->usertype !='Admin')
		{
	        return redirect('/admin');
		}
		
        $userData = User::findOrFail($request->id);
        
        
        return view('admin.pages.edit_user', ['userData' => $userData, 
                                                'country' => $this->country,
                                                'state' => $this->state,
                                                'city' => $this->city,                                                
                                                'status' => $this->status,
                                                'userType' => $this->userType
                                               ]);
    }
    
    public function viewUser(Request $request){
		
		if(Auth::user()->usertype !='Admin')
		{
	        return redirect('/admin');
		}
		
        $userData = User::findOrFail($request->id);
        
        
        return view('admin.pages.view_user', ['userData' => $userData, 
                                                'country' => $this->country,
                                                'state' => $this->state,
                                                'city' => $this->city,                                                
                                                'status' => $this->status,
                                                'userType' => $this->userType
                                               ]);
    }
    // End User Data
    
    public function leadHistory(Request $request){
        echo $request->id;
        die;
    }
    
    
    public function all_rates(Request $request){ 
	
	if(Auth::user()->usertype !='Admin')
		{
	        return redirect('/admin');
		}
		
    
        $search='';
        if(isset($request->search))
        {
            
        $search = $request->search;
        $rates =  Rates::where('Index_code', 'like', '%' .$search. '%')->paginate(20);    
        
        }
        
        else
        {
        $rates =  Rates::paginate(20);
        
        }
        
        
        return view('admin.pages.all_rates', ['rates' => $rates,'search'=>$search]);
    }
    
    public function add_rate(Request $request){ 
	
	if(Auth::user()->usertype !='Admin')
		{
	        return redirect('/admin');
		}
    
        $rates =  Rates::get();
        
        
        return view('admin.pages.add_rate');
    }
    
    public function add_rate_post(Request $request){ 
	
	if(Auth::user()->usertype !='Admin')
		{
	        return redirect('/admin');
		}
    
        $data =  \Input::except(array('_token')) ;
        
        $inputs = $request->all();
        
        
        $rule=array(
                'Index_code' => 'required',
                'State' => 'required',
                'Code' => 'required',
                'TWC' => 'required',
                'RWC' => 'required',
                'WWC' => 'required',
                'SWC' => 'required',
                'Elig' => 'required',
                'Description' => 'required'
                 );
        
       
        $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        }
        if(!empty($request->id))
        {
        $rate = Rates::findOrFail($request->id);
        } else
        {
        $rate=new Rates;    
        }
        $rate->Index_code = $inputs['Index_code'];  
        $rate->State = $inputs['State'];   
        $rate->Code = $inputs['Code'];      
        $rate->TWC = $inputs['TWC']; 
        $rate->RWC = $inputs['RWC'];
        $rate->WWC = $inputs['WWC'];
        $rate->SWC = $inputs['SWC'];    
        $rate->Elig = $inputs['Elig'];    
        $rate->Description = $inputs['Description'];    
        $rate->save();
        
        \Session::flash('flash_message', 'Updated Successfully.');
        return redirect()->back();
    }
    public function edit_rate(Request $request)
    {
		
		if(Auth::user()->usertype !='Admin')
		{
	        return redirect('/admin');
		}
		
        $rate = Rates::findOrFail($request->id);
        
    return view('admin.pages.add_rate', ['rate'=>$rate]);    
    }
    
   public function delete_rate(Request $request)
   {
	   
	   if(Auth::user()->usertype !='Admin')
		{
	        return redirect('/admin');
		}
		
       $rate = Rates::findOrFail($request->id);
       $rate->delete();
       \Session::flash('flash_message', 'Deleted Successfully.');
        return redirect()->back();
   } 
   
   public function veiw_rate(Request $request)
   {
	   
	   if(Auth::user()->usertype !='Admin')
		{
	        return redirect('/admin');
		}
		
       $rate = Rates::findOrFail($request->id);
       
       return view('admin.pages.view_rate', ['rate'=>$rate]);
   }  

 public function import_rates(Request $request)
 {
	 
	 if(Auth::user()->usertype !='Admin')
		{
	        return redirect('/admin');
		}
		
        
        $filename = $request->file('csv_file');
         
 
  $file = fopen($filename, "r");
         while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
          {
                   $Rates=new Rates;
                   $Rates->Index_code=$getData[0];
                   $Rates->State=str_slug($getData[1], "-"); ;
                   $Rates->Code=$getData[2];
                   $Rates->TWC=$getData[3];
                   $Rates->RWC=$getData[4];
                   $Rates->WWC=$getData[5];
                   $Rates->SWC=$getData[6];
                   $Rates->Elig=$getData[7];
                   $Rates->Description=$getData[8];
                   $Rates->save();
           }
                 
                 \Session::flash('flash_message', 'Data Imported Successfully');
                  return redirect()->back();
        
 }
 
 
 public function change_status(Request $request){
		
		if(Auth::user()->usertype !='Admin')
		{
	        return redirect('/admin');
		}
		
        $leadData = LeadDetails::findOrFail($request->id);
		
		if($leadData->status=='pending')
		{
			$leadData->status='approved';
		}
		
		else if($leadData->status=='approved')
		{
			$leadData->status='pending';
		}
		$leadData->notification = 0;
		$leadData->save();
		
		 \Session::flash('flash_message', 'Status Changed');
                  return redirect()->back();
		
  }
  public function View_Quote(Request $request){ 
        
		if(Auth::user()->usertype !='Admin')
		{
	        return redirect('/admin');
		}
		
		$alldata = DB::table('rfps_quotes')
			->leftjoin('rfps_leads', 'rfps_quotes.lead_id', '=', 'rfps_leads.id')
			->leftjoin('users', 'rfps_quotes.company_id', '=', 'users.id')
			->select('rfps_quotes.id as quote_id','rfps_quotes.*','rfps_leads.*','users.first_name as user_firstname', 'users.last_name as user_lastname')			
			->where('rfps_quotes.lead_id',$request->id)
            ->get();
			
		//echo "<pre>"; print_r($alldata); die;
        
        return view('admin.pages.quotes',[ 'getAllQuote' => $alldata]);
    }
	public function viewquote(Request $request){ 
        
		if(Auth::user()->usertype !='Admin')
		{
	        return redirect('/admin');
		}
		
		$alldata = DB::table('rfps_quotes')
			->select('*')			
			->where('rfps_quotes.id',$request->id)
            ->get();
		
		//echo "<pre>"; print_r($alldata); die;
        
        return view('admin.pages.quote_detail',[ 'getQuote' => $alldata]);
    }
	
	public function set_quote_status(Request $request){
		if(Auth::user()->usertype !='Admin')
		{
	        return 'You are not authorized!';
		}
		$Quote_details = Quote::findOrFail($request->qut_id);		

		$updateTime = new \DateTime();
		$updated_at = $updateTime->format("Y-m-d H:i:s");		
		
		$Quote_details->quote_status=$request->qut_status;			
		$Quote_details->updated_date = $updated_at;
		if($Quote_details->save()){
			$data = array();
			$data['company'] = User::findOrFail($Quote_details->company_id);
			$data['Quote_details'] = $Quote_details;
			$data['Broker'] = User::findOrFail($Quote_details->broker_id);
			$data['lead_details'] = LeadDetails::findOrFail($Quote_details->lead_id);
			if($Quote_details->quote_status == 1){
				$message = "You have Successfully approved this Quote!";				
			} elseif($Quote_details->quote_status == 0) {
				$message = "You have Successfully unassigned this Quote!";
			} else {
				$message = "You have Successfully rejected this Quote!";
			}
			
			/* Mail Code for Company */
			$company_subject="Quote '".$Quote_details->quote_title."' Approved!";
			$company_email = $data['company']->email;
			\Mail::send('emails.quote_company', $data, function ($msg) use ($company_subject,$company_email){
				$msg->from('info@glocify.com', getcong('site_name'));
				$msg->to($company_email)->subject($company_subject);
			});
			
			/* Mail Code for Broker */
			$broker_subject="Admin has approved a Quote for your Lead!";
			$broker_email = $data['Broker']->email;
			\Mail::send('emails.quote_broker', $data, function ($msg) use ($broker_subject,$broker_email){
				$msg->from('info@glocify.com', getcong('site_name'));
				$msg->to($broker_email)->subject($broker_subject);
			});
			return response()->json([
				'success' => true,
				'message' => $message
			]);	
		} else {
			return response()->json([
				'success' => false,
				'message' => 'Some Error Occured!.'
			]);
		}
		die();
	}
 
}
