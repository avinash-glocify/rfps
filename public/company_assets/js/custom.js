$(document).ready(function(){
	/* $('#email').focusout(function() {
		
      $("#email").css('border-color','');
    });
	$('#company_name').focusout(function() {
      $("#company_name").css('border-color','');
    });
	$('#email').focusout(function() {
      $("#email").css('border-color','');
    });
	$('#first_name').focusout(function() {
      $("#first_name").css('border-color','');
    });
	$('#last_name').focusout(function() {
      $("#last_name").css('border-color','');
    });
	$('#address').focusout(function() {
      $("#address").css('border-color','');
    }); */
	$("#companysign").click(function(){
		  var isValid;
		  var isId;
		  var email =$("#email").val();
		  var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
		  if(email=='')
		  {
			  $("#email").css('border-color','red');
			  $("#email").addClass('isValid');
			  
			  isValid=false;
			  isId='email';
		  }else if(!filter.test(email))
			{
				 
				$('#emailerror').text('Please enter the valid email address.');
				$('#emailerror').css('color','red');
				$("#email").css('border-color','red');
				 isValid = false;
				 $("#email").addClass('isValid');
				 
			} 
		  else{
			  $("#email").css('border-color','');
			  $('#emailerror').text('');
		  }
		  var company = $("#company_name").val();
		  if(company=='')
		  {
			  $("#company_name").css('border-color','red');
			  
			  isValid=false;
		  }else{
			  $("#company_name").css('border-color','');
			  
		  }
		  var first_name = $("#first_name").val();
		  if(first_name=='')
		  {
			  $("#first_name").css('border-color','red');
			  isValid=false;
		  }else{
			  $("#first_name").css('border-color','');
		  }
          var last_name = $("#last_name").val();
		  if(last_name=='')
		  {
			  $("#last_name").css('border-color','red');
			  isValid=false;
		  }else{
			  $("#last_name").css('border-color','');
		  }
		  var address = $("#address").val();
		  if(address=='')
		  {
			  $("#address").css('border-color','red');
			  isValid=false;
		  }else{
			  $("#address").css('border-color','');
		  }
		  var address2 = $("#address2").val();
		  if(address2=='')
		  {
			  $("#address2").css('border-color','red');
			  isValid=false;
		  }else{
			  $("#address2").css('border-color','');
		  }
		  var country = $("#country").val();
		  if(country=='')
		  {
			  $("#country").css('border-color','red');
			  isValid=false;
		  }else{
			  $("#country").css('border-color','');
		  }
		  var state = $("#state").val();
		  if(state=='')
		  {
			  $("#state").css('border-color','red');
			  isValid=false;
		  }else{
			  $("#state").css('border-color','');
		  }
		  var city = $("#city").val();
		  if(city=='')
		  {
			  $("#city").css('border-color','red');
			  $("#city").addClass('isValid');
			  isValid=false;
		  }else{
			  $("#city").css('border-color','');
		  }
		  var number_of_employee = $("#number_of_employee").val();
		  if(number_of_employee=='')
		  {
			  $("#number_of_employee").css('border-color','red');
			  isValid=false;
		  }else{
			  $("#number_of_employee").css('border-color','');
		  }
		  var response_time = $("#response_time").val();
		  if(response_time=='')
		  {
			  $("#response_time").css('border-color','red');
			  isValid=false;
		  }else{
			  $("#response_time").css('border-color','');
		  }
		  var contact_number = $("#contact_number").val();
		  if(contact_number=='')
		  {
			  $("#contact_number").css('border-color','red');
			  isValid=false;
		  }else{
			  $("#contact_number").css('border-color','');
		  }
		  var website_url = $("#website_url").val();
		  var res = /^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}/;
		  if(website_url=='')
		  {
			  $("#website_url").css('border-color','red');
			  $("#website_url").addClass('isValid');
			  isValid=false;
		  }
          else if(!res.test(website_url))
			{

				$('#urlerror').text('Please enter the valid url.');
				$('#urlerror').css('color','red');
				$("#website_url").css('border-color','red');
				 isValid = false;
			}		  
		  else{
			  $("#website_url").css('border-color','');
			  $('#urlerror').text('');
		  }		  
		  var preferr_state = $("#preferr_state").val();
		  if(preferr_state=='')
		  { 
			  $("#err_state").text('Please select atleast one.');
			  isId='preferr_state';
			  isValid=false;
		  }else{
			  $("#err_state").text('');
		  }
		  
		   var preferr_interest = $("#preferr_interest").val();
		  if(preferr_interest=='')
		  { 
			  $("#err_interest").text('Please select atleast one.');
			  isValid=false;
		  }else{
			  $("#err_interest").text('');
		  }
		  var preferr_industry = $("#preferr_industry").val();
		  if(preferr_industry=='')
		  { 
			  $("#err_industry").text('Please select atleast one.');
			  isValid=false;
		  }else{
			  $("#err_industry").text('');
		  }
		  var password1 = $("#password").val();
		  var pass = $("#pass").val();
		  
		  if(password1=='')
		  { 
			  $("#password").css('border-color','red');
			  isValid=false;
		  }else if(password1!=pass)
		  {
			 $("#password").css('border-color','red'); 
			 $("#passerr").text('Password and Confirm Password does not match.'); 
			 $("#passerr").css('color','red'); 
			  isValid=false;
		  }	  
		  else{
			  $("#password").css('border-color','');;
			  $("#passerr").text('');
		  }
		  
		  var isChecked= document.getElementById('agree').checked;
			if(isChecked){ //checked
			  $("#err_agree").text('');
			}else{ //unchecked
			  $("#err_agree").text('Please select');
			  $("#err_agree").css('color','red');
			  isValid=false;
			}
          if(isValid==false)
          {
			  //$("input").each(function() {
			   
			   //if($(this).val()==''){
				   //var val=$(this).attr('id');
				    $('html, body').animate({
				   scrollTop: $("input.isValid").offset().top
				   }, 50);
			   //}  
			 // });
			  
			  /* $('html, body').animate({
				scrollTop: ($('#email').offset().top)
			  },1500); */
			 
			  return false;
		  }			  
	});
	
	$("#submit_broker").click(function(){
		  var isValid;
		  var isId;
		  var email =$("#email").val();
		  var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
		  if(email=='')
		  {
			  $("#email").css('border-color','red');
			  $("#email").addClass('isValid');
			  
			  isValid=false;
			  isId='email';
		  }else if(!filter.test(email))
			{
				 
				$('#emailerror').text('Please enter the valid email address.');
				$('#emailerror').css('color','red');
				$("#email").css('border-color','red');
				 isValid = false;
				 $("#email").addClass('isValid');
				 
			} 
		  else{
			  $("#email").css('border-color','');
			  $('#emailerror').text('');
		  }
		  var company = $("#company_name").val();
		  if(company=='')
		  {
			  $("#company_name").css('border-color','red');
			  
			  isValid=false;
		  }else{
			  $("#company_name").css('border-color','');
			  
		  }
		  var first_name = $("#first_name").val();
		  if(first_name=='')
		  {
			  $("#first_name").css('border-color','red');
			  isValid=false;
		  }else{
			  $("#first_name").css('border-color','');
		  }
          var last_name = $("#last_name").val();
		  if(last_name=='')
		  {
			  $("#last_name").css('border-color','red');
			  isValid=false;
		  }else{
			  $("#last_name").css('border-color','');
		  }
		  var address = $("#address").val();
		  if(address=='')
		  {
			  $("#address").css('border-color','red');
			  isValid=false;
		  }else{
			  $("#address").css('border-color','');
		  }
		  var address1 = $("#address1").val();
		  if(address1=='')
		  {
			  $("#address1").css('border-color','red');
			  isValid=false;
		  }else{
			  $("#address1").css('border-color','');
		  }
		  var country = $("#country").val();
		  if(country=='')
		  {
			  $("#country").css('border-color','red');
			  isValid=false;
		  }else{
			  $("#country").css('border-color','');
		  }
		  var state = $("#state").val();
		  if(state=='')
		  {
			  $("#state").css('border-color','red');
			  isValid=false;
		  }else{
			  $("#state").css('border-color','');
		  }
		  var city = $("#city").val();
		  if(city=='')
		  {
			  $("#city").css('border-color','red');
			  $("#city").addClass('isValid');
			  isValid=false;
		  }else{
			  $("#city").css('border-color','');
		  }
		  var fax_number = $("#fax_number").val();
		  if(fax_number=='')
		  {
			  $("#fax_number").css('border-color','red');
			  isValid=false;
		  }else{
			  $("#fax_number").css('border-color','');
		  }
		   var federal_ID = $("#federal_ID").val();
		  if(federal_ID=='')
		  {
			  $("#federal_ID").css('border-color','red');
			  isValid=false;
		  }else{
			  $("#federal_ID").css('border-color','');
		  }
		  var social_security = $("#social_security").val();
		  if(social_security =='')
		  {
			  $("#social_security").css('border-color','red');
			  isValid=false;
		  }else{
			  $("#social_security").css('border-color','');
		  }
		  var employer_id_number1 = $("#employer_id_number").val();
		  if(employer_id_number1 =='')
		  {
			  $("#employer_id_number").css('border-color','red');
			  isValid=false;
		  }else{
			  $("#employer_id_number").css('border-color','');
		  }
		  
		  var doingBusinessAs = $("#doingBusinessAs").val();
		  if(doingBusinessAs=='')
		  {
			  $("#doingBusinessAs").css('border-color','red');
			  isValid=false;
		  }else{
			  $("#doingBusinessAs").css('border-color','');
		  }
		  var contact_number = $("#contact_number").val();
		  if(contact_number=='')
		  {
			  $("#contact_number").css('border-color','red');
			  isValid=false;
		  }else{
			  $("#contact_number").css('border-color','');
		  }
		  var website_url = $("#website_url").val();
		  var res = /^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}/;
		  if(website_url=='')
		  {
			  $("#website_url").css('border-color','red');
			  $("#website_url").addClass('isValid');
			  isValid=false;
		  }
          else if(!res.test(website_url))
			{

				$('#urlerror').text('Please enter the valid url.');
				$('#urlerror').css('color','red');
				$("#website_url").css('border-color','red');
				 isValid = false;
			}		  
		  else{
			  $("#website_url").css('border-color','');
			  $('#urlerror').text('');
		  }		  
		  
		  var password1 = $("#password").val();
		  var pass = $("#pass").val();
		  
		  if(password1=='')
		  { 
			  $("#password").css('border-color','red');
			  isValid=false;
		  }else if(password1!=pass)
		  {
			 $("#password").css('border-color','red'); 
			 $("#passerr").text('Password and Confirm Password does not match.'); 
			 $("#passerr").css('color','red'); 
			  isValid=false;
		  }	  
		  else{
			  $("#password").css('border-color','');;
			  $("#passerr").text('');
		  }
		  
		  var isChecked= document.getElementById('agree').checked;
			if(isChecked){ //checked
			  $("#err_agree").text('');
			}else{ //unchecked
			  $("#err_agree").text('Please select');
			  $("#err_agree").css('color','red');
			  isValid=false;
			}
          if(isValid==false)
          {
			  //$("input").each(function() {
			   
			   //if($(this).val()==''){
				   //var val=$(this).attr('id');
				    $('html, body').animate({
				    scrollTop: $("#email").offset().top
				   }, 1000);
			   //}  
			 // });
			  
			  /* $('html, body').animate({
				scrollTop: ($('#email').offset().top)
			  },1500); */
			 
			  return false;
		  }			  
	});
});