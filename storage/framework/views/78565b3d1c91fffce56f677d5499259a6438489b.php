<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title>Request for Proposal <?php echo $alldata_lead['formname'];?></title>
	<style type="text/css" media="all">
        #design {
            font-family: Serif;
            border-collapse: collapse;
            width: 100%;
        }
		h3{
            width: 100%;
			font-size:14px;
			font-weight:bold;
        }
        #design td,
        #design th,
        #design thead {
            border: 1px solid #000;
            font-size: 12px;
        }


        * {
            margin: 2px;
            padding: 2px;
        }
    </style>
  </head>
<body>			
	<?php if($alldata_lead['formname']=='Questionnaire_form' && !empty($alldata_lead['form_data'])){		
	$Questionnaire = $alldata_lead['form_data'];?>
	<h3>Request for Proposal Information Questionnaire</h3>
	<table id="design">
	<thead>
		<tr>
			<th><?php echo e(Form::label('legal_name_dba', 'Legal Business Name and DBA:')); ?></th>
			<th><?php echo e(Form::label('legal_name_dba', $Questionnaire['legal_name_dba'])); ?>	</th>
			<th><?php echo e(Form::label('Street_Address', 'Street Address:')); ?></th>
			<th><?php echo e(Form::label('Street_Address', $Questionnaire['Street_Address'])); ?></th>                
		</tr>
	</thead>
	<tbody>
		<tr>
			<th><?php echo e(Form::label('city_state_zip', 'City/State/Zip:')); ?></th>
			<th><?php echo e(Form::label('city_state_zip', $Questionnaire['city_state_zip'])); ?>	</th>
			<th><?php echo e(Form::label('Phone', 'Phone:')); ?></th>
			<th><?php echo e(Form::label('Phone', $Questionnaire['Phone'])); ?></th>
		</tr>
		<tr>
			<th><?php echo e(Form::label('Fax', 'Fax:')); ?></th>
			<th><?php echo e(Form::label('Fax', $Questionnaire['Fax'])); ?>	</th>
			<th><?php echo e(Form::label('Contact_Name', 'Contact Name:')); ?></th>
			<th><?php echo e(Form::label('Contact_Name', $Questionnaire['Contact_Name'])); ?></th>
		</tr>
		<tr>
			<th><?php echo e(Form::label('Title', 'Title:')); ?></th>
			<th><?php echo e(Form::label('Title', $Questionnaire['Title'])); ?>	</th>
			<th><?php echo e(Form::label('Industry_desc', 'Industry (description of business):')); ?></th>
			<th><?php echo e(Form::label('Industry_desc', $Questionnaire['Industry_desc'])); ?></th>
		</tr>
		<tr>
			<th><?php echo e(Form::label('Fed_Tax_id', 'Fed Tax ID #:')); ?></th>
			<th><?php echo e(Form::label('Fed_Tax_id', $Questionnaire['Fed_Tax_id'])); ?>	</th>
			<th><?php echo e(Form::label('Years_inBusiness', 'Years in Business:')); ?></th>
			<th><?php echo e(Form::label('Years_inBusiness', $Questionnaire['Years_inBusiness'])); ?></th>
		</tr>
		<tr>
			<th><?php echo e(Form::label('SIC_Code', 'SIC Code:')); ?></th>
			<th><?php echo e(Form::label('SIC_Code', $Questionnaire['SIC_Code'])); ?>	</th>
			<th><?php echo e(Form::label('PayrollFrequency', 'Payroll Frequency:')); ?></th>
			<th><?php echo e(Form::label('PayrollFrequency', $Questionnaire['PayrollFrequency'])); ?></th>
		</tr>
		<tr>
			<th><?php echo e(Form::label('CurrentCostPayroll', 'Current Cost of Payroll:')); ?></th>
			<th><?php echo e(Form::label('CurrentCostPayroll', $Questionnaire['CurrentCostPayroll'])); ?>	</th>
			<th><?php echo e(Form::label('CurrentofHR', 'Current Cost of HR:')); ?></th>
			<th><?php echo e(Form::label('CurrentofHR', $Questionnaire['CurrentofHR'])); ?></th>
		</tr>			
		<tr>
			<th><?php echo e(Form::label('CurrentStateUnemployment', 'Current State Unemployment Rate:')); ?></th>
			<th><?php echo e(Form::label('CurrentStateUnemployment', $Questionnaire['CurrentStateUnemployment'])); ?>	</th>
			<th><?php echo e(Form::label('WorkersCompensationModifier', 'Workers Compensation Modifier:')); ?></th>
			<th><?php echo e(Form::label('WorkersCompensationModifier', $Questionnaire['WorkersCompensationModifier'])); ?></th>
		</tr>
		<tr>
			<th><?php echo e(Form::label('DesiredStartDate', 'Desired Start Date:')); ?></th>
			<th><?php echo e(Form::label('DesiredStartDate', $Questionnaire['DesiredStartDate'])); ?>	</th>
			<th><?php echo e(Form::label('EmployerCurrentlyBenefits', 'Does Employer Currently have Benefits?')); ?></th>
			<th><?php echo e(Form::label('EmployerCurrentlyBenefits', $Questionnaire['EmployerCurrentlyBenefits'])); ?></th>
		</tr>			
		<tr>
			<th><?php echo e(Form::label('NetPEOHRBenefits', 'Does Employer Wish to Offer NetPEO HR Benefits?')); ?></th>
			<th><?php echo e(Form::label('NetPEOHRBenefits', $Questionnaire['NetPEOHRBenefits'])); ?>	</th>
			<th><?php echo e(Form::label('EmployerCurrently401', 'Does Employer Currently have a 401(k)?')); ?></th>
			<th><?php echo e(Form::label('EmployerCurrently401', $Questionnaire['EmployerCurrently401'])); ?></th>
		</tr>			
		<tr>
			<th><?php echo e(Form::label('NetPEOHR401', 'Does Employer Wish to Offer NetPEO HR 401(k)?')); ?></th>
			<th><?php echo e(Form::label('NetPEOHR401', $Questionnaire['NetPEOHR401'])); ?>	</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
	</tbody>
	</table>
	<br/><br/>
	<h3>Payroll & Workers Compensation Information:</h3>
	<table id="design">
	<thead>
		<tr>
			<th>Job Description</th>
			<th>Class Code</th>
			<th>Rate/$100</th>
			<th>Annual Payroll</th>
			<th># of EE’s</th>               
		</tr>
	</thead>
	<tbody>
		<?php for($i=1; $i<=7; $i++){
		$JobDescription	=	"JobDescription".$i;
		$Rate100		=	"Rate100_".$i;
		$ClassCode		=	"ClassCode".$i;
		$AnnualPayroll	=	"AnnualPayroll".$i;
		$noofEE			=	"noofEE".$i;?>
		<tr>
			<td><?php echo $Questionnaire[$JobDescription] ? $Questionnaire[$JobDescription] : '&nbsp;';?></td>
			<td><?php echo $Questionnaire[$ClassCode] ? $Questionnaire[$ClassCode] : '&nbsp;';?></td>
			<td><?php echo $Questionnaire[$Rate100] ? $Questionnaire[$Rate100] : "&nbsp;";?></td>
			<td><?php echo $Questionnaire[$AnnualPayroll] ? $Questionnaire[$AnnualPayroll] : "&nbsp;";?></td>
			<td><?php echo $Questionnaire[$noofEE] ? $Questionnaire[$noofEE] : "&nbsp;";?></td>            
		</tr>
		<?php } ?>
	</tbody>
	</table>
	<?php } else {
	$Compensation_data = $alldata_lead['form_data'];
	//echo "<pre>"; print_r($Compensation_data); die;?>
	<h3>WORKERS COMPENSATION APPLICATION</h3>
	<table id="design">
	<thead>
		<tr>
			<th><?php echo e(Form::label('acc_agency_and_address', 'AGENCY NAME AND ADDRESS:')); ?></th>
			<th><?php echo $Compensation_data['acc_agency_and_address'] ? $Compensation_data['acc_agency_and_address'] : "&nbsp;";?></th>
			<th><?php echo e(Form::label('acc_producer_name', 'PRODUCER NAME:')); ?></th>
			<th><?php echo $Compensation_data['acc_producer_name'] ? $Compensation_data['acc_producer_name'] : "&nbsp;";?></th>                
		</tr>
	</thead>
	<tbody>
	<tr>
		<th><?php echo e(Form::label('acc_repersantive_name', 'CS REPRESENTATIVE Name:')); ?></th>
		<th><?php echo $Compensation_data['acc_repersantive_name'] ? $Compensation_data['acc_repersantive_name'] : "&nbsp;" ;?></th>
		<th><?php echo e(Form::label('acc_agency_office_name', 'OFFICE PHONE (A/C, No, Ext):')); ?></th>
		<th><?php echo $Compensation_data['acc_agency_office_name'] ? @$Compensation_data['acc_agency_office_name'] : "&nbsp;";?></th>                
	</tr>
	<tr>
		<th><?php echo e(Form::label('acc_agency_mobile_name', 'MOBILE PHONE:')); ?></th>
		<th><?php echo $Compensation_data['acc_agency_mobile_name'] ? $Compensation_data['acc_agency_mobile_name'] : "&nbsp;" ;?></th>
		<th><?php echo e(Form::label('acc_agency_fax_no', 'FAX (A/C, No):')); ?></th>
		<th><?php echo $Compensation_data['acc_agency_fax_no'] ? @$Compensation_data['acc_agency_fax_no'] : "&nbsp;";?></th>                
	</tr>
	<tr>
		<th><?php echo e(Form::label('acc_agency_email', 'E-Mail Address:')); ?></th>
		<th><?php echo $Compensation_data['acc_agency_email'] ? $Compensation_data['acc_agency_email'] : "&nbsp;" ;?></th>
		<th><?php echo e(Form::label('acc_agency_code', 'CODE:')); ?></th>
		<th><?php echo $Compensation_data['acc_agency_code'] ? @$Compensation_data['acc_agency_code'] : "&nbsp;";?></th>                
	</tr>
	<tr>
		<th><?php echo e(Form::label('acc_agency_sub_code', 'SUB CODE:')); ?></th>
		<th><?php echo $Compensation_data['acc_agency_sub_code'] ? $Compensation_data['acc_agency_sub_code'] : "&nbsp;" ;?></th>
		<th><?php echo e(Form::label('acc_company', 'COMPANY:')); ?></th>
		<th><?php echo $Compensation_data['acc_company'] ? @$Compensation_data['acc_company'] : "&nbsp;";?></th>                
	</tr>
	<tr>
		<th><?php echo e(Form::label('acc_underwriter', 'UNDERWRITER:')); ?></th>
		<th><?php echo $Compensation_data['acc_underwriter'] ? $Compensation_data['acc_underwriter'] : "&nbsp;" ;?></th>
		<th><?php echo e(Form::label('acc_applicant_name', 'APPLICANT NAME:')); ?></th>
		<th><?php echo $Compensation_data['acc_applicant_name'] ? @$Compensation_data['acc_applicant_name'] : "&nbsp;";?></th>                
	</tr>
	<tr>
		<th><?php echo e(Form::label('acc_office_phone', 'OFFICE PHONE:')); ?></th>
		<th><?php echo $Compensation_data['acc_office_phone'] ? $Compensation_data['acc_office_phone'] : "&nbsp;" ;?></th>
		<th><?php echo e(Form::label('acc_mobile_phone', 'MOBILE PHONE:')); ?></th>
		<th><?php echo $Compensation_data['acc_mobile_phone'] ? @$Compensation_data['acc_mobile_phone'] : "&nbsp;";?></th>                
	</tr>
	<tr>
		<th><?php echo e(Form::label('acc_agency_sub_code', 'MAILING ADDRESS (including ZIP + 4 or Canadian Postal Code):')); ?></th>
		<th><?php echo $Compensation_data['acc_agency_sub_code'] ? $Compensation_data['acc_agency_sub_code'] : "&nbsp;" ;?></th>
		<th><?php echo e(Form::label('acc_yrs_in_bus', 'YRS IN BUS:')); ?></th>
		<th><?php echo $Compensation_data['acc_yrs_in_bus'] ? @$Compensation_data['acc_yrs_in_bus'] : "&nbsp;";?></th>                
	</tr>
	<tr>
		<th><?php echo e(Form::label('acc_sic', 'SIC:')); ?></th>
		<th><?php echo $Compensation_data['acc_sic'] ? $Compensation_data['acc_sic'] : "&nbsp;" ;?></th>
		<th><?php echo e(Form::label('acc_naics', 'NAICS:')); ?></th>
		<th><?php echo $Compensation_data['acc_naics'] ? @$Compensation_data['acc_naics'] : "&nbsp;";?></th>                
	</tr>
	<tr>
		<th><?php echo e(Form::label('acc_web_adderss', 'Website Address:')); ?></th>
		<th><?php echo $Compensation_data['acc_web_adderss'] ? $Compensation_data['acc_web_adderss'] : "&nbsp;" ;?></th>
		<th><?php echo e(Form::label('acc_company_email_address', 'EMAIL ADDRESS:')); ?></th>
		<th><?php echo $Compensation_data['acc_company_email_address'] ? @$Compensation_data['acc_company_email_address'] : "&nbsp;";?></th>               
	</tr>
	<tr>
		<th><?php echo e(Form::label('acc_company_credit_bureau_name', 'CREDIT BUREAU NAME:')); ?></th>
		<th><?php echo $Compensation_data['acc_company_credit_bureau_name'] ? $Compensation_data['acc_company_credit_bureau_name'] : "&nbsp;" ;?></th>
		<th><?php echo e(Form::label('acc_company_id_number', 'ID NUMBER:')); ?></th>
		<th><?php echo $Compensation_data['acc_company_id_number'] ? @$Compensation_data['acc_company_id_number'] : "&nbsp;";?></th>               
	</tr>
	<tr>
		<th><?php echo e(Form::label('acc_fedral_no', 'FEDERAL EMPLOYER ID NUMBER:')); ?></th>
		<th><?php echo $Compensation_data['acc_fedral_no'] ? $Compensation_data['acc_fedral_no'] : "&nbsp;" ;?></th>
		<th><?php echo e(Form::label('acc_ncci_risk_no', 'NCCI RISK ID NUMBER:')); ?></th>
		<th><?php echo $Compensation_data['acc_ncci_risk_no'] ? @$Compensation_data['acc_ncci_risk_no'] : "&nbsp;";?></th>               
	</tr>
	<tr>
		<th><?php echo e(Form::label('acc_fedral_no', 'FEDERAL EMPLOYER ID NUMBER:')); ?></th>
		<th><?php echo $Compensation_data['acc_fedral_no'] ? $Compensation_data['acc_fedral_no'] : "&nbsp;" ;?></th>
		<th><?php echo e(Form::label('acc_other_bureau_id', 'OTHER RATING BUREAU ID OR STATE  EMPLOYER REGISTRATION NUMBER:')); ?></th>
		<th><?php echo $Compensation_data['acc_other_bureau_id'] ? @$Compensation_data['acc_other_bureau_id'] : "&nbsp;";?></th>               
	</tr>
	<tr>
		<th><?php echo e(Form::label('acc_billing_plan', 'BILLING PLAN:')); ?></th>
		<th><?php echo $Compensation_data['acc_billing_plan'] ? $Compensation_data['acc_billing_plan'] : "&nbsp;" ;?></th>
		<th><?php echo e(Form::label('acc_payment_plan', 'PAYMENT PLAN:')); ?></th>
		<th><?php echo $Compensation_data['acc_payment_plan'] ? @$Compensation_data['acc_payment_plan'] : "&nbsp;";?></th>               
	</tr>
	<tr>
		<th><?php echo e(Form::label('acc_audit', 'AUDIT:')); ?></th>
		<th><?php echo $Compensation_data['acc_audit'] ? $Compensation_data['acc_audit'] : "&nbsp;" ;?></th>
		<th><?php echo e(Form::label('acc_PROPOSED_eff_date', 'PROPOSED EFF DATE:')); ?></th>
		<th><?php echo $Compensation_data['acc_PROPOSED_eff_date'] ? @$Compensation_data['acc_PROPOSED_eff_date'] : "&nbsp;";?></th>               
	</tr>
	<tr>
		<th><?php echo e(Form::label('acc_PROPOSED_exp_date', 'PROPOSED EXP DATE:')); ?></th>
		<th><?php echo $Compensation_data['acc_PROPOSED_exp_date'] ? $Compensation_data['acc_PROPOSED_exp_date'] : "&nbsp;" ;?></th>
		<th><?php echo e(Form::label('acc_annivertsary_date', 'NORMAL ANNIVERSARY RATING DATE:')); ?></th>
		<th><?php echo $Compensation_data['acc_annivertsary_date'] ? @$Compensation_data['acc_annivertsary_date'] : "&nbsp;";?></th>               
	</tr>
	<tr>
		<th><?php echo e(Form::label('acc_PARTICIPATING', 'PARTICIPATING:')); ?></th>
		<th><?php echo $Compensation_data['acc_PARTICIPATING'] ? $Compensation_data['acc_PARTICIPATING'] : "&nbsp;" ;?></th>
		<th><?php echo e(Form::label('acc_retro_plan', 'RETRO PLAN:')); ?></th>
		<th><?php echo $Compensation_data['acc_retro_plan'] ? @$Compensation_data['acc_retro_plan'] : "&nbsp;";?></th>               
	</tr>
	<tr>
		<th><?php echo e(Form::label('acc_WORKERSCOMPENSATION_state', 'PART 1 - WORKERS COMPENSATION (States):')); ?></th>
		<th><?php echo $Compensation_data['acc_WORKERSCOMPENSATION_state'] ? $Compensation_data['acc_WORKERSCOMPENSATION_state'] : "&nbsp;" ;?></th>
		<th><?php echo e(Form::label("acc_par2_liblaty_each_accident", "PART 2 - EMPLOYER&#39;S LIABILITY:")); ?></th>
		<th><?php echo $Compensation_data['acc_par2_liblaty_each_accident'] ? @$Compensation_data['acc_par2_liblaty_each_accident'] : "&nbsp;";?></th>               
	</tr>
	<tr>
		<th><?php echo e(Form::label('acc_OTHERSTATES_ins', 'PART 3 - OTHER STATES INS:')); ?></th>
		<th><?php echo $Compensation_data['acc_OTHERSTATES_ins'] ? $Compensation_data['acc_OTHERSTATES_ins'] : "&nbsp;" ;?></th>
		<th><?php echo e(Form::label('acc_DEDUCTIBLES_wi', 'DEDUCTIBLES (N/A in WI):')); ?></th>
		<th><?php echo $Compensation_data['acc_DEDUCTIBLES_wi'] ? @$Compensation_data['acc_DEDUCTIBLES_wi'] : "&nbsp;";?></th>               
	</tr>
	<tr>
		<th><?php echo e(Form::label('acc_AMOUNT_na_wi', 'AMOUNT / % (N/A in WI):')); ?></th>
		<th><?php echo $Compensation_data['acc_AMOUNT_na_wi'] ? $Compensation_data['acc_AMOUNT_na_wi'] : "&nbsp;" ;?></th>
		<th><?php echo e(Form::label('acc_other_coverage', 'OTHER COVERAGES:')); ?></th>
		<th><?php echo $Compensation_data['acc_other_coverage'] ? @$Compensation_data['acc_other_coverage'] : "&nbsp;";?></th>               
	</tr>
	<tr>
		<th><?php echo e(Form::label('acc_WORKERSCOMPENSATION_state', 'PART 1 - WORKERS COMPENSATION (States):')); ?></th>
		<th><?php echo $Compensation_data['acc_WORKERSCOMPENSATION_state'] ? $Compensation_data['acc_WORKERSCOMPENSATION_state'] : "&nbsp;" ;?></th>
		<th><?php echo e(Form::label('acc_par2_liblaty_each_accident', 'PART 2 - EMPLOYER&#39;S LIABILITY:')); ?></th>
		<th><?php echo $Compensation_data['acc_par2_liblaty_each_accident'] ? @$Compensation_data['acc_par2_liblaty_each_accident'] : "&nbsp;";?></th>               
	</tr>	
	<tr>
		<th><?php echo e(Form::label('acc_OTHERSTATES_ins', 'PART 3 - OTHER STATES INS:')); ?></th>
		<th><?php echo $Compensation_data['acc_OTHERSTATES_ins'] ? $Compensation_data['acc_OTHERSTATES_ins'] : "&nbsp;" ;?></th>
		<th><?php echo e(Form::label('acc_DEDUCTIBLES_wi', 'DEDUCTIBLES (N/A in WI):')); ?></th>
		<th><?php echo $Compensation_data['acc_DEDUCTIBLES_wi'] ? @$Compensation_data['acc_DEDUCTIBLES_wi'] : "&nbsp;";?></th>               
	</tr>
	<tr>
		<th><?php echo e(Form::label('acc_AMOUNT_na_wi', 'AMOUNT / % (N/A in WI):')); ?></th>
		<th><?php echo $Compensation_data['acc_AMOUNT_na_wi'] ? $Compensation_data['acc_AMOUNT_na_wi'] : "&nbsp;" ;?></th>
		<th><?php echo e(Form::label('acc_other_coverage', 'OTHER COVERAGES:')); ?></th>
		<th><?php echo $Compensation_data['acc_other_coverage'] ? @$Compensation_data['acc_other_coverage'] : "&nbsp;";?></th>               
	</tr>
	<tr>
		<th><?php echo e(Form::label('acc_par2_liblaty_diseases_pol', 'DISEASE-POLICY LIMIT:')); ?></th>
		<th><?php echo $Compensation_data['acc_par2_liblaty_diseases_pol'] ? $Compensation_data['acc_par2_liblaty_diseases_pol'] : "&nbsp;" ;?></th>
		<th><?php echo e(Form::label('acc_par2_liblaty_diseses_each_emp', 'DISEASE-EACH EMPLOYEE:')); ?></th>
		<th><?php echo $Compensation_data['acc_par2_liblaty_diseses_each_emp'] ? @$Compensation_data['acc_par2_liblaty_diseses_each_emp'] : "&nbsp;";?></th>
	</tr>
	<tr>
		<th><?php echo e(Form::label('acc_DIVIDEND_safty_group', 'DIVIDEND PLAN/SAFETY GROUP:')); ?></th>
		<th><?php echo $Compensation_data['acc_DIVIDEND_safty_group'] ? $Compensation_data['acc_DIVIDEND_safty_group'] : "&nbsp;" ;?></th>
		<th><?php echo e(Form::label('acc__additional_company_issuie', 'ADDITIONAL COMPANY INFORMATION:')); ?></th>
		<th><?php echo $Compensation_data['acc__additional_company_issuie'] ? @$Compensation_data['acc__additional_company_issuie'] : "&nbsp;";?></th>
	</tr>
	<tr>
		<th><?php echo e(Form::label('acc__specify_additional_coverage', 'SPECIFY ADDITIONAL COVERAGES / ENDORSEMENTS (Attach ACORD 101, Additional Remarks Schedule, if more space is required):')); ?></th>
		<th><?php echo $Compensation_data['acc__specify_additional_coverage'] ? $Compensation_data['acc__specify_additional_coverage'] : "&nbsp;" ;?></th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
	</tr>	
	</tbody>
	</table>
	<br/><br/>
	<h3>TOTAL ESTIMATED ANNUAL PREMIUM - ALL STATES</h3> 
	<table id="design">
	<thead>
	  <tr>
		<th>TOTAL ESTIMATED ANNUAL PREMIUM ALL STATES</th>
		<th>TOTAL MINIMUM PREMIUM ALL STATES</th>
		<th>TOTAL DEPOSIT PREMIUM ALL STATES</th>
	  </tr>
	</thead>
	<tbody>
	  <tr>
		<td><?php echo $Compensation_data["acc_total_estimate_annual"] ? $Compensation_data["acc_total_estimate_annual"] : "&nbsp;";?></td>
		<td><?php echo $Compensation_data["acc_total_minimum_premium"] ? $Compensation_data["acc_total_minimum_premium"] : "&nbsp;";?></td>
		<td><?php echo $Compensation_data["acc_total_deposite_premium"] ? $Compensation_data["acc_total_deposite_premium"] : "&nbsp;";?></td>
	  </tr>
	</tbody>
	</table>
	<br/><br/>
	<h3>CONTACT INFORMATION</h3> 
	<table id="design">
	<thead>
	  <tr>
		<th>TYPE</th>
		<th>NAME</th>
		<th>OFFICE PHONE</th>
		<th>MOBILE PHONE</th>
		<th>E-MAIL</th>
	  </tr>
	</thead>
	<tbody>
	  <tr>
		<td>INSPECTION</td>
		<td><?php echo $Compensation_data["contact_info_name1"] ? $Compensation_data["contact_info_name1"] : "&nbsp;";?></td>
		<td><?php echo $Compensation_data["contact_info_office_phone1"] ? $Compensation_data["contact_info_office_phone1"] : "&nbsp;";?></td>
		<td><?php echo $Compensation_data["contact_info_mobile_1"] ? $Compensation_data["contact_info_mobile_1"] : "&nbsp;";?></td>
		<td><?php echo $Compensation_data["contact_info_email_1"] ? $Compensation_data["contact_info_email_1"] : "&nbsp;";?></td>
	  </tr>
	  <tr>
		<td>ACCTNG</td>
		<td><?php echo $Compensation_data["contact_info_name2"] ? $Compensation_data["contact_info_name2"] : "&nbsp;";?></td>
		<td><?php echo $Compensation_data["contact_info_office_phone2"] ? $Compensation_data["contact_info_office_phone2"] : "&nbsp;";?></td>
		<td><?php echo $Compensation_data["contact_info_mobile_2"] ? $Compensation_data["contact_info_mobile_2"] : "&nbsp;";?></td>
		<td><?php echo $Compensation_data["contact_info_email_2"] ? $Compensation_data["contact_info_email_2"] : "&nbsp;";?></td>
	  </tr>
	  <tr>
		<td>RECORD</td>
		<td><?php echo $Compensation_data["contact_info_name3"] ? $Compensation_data["contact_info_name3"] : "&nbsp;";?></td>
		<td><?php echo $Compensation_data["contact_info_office_phone3"] ? $Compensation_data["contact_info_office_phone3"] : "&nbsp;";?></td>
		<td><?php echo $Compensation_data["contact_info_mobile_3"] ? $Compensation_data["contact_info_mobile_3"] : "&nbsp;";?></td>
		<td><?php echo $Compensation_data["contact_info_email_3"] ? $Compensation_data["contact_info_email_3"] : "&nbsp;";?></td>
	  </tr>
	  <tr>
		<td>CLAIMS</td>
		<td><?php echo $Compensation_data["contact_info_name4"] ? $Compensation_data["contact_info_name4"] : "&nbsp;";?></td>
		<td><?php echo $Compensation_data["contact_info_office_phone4"] ? $Compensation_data["contact_info_office_phone4"] : "&nbsp;";?></td>
		<td><?php echo $Compensation_data["contact_info_mobile_4"] ? $Compensation_data["contact_info_mobile_4"] : "&nbsp;";?></td>
		<td><?php echo $Compensation_data["contact_info_email_4"] ? $Compensation_data["contact_info_email_4"] : "&nbsp;";?></td>
	  </tr>
	  <tr>
		<td>INFO</td>
		<td><?php echo $Compensation_data["contact_info_name5"] ? $Compensation_data["contact_info_name5"] : "&nbsp;";?></td>
		<td><?php echo $Compensation_data["contact_info_office_phone5"] ? $Compensation_data["contact_info_office_phone5"] : "&nbsp;";?></td>
		<td><?php echo $Compensation_data["contact_info_mobile_5"] ? $Compensation_data["contact_info_mobile_5"] : "&nbsp;";?></td>
		<td><?php echo $Compensation_data["contact_info_email_5"] ? $Compensation_data["contact_info_email_5"] : "&nbsp;";?></td>
	  </tr>
	</tbody>
	</table>
	
	<br/><br/>
	<h3>INDIVIDUALS INCLUDED / EXCLUDED</h3>
	<p>PARTNERS, OFFICERS, RELATIVES ( Must be employed by business operations) TO BE INCLUDED OR EXCLUDED (Remuneration/Payroll to be included must be part of rating information section.) Exclusions in Missouri must meet the requirements of Section 287.090 RSMo.</p>
	<table id="design">
	<thead>
	  <tr>
		<th>STATE</th>
		<th>LOC #</th>
		<th>NAME</th>
		<th>DATE OF BIRTH</th>
		<th>TITLE/ RELATIONSHIP</th>
		<th>OWNER- STATE LOC # SHIP %</th>
		<th>DUTIES</th>
		<th>INC/EXC</th>
		<th>CLASS CODE</th>
		<th>REMUNERATION/PAYROLL</th>
	  </tr>
	</thead>
	<tbody>
	<?php for($i=1;$i<=4;$i++){?>
	<tr>
		<td><?php echo $Compensation_data["INDIVIDUALS_INCLUDED_state".$i] ? $Compensation_data["INDIVIDUALS_INCLUDED_state".$i] : "&nbsp;";?></td>
		<td><?php echo $Compensation_data["INDIVIDUALS_INCLUDED_loc".$i] ? $Compensation_data["INDIVIDUALS_INCLUDED_loc".$i] : "&nbsp;";?></td>
		<td><?php echo $Compensation_data["INDIVIDUALS_INCLUDED_name".$i] ? $Compensation_data["INDIVIDUALS_INCLUDED_name".$i] : "&nbsp;";?></td>
		<td><?php echo $Compensation_data["INDIVIDUALS_INCLUDED_dob".$i] ? $Compensation_data["INDIVIDUALS_INCLUDED_dob".$i] : "&nbsp;";?></td>
		<td><?php echo $Compensation_data["INDIVIDUALS_INCLUDED_title".$i] ? $Compensation_data["INDIVIDUALS_INCLUDED_title".$i] : "&nbsp;";?></td>
		<td><?php echo $Compensation_data["INDIVIDUALS_INCLUDED_ownership".$i] ? $Compensation_data["INDIVIDUALS_INCLUDED_ownership".$i] : "&nbsp;";?></td>
		<td><?php echo $Compensation_data["INDIVIDUALS_INCLUDED_duty".$i] ? $Compensation_data["INDIVIDUALS_INCLUDED_duty".$i] : "&nbsp;";?></td>
		<td><?php echo $Compensation_data["INDIVIDUALS_INCLUDED_inc".$i] ? $Compensation_data["INDIVIDUALS_INCLUDED_inc".$i] : "&nbsp;";?></td>
		<td><?php echo $Compensation_data["INDIVIDUALS_INCLUDED_class".$i] ? $Compensation_data["INDIVIDUALS_INCLUDED_class".$i] : "&nbsp;";?></td>
		<td><?php echo $Compensation_data["INDIVIDUALS_INCLUDED_class".$i] ? $Compensation_data["INDIVIDUALS_INCLUDED_payrol".$i] : "&nbsp;";?></td>
	</tr>
	<?php } ?>	  
	</tbody>
	</table>	
	<br/><br/>
	<h3>RATING INFORMATION - STATE:</h3>
	<table id="design">
	<thead>
	  <tr>
		<th>LOC #</th>
		<th>CLASS CODE</th>
		<th>DESCR CODE</th>
		<th>CATEGORIES, DUTIES, CLASSIFICATIONS</th>
		<th># Full EMPLOYEES</th>
		<th># Part EMPLOYEES</th>
		<th>SIC</th>
		<th>NAICS</th>
		<th>ESTIMATED ANNUAL REMUNERATION/ PAYROLL</th>
		<th>RATE</th>
		<th>ESTIMATED ANNUAL MANUAL PREMIUM</th>
	  </tr>
	</thead>
	<tbody>
	<?php for($i=1;$i<=14;$i++){?>
	<tr>
		<td><?php echo $Compensation_data["RATING_LOC_no".$i] ? $Compensation_data["RATING_LOC_no".$i] : "&nbsp;";?></td>
		<td><?php echo $Compensation_data["RATING_class_code".$i] ? $Compensation_data["RATING_class_code".$i] : "&nbsp;";?></td>
		<td><?php echo $Compensation_data["RATING_DESCR_code".$i] ? $Compensation_data["RATING_DESCR_code".$i] : "&nbsp;";?></td>
		<td><?php echo $Compensation_data["RATING_CATEGORIES".$i] ? $Compensation_data["RATING_CATEGORIES".$i] : "&nbsp;";?></td>
		<td><?php echo $Compensation_data["RATING_fullemp".$i] ? $Compensation_data["RATING_fullemp".$i] : "&nbsp;";?></td>
		<td><?php echo $Compensation_data["RATING_partemp".$i] ? $Compensation_data["RATING_partemp".$i] : "&nbsp;";?></td>
		<td><?php echo $Compensation_data["RATING_sic".$i] ? $Compensation_data["RATING_sic".$i] : "&nbsp;";?></td>
		<td><?php echo $Compensation_data["RATING_NAICS".$i] ? $Compensation_data["RATING_NAICS".$i] : "&nbsp;";?></td>
		<td><?php echo $Compensation_data["RATING_PAYROLL".$i] ? $Compensation_data["RATING_PAYROLL".$i] : "&nbsp;";?></td>
		<td><?php echo $Compensation_data["RATING_RATE".$i] ? $Compensation_data["RATING_RATE".$i] : "&nbsp;";?></td>
		<td><?php echo $Compensation_data["RATING_PREMIUM".$i] ? $Compensation_data["RATING_PREMIUM".$i] : "&nbsp;";?></td>
	</tr>
	<?php } ?>	  
	</tbody>
	</table>
	<br/><br/>
	<h3>PREMIUM</h3>
	<table id="design">
	<thead>
	  <tr>
		<th>STATE:</th>
		<th>FACTOR</th>
		<th>FACTORED PREMIUM</th>
		<th></th>
		<th>FACTOR</th>
		<th>FACTORED PREMIUM</th>
	  </tr>
	</thead>
	<tbody>
	<tr>
		<td>TOTAL</td> 
		<td>N / A</td>
		<td><?php echo $Compensation_data["PREMIUM_STATEFACTORED1"] ? $Compensation_data["PREMIUM_STATEFACTORED1"] : "&nbsp;";?></td>
		<td></td>
		<td><?php echo $Compensation_data["PREMIUM_FACTOR1"] ? $Compensation_data["PREMIUM_FACTOR1"] : "&nbsp;";?></td>
		<td><?php echo $Compensation_data["PREMIUM_FACTORED1"] ? $Compensation_data["PREMIUM_FACTORED1"] : "&nbsp;";?></td>		
	</tr> 
	<tr>
		<td>INCREASED LIMITS</td>
		<td><?php echo $Compensation_data["PREMIUM_STATEFACTOR2"] ? $Compensation_data["PREMIUM_STATEFACTOR2"] : "&nbsp;";?></td>
		<td><?php echo $Compensation_data["PREMIUM_STATEFACTORED2"] ? $Compensation_data["PREMIUM_STATEFACTORED2"] : "&nbsp;";?></td>
		<td>SCHEDULE RATING *</td>
		<td><?php echo $Compensation_data["PREMIUM_FACTOR2"] ? $Compensation_data["PREMIUM_FACTOR2"] : "&nbsp;";?></td>		
		<td><?php echo $Compensation_data["PREMIUM_FACTORED2"] ? $Compensation_data["PREMIUM_FACTORED2"] : "&nbsp;";?></td>		
	</tr>
	<tr>
		<td>DEDUCTIBLE *</td>
		<td><?php echo $Compensation_data["PREMIUM_STATEFACTOR3"] ? $Compensation_data["PREMIUM_STATEFACTOR3"] : "&nbsp;";?></td>
		<td><?php echo $Compensation_data["PREMIUM_STATEFACTORED3"] ? $Compensation_data["PREMIUM_STATEFACTORED3"] : "&nbsp;";?></td>
		<td>CCPAP</td>
		<td><?php echo $Compensation_data["PREMIUM_FACTOR3"] ? $Compensation_data["PREMIUM_FACTOR3"] : "&nbsp;";?></td>		
		<td><?php echo $Compensation_data["PREMIUM_FACTORED3"] ? $Compensation_data["PREMIUM_FACTORED3"] : "&nbsp;";?></td>		
	</tr>
	<tr>
		<td></td>
		<td><?php echo $Compensation_data["PREMIUM_STATEFACTOR4"] ? $Compensation_data["PREMIUM_STATEFACTOR4"] : "&nbsp;";?></td>
		<td><?php echo $Compensation_data["PREMIUM_STATEFACTORED4"] ? $Compensation_data["PREMIUM_STATEFACTORED4"] : "&nbsp;";?></td>
		<td>STANDARD PREMIUM</td>
		<td><?php echo $Compensation_data["PREMIUM_FACTOR4"] ? $Compensation_data["PREMIUM_FACTOR4"] : "&nbsp;";?></td>		
		<td><?php echo $Compensation_data["PREMIUM_FACTORED4"] ? $Compensation_data["PREMIUM_FACTORED4"] : "&nbsp;";?></td>		
	</tr>
	<tr>
		<td>EXPERIENCE OR MERIT</td>
		<td><?php echo $Compensation_data["PREMIUM_STATEFACTOR5"] ? $Compensation_data["PREMIUM_STATEFACTOR5"] : "&nbsp;";?></td>
		<td><?php echo $Compensation_data["PREMIUM_STATEFACTORED5"] ? $Compensation_data["PREMIUM_STATEFACTORED5"] : "&nbsp;";?></td>
		<td>PREMIUM DISCOUNT</td>
		<td><?php echo $Compensation_data["PREMIUM_FACTOR5"] ? $Compensation_data["PREMIUM_FACTOR5"] : "&nbsp;";?></td>		
		<td><?php echo $Compensation_data["PREMIUM_FACTORED5"] ? $Compensation_data["PREMIUM_FACTORED5"] : "&nbsp;";?></td>		
	</tr>
	<tr>
		<td></td>
		<td><?php echo $Compensation_data["PREMIUM_STATEFACTOR6"] ? $Compensation_data["PREMIUM_STATEFACTOR6"] : "&nbsp;";?></td>
		<td><?php echo $Compensation_data["PREMIUM_STATEFACTORED6"] ? $Compensation_data["PREMIUM_STATEFACTORED6"] : "&nbsp;";?></td>
		<td>EXPENSE CONSTANT</td>
		<td>N / A</td>		
		<td><?php echo $Compensation_data["PREMIUM_FACTORED6"] ? $Compensation_data["PREMIUM_FACTORED6"] : "&nbsp;";?></td>		
	</tr>
	<tr>
		<td>ASSIGNED RISK SURCHARGE *</td>
		<td><?php echo $Compensation_data["PREMIUM_STATEFACTOR7"] ? $Compensation_data["PREMIUM_STATEFACTOR7"] : "&nbsp;";?></td>
		<td><?php echo $Compensation_data["PREMIUM_STATEFACTORED7"] ? $Compensation_data["PREMIUM_STATEFACTORED7"] : "&nbsp;";?></td>
		<td>TAXES / ASSESSMENTS *</td>
		<td>N / A</td>		
		<td><?php echo $Compensation_data["PREMIUM_FACTORED7"] ? $Compensation_data["PREMIUM_FACTORED7"] : "&nbsp;";?></td>		
	</tr>
	<tr>
		<td>ARAP *</td>
		<td><?php echo $Compensation_data["PREMIUM_STATEFACTOR8"] ? $Compensation_data["PREMIUM_STATEFACTOR8"] : "&nbsp;";?></td>
		<td><?php echo $Compensation_data["PREMIUM_STATEFACTORED8"] ? $Compensation_data["PREMIUM_STATEFACTORED8"] : "&nbsp;";?></td>
		<td></td>	
		<td><?php echo $Compensation_data["PREMIUM_FACTOR8"] ? $Compensation_data["PREMIUM_FACTOR8"] : "&nbsp;";?></td>		
		<td><?php echo $Compensation_data["PREMIUM_FACTORED8"] ? $Compensation_data["PREMIUM_FACTORED8"] : "&nbsp;";?></td>		
	</tr>
	<tr>
		<td colspan="6">* N / A in Wisconsin</td>   
	</tr>
	</tbody>
	<thead>
	<tr>
		<th colspan="2">TOTAL ESTIMATED ANNUAL PREMIUM</th>
		<th colspan="2">MINIMUM PREMIUM</th>
		<th colspan="2">DEPOSIT PREMIUM</th>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td colspan="2"><?php echo $Compensation_data["PREMIUM_total_ANNUAL_P"] ? $Compensation_data["PREMIUM_total_ANNUAL_P"] : "&nbsp;";?></td>
		<td colspan="2"><?php echo $Compensation_data["PREMIUM_MINIMUM_P"] ? $Compensation_data["PREMIUM_MINIMUM_P"] : "&nbsp;";?></td>
		<td colspan="2"><?php echo $Compensation_data["PREMIUM_DEPOSIT_P"] ? $Compensation_data["PREMIUM_DEPOSIT_P"] : "&nbsp;";?></td>
	</tr>
	</tbody>
	</table>
	<br/><br/>
	<h3>REMARKS (ACORD 101, Additional Remarks Schedule, may be attached if more space is required)</h3>
	<table id="design">
	<tbody>
	<tr>
		<td colspan="2"><?php echo $Compensation_data["acc_remarks"] ? $Compensation_data["acc_remarks"] : "&nbsp;";?></td>
	</tr>
	</tbody>
	</table>
	
	<br /><br />
	<h3>PRIOR CARRIER INFORMATION / LOSS HISTORY</h3>
	<br /><br />
	<h3>AGENCY CUSTOMER ID:</h3>
	<table id="design">
	<thead>
	  <tr>
		<th>PROVIDE INFORMATION FOR THE PAST 5 YEARS AND USE THE REMARKS SECTION FOR LOSS DETAILS</th>
		<th>LOSS RUN ATTACHED</th>
	  </tr>
	</thead>
	</table>
	<table id="design">
	<thead>
	  <tr>
		<th>YEAR</th>
		<th>CARRIER & POLICY NUMBER</th>
		<th>ANNUAL PREMIUM</th>
		<th>MOD</th>
		<th># CLAIMS</th>
		<th>AMOUNT PAID</th>
		<th>RESERVE</th>
	  </tr>
	</thead>
	<tbody>
	<?php for($i=1;$i<=10;$i++){
	if($i > 3 ){
		$PRIOR_YEAR = 'PRIOR_YEAR'.$i;
	} else {
		$PRIOR_YEAR = 'PRIOR_YEAR'.$i.'_';
	}?>
	<tr>		
		<td><?php echo $Compensation_data[$PRIOR_YEAR] ? $Compensation_data[$PRIOR_YEAR] : "&nbsp;";?></td>
		<td><?php echo $Compensation_data["PRIOR_CARRIERNo".$i] ? $Compensation_data["PRIOR_CARRIERNo".$i] : "&nbsp;";?></td>
		<td><?php echo $Compensation_data["PRIOR_ANNUALPREMIUM".$i] ? $Compensation_data["PRIOR_ANNUALPREMIUM".$i] : "&nbsp;";?></td>	
		<td><?php echo $Compensation_data["PRIOR_MOD".$i] ? $Compensation_data["PRIOR_MOD".$i] : "&nbsp;";?></td>	
		<td><?php echo $Compensation_data["PRIOR_CLAIMS".$i] ? $Compensation_data["PRIOR_CLAIMS".$i] : "&nbsp;";?></td>	
		<td><?php echo $Compensation_data["PRIOR_AMOUNTPAID".$i] ? $Compensation_data["PRIOR_AMOUNTPAID".$i] : "&nbsp;";?></td>	
		<td><?php echo $Compensation_data["PRIOR_RESERVE".$i] ? $Compensation_data["PRIOR_RESERVE".$i] : "&nbsp;";?></td>	
	</tr>
	<?php } ?>
	</tbody>
	</table>
	<br/><br/>
	<h3>NATURE OF BUSINESS / DESCRIPTION OF OPERATIONS</h3>
	<table id="design">
		<thead>
			<tr>
				<th colspan="3">GIVE COMMENTS AND DESCRIPTIONS OF BUSINESS, OPERATIONS AND PRODUCTS: MANUFACTURING - RAW MATERIALS, PROCESSES, PRODUCT, EQUIPMENT; CONTRACTOR - TYPE OF WORK, SUB-CONTRACTS; MERCANTILE - MERCHANDISE, CUSTOMERS, DELIVERIES; SERVICE - TYPE, LOCATION; FARM - ACREAGE, ANIMALS, MACHINERY, SUB-CONTRACTS.
				</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td colspan="3"><?php echo $Compensation_data["acc_nature_description"] ? $Compensation_data["acc_nature_description"] : "&nbsp;";?></td>
			</tr>
		</tbody>
	</table>
	<br/><br/>
	<h3>GENERAL INFORMATION</h3>
	<table id="design">
		<thead>
			<tr>
				<th>EXPLAIN ALL "YES" RESPONSES</th>
				<th>Y / N</th>
			</tr>
		</thead>
		<tbody>
		<tr>
			<td>1. DOES APPLICANT OWN, OPERATE OR LEASE AIRCRAFT / WATERCRAFT?</td>
			<td><?php echo $Compensation_data["acc_watercraft_yes_no"] ? $Compensation_data["acc_watercraft_yes_no"] : "&nbsp;";?></td>
		</tr>
		<tr>
			<td>2. DO / HAVE PAST, PRESENT OR DISCONTINUED OPERATIONS INVOLVE(D) STORING, TREATING, DISCHARGING, APPLYING, DISPOSING, OR TRANSPORTING OF HAZARDOUS MATERIAL? (e.g. landfills, wastes, fuel tanks, etc)</td>
			<td><?php echo $Compensation_data["acc_DISCONTINUED_OPERATIONS"] ? $Compensation_data["acc_DISCONTINUED_OPERATIONS"] : "&nbsp;";?></td>
		</tr>
		<tr>
			<td>3. ANY WORK PERFORMED UNDERGROUND OR ABOVE 15 FEET?</td>
			<td><?php echo $Compensation_data["acc_above_under15"] ? $Compensation_data["acc_above_under15"] : "&nbsp;";?></td>
		</tr>
		<tr>
			<td>4. ANY WORK PERFORMED ON BARGES, VESSELS, DOCKS, BRIDGE OVER WATER?</td>
			<td><?php echo $Compensation_data["acc_BRIDGE_over_water"] ? $Compensation_data["acc_BRIDGE_over_water"] : "&nbsp;";?></td>
		</tr>
		<tr>
			<td>5. IS APPLICANT ENGAGED IN ANY OTHER TYPE OF BUSINESS?</td>
			<td><?php echo $Compensation_data["acc_any_other_busness"] ? $Compensation_data["acc_any_other_busness"] : "&nbsp;";?></td>
		</tr>
		<tr>
			<td>6. ARE SUB-CONTRACTORS USED? (If "YES", give % of work subcontracted)</td>
			<td><?php echo $Compensation_data["acc_sub_contracted"] ? $Compensation_data["acc_sub_contracted"] : "&nbsp;";?></td>
		</tr>
		<tr>
			<td>7. ANY WORK SUBLET WITHOUT CERTIFICATES OF INSURANCE? (If "YES", payroll for this work must be included in the State Rating Worksheet on Page 2)</td>
			<td><?php echo $Compensation_data["acc_without_insurance"] ? $Compensation_data["acc_without_insurance"] : "&nbsp;";?></td>
		</tr>
		<tr>
			<td>8. IS A WRITTEN SAFETY PROGRAM IN OPERATION?</td>
			<td><?php echo $Compensation_data["acc_writen_safty_program"] ? $Compensation_data["acc_writen_safty_program"] : "&nbsp;";?></td>
		</tr>
		<tr>
			<td>9. ANY GROUP TRANSPORTATION PROVIDED?</td>
			<td><?php echo $Compensation_data["acc_group_transportation"] ? $Compensation_data["acc_group_transportation"] : "&nbsp;";?></td>
		</tr>
		<tr>
			<td>10. ANY EMPLOYEES UNDER 16 OR OVER 60 YEARS OF AGE?</td>
			<td><?php echo $Compensation_data["acc_employees_under16"] ? $Compensation_data["acc_employees_under16"] : "&nbsp;";?></td>
		</tr>
		<tr>
			<td>11. ANY SEASONAL EMPLOYEES?</td>
			<td><?php echo $Compensation_data["acc_seasonal_employee"] ? $Compensation_data["acc_seasonal_employee"] : "&nbsp;";?></td>
		</tr>
		<tr>
			<td>12. IS THERE ANY VOLUNTEER OR DONATED LABOR? (If "YES", please specify)</td>
			<td><?php echo $Compensation_data["acc_volunteer_donated"] ? $Compensation_data["acc_volunteer_donated"] : "&nbsp;";?></td>
		</tr>
		<tr>
			<td>13. ANY EMPLOYEES WITH PHYSICAL HANDICAPS?</td>
			<td><?php echo $Compensation_data["acc_employees_handicaped"] ? $Compensation_data["acc_employees_handicaped"] : "&nbsp;";?></td>
		</tr>
		<tr>
			<td>14. DO EMPLOYEES TRAVEL OUT OF STATE? (If "YES", indicate state(s) of travel and frequency)</td>
			<td><?php echo $Compensation_data["acc_employees_travel_out_state"] ? $Compensation_data["acc_employees_travel_out_state"] : "&nbsp;";?></td>
		</tr>
		<tr>
			<td>15. ARE ATHLETIC TEAMS SPONSORED?</td>
			<td><?php echo $Compensation_data["acc_atheletic_team"] ? $Compensation_data["acc_atheletic_team"] : "&nbsp;";?></td>
		</tr>
		<tr>
			<td>16. ARE PHYSICALS REQUIRED AFTER OFFERS OF EMPLOYMENT ARE MADE?</td>
			<td><?php echo $Compensation_data["acc_physical_required"] ? $Compensation_data["acc_physical_required"] : "&nbsp;";?></td>
		</tr>
		<tr>
			<td>17. ANY OTHER INSURANCE WITH THIS INSURER?</td>
			<td><?php echo $Compensation_data["acc_other_insurance"] ? $Compensation_data["acc_other_insurance"] : "&nbsp;";?></td>
		</tr>
		<tr>
			<td>18. ANY PRIOR COVERAGE DECLINED / CANCELLED / NON-RENEWED IN THE LAST THREE (3) YEARS? (Missouri Applicants - Do not answer this question)</td>
			<td><?php echo $Compensation_data["acc_prior_coverage"] ? $Compensation_data["acc_prior_coverage"] : "&nbsp;";?></td>
		</tr>
		<tr>
			<td>19. ARE EMPLOYEE HEALTH PLANS PROVIDED?</td>
			<td><?php echo $Compensation_data["acc_employees_health_plan"] ? $Compensation_data["acc_employees_health_plan"] : "&nbsp;";?></td>
		</tr>
		<tr>
			<td>20. DO ANY EMPLOYEES PERFORM WORK FOR OTHER BUSINESSES OR SUBSIDIARIES?</td>
			<td><?php echo $Compensation_data["acc_employees_buisness_subdieries"] ? $Compensation_data["acc_employees_buisness_subdieries"] : "&nbsp;";?></td>
		</tr>
		<tr>
			<td>21. DO YOU LEASE EMPLOYEES TO OR FROM OTHER EMPLOYERS?</td>
			<td><?php echo $Compensation_data["acc_employees_lease"] ? $Compensation_data["acc_employees_lease"] : "&nbsp;";?></td>
		</tr>
		<tr>
			<td>22. DO ANY EMPLOYEES PREDOMINANTLY WORK AT HOME? If "YES", # of Employees:</td>
			<td><?php echo $Compensation_data["acc_employees_PREDOMINANTLY_work"] ? $Compensation_data["acc_employees_PREDOMINANTLY_work"] : "&nbsp;";?></td>
		</tr>
		<tr>
			<td>23. ANY TAX LIENS OR BANKRUPTCY WITHIN THE LAST FIVE (5) YEARS? (If "YES", please specify)</td>
			<td><?php echo $Compensation_data["acc_tax_liens_5hours"] ? $Compensation_data["acc_tax_liens_5hours"] : "&nbsp;";?></td>
		</tr>
		<tr>
			<td>24. ANY UNDISPUTED AND UNPAID WORKERS COMPENSATION PREMIUM DUE FROM YOU OR ANY COMMONLY MANAGED OR OWNED ENTERPRISES? IF YES, EXPLAIN INCLUDING ENTITY NAME(S) AND POLICY NUMBER(S).</td>
			<td><?php echo $Compensation_data["acc_UNDISPUTED_unpaid_work"] ? $Compensation_data["acc_UNDISPUTED_unpaid_work"] : "&nbsp;";?></td>
		</tr>
		</tbody>
	</table>
	<?php } ?>	
</body>
</html>