<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/login', 'IndexController@index');
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
		Route::get('/', 'IndexController@index');
		Route::get('/forgotpass', 'IndexController@forgotpass');
		Route::get('/resetpassword/{id}', 'IndexController@resetpassword');
		Route::post('/newpass', 'IndexController@newpass');
		Route::post('/forgotemail', 'IndexController@forgotemail');
		Route::post('login', 'IndexController@postLogin');
		Route::get('logout', 'IndexController@logout');
		Route::get('dashboard', 'DashboardController@index');
		Route::get('profile', 'AdminController@profile');	
		Route::post('updateProfile', 'AdminController@updateProfile');	 
		Route::any('AddCompany', 'AdminController@addCompany');
		Route::any('AllCompanies', 'AdminController@allCompany');
		Route::any('DeleteCompany/{id}', 'AdminController@deleteCompany');
		Route::any('updateCompany/{id}', 'AdminController@updateCompany');
		Route::any('viewCompany/{id}', 'AdminController@viewCompany');
		Route::any('updateCompanyData', 'AdminController@updateCompanyData');
		
		Route::any('AddBroker', 'AdminController@addBroker');
		Route::post('brokerRegister', 'AdminController@brokerregister');
		Route::any('AllBrokers', 'AdminController@allBroker');
		Route::any('DeleteBroker/{id}', 'AdminController@deleteBroker');
		Route::any('updateBroker/{id}', 'AdminController@updateBroker');
		Route::any('updateBrokerData', 'AdminController@updateBrokerData');
		
		
		Route::any('AddLead', 'AdminController@addLead');
		Route::post('leadRegister', 'AdminController@leadregister');
		Route::any('AllLeads', 'AdminController@allLeads');
		Route::any('DeleteLead/{id}', 'AdminController@deleteLead');
		Route::any('updateLead/{id}', 'AdminController@updateLead');
		Route::any('viewLead/{id}', 'AdminController@viewLead');
		Route::any('updateLeadData', 'AdminController@updateLeadData');
		Route::any('status/{id}', 'AdminController@change_status');
		
		
		Route::any('GetCompamyForLeadAssign', 'AdminController@getCompamyForLeadAssign');
		Route::any('SaveAssignedLead', 'AdminController@saveAssignedLead');
		
		Route::any('AddUser', 'AdminController@addUser');
		Route::post('userRegister', 'AdminController@userregister');
		Route::any('AllUsers', 'AdminController@allUsers');
		Route::any('DeleteUser/{id}', 'AdminController@deleteUser');
		Route::any('updateUser/{id}', 'AdminController@updateUser');
		Route::any('viewUser/{id}', 'AdminController@viewUser');
		Route::any('viewBroker/{id}', 'AdminController@viewBroker');
		Route::any('updateUserData', 'AdminController@updateUserData');
		
		Route::any('leadHistory/{id}', 'AdminController@leadHistory');
		
		Route::get('all-rates', 'AdminController@all_rates');
		Route::get('add-rate', 'AdminController@add_rate');
		Route::post('add-rate', 'AdminController@add_rate_post');
		Route::post('rates/import_rates', 'AdminController@import_rates');
		Route::get('rates/{id}', 'AdminController@edit_rate');
		Route::get('rates/delete/{id}', 'AdminController@delete_rate');
		Route::get('viewrate/{id}', 'AdminController@veiw_rate');
		Route::post('profile_pass', 'AdminController@updatePassword');
		Route::get('settings', 'SettingsController@settings');	
		Route::post('settings', 'SettingsController@settingsUpdates');	
		
		Route::post('downloadPdf', 'AdminController@DownloadPdf');
		Route::any('view_quote/{id}','AdminController@View_Quote');
		Route::any('viewquote/{id}','AdminController@viewquote');
		Route::post('set_quote_status', 'AdminController@set_quote_status');
		
});

/*  broker routing  */

Route::group(['namespace' => 'Broker', 'prefix' => 'broker'], function () {
		//Route::get('/', 'IndexController@index');
		//Route::get('sign-up', 'IndexController@register');
		Route::post('register', 'IndexController@postregister');
		//Route::post('login', 'IndexController@postLogin');
		//Route::get('logout', 'IndexController@logout');
		Route::get('dashboard', 'DashboardController@index');
		Route::get('profile', 'BrokerController@profile');	
		Route::post('profile', 'BrokerController@updateProfile');	
		Route::post('profile_pass', 'BrokerController@updatePassword');
		Route::get('addbrokerlead', 'BrokerController@addBrokerLead');
		Route::post('leadRegister', 'BrokerController@leadregister');
		Route::any('allbrokerleads', 'BrokerController@allLeads');
		Route::any('updateLead/{id}', 'BrokerController@updateLead');
		Route::any('viewLead/{id}', 'BrokerController@viewLead');
		//Route::any('updateLead/{id}', 'AdminController@updateLead');
		Route::any('updateLeadDataBroker', 'BrokerController@updateLeadDataBroker');
		Route::any('DeleteLead/{id}', 'BrokerController@deleteLead');
		
		Route::any('editBroker/{id}', 'BrokerController@editBroker');
		Route::any('editBrokerData', 'BrokerController@editBrokerData');
		
		Route::post('leadregister', 'BrokerController@leadregister');
		Route::post('request_for_proposalform', 'BrokerController@request_for_proposalform');
		Route::post('request_for_compansation', 'BrokerController@request_for_compansation');
		
		Route::post('search-classcode', 'BrokerController@search_desc_class_code');
		Route::post('downloadPdf', 'BrokerController@DownloadPdf');
		Route::any('viewquotes/{id}','BrokerController@viewquotes');
		Route::any('quotedetails/{id}','BrokerController@quotedetails');
	
}); 


/*  company routing  */

Route::group(['namespace' => 'Company', 'prefix' => 'company'], function () {
		//Route::get('/', 'IndexController@index');
		//Route::get('sign-up', 'IndexController@register');
		Route::post('register', 'IndexController@postregister');
		//Route::post('login', 'IndexController@postLogin');
		//Route::get('logout', 'IndexController@logout');
		Route::get('dashboard', 'DashboardController@index');
		Route::get('profile', 'BrokerController@profile');	
		Route::post('profile', 'BrokerController@updateProfile');	
		Route::post('profile_pass', 'BrokerController@updatePassword');
		Route::any('comapnyleads', 'CompanyController@comapnyleads');
		Route::any('editCompany/{id}', 'CompanyController@editCompany');
	    Route::any('updateCompanyData', 'CompanyController@updateCompanyData');
		Route::any('viewLead/{id}', 'CompanyController@viewLead');
		Route::post('downloadPdf', 'CompanyController@DownloadPdf');
		Route::post('SendQuote', 'CompanyController@SendQuote');
}); 


/* front end   routing  */
		//Route::get('/', 'Front\HomeController@index');

 Route::group(['namespace' =>'Front'], function () {
		Route::get('/', 'HomeController@index');
		Route::get('/signin', 'HomeController@signin');
		Route::get('/signup', 'HomeController@signin');
		Route::post('/signup', 'HomeController@signin_req');
		Route::get('/signup-company',function(){return view('front.pages.register_company'); });
		Route::get('/signup-broker',function(){return view('front.pages.register_broker'); });
		Route::get('login', 'HomeController@login');
		Route::post('login', 'HomeController@postLogin');
		Route::get('/dashboard', 'HomeController@dashboard');
		Route::get('/logout', 'HomeController@logout');
		Route::get('/support-ticket', 'HomeController@support_ticket');
		Route::post('/support-ticket', 'HomeController@postsupport_ticket');
		
		// Password reset link request routes...
    Route::get('password/email', 'Auth\PasswordController@getEmail');
    Route::post('password/email', 'Auth\PasswordController@postEmail');
    Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
    Route::post('password/reset', 'Auth\PasswordController@postReset'); 

		
});  