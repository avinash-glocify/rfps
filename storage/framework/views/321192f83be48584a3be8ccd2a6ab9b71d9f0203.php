 

<?php $__env->startSection('content'); ?> 
 <section class="banner_head inner_banner">
   <?php if(count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <ul>
                            <?php foreach($errors->all() as $error): ?>
                            <li><?php echo e($error); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <?php if(Session::has('flash_message')): ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <?php echo e(Session::get('flash_message')); ?>

                    </div>
                    <?php endif; ?>  
				
         <?php echo Form::open(array('url' => 'company/register','class'=>'','id'=>'companyform','method' => 'post','role'=>'')); ?>

            <div class="container">
               <div class="banner_text">
                  <h1>New Company Application</h1>
               </div>
            </div>
            </div>
            <img  class="banner_image"src="<?php echo e(URL::asset('front/img/banner_1.jpg')); ?>">
      </section>
      <section class="sign_up_form">
      <div class="container">
      <div class="form_holder_1">
      <h2>Personal Information</h2>
      <div class="personal_form">
	  <div class="col-md-6">
      
		   <?php echo e(Form::label('email', 'Email')); ?>

			<?php echo e(Form::email('email','',['class' => 'form-control'])); ?>

			<span id="emailerror"></span>
      </div>
	  <div class="col-md-6">
		  <label for="company_name">Company Name</label>
           <input class="form-control" type="text" id="company_name" name="company_name" placeholder="Enter Company Name.." value="<?php echo e(old('company_name')); ?>">
      </div>
      <div class="col-md-6">
      
		  <?php echo e(Form::label('first_name', 'First Name *')); ?>

		
		  <?php echo e(Form::text('first_name','', array('placeholder' => 'First name'))); ?>

      </div>
      <div class="col-md-6">
		  <?php echo e(Form::label('last_name', 'Last Name *')); ?>

		
		  <?php echo e(Form::text('last_name','', array('placeholder' => 'Last  name'))); ?>

      </div>
      <div class="col-md-12">
		 
		  <?php echo e(Form::label('physical address', 'Physical Address:  *')); ?>

		
		  <?php echo e(Form::textarea('address','',array('placeholder' => 'Address Line One','rows' => 1, 'cols' => 20,'id'=>'address'))); ?>

		  <?php echo e(Form::textarea('address2','',array('placeholder' => 'Address Line Two','rows' => 1, 'cols' => 20,'id'=>'address2'))); ?>

      </div>
	 
      <div class="col-md-4">
      
	  <?php echo e(Form::label('country', 'Country*')); ?>

	  <?php $country=array(
						'1' => 'USA',
						);?>
	  <?php echo e(Form::select('country',$country,null, ['class' => 'form-control','selected'])); ?>

      </div>
	  <div class="col-md-4">
      <?php echo e(Form::label('state', 'State*')); ?>

	  <?php $state=array('' => ' -- Select -- ','AL'=>'ALABAMA','AK'=>'ALASKA','AS'=>'AMERICAN SAMOA',	'AZ'=>'ARIZONA','AR'=>'ARKANSAS','CA'=>'CALIFORNIA','CO'=>'COLORADO','CT'=>'CONNECTICUT','DE'=>'DELAWARE','DC'=>'DISTRICT OF COLUMBIA','FM'=>'FEDERATED STATES OF MICRONESIA','FL'=>'FLORIDA',
	'GA'=>'GEORGIA','GU'=>'GUAM GU','HI'=>'HAWAII','ID'=>'IDAHO','IL'=>'ILLINOIS','IN'=>'INDIANA','IA'=>'IOWA','KS'=>'KANSAS','KY'=>'KENTUCKY','LA'=>'LOUISIANA','ME'=>'MAINE','MH'=>'MARSHALL ISLANDS',	'MD'=>'MARYLAND','MA'=>'MASSACHUSETTS','MI'=>'MICHIGAN','MN'=>'MINNESOTA','MS'=>'MISSISSIPPI','MO'=>'MISSOURI','MT'=>'MONTANA','NE'=>'NEBRASKA','NV'=>'NEVADA','NH'=>'NEW HAMPSHIRE','NJ'=>'NEW JERSEY',
	'NM'=>'NEW MEXICO','NY'=>'NEW YORK','NC'=>'NORTH CAROLINA','ND'=>'NORTH DAKOTA','MP'=>'NORTHERN MARIANA ISLANDS','OH'=>'OHIO','OK'=>'OKLAHOMA','OR'=>'OREGON','PW'=>'PALAU','PA'=>'PENNSYLVANIA',
	'PR'=>'PUERTO RICO','RI'=>'RHODE ISLAND','SC'=>'SOUTH CAROLINA','SD'=>'SOUTH DAKOTA','TN'=>'TENNESSEE','TX'=>'TEXAS','UT'=>'UTAH','VT'=>'VERMONT','VI'=>'VIRGIN ISLANDS','VA'=>'VIRGINIA',	'WA'=>'WASHINGTON','WV'=>'WEST VIRGINIA','WI'=>'WISCONSIN',	'WY'=>'WYOMING','AE'=>'ARMED FORCES AFRICA \ CANADA \ EUROPE \ MIDDLE EAST','AA'=>'ARMED FORCES AMERICA (EXCEPT CANADA)','AP'=>'ARMED FORCES PACIFIC');?>
	  <?php echo e(Form::select('state',$state,null, ['class' => 'form-control'])); ?>

      </div>
      <div class="col-md-4">
      <?php echo e(Form::label('city', 'City*')); ?>

	  <?php $city=array('' => ' -- Select -- ','New York'=>'New York','Los Angeles'=>'Los Angeles','Chicago'=>'Chicago','Houston'=>'Houston','Philadelphia'=>'Philadelphia','Phoenix'=>'Phoenix',
	'San Antonio'=>'San Antonio','San Diego'=>'San Diego','Dallas'=>'Dallas','San Jose'=>'San Jose','Austin'=>'Austin','Jacksonville'=>'Jacksonville','San Francisco'=>'San Francisco','Indianapolis'=>'Indianapolis','Columbus'=>'Columbus','Fort Worth'=>'Fort Worth','Charlotte'=>'Charlotte','Seattle'=>'Seattle','Denver'=>'Denver','El Paso'=>'El Paso','Detroit'=>'Detroit','Washington'=>'Washington','Boston'=>'Boston','Memphis'=>'Memphis','Nashville'=>'Nashville','Portland, Ore'=>'Portland, Ore','Oklahoma City'=>'Oklahoma City','Las Vegas'=>'Las Vegas','Baltimore'=>'Baltimore',	
	'Louisville'=>'Louisville',	'Milwaukee'=>'Milwaukee','Albuquerque'=>'Albuquerque','Tucson'=>'Tucson',	
	'Fresno'=>'Fresno','Sacramento'=>'Sacramento','Kansas City, Mo'=>'Kansas City, Mo','Long Beach'=>'Long Beach','Mesa'=>'Mesa','Atlanta'=>'Atlanta','Colorado Springs'=>'Colorado Springs','Virginia Beach'=>'Virginia Beach','Raleigh'=>'Raleigh','Omaha'=>'Omaha','Miami'=>'Miami','Oakland'=>'Oakland','Minneapolis'=>'Minneapolis','Tulsa'=>'Tulsa','Wichita'=>'Wichita','New Orleans'=>	'New Orleans',	
	'Arlington, Texas'=>'Arlington, Texas'	);?>
	  <?php echo e(Form::select('city',$city,null, ['class' => 'form-control'])); ?>

      </div>
	  <div class="col-md-4">
      <?php echo e(Form::label('number_of_employee', 'Number Of Employees*')); ?>

	  <?php $number_employees=array('' => ' -- Select -- ',
						'1' => '1 to 100 ',
						'2' => '100 to 500',
						'3' => '500-to 1000',
						'4' => '1000 to 5000');?>
	  <?php echo e(Form::select('number_of_employee',$number_employees,null, ['class' => 'form-control'])); ?>

      </div>
	  <div class="col-md-4">
      <?php echo e(Form::label('response_time', 'Response Time*')); ?>

	  <?php $responnse_time=array('' => ' -- Select -- ',
						'1day' => '1 Day',
						'2days' => '2 Days',
						'3days' => '3 Days',
						'week' => '1 Week',);?>
	  <?php echo e(Form::select('response_time',$responnse_time,null, ['class' => 'form-control'])); ?>

      </div>
      <div class="col-md-4">
		  <?php echo e(Form::label('contact_number', 'Contact Number *')); ?>

		
		  <?php echo e(Form::text('contact_number','', array('placeholder' => 'Contact Number','onkeyup'=>"if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"))); ?>

      </div>
	  <div class="col-md-12">
      <?php echo e(Form::label('website_url', 'Website URL')); ?>

      <?php echo e(Form::text('website_url','', array('placeholder' => 'Website URL'))); ?>

	  <span id="urlerror"></span>
      </div>
     
      
      
      <div class="clearfix"></div>
      </div>
      <h2>What Kind of Leads do you want ?</h2>
	  <span>Please press ctrl to select multiple values.</span>
      <div class="personal_form">
      <div class="row">
	   <!--<div class="col-md-4 col-xs-4 ">
	   <?php echo e(Form::label('preferr_number_of_employee', ' Number Of Employees')); ?>				<?php echo e(Form::select('preferr_number_of_employee',$state, null, ['class' => 'form-control', 'multiple'=>'multiple','name'=>'preferr_number_of_employee[]'])); ?>

      </div> -->
      <div class="col-md-4 col-xs-4">
	  <div class="form-group">
	   <?php echo e(Form::label('preferr_state', 'Preferred Location')); ?>		
		<?php echo e(Form::select('preferr_state',$state, null, ['class' => 'form-control', 'multiple'=>'multiple','name'=>'preferr_state[]'])); ?>

        </div>
		<span style="dispaly:none ;color:red;" id="err_state" ></span>
      </div>
	 
      <?php /* $intrest=array(''=>'--Select--','PEO'=>'PEO (Professional Employer Organization)','HR Outsourcing'=>'HR Outsourcing'); */
	   $jobTittle = array(
						'' => 'Choose Below...',
						'1' => 'Workers Compensation Coverage',
						'2' => 'Payroll/Technology',
						'3' => 'Multi-state',
						'4' => 'Currently with a Peo and Shopping',	
						'5'	=> 'HR/Compliance',
						'6'	=> 'Time and Attendance',	
						);
	  
	  ?>
      <div class="col-md-4 col-xs-4">
	    <div class="form-group">
       <?php echo e(Form::label('preferr_interest', 'Interest of Services')); ?>		
										<?php echo e(Form::select('preferr_interest',$jobTittle, null, ['class' => 'form-control', 'multiple'=>'multiple','name'=>'preferr_interest[]'])); ?>

      </div>
	  <span style="dispaly:none ;color:red;" id="err_interest" ></span>
      </div>
	  <?php /* $industry=array(''=>'--Select--','Aerospace industry'=>'Aerospace industry','Agriculture'=>'Agriculture','other'=>'Other'); */
	   $workIN = array(
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
	  ?>
	  
	  <span id="passerr"></span>
      </div>
      
     
     
      <div class="col-md-12">
      <?php echo e(Form::label('password1', 'Password')); ?>

	  <input type="password" name="password1" id="password1"/>
      </div>
	  
      <div class="clearfix"></div>
      </div>
      
      <h2>NetPEO Terms and Conditions for all Brokers</h2>
	  
      <div class="term_cond"><p>NetPEO Web Site
      Terms and Conditions of Use 
      NetPEO, LLC. along with its subsidiaries and affiliates ("NetPEO"), provides the information and services on its World Wide Web site(s) (the "Site") under the following terms and conditions. By accessing and/or using the Site, you indicate your acceptance of these terms and conditions. 
      1. LAWS AND REGULATIONS. Access to and use of this Site are subject to all applicable international, federal, state and local laws and regulations. User agrees not to use the Site in any way which violates such laws or regulations.
      2. COPYRIGHT AND TRADEMARKS. The information available on or through this Site is the property of NetPEO, or its licensors, and is protected by copyright, trademark, and other intellectual property laws. Users may not modify, copy, distribute, transmit, display, publish, sell, license, create derivative works or otherwise use any information available on or through this Site for commercial or public purposes. Users may not use the trademarks, logos and service marks ("Marks") for any purpose including, but not limited to use as "hot links" or meta tags in other pages or sites on the World Wide Web without the written permission of NetPEO or such third party that may own the Mark. Questions concerning trademark ownership, usage, or infringement should be directed to trademarks@NetPEO.net.
      3. TAMPERING. User agrees not to modify, move, add to, delete or otherwise tamper with the information contained in NetPEO's Web site. User also agrees not to decompile, reverse engineer, disassemble or unlawfully use or reproduce any of the software, copyrighted or trademarked material, trade secrets, or other proprietary information contained in the Site.
      4. THIRD PARTY INFORMATION. Although NETPEO monitors the information on the Site, some of the information is supplied by independent third parties. While NETPEO makes every effort to insure the accuracy of all information on the Site, NETPEO makes no warranty as to the accuracy of any such information.
      5. LINKS TO THIRD PARTY SITES. This Site may contain links that will let you access other Web sites that are not under the control of NETPEO. The links are only provided as a convenience and NETPEO does not endorse any of these sites. NETPEO assumes no responsibility or liability for any material that may accessed on other Web sites reached through this Site, nor does NETPEO make any representation regarding the quality of any product or service contained at any such site.
      6. LINKS FROM THIRD PARTY SITES. NETPEO prohibits unauthorized links to the Site and the framing of any information contained on the site or any portion of the Site. NETPEO reserves the right to disable any unauthorized links or frames. NETPEO has no responsibility or liability for any material on other Web sites that may contain links to this Site.
      7. NO WARRANTIES. Information and documents provided on this Site are provided "as is" without warranty of any kind, either express or implied, including without limitation warranties of merchantability, fitness for a particular purpose, and non-infringement. NETPEO uses reasonable efforts to include accurate and up-to-date information on this Site; it does not, however, make any warranties or representations as to its accuracy or completeness. NETPEO periodically adds, changes, improves, or updates the information and documents on this Site without notice. NETPEO assumes no liability or responsibility for any errors or omissions in the content of this Site. Your use of this Site is at your own risk.
      8. LIMITATION OF LIABILITY. UNDER NO CIRCUMSTANCES SHALL NETPEO BE LIABLE FOR ANY DAMAGES SUFFERED BY YOU, INCLUDING ANY INCIDENTAL, SPECIAL OR CONSEQUENTIAL DAMAGES (INCLUDING, WITHOUT LIMITATION, ANY LOST PROFITS OR DAMAGES FOR BUSINESS INTERRUPTION, LOSS OF INFORMATION, PROGRAMS OR OTHER DATA) THAT RESULT FROM ACCESS TO, USE OF, OR INABILITY TO USE THIS SITE OR DUE TO ANY BREACH OF SECURITY ASSOCIATED WITH THE TRANSMISSION OF INFORMATION THROUGH THE INTERNET, EVEN IF NETPEO WAS ADVISED OF THE POSSIBILITY OF SUCH DAMAGES.
      9. PRIVACY. Protecting the privacy of our clients and users of our Sites is important to NETPEO. The NetPEO Web Site Privacy Statement describes how we use and protect information you provide to us.
      10. SECURITY. Data transmitted to and from NETPEO client Sites is encrypted for the user's protection. However, the security of information transmitted through the Internet can never be guaranteed. NETPEO is not responsible for any interception or interruption of any communications through the Internet or for changes to or losses of data. User is responsible for maintaining the security of any password, user ID, or other form of authentication involved in obtaining access to password protected or secure areas of NETPEO sites. In order to protect you and your data, NETPEO may suspend your use of a client site, without notice, pending an investigation, if any breach of security is suspected.
      11.	TRANSMISSION OF PERSONAL DATA. User acknowledges and agrees that by providing NETPEO with any personal information through the Site, User consents to the transmission of such personal user information over international borders as necessary for processing in accordance with NETPEO's standard business practices and the NetPEO Web Site Privacy Statement.
      12.	ACCESS TO PASSWORD PROTECTED/SECURE AREAS. Access to and use of password protected and/or secure area of the Site is restricted to authorized users only. Unauthorized access to such areas is prohibited and may lead to criminal prosecution.
      13.	PROCEDURE FOR MAKING CLAIMS OF COPYRIGHT INFRINGEMENT. Pursuant to the Digital Millennium Copyright Act, NetPEO has registered an agent with the U.S. Copyright Office. Notices of claimed copyright infringement on the Site should be directed to: NetPEO, LLC, 292 South Culver Street, Lawrenceville, GA 30045, Attn: Layne Davlin.
      14.	JURISDICTION/GOVERNING LAW. These terms and conditions shall be governed and construed in accordance with the laws of the State of Georgia, USA, and applicable federal laws without regard to conflicts of law principles. User agrees that any and all proceedings relating to this site and the subject matter contained herein shall be maintained in the courts of the state of Georgia or the federal district courts sitting in Georgia, which courts shall have exclusive jurisdiction for such purpose.
      NetPEO Trademarks and Service Marks
      The following are registered trademarks and service marks of NetPEO, LLC., which may appear in NetPEO web sites:
      NetPEO LOGO
      NetPEO 1, Inc.
      NetPEO THE CONSULTING COMPANY
      NetPEO
      Updated 11/24/2005
      ©2003-2005 NetPEO, LLC. All Rights Reserved.</p>
      </div>
      <div class="radio_check">
      <p><span><input type="checkbox" name="agree" id= "agree"></span><span>I have read and I agree to the above terms and conditions Please select one:</span>
	 
	  </p>
       <span id="err_agree"></span>
      </div>
      <div class="submit_button" id="companysign">
      <input type="submit" value="Register">
      </div>
      </div>
      </div></form>
      </section>
	    <?php $__env->stopSection(); ?> 
<?php echo $__env->make('front.signin_head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>