<?php

namespace App\Http\Controllers\Broker;

use Auth;
use App\User;
use App\LeadDetails;
use App\Rates;
use App\Questionnaire;
use App\Compensation;
use App\CompensationContact;
use App\CompensationIndivisual;
use App\CompensationPremiumstate;
use App\CompensationPrior;
use App\CompensationRating;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Session;
use Intervention\Image\Facades\Image; 
use DB;
use PDF;

class BrokerController extends MainBrokerController
{   
    private $country = array(
                        '' => ' -- Select -- ',
                        '1' => 'USA'
                        
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
	
	if(Auth::user()->usertype !='Broker')
		{
	        return redirect('/');
		}
		
        return view('broker.pages.dashboard');
    }
    
    public function profile()
    { 
        return view('broker.pages.profile');
    }
    
    public function updateProfile(Request $request)
    {  
	
	if(Auth::user()->usertype !='Broker')
		{
	        return redirect('/');
		}
		
             
        $user = User::findOrFail(Auth::user()->id);
 
        
        $data =  \Input::except(array('_token')) ;
        
        $rule=array(
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|max:75|unique:users,id',
                'image_icon' => 'mimes:jpg,jpeg,gif,png'
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
        
        if($icon){
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
        $user->instagram_url = $inputs['instagram_url'];
        
        
       // $user->fill($input)->save();
       
        $user->save();

        Session::flash('flash_message', 'Successfully updated!');

        return redirect()->back();
    }
    
    public function updatePassword(Request $request)
    { 
         if(Auth::user()->usertype !='Broker')
		{
	        return redirect('/');
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
     
    public function addBrokerLead(){
		
		if(Auth::user()->usertype !='Broker')
		{
	        return redirect('/');
		}
		
        $pagetitle='Add New Prospect';
        $codes=Rates::groupBy('Index_code')->pluck('Index_code');
        $Descriptions=Rates::groupBy('Description')->pluck('Description');
        $codearray=array();
        $DescriptionArray='';
         foreach($codes as $code)
        {
        array_push($codearray,$code);
        } 
        
        foreach($Descriptions as $Description)
        {
        $DescriptionArray=$DescriptionArray.'"'.$Description.'",';
        }
       $DescriptionArray=$DescriptionArray.'"Farm"';
        $codearray= implode("','",$codearray);
        $codearray = "'".$codearray."'";
        //die;
        return view('broker.pages.add_broker_lead',[ 'country' => $this->country,
                                                'state' => $this->state,
                                                'city' => $this->city,
                                                'numbersOfEmployees' => $this->numbersOfEmployees,
                                                'workIN' => $this->workIN,
                                                'jobTittle' => $this->jobTittle,
                                                'codes'=>$codearray,
                                                'DescriptionArray'=>$DescriptionArray,
                                                'pagetitle'=>$pagetitle
                                                ]);
    } 
    public function leadregister(Request $request)
    { 
    
	
	if(Auth::user()->usertype !='Broker')
		{
	        return redirect('/');
		}
		
        $data =  \Input::except(array('_token'),'file') ;
        
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
                 return view('broker.pages.form_error_message')->withErrors($validator->messages());
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
        $user->notification=1;
        $user->save();
		$email=$inputs['email'];
        $data = array(            
            'first_name' => $inputs['first_name'],                     
            'last_name' => $inputs['last_name'],
             );
         $sub="Register Lead By Broker";
            \Mail::send('emails.lead_broker', $data, function ($message) use ($sub,$email){
                $message->from('info@glocify.com', getcong('site_name'));
                $message->to($email)->subject($sub);
            });     
        $lead_id=$user->id;
       return array('lead_id'=>$lead_id);    
    }
    public function updateLead(Request $request){
		
		if(Auth::user()->usertype !='Broker')
		{
	        return redirect('/');
		}
		
        $leadData = LeadDetails::findOrFail($request->id);
        
        $leadData->reason = unserialize($leadData->reason);
        $leadData->additional_benfefits = unserialize($leadData->additional_benfefits);
        $leadData->preferred_method_contact = unserialize($leadData->preferred_method_contact);
        
        
        
        return view('broker.pages.edit_broker_lead', ['leadData' => $leadData, 
                                                'country' => $this->country,
                                                'state' => $this->state,
                                                'city' => $this->city,                                                
                                                'status' => $this->status,
                                                'numbersOfEmployees' => $this->numbersOfEmployees,
                                                'jobTittle' => $this->jobTittle,
                                                'workIN' => $this->workIN]);
    }
    
    public function viewLead(Request $request){
		
		if(Auth::user()->usertype !='Broker')
		{
	        return redirect('/');
		}
		
        $leadData = LeadDetails::findOrFail($request->id);
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
             
				//->select('rfps_workers_compensation.*','rfps_Proposal_Information_Questionnaire.*')
				->get();
            
//              echo '<pre>';
//            print_r($alldata_lead[0]); die; 
        $leadData->reason = unserialize($leadData->reason);
        $leadData->additional_benfefits = unserialize($leadData->additional_benfefits);
        $leadData->preferred_method_contact = unserialize($leadData->preferred_method_contact);
        
        return view('broker.pages.view_broker_lead', ['leadData' => $leadData, 
                                                'country' => $this->country,
                                                'state' => $this->state,
                                                'city' => $this->city,                                                
                                                'status' => $this->status,
                                                'numbersOfEmployees' => $this->numbersOfEmployees,
                                                'jobTittle' => $this->jobTittle,
                                                'workIN' => $this->workIN,
                                                'alldata_lead'=>$alldata_lead[0]
                                                ]);
    }
	public function DownloadPdf(Request $request){
		if(Auth::user()->usertype !='Broker')
		{
	        return redirect('/');
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
		
		$pdf = PDF::loadView('broker.pages.download_lead', [ 'alldata_lead' => $alldata_lead ]);
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
		//return $pdf->download($formname.'_'.$Formid.'.pdf');
		
	}
    public function updateLeadDataBroker(Request $request){
    
        if(Auth::user()->usertype !='Broker')
		{
	        return redirect('/');
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
        return redirect('broker/allbrokerleads'); 
    }
    public function deleteLead(Request $request){ 
        
		if(Auth::user()->usertype !='Broker')
		{
	        return redirect('/');
		}
		
        if($task = LeadDetails::findOrFail($request->id)){
            $task->delete($request->id);
            \Session::flash('flash_message', 'Lead has been deleted successfully.');
        }else{
            \Session::flash('flash_message', 'Lead try again. Something went wrong.');
        }
         
        return back();
    }
    public function allLeads(){ 
	
	if(Auth::user()->usertype !='Broker')
		{
	        return redirect('/');
		}
		
        $id=Auth::user()->id;
        //echo $id;die;        
        $getAllleads =  LeadDetails::where('user_id',$id)->where('publish_status','Publish')->orderBy('id', 'DESC')->paginate(25);
        //$CompanyDetails =  CompanyDetails::all();
    
        return view('broker.pages.all_broker_leads', ['getAllleads' => $getAllleads]);
    }
    
    public function editBroker(Request $request){
        
        if(Auth::user()->usertype !='Broker')
		{
	        return redirect('/');
		}
        
        $userData = user::with('brokerdetails')->findOrFail($request->id);
        
        return view('broker.pages.edit_broker', ['userData' => $userData, 
                                                'country' => $this->country,
                                                'state' => $this->state,
                                                'city' => $this->city,                                                
                                                'status' => $this->status]);
    }
    
    public function editBrokerData(Request $request){
    
	if(Auth::user()->usertype !='Broker')
		{
	        return redirect('/');
		}
        
        $data =  \Input::except(array('_token')) ;
        
        $inputs = $request->all();
        
        
        $rule=array(        
                'company_name' => 'required',
                'email' => 'unique:users,email,' . $request->id,
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
        
        $userData = user::with('brokerdetails')->findOrFail($request->id); 
       // $userData->email = $inputs['email'];    
        $userData->first_name = $inputs['first_name'];   
        $userData->last_name = $inputs['last_name'];      
        $userData->address = $inputs['address']; 
        $userData->address2 = $inputs['address2'];
        $userData->phone_number = $inputs['phone_number'];
        $userData->country = $inputs['country'];    
        $userData->state = $inputs['state'];    
        $userData->city = $inputs['city'];    
        //$userData->status = $inputs['status'];    
        
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
        
        \Session::flash('flash_message', 'Update Successfully.');
        return back(); 
    }
    
    
    
    public function request_for_proposalform(Request $request)
    { 
    
	if(Auth::user()->usertype !='Broker')
		{
	        return redirect('/');
		}
        $data =  \Input::except(array('_token')) ;
        
        $inputs = $request->all();
        $rule=array(
                'legal_name_dba' => 'required',                
                'lead_id_Questionnaire' => 'required',                
                'Street_Address' => 'required',
                'city_state_zip' => 'required',
                'Phone' => 'required',
                'Contact_Name' => 'required',
                 );
        
       
        $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                 return view('broker.pages.form_error_message')->withErrors($validator->messages());
        } 
        
        $Questionnaire = new Questionnaire;
        $Questionnaire->lead_id_Questionnaire = $inputs['lead_id_Questionnaire'];
        $Questionnaire->legal_name_dba = $inputs['legal_name_dba'];
        $Questionnaire->Street_Address = $inputs['Street_Address'];    
        $Questionnaire->city_state_zip = $inputs['city_state_zip'];    
        $Questionnaire->Phone = $inputs['Phone'];       
        $Questionnaire->Fax = $inputs['Fax'];   
        $Questionnaire->Contact_Name = $inputs['Contact_Name'];
        $Questionnaire->Title = $inputs['Title'];
        $Questionnaire->Industry_desc = $inputs['Industry_desc'];    
        $Questionnaire->Fed_Tax_id = $inputs['Fed_Tax_id'];    
        $Questionnaire->Years_inBusiness = $inputs['Years_inBusiness'];    
        $Questionnaire->SIC_Code = $inputs['SIC_Code'];
        
        $Questionnaire->JobDescription1 = $inputs['JobDescription1'];
        $Questionnaire->ClassCode1 = $inputs['ClassCode1'];
        $Questionnaire->Rate100_1 = $inputs['Rate100_1'];
        $Questionnaire->AnnualPayroll1 = $inputs['AnnualPayroll1'];
        $Questionnaire->noofEE1 = $inputs['noofEE1'];
        
        $Questionnaire->JobDescription2 = $inputs['JobDescription2'];
        $Questionnaire->ClassCode2 = $inputs['ClassCode2'];
        $Questionnaire->Rate100_2 = $inputs['Rate100_2'];
        $Questionnaire->AnnualPayroll2 = $inputs['AnnualPayroll2'];
        $Questionnaire->noofEE2 = $inputs['noofEE2'];
        
        $Questionnaire->JobDescription3 = $inputs['JobDescription3'];
        $Questionnaire->ClassCode3 = $inputs['ClassCode3'];
        $Questionnaire->Rate100_3 = $inputs['Rate100_3'];
        $Questionnaire->AnnualPayroll3 = $inputs['AnnualPayroll3'];
        $Questionnaire->noofEE3 = $inputs['noofEE3'];
        
        $Questionnaire->JobDescription4 = $inputs['JobDescription4'];
        $Questionnaire->ClassCode4 = $inputs['ClassCode4'];
        $Questionnaire->Rate100_4 = $inputs['Rate100_4'];
        $Questionnaire->AnnualPayroll4 = $inputs['AnnualPayroll4'];
        $Questionnaire->noofEE4 = $inputs['noofEE4'];
        
        $Questionnaire->JobDescription5 = $inputs['JobDescription5'];
        $Questionnaire->ClassCode5 = $inputs['ClassCode5'];
        $Questionnaire->Rate100_5 = $inputs['Rate100_5'];
        $Questionnaire->AnnualPayroll5 = $inputs['AnnualPayroll5'];
        $Questionnaire->noofEE5 = $inputs['noofEE5'];
        
        $Questionnaire->JobDescription6 = $inputs['JobDescription6'];
        $Questionnaire->ClassCode6 = $inputs['ClassCode6'];
        $Questionnaire->Rate100_6 = $inputs['Rate100_6'];
        $Questionnaire->AnnualPayroll6 = $inputs['AnnualPayroll6'];
        $Questionnaire->noofEE6 = $inputs['noofEE6'];
        
        $Questionnaire->JobDescription7 = $inputs['JobDescription7'];
        $Questionnaire->ClassCode7 = $inputs['ClassCode7'];
        $Questionnaire->Rate100_7 = $inputs['Rate100_7'];
        $Questionnaire->AnnualPayroll7 = $inputs['AnnualPayroll7'];
        $Questionnaire->noofEE7 = $inputs['noofEE7'];
        if(isset($inputs['PayrollFrequency']))
        {
        $Questionnaire->PayrollFrequency = implode(",",$inputs['PayrollFrequency']);
        }
        $Questionnaire->CurrentCostPayroll = $inputs['CurrentCostPayroll'];
        $Questionnaire->CurrentofHR = $inputs['CurrentofHR'];
        $Questionnaire->CurrentStateUnemployment = $inputs['CurrentStateUnemployment'];
        $Questionnaire->WorkersCompensationModifier = $inputs['WorkersCompensationModifier'];
        $Questionnaire->DesiredStartDate = $inputs['DesiredStartDate'];
        $Questionnaire->EmployerCurrentlyBenefits = $inputs['EmployerCurrentlyBenefits'];
        $Questionnaire->NetPEOHRBenefits = $inputs['NetPEOHRBenefits'];
        $Questionnaire->EmployerCurrently401 = $inputs['EmployerCurrently401'];
        $Questionnaire->NetPEOHR401 = $inputs['NetPEOHR401'];
        
        $Questionnaire->save();
             
       return 'Added';
    }
    
    public function request_for_compansation(Request $request)
    {
		
		if(Auth::user()->usertype !='Broker')
		{
	        return redirect('/');
		}
		
         ini_set('error_reporting', E_STRICT);
        $data =  \Input::except(array('_token')) ;
        
        $inputs = $request->all();
        $rule=array();
        $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                 return view('broker.pages.form_error_message')->withErrors($validator->messages());
        } 
        $icons = $request->file('icon');
         $counts=count($icons);
         $attachments=array();
        if($icons[0])
        {
        foreach($icons as $key=>$icon)
        {
            
            $imageName = $key.rand().time().'.'.$icon->getClientOriginalExtension();
            $icon->move(public_path('/attachments'), $imageName);
            array_push($attachments,$imageName);
        }
        }
        
        
        
        $Compensation = new Compensation;
        $Compensation->acc_agency_and_address = $inputs['acc_agency_and_address'];
        $Compensation->lead_WORKERSCOMPENSATION_id = $inputs['lead_WORKERSCOMPENSATION_id'];
        $Compensation->attachments = implode(",",$attachments);
        $Compensation->acc_producer_name = $inputs['acc_producer_name'];
        $Compensation->acc_repersantive_name = $inputs['acc_repersantive_name'];
        $Compensation->acc_agency_office_name = $inputs['acc_agency_office_name'];
        $Compensation->acc_agency_mobile_name = $inputs['acc_agency_mobile_name'];
        $Compensation->acc_agency_fax_no = $inputs['acc_agency_fax_no'];
        $Compensation->acc_agency_email = $inputs['acc_agency_email'];
        $Compensation->acc_agency_code = $inputs['acc_agency_code'];
        $Compensation->acc_agency_sub_code = $inputs['acc_agency_sub_code'];
        $Compensation->acc_agency_customer_id = $inputs['acc_agency_customer_id'];
        $Compensation->acc_company = $inputs['acc_company'];
        $Compensation->acc_underwriter = $inputs['acc_underwriter'];
        $Compensation->acc_applicant_name = $inputs['acc_applicant_name'];
        $Compensation->acc_office_phone = $inputs['acc_office_phone'];
        $Compensation->acc_mobile_phone = $inputs['acc_mobile_phone'];
        $Compensation->acc_mailing_address = $inputs['acc_mailing_address'];
        $Compensation->acc_yrs_in_bus = $inputs['acc_yrs_in_bus'];
        $Compensation->acc_sic = $inputs['acc_sic'];
        $Compensation->acc_naics = $inputs['acc_naics'];
        $Compensation->acc_web_adderss = $inputs['acc_web_adderss'];
        $Compensation->acc_company_email_address = $inputs['acc_company_email_address'];
        $Compensation->acc_company_credit_bureau_name = $inputs['acc_company_credit_bureau_name'];
        $Compensation->acc_company_id_number = $inputs['acc_company_id_number'];
        $Compensation->acc_fedral_no = $inputs['acc_fedral_no'];
        $Compensation->acc_ncci_risk_no = $inputs['acc_ncci_risk_no'];
        $Compensation->acc_other_bureau_id = $inputs['acc_other_bureau_id'];
        $Compensation->acc_PROPOSED_eff_date = $inputs['acc_PROPOSED_eff_date'];
        $Compensation->acc_PROPOSED_exp_date = $inputs['acc_PROPOSED_exp_date'];
        $Compensation->acc_annivertsary_date = $inputs['acc_annivertsary_date'];
        $Compensation->acc_retro_plan = $inputs['acc_retro_plan'];
        $Compensation->acc_PARTICIPATING = $inputs['acc_PARTICIPATING'];
        $Compensation->acc_WORKERSCOMPENSATION_state = $inputs['acc_WORKERSCOMPENSATION_state'];
        $Compensation->acc_par2_liblaty_each_accident = $inputs['acc_par2_liblaty_each_accident'];
        $Compensation->acc_par2_liblaty_diseases_pol = $inputs['acc_par2_liblaty_diseases_pol'];
        $Compensation->acc_par2_liblaty_diseses_each_emp = $inputs['acc_par2_liblaty_diseses_each_emp'];
        $Compensation->acc_OTHERSTATES_ins = $inputs['acc_OTHERSTATES_ins'];
        $Compensation->acc_AMOUNT_na_wi = $inputs['acc_AMOUNT_na_wi'];
        $Compensation->acc_DIVIDEND_safty_group = $inputs['acc_DIVIDEND_safty_group'];
        $Compensation->acc__additional_company_issuie = $inputs['acc__additional_company_issuie'];
        $Compensation->acc__specify_additional_coverage = $inputs['acc__specify_additional_coverage'];
        $Compensation->acc_total_estimate_annual = $inputs['acc_total_estimate_annual'];
        $Compensation->acc_total_minimum_premium = $inputs['acc_total_minimum_premium'];
        $Compensation->acc_total_deposite_premium = $inputs['acc_total_deposite_premium'];
        $Compensation->acc_RATINGINFORMATIONstate = $inputs['acc_RATINGINFORMATIONstate'];
        $Compensation->acc_remarks = $inputs['acc_remarks'];
        $Compensation->acc_nature_description = $inputs['acc_nature_description'];
        $Compensation->acc_remarks = $inputs['acc_remarks'];
        $Compensation->acc_nature_description = $inputs['acc_nature_description'];
        $Compensation->acc_watercraft_yes_no = $inputs['acc_watercraft_yes_no'];
        $Compensation->acc_DISCONTINUED_OPERATIONS = $inputs['acc_DISCONTINUED_OPERATIONS'];
        $Compensation->acc_above_under15 = $inputs['acc_above_under15'];
        $Compensation->acc_BRIDGE_over_water = $inputs['acc_BRIDGE_over_water'];
        $Compensation->acc_any_other_busness = $inputs['acc_any_other_busness'];
        $Compensation->acc_sub_contracted = $inputs['acc_sub_contracted'];
        $Compensation->acc_without_insurance = $inputs['acc_without_insurance'];
        $Compensation->acc_writen_safty_program = $inputs['acc_writen_safty_program'];
        $Compensation->acc_group_transportation = $inputs['acc_group_transportation'];
        $Compensation->acc_employees_under16 = $inputs['acc_employees_under16'];
        $Compensation->acc_seasonal_employee = $inputs['acc_seasonal_employee'];
        $Compensation->acc_volunteer_donated = $inputs['acc_volunteer_donated'];
        $Compensation->acc_employees_handicaped = $inputs['acc_employees_handicaped'];
        $Compensation->acc_employees_travel_out_state = $inputs['acc_employees_travel_out_state'];
        $Compensation->acc_atheletic_team = $inputs['acc_atheletic_team'];
        $Compensation->acc_physical_required = $inputs['acc_physical_required'];
        $Compensation->acc_other_insurance = $inputs['acc_other_insurance'];
        $Compensation->acc_prior_coverage = $inputs['acc_prior_coverage'];
        $Compensation->acc_employees_health_plan = $inputs['acc_employees_health_plan'];
        $Compensation->acc_employees_buisness_subdieries = $inputs['acc_employees_buisness_subdieries'];
        $Compensation->acc_employees_lease = $inputs['acc_employees_lease'];
        $Compensation->acc_employees_PREDOMINANTLY_work = $inputs['acc_employees_PREDOMINANTLY_work'];
        $Compensation->acc_tax_liens_5hours = $inputs['acc_tax_liens_5hours'];
        $Compensation->acc_UNDISPUTED_unpaid_work = $inputs['acc_UNDISPUTED_unpaid_work'];
        if(isset($inputs['company_etra_details']))
        {
        $Compensation->company_etra_details = implode(",",$inputs['company_etra_details']);
        }
        if(isset($inputs['acc_billing_plan']))
        {
        $Compensation->acc_billing_plan = implode(",",$inputs['acc_billing_plan']);
        }
        if(isset($inputs['acc_payment_plan']))
        {
        $Compensation->acc_payment_plan = implode(",",$inputs['acc_payment_plan']);
        }
        if(isset($inputs['acc_audit']))
        {
        $Compensation->acc_audit = implode(",",$inputs['acc_audit']);
        }
        if(isset($inputs['acc_DEDUCTIBLES_wi']))
        {
        $Compensation->acc_DEDUCTIBLES_wi = implode(",",$inputs['acc_DEDUCTIBLES_wi']);
        }
        if(isset($inputs['acc_other_coverage']))
        {
        $Compensation->acc_other_coverage = implode(",",$inputs['acc_other_coverage']);
        }
        $Compensation->save();
        
        
        $CompensationContact = new CompensationContact;
        $CompensationContact->compensation_id = $Compensation->id;
        $CompensationContact->contact_info_name1 = $inputs['contact_info_name1'];
        $CompensationContact->contact_info_office_phone1 = $inputs['contact_info_office_phone1'];
        $CompensationContact->contact_info_mobile_1 = $inputs['contact_info_mobile_1'];
        $CompensationContact->contact_info_email_1 = $inputs['contact_info_email_1'];
        $CompensationContact->contact_info_name2 = $inputs['contact_info_name2'];
        $CompensationContact->contact_info_office_phone2 = $inputs['contact_info_office_phone2'];
        $CompensationContact->contact_info_mobile_2 = $inputs['contact_info_mobile_2'];
        $CompensationContact->contact_info_email_2 = $inputs['contact_info_email_2'];
        $CompensationContact->contact_info_name3 = $inputs['contact_info_name3'];
        $CompensationContact->contact_info_office_phone3 = $inputs['contact_info_office_phone3'];
        $CompensationContact->contact_info_mobile_3 = $inputs['contact_info_mobile_3'];
        $CompensationContact->contact_info_email_3 = $inputs['contact_info_email_3'];
        $CompensationContact->contact_info_name4 = $inputs['contact_info_name4'];
        $CompensationContact->contact_info_office_phone4 = $inputs['contact_info_office_phone4'];
        $CompensationContact->contact_info_mobile_4 = $inputs['contact_info_mobile_4'];
        $CompensationContact->contact_info_email_4 = $inputs['contact_info_email_4'];
        $CompensationContact->contact_info_name5 = $inputs['contact_info_name5'];
        $CompensationContact->contact_info_office_phone5 = $inputs['contact_info_office_phone5'];
        $CompensationContact->contact_info_mobile_5 = $inputs['contact_info_mobile_5'];
        $CompensationContact->contact_info_email_5 = $inputs['contact_info_email_5'];
        $CompensationContact->save();
        
        $CompensationIndivisual = new CompensationIndivisual;
        $CompensationIndivisual->compensation_id = $Compensation->id;
        $CompensationIndivisual->INDIVIDUALS_INCLUDED_state1 = $inputs['INDIVIDUALS_INCLUDED_state1'];
        $CompensationIndivisual->INDIVIDUALS_INCLUDED_loc1 = $inputs['INDIVIDUALS_INCLUDED_loc1'];
        $CompensationIndivisual->INDIVIDUALS_INCLUDED_name1 = $inputs['INDIVIDUALS_INCLUDED_name1'];
        $CompensationIndivisual->INDIVIDUALS_INCLUDED_dob1 = $inputs['INDIVIDUALS_INCLUDED_dob1'];
        $CompensationIndivisual->INDIVIDUALS_INCLUDED_title1 = $inputs['INDIVIDUALS_INCLUDED_title1'];
        $CompensationIndivisual->INDIVIDUALS_INCLUDED_ownership1 = $inputs['INDIVIDUALS_INCLUDED_ownership1'];
        $CompensationIndivisual->INDIVIDUALS_INCLUDED_duty1 = $inputs['INDIVIDUALS_INCLUDED_duty1'];
        $CompensationIndivisual->INDIVIDUALS_INCLUDED_inc1 = $inputs['INDIVIDUALS_INCLUDED_inc1'];
        $CompensationIndivisual->INDIVIDUALS_INCLUDED_class1 = $inputs['INDIVIDUALS_INCLUDED_class1'];
        $CompensationIndivisual->INDIVIDUALS_INCLUDED_payrol1 = $inputs['INDIVIDUALS_INCLUDED_payrol1'];
        $CompensationIndivisual->INDIVIDUALS_INCLUDED_state2 = $inputs['INDIVIDUALS_INCLUDED_state2'];
        $CompensationIndivisual->INDIVIDUALS_INCLUDED_loc2 = $inputs['INDIVIDUALS_INCLUDED_loc2'];
        $CompensationIndivisual->INDIVIDUALS_INCLUDED_name2 = $inputs['INDIVIDUALS_INCLUDED_name2'];
        $CompensationIndivisual->INDIVIDUALS_INCLUDED_dob2 = $inputs['INDIVIDUALS_INCLUDED_dob2'];
        $CompensationIndivisual->INDIVIDUALS_INCLUDED_title2 = $inputs['INDIVIDUALS_INCLUDED_title2'];
        $CompensationIndivisual->INDIVIDUALS_INCLUDED_ownership2 = $inputs['INDIVIDUALS_INCLUDED_ownership2'];
        $CompensationIndivisual->INDIVIDUALS_INCLUDED_duty2 = $inputs['INDIVIDUALS_INCLUDED_duty2'];
        $CompensationIndivisual->INDIVIDUALS_INCLUDED_inc2 = $inputs['INDIVIDUALS_INCLUDED_inc2'];
        $CompensationIndivisual->INDIVIDUALS_INCLUDED_class2 = $inputs['INDIVIDUALS_INCLUDED_class2'];
        $CompensationIndivisual->INDIVIDUALS_INCLUDED_payrol2 = $inputs['INDIVIDUALS_INCLUDED_payrol2'];
        $CompensationIndivisual->INDIVIDUALS_INCLUDED_state3 = $inputs['INDIVIDUALS_INCLUDED_state3'];
        $CompensationIndivisual->INDIVIDUALS_INCLUDED_loc3 = $inputs['INDIVIDUALS_INCLUDED_loc3'];
        $CompensationIndivisual->INDIVIDUALS_INCLUDED_name3 = $inputs['INDIVIDUALS_INCLUDED_name3'];
        $CompensationIndivisual->INDIVIDUALS_INCLUDED_dob3 = $inputs['INDIVIDUALS_INCLUDED_dob3'];
        $CompensationIndivisual->INDIVIDUALS_INCLUDED_title3 = $inputs['INDIVIDUALS_INCLUDED_title3'];
        $CompensationIndivisual->INDIVIDUALS_INCLUDED_ownership3 = $inputs['INDIVIDUALS_INCLUDED_ownership3'];
        $CompensationIndivisual->INDIVIDUALS_INCLUDED_duty3 = $inputs['INDIVIDUALS_INCLUDED_duty3'];
        $CompensationIndivisual->INDIVIDUALS_INCLUDED_inc3 = $inputs['INDIVIDUALS_INCLUDED_inc3'];
        $CompensationIndivisual->INDIVIDUALS_INCLUDED_class3 = $inputs['INDIVIDUALS_INCLUDED_class3'];
        $CompensationIndivisual->INDIVIDUALS_INCLUDED_payrol3 = $inputs['INDIVIDUALS_INCLUDED_payrol3'];
        $CompensationIndivisual->INDIVIDUALS_INCLUDED_state4 = $inputs['INDIVIDUALS_INCLUDED_state4'];
        $CompensationIndivisual->INDIVIDUALS_INCLUDED_loc4 = $inputs['INDIVIDUALS_INCLUDED_loc4'];
        $CompensationIndivisual->INDIVIDUALS_INCLUDED_name4 = $inputs['INDIVIDUALS_INCLUDED_name4'];
        $CompensationIndivisual->INDIVIDUALS_INCLUDED_dob4 = $inputs['INDIVIDUALS_INCLUDED_dob4'];
        $CompensationIndivisual->INDIVIDUALS_INCLUDED_title4 = $inputs['INDIVIDUALS_INCLUDED_title4'];
        $CompensationIndivisual->INDIVIDUALS_INCLUDED_ownership4 = $inputs['INDIVIDUALS_INCLUDED_ownership4'];
        $CompensationIndivisual->INDIVIDUALS_INCLUDED_duty4 = $inputs['INDIVIDUALS_INCLUDED_duty4'];
        $CompensationIndivisual->INDIVIDUALS_INCLUDED_inc4 = $inputs['INDIVIDUALS_INCLUDED_inc4'];
        $CompensationIndivisual->INDIVIDUALS_INCLUDED_class4 = $inputs['INDIVIDUALS_INCLUDED_class4'];
        $CompensationIndivisual->INDIVIDUALS_INCLUDED_payrol4 = $inputs['INDIVIDUALS_INCLUDED_payrol4'];
        $CompensationIndivisual->save();
        
        $CompensationRating = new CompensationRating;
        $CompensationRating->compensation_id = $Compensation->id;
        $CompensationRating->RATING_LOC_no1 = $inputs['RATING_LOC_no1'];
        $CompensationRating->RATING_class_code1 = $inputs['RATING_class_code1'];
        $CompensationRating->RATING_DESCR_code1 = $inputs['RATING_DESCR_code1'];
        $CompensationRating->RATING_CATEGORIES1 = $inputs['RATING_CATEGORIES1'];
        $CompensationRating->RATING_fullemp1 = $inputs['RATING_fullemp1'];
        $CompensationRating->RATING_partemp1 = $inputs['RATING_partemp1'];
        $CompensationRating->RATING_sic1 = $inputs['RATING_sic1'];
        $CompensationRating->RATING_NAICS1 = $inputs['RATING_NAICS1'];
        $CompensationRating->RATING_PAYROLL1 = $inputs['RATING_PAYROLL1'];
        $CompensationRating->RATING_RATE1 = $inputs['RATING_RATE1'];
        $CompensationRating->RATING_PREMIUM1 = $inputs['RATING_PREMIUM1'];
        $CompensationRating->RATING_LOC_no2 = $inputs['RATING_LOC_no2'];
        $CompensationRating->RATING_class_code2 = $inputs['RATING_class_code2'];
        $CompensationRating->RATING_DESCR_code2 = $inputs['RATING_DESCR_code2'];
        $CompensationRating->RATING_CATEGORIES2 = $inputs['RATING_CATEGORIES2'];
        $CompensationRating->RATING_fullemp2 = $inputs['RATING_fullemp2'];
        $CompensationRating->RATING_partemp2 = $inputs['RATING_partemp2'];
        $CompensationRating->RATING_sic2 = $inputs['RATING_sic2'];
        $CompensationRating->RATING_NAICS2 = $inputs['RATING_NAICS2'];
        $CompensationRating->RATING_PAYROLL2 = $inputs['RATING_PAYROLL2'];
        $CompensationRating->RATING_RATE2 = $inputs['RATING_RATE2'];
        $CompensationRating->RATING_PREMIUM2 = $inputs['RATING_PREMIUM2'];
        $CompensationRating->RATING_LOC_no3 = $inputs['RATING_LOC_no3'];
        $CompensationRating->RATING_class_code3 = $inputs['RATING_class_code3'];
        $CompensationRating->RATING_DESCR_code3 = $inputs['RATING_DESCR_code3'];
        $CompensationRating->RATING_CATEGORIES3 = $inputs['RATING_CATEGORIES3'];
        $CompensationRating->RATING_fullemp3 = $inputs['RATING_fullemp3'];
        $CompensationRating->RATING_partemp3 = $inputs['RATING_partemp3'];
        $CompensationRating->RATING_sic3 = $inputs['RATING_sic3'];
        $CompensationRating->RATING_NAICS3 = $inputs['RATING_NAICS3'];
        $CompensationRating->RATING_PAYROLL3 = $inputs['RATING_PAYROLL3'];
        $CompensationRating->RATING_RATE3 = $inputs['RATING_RATE3'];
        $CompensationRating->RATING_PREMIUM3 = $inputs['RATING_PREMIUM3'];
        $CompensationRating->RATING_LOC_no4 = $inputs['RATING_LOC_no4'];
        $CompensationRating->RATING_class_code4 = $inputs['RATING_class_code4'];
        $CompensationRating->RATING_DESCR_code4 = $inputs['RATING_DESCR_code4'];
        $CompensationRating->RATING_CATEGORIES4 = $inputs['RATING_CATEGORIES4'];
        $CompensationRating->RATING_fullemp4 = $inputs['RATING_fullemp4'];
        $CompensationRating->RATING_partemp4 = $inputs['RATING_partemp4'];
        $CompensationRating->RATING_sic4 = $inputs['RATING_sic4'];
        $CompensationRating->RATING_NAICS4 = $inputs['RATING_NAICS4'];
        $CompensationRating->RATING_PAYROLL4 = $inputs['RATING_PAYROLL4'];
        $CompensationRating->RATING_RATE4 = $inputs['RATING_RATE4'];
        $CompensationRating->RATING_PREMIUM4 = $inputs['RATING_PREMIUM4'];
        $CompensationRating->RATING_LOC_no5 = $inputs['RATING_LOC_no5'];
        $CompensationRating->RATING_class_code5 = $inputs['RATING_class_code5'];
        $CompensationRating->RATING_DESCR_code5 = $inputs['RATING_DESCR_code5'];
        $CompensationRating->RATING_CATEGORIES5 = $inputs['RATING_CATEGORIES5'];
        $CompensationRating->RATING_fullemp5 = $inputs['RATING_fullemp5'];
        $CompensationRating->RATING_partemp5 = $inputs['RATING_partemp5'];
        $CompensationRating->RATING_sic5 = $inputs['RATING_sic5'];
        $CompensationRating->RATING_NAICS5 = $inputs['RATING_NAICS5'];
        $CompensationRating->RATING_PAYROLL5 = $inputs['RATING_PAYROLL5'];
        $CompensationRating->RATING_RATE5 = $inputs['RATING_RATE5'];
        $CompensationRating->RATING_PREMIUM5 = $inputs['RATING_PREMIUM5'];
        $CompensationRating->RATING_LOC_no6 = $inputs['RATING_LOC_no6'];
        $CompensationRating->RATING_class_code6 = $inputs['RATING_class_code6'];
        $CompensationRating->RATING_DESCR_code6 = $inputs['RATING_DESCR_code6'];
        $CompensationRating->RATING_CATEGORIES6 = $inputs['RATING_CATEGORIES6'];
        $CompensationRating->RATING_fullemp6 = $inputs['RATING_fullemp6'];
        $CompensationRating->RATING_partemp6 = $inputs['RATING_partemp6'];
        $CompensationRating->RATING_sic6 = $inputs['RATING_sic6'];
        $CompensationRating->RATING_NAICS6 = $inputs['RATING_NAICS6'];
        $CompensationRating->RATING_PAYROLL6 = $inputs['RATING_PAYROLL6'];
        $CompensationRating->RATING_RATE6 = $inputs['RATING_RATE6'];
        $CompensationRating->RATING_PREMIUM6 = $inputs['RATING_PREMIUM6'];
        $CompensationRating->RATING_LOC_no7 = $inputs['RATING_LOC_no7'];
        $CompensationRating->RATING_class_code7 = $inputs['RATING_class_code7'];
        $CompensationRating->RATING_DESCR_code7 = $inputs['RATING_DESCR_code7'];
        $CompensationRating->RATING_CATEGORIES7 = $inputs['RATING_CATEGORIES7'];
        $CompensationRating->RATING_fullemp7 = $inputs['RATING_fullemp7'];
        $CompensationRating->RATING_partemp7 = $inputs['RATING_partemp7'];
        $CompensationRating->RATING_sic7 = $inputs['RATING_sic7'];
        $CompensationRating->RATING_NAICS7 = $inputs['RATING_NAICS7'];
        $CompensationRating->RATING_PAYROLL7 = $inputs['RATING_PAYROLL7'];
        $CompensationRating->RATING_RATE7 = $inputs['RATING_RATE7'];
        $CompensationRating->RATING_PREMIUM7 = $inputs['RATING_PREMIUM7'];
        $CompensationRating->RATING_LOC_no8 = $inputs['RATING_LOC_no8'];
        $CompensationRating->RATING_class_code8 = $inputs['RATING_class_code8'];
        $CompensationRating->RATING_DESCR_code8 = $inputs['RATING_DESCR_code8'];
        $CompensationRating->RATING_CATEGORIES8 = $inputs['RATING_CATEGORIES8'];
        $CompensationRating->RATING_fullemp8 = $inputs['RATING_fullemp8'];
        $CompensationRating->RATING_partemp8 = $inputs['RATING_partemp8'];
        $CompensationRating->RATING_sic8 = $inputs['RATING_sic8'];
        $CompensationRating->RATING_NAICS8 = $inputs['RATING_NAICS8'];
        $CompensationRating->RATING_PAYROLL8 = $inputs['RATING_PAYROLL8'];
        $CompensationRating->RATING_RATE8 = $inputs['RATING_RATE8'];
        $CompensationRating->RATING_PREMIUM8 = $inputs['RATING_PREMIUM8'];
        $CompensationRating->RATING_LOC_no9 = $inputs['RATING_LOC_no9'];
        $CompensationRating->RATING_class_code9 = $inputs['RATING_class_code9'];
        $CompensationRating->RATING_DESCR_code9 = $inputs['RATING_DESCR_code9'];
        $CompensationRating->RATING_CATEGORIES9 = $inputs['RATING_CATEGORIES9'];
        $CompensationRating->RATING_fullemp9 = $inputs['RATING_fullemp9'];
        $CompensationRating->RATING_partemp9 = $inputs['RATING_partemp9'];
        $CompensationRating->RATING_sic9 = $inputs['RATING_sic9'];
        $CompensationRating->RATING_NAICS9 = $inputs['RATING_NAICS9'];
        $CompensationRating->RATING_PAYROLL9 = $inputs['RATING_PAYROLL9'];
        $CompensationRating->RATING_RATE9 = $inputs['RATING_RATE9'];
        $CompensationRating->RATING_PREMIUM9 = $inputs['RATING_PREMIUM9'];
        $CompensationRating->RATING_LOC_no10 = $inputs['RATING_LOC_no10'];
        $CompensationRating->RATING_class_code10 = $inputs['RATING_class_code10'];
        $CompensationRating->RATING_DESCR_code10 = $inputs['RATING_DESCR_code10'];
        $CompensationRating->RATING_CATEGORIES10 = $inputs['RATING_CATEGORIES10'];
        $CompensationRating->RATING_fullemp10 = $inputs['RATING_fullemp10'];
        $CompensationRating->RATING_partemp10 = $inputs['RATING_partemp10'];
        $CompensationRating->RATING_sic10 = $inputs['RATING_sic10'];
        $CompensationRating->RATING_NAICS10 = $inputs['RATING_NAICS10'];
        $CompensationRating->RATING_PAYROLL10 = $inputs['RATING_PAYROLL10'];
        $CompensationRating->RATING_RATE10 = $inputs['RATING_RATE10'];
        $CompensationRating->RATING_PREMIUM10 = $inputs['RATING_PREMIUM10'];
        $CompensationRating->RATING_LOC_no11 = $inputs['RATING_LOC_no11'];
        $CompensationRating->RATING_class_code11 = $inputs['RATING_class_code11'];
        $CompensationRating->RATING_DESCR_code11 = $inputs['RATING_DESCR_code11'];
        $CompensationRating->RATING_CATEGORIES11 = $inputs['RATING_CATEGORIES11'];
        $CompensationRating->RATING_fullemp11 = $inputs['RATING_fullemp11'];
        $CompensationRating->RATING_partemp11 = $inputs['RATING_partemp11'];
        $CompensationRating->RATING_sic11 = $inputs['RATING_sic11'];
        $CompensationRating->RATING_NAICS11 = $inputs['RATING_NAICS11'];
        $CompensationRating->RATING_PAYROLL11 = $inputs['RATING_PAYROLL11'];
        $CompensationRating->RATING_RATE11 = $inputs['RATING_RATE11'];
        $CompensationRating->RATING_PREMIUM11 = $inputs['RATING_PREMIUM11'];
        $CompensationRating->RATING_LOC_no12 = $inputs['RATING_LOC_no12'];
        $CompensationRating->RATING_class_code12 = $inputs['RATING_class_code12'];
        $CompensationRating->RATING_DESCR_code12 = $inputs['RATING_DESCR_code12'];
        $CompensationRating->RATING_CATEGORIES12 = $inputs['RATING_CATEGORIES12'];
        $CompensationRating->RATING_fullemp12 = $inputs['RATING_fullemp12'];
        $CompensationRating->RATING_partemp12 = $inputs['RATING_partemp12'];
        $CompensationRating->RATING_sic12 = $inputs['RATING_sic12'];
        $CompensationRating->RATING_NAICS12 = $inputs['RATING_NAICS12'];
        $CompensationRating->RATING_PAYROLL12 = $inputs['RATING_PAYROLL12'];
        $CompensationRating->RATING_RATE12 = $inputs['RATING_RATE12'];
        $CompensationRating->RATING_PREMIUM12 = $inputs['RATING_PREMIUM12'];
        $CompensationRating->RATING_LOC_no13 = $inputs['RATING_LOC_no13'];
        $CompensationRating->RATING_class_code13 = $inputs['RATING_class_code13'];
        $CompensationRating->RATING_DESCR_code13 = $inputs['RATING_DESCR_code13'];
        $CompensationRating->RATING_CATEGORIES13 = $inputs['RATING_CATEGORIES13'];
        $CompensationRating->RATING_fullemp13 = $inputs['RATING_fullemp13'];
        $CompensationRating->RATING_partemp13 = $inputs['RATING_partemp13'];
        $CompensationRating->RATING_sic13 = $inputs['RATING_sic13'];
        $CompensationRating->RATING_NAICS13 = $inputs['RATING_NAICS13'];
        $CompensationRating->RATING_PAYROLL13 = $inputs['RATING_PAYROLL13'];
        $CompensationRating->RATING_RATE13 = $inputs['RATING_RATE13'];
        $CompensationRating->RATING_PREMIUM13 = $inputs['RATING_PREMIUM13'];
        $CompensationRating->RATING_LOC_no14 = $inputs['RATING_LOC_no14'];
        $CompensationRating->RATING_class_code14 = $inputs['RATING_class_code14'];
        $CompensationRating->RATING_DESCR_code14 = $inputs['RATING_DESCR_code14'];
        $CompensationRating->RATING_CATEGORIES14 = $inputs['RATING_CATEGORIES14'];
        $CompensationRating->RATING_fullemp14 = $inputs['RATING_fullemp14'];
        $CompensationRating->RATING_partemp14 = $inputs['RATING_partemp14'];
        $CompensationRating->RATING_sic14 = $inputs['RATING_sic14'];
        $CompensationRating->RATING_NAICS14 = $inputs['RATING_NAICS14'];
        $CompensationRating->RATING_PAYROLL14 = $inputs['RATING_PAYROLL14'];
        $CompensationRating->RATING_RATE14 = $inputs['RATING_RATE14'];
        $CompensationRating->RATING_PREMIUM14 = $inputs['RATING_PREMIUM14'];
        $CompensationRating->save();
        
        $CompensationPremiumstate = new CompensationPremiumstate;
        $CompensationPremiumstate->compensation_id = $Compensation->id;
        $CompensationPremiumstate->PREMIUM_STATEFACTORED1 = $inputs['PREMIUM_STATEFACTORED1'];
        $CompensationPremiumstate->PREMIUM_FACTOR1 = $inputs['PREMIUM_FACTOR1'];
        $CompensationPremiumstate->PREMIUM_FACTORED1 = $inputs['PREMIUM_FACTORED1'];
        $CompensationPremiumstate->PREMIUM_STATEFACTOR2 = $inputs['PREMIUM_STATEFACTOR2'];
        $CompensationPremiumstate->PREMIUM_STATEFACTORED2 = $inputs['PREMIUM_STATEFACTORED2'];
        $CompensationPremiumstate->PREMIUM_FACTOR2 = $inputs['PREMIUM_FACTOR2'];
        $CompensationPremiumstate->PREMIUM_FACTORED2 = $inputs['PREMIUM_FACTORED2'];
        $CompensationPremiumstate->PREMIUM_STATEFACTOR3 = $inputs['PREMIUM_STATEFACTOR3'];
        $CompensationPremiumstate->PREMIUM_STATEFACTORED3 = $inputs['PREMIUM_STATEFACTORED3'];
        $CompensationPremiumstate->PREMIUM_FACTOR3 = $inputs['PREMIUM_FACTOR3'];
        $CompensationPremiumstate->PREMIUM_FACTORED3 = $inputs['PREMIUM_FACTORED3'];
        $CompensationPremiumstate->PREMIUM_STATEFACTOR4 = $inputs['PREMIUM_STATEFACTOR4'];
        $CompensationPremiumstate->PREMIUM_STATEFACTORED4 = $inputs['PREMIUM_STATEFACTORED4'];
        $CompensationPremiumstate->PREMIUM_FACTOR4 = $inputs['PREMIUM_FACTOR4'];
        $CompensationPremiumstate->PREMIUM_FACTORED4 = $inputs['PREMIUM_FACTORED4'];
        $CompensationPremiumstate->PREMIUM_STATEFACTOR5 = $inputs['PREMIUM_STATEFACTOR5'];
        $CompensationPremiumstate->PREMIUM_STATEFACTORED5 = $inputs['PREMIUM_STATEFACTORED5'];
        $CompensationPremiumstate->PREMIUM_FACTOR5 = $inputs['PREMIUM_FACTOR5'];
        $CompensationPremiumstate->PREMIUM_FACTORED5 = $inputs['PREMIUM_FACTORED5'];
        $CompensationPremiumstate->PREMIUM_STATEFACTOR6 = $inputs['PREMIUM_STATEFACTOR6'];
        $CompensationPremiumstate->PREMIUM_STATEFACTORED6 = $inputs['PREMIUM_STATEFACTORED6'];
        $CompensationPremiumstate->PREMIUM_FACTORED6 = $inputs['PREMIUM_FACTORED6'];
        $CompensationPremiumstate->PREMIUM_STATEFACTOR7 = $inputs['PREMIUM_STATEFACTOR7'];
        $CompensationPremiumstate->PREMIUM_STATEFACTORED7 = $inputs['PREMIUM_STATEFACTORED7'];
        $CompensationPremiumstate->PREMIUM_FACTORED7 = $inputs['PREMIUM_FACTORED7'];
        $CompensationPremiumstate->PREMIUM_STATEFACTOR8 = $inputs['PREMIUM_STATEFACTOR8'];
        $CompensationPremiumstate->PREMIUM_STATEFACTORED8 = $inputs['PREMIUM_STATEFACTORED8'];
        $CompensationPremiumstate->PREMIUM_FACTOR8 = $inputs['PREMIUM_FACTOR8'];
        $CompensationPremiumstate->PREMIUM_FACTORED8 = $inputs['PREMIUM_FACTORED8'];
        $CompensationPremiumstate->PREMIUM_total_ANNUAL_P = $inputs['PREMIUM_total_ANNUAL_P'];
        $CompensationPremiumstate->PREMIUM_MINIMUM_P = $inputs['PREMIUM_MINIMUM_P'];
        $CompensationPremiumstate->PREMIUM_DEPOSIT_P = $inputs['PREMIUM_DEPOSIT_P'];
        $CompensationPremiumstate->save();
        
        $CompensationPrior = new CompensationPrior;
        $CompensationPrior->compensation_id = $Compensation->id;
        $CompensationPrior->PRIOR_YEAR1_ = $inputs['PRIOR_YEAR1_'];
        $CompensationPrior->PRIOR_CARRIERNo1 = $inputs['PRIOR_CARRIERNo1'];
        $CompensationPrior->PRIOR_ANNUALPREMIUM1 = $inputs['PRIOR_ANNUALPREMIUM1'];
        $CompensationPrior->PRIOR_MOD1 = $inputs['PRIOR_MOD1'];
        $CompensationPrior->PRIOR_CLAIMS1 = $inputs['PRIOR_CLAIMS1'];
        $CompensationPrior->PRIOR_AMOUNTPAID1 = $inputs['PRIOR_AMOUNTPAID1'];
        $CompensationPrior->PRIOR_RESERVE1 = $inputs['PRIOR_RESERVE1'];
        $CompensationPrior->PRIOR_YEAR2_ = $inputs['PRIOR_YEAR2_'];
        $CompensationPrior->PRIOR_CARRIERNo2 = $inputs['PRIOR_CARRIERNo2'];
        $CompensationPrior->PRIOR_ANNUALPREMIUM2 = $inputs['PRIOR_ANNUALPREMIUM2'];
        $CompensationPrior->PRIOR_MOD2 = $inputs['PRIOR_MOD2'];
        $CompensationPrior->PRIOR_CLAIMS2 = $inputs['PRIOR_CLAIMS2'];
        $CompensationPrior->PRIOR_AMOUNTPAID2 = $inputs['PRIOR_AMOUNTPAID2'];
        $CompensationPrior->PRIOR_RESERVE2 = $inputs['PRIOR_RESERVE2'];
        $CompensationPrior->PRIOR_YEAR3_ = $inputs['PRIOR_YEAR3_'];
        $CompensationPrior->PRIOR_CARRIERNo3 = $inputs['PRIOR_CARRIERNo3'];
        $CompensationPrior->PRIOR_ANNUALPREMIUM3 = $inputs['PRIOR_ANNUALPREMIUM3'];
        $CompensationPrior->PRIOR_MOD3 = $inputs['PRIOR_MOD3'];
        $CompensationPrior->PRIOR_CLAIMS3 = $inputs['PRIOR_CLAIMS3'];
        $CompensationPrior->PRIOR_AMOUNTPAID3 = $inputs['PRIOR_AMOUNTPAID3'];
        $CompensationPrior->PRIOR_RESERVE3 = $inputs['PRIOR_RESERVE3'];
        $CompensationPrior->PRIOR_YEAR4 = $inputs['PRIOR_YEAR4'];
        $CompensationPrior->PRIOR_CARRIERNo4 = $inputs['PRIOR_CARRIERNo4'];
        $CompensationPrior->PRIOR_ANNUALPREMIUM4 = $inputs['PRIOR_ANNUALPREMIUM4'];
        $CompensationPrior->PRIOR_MOD4 = $inputs['PRIOR_MOD4'];
        $CompensationPrior->PRIOR_CLAIMS4 = $inputs['PRIOR_CLAIMS4'];
        $CompensationPrior->PRIOR_AMOUNTPAID4 = $inputs['PRIOR_AMOUNTPAID4'];
        $CompensationPrior->PRIOR_RESERVE4 = $inputs['PRIOR_RESERVE4'];
        $CompensationPrior->PRIOR_YEAR5 = $inputs['PRIOR_YEAR5'];
        $CompensationPrior->PRIOR_CARRIERNo5 = $inputs['PRIOR_CARRIERNo5'];
        $CompensationPrior->PRIOR_ANNUALPREMIUM5 = $inputs['PRIOR_ANNUALPREMIUM5'];
        $CompensationPrior->PRIOR_MOD5 = $inputs['PRIOR_MOD5'];
        $CompensationPrior->PRIOR_CLAIMS5 = $inputs['PRIOR_CLAIMS5'];
        $CompensationPrior->PRIOR_AMOUNTPAID5 = $inputs['PRIOR_AMOUNTPAID5'];
        $CompensationPrior->PRIOR_RESERVE5 = $inputs['PRIOR_RESERVE5'];
        $CompensationPrior->PRIOR_YEAR6 = $inputs['PRIOR_YEAR6'];
        $CompensationPrior->PRIOR_CARRIERNo6 = $inputs['PRIOR_CARRIERNo6'];
        $CompensationPrior->PRIOR_ANNUALPREMIUM6 = $inputs['PRIOR_ANNUALPREMIUM6'];
        $CompensationPrior->PRIOR_MOD6 = $inputs['PRIOR_MOD6'];
        $CompensationPrior->PRIOR_CLAIMS6 = $inputs['PRIOR_CLAIMS6'];
        $CompensationPrior->PRIOR_AMOUNTPAID6 = $inputs['PRIOR_AMOUNTPAID6'];
        $CompensationPrior->PRIOR_RESERVE6 = $inputs['PRIOR_RESERVE6'];
        $CompensationPrior->PRIOR_YEAR7 = $inputs['PRIOR_YEAR7'];
        $CompensationPrior->PRIOR_CARRIERNo7 = $inputs['PRIOR_CARRIERNo7'];
        $CompensationPrior->PRIOR_ANNUALPREMIUM7 = $inputs['PRIOR_ANNUALPREMIUM7'];
        $CompensationPrior->PRIOR_MOD7 = $inputs['PRIOR_MOD7'];
        $CompensationPrior->PRIOR_MOD7 = $inputs['PRIOR_MOD7'];
        $CompensationPrior->PRIOR_CLAIMS7 = $inputs['PRIOR_CLAIMS7'];
        $CompensationPrior->PRIOR_AMOUNTPAID7 = $inputs['PRIOR_AMOUNTPAID7'];
        $CompensationPrior->PRIOR_RESERVE7 = $inputs['PRIOR_RESERVE7'];
        $CompensationPrior->PRIOR_YEAR8 = $inputs['PRIOR_YEAR8'];
        $CompensationPrior->PRIOR_CARRIERNo8 = $inputs['PRIOR_CARRIERNo8'];
        $CompensationPrior->PRIOR_ANNUALPREMIUM8 = $inputs['PRIOR_ANNUALPREMIUM8'];
        $CompensationPrior->PRIOR_MOD8 = $inputs['PRIOR_MOD8'];
        $CompensationPrior->PRIOR_CLAIMS8 = $inputs['PRIOR_CLAIMS8'];
        $CompensationPrior->PRIOR_AMOUNTPAID8 = $inputs['PRIOR_AMOUNTPAID8'];
        $CompensationPrior->PRIOR_RESERVE8 = $inputs['PRIOR_RESERVE8'];
        $CompensationPrior->PRIOR_YEAR9 = $inputs['PRIOR_YEAR9'];
        $CompensationPrior->PRIOR_CARRIERNo9 = $inputs['PRIOR_CARRIERNo9'];
        $CompensationPrior->PRIOR_ANNUALPREMIUM9 = $inputs['PRIOR_ANNUALPREMIUM9'];
        $CompensationPrior->PRIOR_MOD9 = $inputs['PRIOR_MOD9'];
        $CompensationPrior->PRIOR_CLAIMS9 = $inputs['PRIOR_CLAIMS9'];
        $CompensationPrior->PRIOR_AMOUNTPAID9 = $inputs['PRIOR_AMOUNTPAID9'];
        $CompensationPrior->PRIOR_RESERVE9 = $inputs['PRIOR_RESERVE9'];
        $CompensationPrior->PRIOR_YEAR10 = $inputs['PRIOR_YEAR10'];
        $CompensationPrior->PRIOR_CARRIERNo10 = $inputs['PRIOR_CARRIERNo10'];
        $CompensationPrior->PRIOR_ANNUALPREMIUM10 = $inputs['PRIOR_ANNUALPREMIUM10'];
        $CompensationPrior->PRIOR_MOD10 = $inputs['PRIOR_MOD10'];
        $CompensationPrior->PRIOR_MOD10 = $inputs['PRIOR_MOD10'];
        $CompensationPrior->PRIOR_CLAIMS10 = $inputs['PRIOR_CLAIMS10'];
        $CompensationPrior->PRIOR_AMOUNTPAID10 = $inputs['PRIOR_AMOUNTPAID10'];
        $CompensationPrior->PRIOR_RESERVE10 = $inputs['PRIOR_RESERVE10'];
        $CompensationPrior->save();
        
        $lead_id=$inputs['lead_WORKERSCOMPENSATION_id'];
        $lead = LeadDetails::findOrFail($lead_id);
        $lead->publish_status='Publish';
        $lead->save();    
        \Session::flash('flash_message', 'Prospects Added Successfully.');
        return redirect('broker/allbrokerleads'); 

        
        
    }    
    public function search_desc_class_code(Request $request)
    {
        $rates =  Rates::where('Index_code',$request->code)->pluck('Description');
        return $rates[0];
        
    }
	public function viewquotes(Request $request){ 
        
		if(Auth::user()->usertype !='Broker')
		{
	        return redirect('/');
		}
		
		$alldata = DB::table('rfps_quotes')
			->leftjoin('users', 'rfps_quotes.company_id', '=', 'users.id')
			->select('rfps_quotes.id as quote_id','rfps_quotes.*','users.*')			
			->where('rfps_quotes.lead_id',$request->id)
            ->get();
		//echo "<pre>"; print_r($alldata); die;
			
        return view('broker.pages.viewquotes',[ 'getAllQuote' => $alldata]);
    }
	public function quotedetails(Request $request){ 
        
		if(Auth::user()->usertype !='Broker')
		{
	        return redirect('/');
		}
		
		$alldata = DB::table('rfps_quotes')
			->select('*')			
			->where('rfps_quotes.id',$request->id)
            ->get();
		
		//echo "<pre>"; print_r($alldata); die;
        
        return view('broker.pages.quotedetail',[ 'getQuote' => $alldata]);
    }
        
}