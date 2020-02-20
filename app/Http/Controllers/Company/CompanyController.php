<?php

namespace App\Http\Controllers\Company;

use Auth;
use DB;
use App\User;
use App\LeadDetails;
use App\Quote;
use App\AssignLeads;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Session;
use Intervention\Image\Facades\Image; 
use PDF;
class CompanyController extends MainCompanyController
{   
        private $country = array(
						'' => ' -- Select -- ',
						'1' => 'USA',
						'2' => 'INDIA',
						'3' => 'Canada',
						);
	private $state = array('' => ' -- Select -- ','AL'=>'ALABAMA','AK'=>'ALASKA','AS'=>'AMERICAN SAMOA',	'AZ'=>'ARIZONA','AR'=>'ARKANSAS','CA'=>'CALIFORNIA','CO'=>'COLORADO','CT'=>'CONNECTICUT','DE'=>'DELAWARE','DC'=>'DISTRICT OF COLUMBIA','FM'=>'FEDERATED STATES OF MICRONESIA','FL'=>'FLORIDA',
	'GA'=>'GEORGIA','GU'=>'GUAM GU','HI'=>'HAWAII','ID'=>'IDAHO','IL'=>'ILLINOIS','IN'=>'INDIANA','IA'=>'IOWA','KS'=>'KANSAS','KY'=>'KENTUCKY','LA'=>'LOUISIANA','ME'=>'MAINE','MH'=>'MARSHALL ISLANDS',	'MD'=>'MARYLAND','MA'=>'MASSACHUSETTS','MI'=>'MICHIGAN','MN'=>'MINNESOTA','MS'=>'MISSISSIPPI','MO'=>'MISSOURI','MT'=>'MONTANA','NE'=>'NEBRASKA','NV'=>'NEVADA','NH'=>'NEW HAMPSHIRE','NJ'=>'NEW JERSEY',
	'NM'=>'NEW MEXICO','NY'=>'NEW YORK','NC'=>'NORTH CAROLINA','ND'=>'NORTH DAKOTA','MP'=>'NORTHERN MARIANA ISLANDS','OH'=>'OHIO','OK'=>'OKLAHOMA','OR'=>'OREGON','PW'=>'PALAU','PA'=>'PENNSYLVANIA',
	'PR'=>'PUERTO RICO','RI'=>'RHODE ISLAND','SC'=>'SOUTH CAROLINA','SD'=>'SOUTH DAKOTA','TN'=>'TENNESSEE','TX'=>'TEXAS','UT'=>'UTAH','VT'=>'VERMONT','VI'=>'VIRGIN ISLANDS','VA'=>'VIRGINIA',	'WA'=>'WASHINGTON','WV'=>'WEST VIRGINIA','WI'=>'WISCONSIN',	'WY'=>'WYOMING','AE'=>'ARMED FORCES AFRICA \ CANADA \ EUROPE \ MIDDLE EAST','AA'=>'ARMED FORCES AMERICA (EXCEPT CANADA)','AP'=>'ARMED FORCES PACIFIC');
	private $city = array('' => ' -- Select -- ','New York'=>'New York','Los Angeles'=>'Los Angeles','Chicago'=>'Chicago','Houston'=>'Houston','Philadelphia'=>'Philadelphia','Phoenix'=>'Phoenix',
	'San Antonio'=>'San Antonio','San Diego'=>'San Diego','Dallas'=>'Dallas','San Jose'=>'San Jose','Austin'=>'Austin','Jacksonville'=>'Jacksonville','San Francisco'=>'San Francisco','Indianapolis'=>'Indianapolis','Columbus'=>'Columbus','Fort Worth'=>'Fort Worth','Charlotte'=>'Charlotte','Seattle'=>'Seattle','Denver'=>'Denver','El Paso'=>'El Paso','Detroit'=>'Detroit','Washington'=>'Washington','Boston'=>'Boston','Memphis'=>'Memphis','Nashville'=>'Nashville','Portland, Ore'=>'Portland, Ore','Oklahoma City'=>'Oklahoma City','Las Vegas'=>'Las Vegas','Baltimore'=>'Baltimore',	
	'Louisville'=>'Louisville',	'Milwaukee'=>'Milwaukee','Albuquerque'=>'Albuquerque','Tucson'=>'Tucson',	
	'Fresno'=>'Fresno','Sacramento'=>'Sacramento','Kansas City, Mo'=>'Kansas City, Mo','Long Beach'=>'Long Beach','Mesa'=>'Mesa','Atlanta'=>'Atlanta','Colorado Springs'=>'Colorado Springs','Virginia Beach'=>'Virginia Beach','Raleigh'=>'Raleigh','Omaha'=>'Omaha','Miami'=>'Miami','Oakland'=>'Oakland','Minneapolis'=>'Minneapolis','Tulsa'=>'Tulsa','Wichita'=>'Wichita','New Orleans'=>	'New Orleans',	
	'Arlington, Texas'=>'Arlington, Texas'	);
		
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
						'5'	=> 'HR/Compliance',
						'6'	=> 'Time and Attendance',	
						);
	private $workIN = array(
						'' => 'Choose Below...',
						'1' => 'Advertising/Marketing/PR',
						'2' => 'Agriculture',
						'3' => 'Biotech/Pharmaceuticals',
						'4' => 'Computers - Hardware',	
						'5'	=> 'Computers - Software',
						'6'	=> 'Construction/General Contracting',
						'7'	=> 'Consulting',
						'8'	=> 'Education',
						'9'	=> 'Equipment Sales &amp; Service',
						'10' => 'Financial Services',
						'11'  => 'Government',
						'12' => 'Healthcare',
						'13'	=> 'Information Services',
						'14'	=> 'Insurance',
						'15'	=> 'Legal',
						'16'	=> 'Manufacturing',
						'17'	=> 'Media/Entertainment/Publishing',
						'18'	=> 'Non-Profit',
						'19'	=> 'Other Services',
						'20'	=> 'Real Estate',
						'21'	=> 'Restaurant',
						'22'	=> 'Retail',
						'23'	=> 'Telecom/Utilities',
						'24'	=> 'Transportation/Logistics',
						'25'	=> 'Travel/Hospitality',
						'26'	=> 'Wholesale'							
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
        return view('company.pages.dashboard');
    }
	
	public function profile()
    { 
        return view('company.pages.profile');
    }
    
    public function updateProfile(Request $request)
    {  
    		 
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
	
	public function comapnyleads(){
		$id=Auth::user()->id;
        //echo $id;die;		
		$getAllAssign =  AssignLeads::where('company_id',$id)->orderBy('id','desc')->get();//echo "<pre>";print_r($getAllAssign);die;
		 $getNotificationL=  AssignLeads::where('company_id',$id)->where('notification',1)->count();
		 $getNotification=  AssignLeads::where('company_id',$id)->where('notification',1)->get();
		 //echo "<pre>";print_r($getNotification)."-----";
		 
		foreach($getAllAssign as $assign)
		{
		  //$getAllleads[] =  LeadDetails::where('id',$assign['lead_id'])->get();
					$getAllleads= DB::table('rfps_leads')
					             
								->join('rfps_lead_company_link', 'rfps_leads.id', '=', 'rfps_lead_company_link.lead_id')
								->where('rfps_lead_company_link.company_id',$id)
								->select('rfps_leads.*', 'rfps_lead_company_link.notification')
								->orderBy('rfps_lead_company_link.notification', 'desc')
								->get();
								
           		  
		}
		
		//$CompanyDetails =  CompanyDetails::all();
		
	    if(!empty($getAllleads))
		{
			return view('companies.pages.leads', ['getAllleads' => $getAllleads,'getNotificationL'=>$getNotificationL,'getAllAssign'=>$getAllAssign]);
		}
        else
        {
			return view('companies.pages.leads', ['getNotificationL'=>$getNotificationL,'getAllAssign'=>$getAllAssign]);
		}			
		
		//return view('company.pages.dashboard');
	}
	 
	public function editCompany(Request $request){
		$userData = user::with('companydetails')->findOrFail($request->id);
		$userData->companydetails->preferr_state = unserialize($userData->companydetails->preferr_state);
		$userData->companydetails->preferr_number_of_employee = unserialize($userData->companydetails->preferr_number_of_employee);
		$userData->companydetails->preferr_interest = unserialize($userData->companydetails->preferr_interest);
		$userData->companydetails->preferr_industry = unserialize($userData->companydetails->preferr_industry);
	
        $getNotificationL=  AssignLeads::where('company_id',Auth::user()->id)->where('notification',1)->count();
		
		
		return view('companies.pages.edit_company', ['userData' => $userData, 
												'country' => $this->country,
												'state' => $this->state,
												'city' => $this->city,
												'numbersOfEmployees' => $this->numbersOfEmployees,
												'responseTime' => $this->responseTime,
												'status' => $this->status,
												'jobTittle' => $this->jobTittle,
												'workIN' => $this->workIN,
												'getNotificationL'=>$getNotificationL ]);
	} 
	
	public function updateCompanyData(Request $request){
		
		$data =  \Input::except(array('_token')) ;
        
        $inputs = $request->all();
		
		
        $rule=array(
               'email' => 'unique:users,email,' . $request->id,			
				'company_name' => 'required',
				'address' => 'required|min:5',
				'country' => 'required',
				'state' => 'required',
				'city' => 'required',
				'number_of_employee' => 'required',
				'response_time' => 'required',
				//'preferr_number_of_employee' => 'required',
				'preferr_state' => 'required',
				'preferr_interest' => 'required',
				'preferr_industry' => 'required',
                 );
        
       
        $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        }
		
		$userData = user::with('companydetails')->findOrFail($request->id);; 
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
		$userData->companydetails->company_name = $inputs['company_name'];
		$userData->companydetails->response_time = $inputs['response_time'];
		$userData->companydetails->number_of_employee = $inputs['number_of_employee'];
		$userData->companydetails->website_url = $inputs['website_url']; 
		//$userData->companydetails->preferr_number_of_employee = serialize($inputs['preferr_number_of_employee']);
		$userData->companydetails->preferr_state = serialize($inputs['preferr_state']);
		$userData->companydetails->preferr_interest = serialize($inputs['preferr_interest']);
		$userData->companydetails->preferr_industry = serialize($inputs['preferr_industry']);
		$userData->companydetails->save();
        $userData->save();
		
		\Session::flash('flash_message', 'Update Successfully.');
		return back();
		
	}
	public function viewLead(Request $request){
		
		 $leadData = LeadDetails::findOrFail($request->id);
		 $id=Auth::user()->id;
		 
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
			
		$leadData->reason = unserialize($leadData->reason);
		$leadData->additional_benfefits = unserialize($leadData->additional_benfefits);
		$leadData->preferred_method_contact = unserialize($leadData->preferred_method_contact);
	
		$getNotificationL=  AssignLeads::where('company_id',$id)->where('notification',1)->count();
		$assignUpdate=  AssignLeads::where('company_id',$id)->where('lead_id',$request->id)->firstOrFail();
	
		if($assignUpdate->notification==1)
		{
			$assignUpdate->notification=0;
			$assignUpdate->save(); 
			header("Refresh:0");
			
		}
		$getQuotes=  Quote::where('company_id',$id)->where('lead_id',$leadData->id)->get();
		//echo "<pre>"; print_r($getQuotes); die;
		return view('companies.pages.view_lead', ['leadData' => $leadData, 
					'country' => $this->country,
					'state' => $this->state,
					'city' => $this->city,												
					'status' => $this->status,
					'numbersOfEmployees' => $this->numbersOfEmployees,
					'jobTittle' => $this->jobTittle,
					'workIN' => $this->workIN,
					'alldata_lead'=>$alldata_lead[0],
					'getNotificationL'=>$getNotificationL,
					'getQuotes' => $getQuotes]);
	}
	public function DownloadPdf(Request $request){
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
		
		$pdf = PDF::loadView('companies.pages.download_lead', [ 'alldata_lead' => $alldata_lead ]);
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
	public function SendQuote(Request $request){
		
		if(Auth::user()->usertype !='Company')
		{
	        return redirect('/');
		}
		
        $data =  \Input::except(array('_token')) ;
		$inputs = $request->all();
		$rule=array(
			'leadid' => 'required',
			'sender_id' => 'required',
			'reciever_id' => 'required',
			'quote_title' => 'required',
			'quote_description' => 'required',
			'quote_attachment' => 'mimes:jpg,jpeg,gif,png,pdf,doc,docx'
		);
		
		$validator = \Validator::make($data,$rule);

		if ($validator->fails())
		{
			$Errors_array = array();
			$errors = $validator->errors();
			$errors = $errors->getmessages();
			foreach($errors as $key => $value){
				$Errors_array[$key] = $value[0];
			}			
			return response()->json([
				'success' => false,
				'error_msg' => $Errors_array
			]);
		}
		
		$exist_quote = DB::table('rfps_quotes')
			->where('company_id', '=', $inputs['sender_id'])
			->where('lead_id', '=', $inputs['leadid'])
			->where('broker_id', '=', $inputs['reciever_id'])
			->first();

		//echo "<pre>"; print_r($exist_quote); die;
		if (is_null($exist_quote)) {
			$destinationPath = public_path('quotes');
			$image = $request->file('quote_attachment');         
			$input['imagename']= time().'.'.$image->getClientOriginalExtension();
			if($image->move($destinationPath, $input['imagename'])){
						
				$curTime = new \DateTime();
				$created_at = $curTime->format("Y-m-d H:i:s");

				$updateTime = new \DateTime();
				$updated_at = $updateTime->format("Y-m-d H:i:s");
				
				$Quote = new Quote;
				$Quote->company_id = $inputs['sender_id'];
				$Quote->lead_id = $inputs['leadid'];
				$Quote->broker_id = $inputs['reciever_id'];
				$Quote->quote_title = $inputs['quote_title'];
				$Quote->quote_description = $inputs['quote_description'];
				$Quote->document = $input['imagename'];
				$Quote->created_date = $created_at;
				$Quote->updated_date = $updated_at;
				if($Quote->save()){
					return response()->json([
						'success' => true,
						'message' => 'Your Quote is succesfully Added!.'
					]);	
				} else {
					return response()->json([
						'success' => false,
						'message' => 'Some Error Occured!.'
					]);
				}
			}
		} else {
			return response()->json([
				'success' => false,
				'message' => 'You have already give your quote for this Lead.'
			]);
		}
		die;
	}	
    	
}
