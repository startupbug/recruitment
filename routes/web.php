<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Common/General Routes Started

Route::post("/dashboard_search","Recruiter\RecruiterController@dashboard_search")->name("dashboard_search");

Route::get('/logout', 'PagesController@logout_function')->name('logout_function');
/*Authentication Routes Started*/
Route::get('/', 'AuthenticationController@login_index')->name('login_index');
Route::post('/login', 'AuthenticationController@login_post')->name('login_post');
Route::get('/register', 'AuthenticationController@register_index')->name('register_index');
Route::post('/register', 'AuthenticationController@register_post')->name('register_post');
/*Authentication Routes Ended*/
//Common/General Routes Started

/*Admin Routes Started*/
Route::group(['prefix' => 'admin' ,  'middleware' => 'is-admin'], function () {

	Route::get('/', 'Admin\AdminController@index')->name('admin_index');
	Route::get('admin_logout', 'Admin\AdminController@admin_logout')->name('admin_logout');

	//Users CRUD Routes Started
	Route::get('users', 'Admin\AdminController@users')->name('users');
	Route::get('user/create', 'Admin\AdminController@create')->name('create_user');
	Route::post('user/store', 'Admin\AdminController@store')->name('store_user');
	Route::get('user/{id}/edit', 'Admin\AdminController@user_edit')->name('user_edit');
	Route::post('update_user/{id}',['as'=>'update_user','uses'=>'Admin\AdminController@update']);
	Route::post('user/password_update/{id}', 'Admin\AdminController@update_password')->name('update_password');
	Route::get('user/delete/{id}', 'Admin\AdminController@destroy')->name('delete_user');
	Route::get('user/{id}', 'Admin\AdminController@user_view')->name('user');
	//Users CRUD Routes Ended

	//Admin activate/deactivate Users
	Route::get('/activate_user/{id}/', ["as" => "activate-user","uses" => "Admin\AdminController@activate_user"]);
	Route::get('/deactivate_user/{id}/', ["as" => "deactivate-user", "uses" => "Admin\AdminController@deactivate_user"]);
	//Admin activate/deactivate Users

	//Admin Uploading ProfilePicture
	Route::post('ImageUpload',['as'=>'ImageUpload','uses'=>'Admin\AdminController@ImageUpload']);
	//Admin Uploading ProfilePicture

	//Admin Removing ProfilePicture
	Route::get('/remove_picture_admin/{user_id}','Admin\AdminController@remove_picture_admin')->name('remove_picture_admin');
	//Admin Removing ProfilePicture

	//ADMIN QUESTIONS
	Route::get('adminquestion_index','Admin\Admin_questionController@index')->name('adminquestion_index');
	Route::get('/admin_question_form','Admin\Admin_questionController@new')->name('create_admin_question');
	Route::post('/create_admin_questions','Admin\Admin_questionController@create')->name('create_question_for_admin');
	Route::get('/admin_edit_question/{id}','Admin\Admin_questionController@question_edit')->name('admin_edit_question');
	Route::post('/admin_question_update/{id}','Admin\Admin_questionController@question_update')->name('update_question_for_admin');
	Route::get('/admin_question_delete/{id}','Admin\Admin_questionController@question_destroy')->name('admin_question_destroy');
	Route::get('/create_faq','Admin\HelpController@create_faq')->name('create_faq');
	Route::post('/create_faq_questions','Admin\HelpController@create_faq_questions')->name('create_faq_questions');
	Route::get('faq_index','Admin\HelpController@index')->name('faq_index');
	Route::get('edit_faq/{id}','Admin\HelpController@edit_faq')->name('edit_faq');
	Route::post('edit_faq_question/{id}','Admin\HelpController@edit_faq_question')->name('edit_faq_question');
	Route::get('faq_question_destroy/{id}','Admin\HelpController@faq_question_destroy')->name('faq_question_destroy');
});

/*Admin Routes Ended*/


/*Candidate Routes Started*/
Route::group(['prefix' => 'candidate' ,  'middleware' => 'is-candidate'], function () {
	Route::get('/my_test', 'Candidate\CandidateController@my_test')->name('my_test');
	Route::get('candidate_logout', 'Candidate\CandidateController@candidate_logout')->name('candidate_logout');

	Route::get('/profile', 'Candidate\CandidateProfileController@candidate_index')->name('candidate_index');
	Route::get('/change_password', 'Candidate\CandidateProfileController@change_password')->name('candidate_change_password');
	Route::post('password_update/{id}', 'Candidate\CandidateProfileController@can_update_password')->name('can_update_password');
	Route::post('CanImageUpload',['as'=>'CanImageUpload','uses'=>'Candidate\CandidateProfileController@CanImageUpload']);
	Route::post('CanResumeUpload',['as'=>'CanResumeUpload','uses'=>'Candidate\CandidateProfileController@CanResumeUpload']);
	Route::post('profileEducation',['as'=>'profileEducation','uses'=>'Candidate\CandidateProfileController@profileEducation']);
	Route::post('storeprofileWorkExperience',['as'=>'storeprofileWorkExperience','uses'=>'Candidate\CandidateProfileController@storeprofileWorkExperience']);
	Route::post('storeprofileLanguages',['as'=>'storeprofileLanguages','uses'=>'Candidate\CandidateProfileController@storeprofileLanguages']);
	Route::post('storeprofileFrameworks',['as'=>'storeprofileFrameworks','uses'=>'Candidate\CandidateProfileController@storeprofileFrameworks']);
	Route::post('storeprofilePublications',['as'=>'storeprofilePublications','uses'=>'Candidate\CandidateProfileController@storeprofilePublications']);
	Route::post('storeprofileAchievements',['as'=>'storeprofileAchievements','uses'=>'Candidate\CandidateProfileController@storeprofileAchievements']);
	Route::post('storeprofileConnections',['as'=>'storeprofileConnections','uses'=>'Candidate\CandidateProfileController@storeprofileConnections']);
	Route::post('storeprofileProjectInfo',['as'=>'storeprofileProjectInfo','uses'=>'Candidate\CandidateProfileController@storeprofileProjectInfo']);
	Route::post('update_can_info',['as'=>'update_can_info','uses'=>'Candidate\CandidateProfileController@update_can_info']);
	Route::get('/delete_candidate_education/{id}', 'Candidate\CandidateProfileController@delete_candidate_education')->name('delete_candidate_education');
	Route::post('/editprofileEducationStore/{id}', 'Candidate\CandidateProfileController@editprofileEducationStore')->name('editprofileEducationStore');
	Route::post('/editcandidateWorkStore/{id}', 'Candidate\CandidateProfileController@editcandidateWorkStore')->name('editcandidateWorkStore');
	Route::get('/candidate_education_move_up/{id}', 'Candidate\CandidateProfileController@candidate_education_move_up')->name('candidate_education_move_up');
	Route::get('/candidate_education_move_down/{id}', 'Candidate\CandidateProfileController@candidate_education_move_down')->name('candidate_education_move_down');
	Route::get('/candidate_work_move_up/{id}', 'Candidate\CandidateProfileController@candidate_work_move_up')->name('candidate_work_move_up');
	Route::get('/candidate_work_move_down/{id}', 'Candidate\CandidateProfileController@candidate_work_move_down')->name('candidate_work_move_down');
	Route::get('/delete_candidate_work_info/{id}', 'Candidate\CandidateProfileController@delete_candidate_work_info')->name('delete_candidate_work_info');
	Route::post('/editprofileProjectsStore/{id}', 'Candidate\CandidateProfileController@editprofileProjectsStore')->name('editprofileProjectsStore');
	Route::get('/candidate_project_move_up/{id}', 'Candidate\CandidateProfileController@candidate_project_move_up')->name('candidate_project_move_up');
	Route::get('/candidate_project_move_down/{id}', 'Candidate\CandidateProfileController@candidate_project_move_down')->name('candidate_project_move_down');
	Route::get('/delete_candidate_project/{id}', 'Candidate\CandidateProfileController@delete_candidate_project')->name('delete_candidate_project');
	Route::post('/editprofilePublicationStore/{id}', 'Candidate\CandidateProfileController@editprofilePublicationStore')->name('editprofilePublicationStore');
	Route::get('/candidate_publication_move_up/{id}', 'Candidate\CandidateProfileController@candidate_publication_move_up')->name('candidate_publication_move_up');
	Route::get('/candidate_publication_move_down/{id}', 'Candidate\CandidateProfileController@candidate_publication_move_down')->name('candidate_publication_move_down');
	Route::get('/delete_candidate_publication/{id}', 'Candidate\CandidateProfileController@delete_candidate_publication')->name('delete_candidate_publication');
	Route::post('/editprofileAchievementStore/{id}', 'Candidate\CandidateProfileController@editprofileAchievementStore')->name('editprofileAchievementStore');
	Route::get('/candidate_achievement_move_up/{id}', 'Candidate\CandidateProfileController@candidate_achievement_move_up')->name('candidate_achievement_move_up');
	Route::get('/candidate_achievement_move_down/{id}', 'Candidate\CandidateProfileController@candidate_achievement_move_down')->name('candidate_achievement_move_down');
	Route::get('/delete_candidate_achievement/{id}', 'Candidate\CandidateProfileController@delete_candidate_achievement')->name('delete_candidate_achievement');
	Route::get('/report-issue-feedback', 'Candidate\CandidateController@can_info')->name('can_info');
	Route::post('/post_can_info', 'Candidate\CandidateController@post_can_info')->name('post_can_info');
	Route::get('/delete_candidate_language/{id}', 'Candidate\CandidateProfileController@delete_candidate_language')->name('delete_candidate_language');
	Route::get('/delete_candidate_framework/{id}', 'Candidate\CandidateProfileController@delete_candidate_framework')->name('delete_candidate_framework');
	Route::get('/can_profile_view', 'Candidate\CandidateProfileController@can_profile_view')->name('can_profile_view');
});
/*Candidate Routes Ended*/
Route::get('/preview_test/{id}/{page?}','Recruiter\TemplatesController@preview_test')->name('preview_test1');

	//Load Section
	Route::get('/preview_testz/{sectionid}/{templateid}','Recruiter\TemplatesController@load_section')->name('load_section1');
/*Recruiter Routes Started*/

Route::group(['prefix' => 'recruiter' ,  'middleware' => 'is-recruiter'], function () {

	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/dashboard', 'Recruiter\RecruiterController@dashboard')->name('dashboard');
	Route::post('update_password_recruiter', 'Recruiter\RecruiterController@update_password_recruiter')->name('update_password_recruiter');


//Customer support
Route::get('/customer_support', 'Recruiter\RecruiterController@customer_support_view')->name('customer_support_view');
Route::post('/customer_support', 'Recruiter\RecruiterController@customer_support')->name('customer_support');
Route::get('delete_invitation/{id}','Recruiter\Invite_Candidate_Controller@delete_invitation')->name('delete_invitation');

Route::post('send_remainder','Recruiter\Invite_Candidate_Controller@send_remainder')->name('send_remainder');
Route::post('/send_query', 'Recruiter\SupportController@send_query')->name('send_query');

	Route::get('/history', 'Recruiter\RecruiterController@history')->name('history');

	Route::get('/invited_candidates/{id}', 'Recruiter\RecruiterController@invited_candidates')->name('invited_candidates');


Route::post('/invitaion_to_candidate/{id}','Recruiter\Invite_Candidate_Controller@invitaion_to_candidate')->name('invitaion_to_candidate');

Route::get('/library_public_questions/{id?}', 'Recruiter\RecruiterController@library_public_questions')->name('library_public_questions');


	Route::get('/library_public_questions/{id?}', 'Recruiter\RecruiterController@library_public_questions')->name('library_public_questions');

	Route::post('/update_questions_modal/{id}','Recruiter\QuestionsController@update_questions_modal')->name('update_questions_modal');
	Route::post('/submission_update_questions_modal/{id}','Recruiter\QuestionsController@submission_update_questions_modal')->name('submission_update_questions_modal');
	Route::post('/coding_update_questions_modal/{id}','Recruiter\QuestionsController@coding_update_questions_modal')->name('coding_update_questions_modal');
	Route::get('/delete_question_choice/{id?}','Recruiter\QuestionsController@delete_choice')->name('delete_choice');
	Route::get('/delete_question_test_case/{id?}','Recruiter\QuestionsController@delete_test_case')->name('delete_test_case');


	
	Route::get('/change_password', 'Recruiter\RecruiterController@change_password')->name('change_password');
	Route::get('/general_setting', 'Recruiter\RecruiterController@general_setting')->name('general_setting');
	Route::get('/setting_info', 'Recruiter\RecruiterController@setting_info')->name('setting_info');
	Route::post('/post_setting_info', 'Recruiter\RecruiterController@post_setting_info')->name('post_setting_info');

	//Recruiter Company Routes Started
	Route::post('/post_general_setting','Recruiter\CompanyController@post_general_setting')->name('post_general_setting');
	Route::post('/post_contact_details','Recruiter\CompanyController@post_contact_details')->name('post_contact_details');
	Route::post('/test_completion_mail','Recruiter\CompanyController@test_completion_mail')->name('test_completion_mail');
	Route::post('/test_completion_mail','Recruiter\CompanyController@test_completion_mail')->name('test_completion_mail');
	//Recruiter Company Routes Ended

	//Recruiter Test Template Routes Started
	Route::get('/view', 'Recruiter\TemplatesController@manage_test_view')->name('manage_test_view');
	Route::post('/create_test_template','Recruiter\TemplatesController@create_test_template')->name('create_test_template');
	Route::get('/edit_template/{id}/{flag?}', 'Recruiter\TemplatesController@edit_template')->name('edit_template');
	Route::post('/update_test_template/{id}','Recruiter\TemplatesController@update_test_template')->name('update_test_template');
	Route::get('/delete_test_template/{id}', 'Recruiter\TemplatesController@delete_test_template')->name('delete_test_template');
	Route::get('/template_public_preview/{id}', 'Recruiter\TemplatesController@template_public_preview')->name('template_public_preview');
	Route::post('/create_duplicate_template_post','Recruiter\TemplatesController@create_duplicate_template_post')->name('create_duplicate_template_post');
	Route::get('/preview_test/{id}/{page?}','Recruiter\TemplatesController@preview_test')->name('preview_test');

	//Load Section
	Route::get('/preview_testz/{sectionid}/{templateid}','Recruiter\TemplatesController@load_section')->name('load_section');

	Route::post('/add_section', 'Recruiter\TemplatesController@add_section')->name('add_section');
	Route::get('/delete_section/{id}', 'Recruiter\TemplatesController@delete_section')->name('delete_section');
	Route::get('/move_up/{id}', 'Recruiter\TemplatesController@move_up')->name('move_up');
	Route::get('/move_down/{id}', 'Recruiter\TemplatesController@move_down')->name('move_down');
	Route::get('/delete_user_setting_question/{id}', 'Recruiter\TemplatesController@delete_user_setting_question')->name('delete_user_setting_question');
	//Recruiter Test Template Routes Ended
	Route::post('/new_user_question_create', 'Recruiter\TemplatesController@new_user_question_create')->name('new_user_question_create');
	Route::get('/setting_question_move_up/{id}','Recruiter\TemplatesController@setting_question_move_up')->name('setting_question_move_up');
	Route::get('/setting_question_move_down/{id}','Recruiter\TemplatesController@setting_question_move_down')->name('setting_question_move_down');
	Route::post('/new_user_question_edit', 'Recruiter\TemplatesController@new_user_question_edit')->name('new_user_question_edit');
	Route::post('/create_question_admin', 'Recruiter\TemplatesController@create_question_admin')->name('create_question_admin');

	//Recruiter Questions Routes Started
	Route::post('/create_question','Recruiter\QuestionsController@create_question')->name('create_question');
	Route::post('/create_question_coding','Recruiter\QuestionsController@create_question_coding')->name('create_question_coding');
	Route::post('/create_question_coding_debug','Recruiter\QuestionsController@create_question_coding_debug')->name('create_question_coding_debug');
	Route::post('/create_first_submission_question','Recruiter\QuestionsController@create_first_submission_question')->name('create_first_submission_question');
	Route::post('/create_second_submission_question','Recruiter\QuestionsController@create_second_submission_question')->name('create_second_submission_question');
	Route::get('/delete_question/{id}', 'Recruiter\QuestionsController@delete_question')->name('delete_question');

	Route::get('/delete_all_mcqs_questions', 'Recruiter\QuestionsController@delete_all_mcqs_questions')->name('delete_all_mcqs_questions');

	Route::get('/delete_all_coding_questions', 'Recruiter\QuestionsController@delete_all_coding_questions')->name('delete_all_coding_questions');

	Route::get('/delete_all_submission_questions', 'Recruiter\QuestionsController@delete_all_submission_questions')->name('delete_all_submission_questions');

	Route::post('/question_modal_partial_data', 'Recruiter\QuestionsController@question_modal_partial_data')->name('question_modal_partial_data');

	Route::post('/coding_question_modal_partial_data', 'Recruiter\QuestionsController@coding_question_modal_partial_data')->name('coding_question_modal_partial_data');

	Route::post('submission_question_modal_partial_data','Recruiter\QuestionsController@submission_question_modal_partial_data')->name('submission_question_modal_partial_data');

	Route::post('/update_partial_question/{id?}', 'Recruiter\QuestionsController@update_partial_question')->name('update_partial_question');

	Route::get('/Questionnaire_newquestion','Recruiter\QuestionsController@show_setting_newquestion')->name('Questionnaire_newquestion');

	//Recruiter Questions Routes Ended

	//Recruiter Test Templates Setting Routes Started
	Route::post('/templatetestSetting', 'Recruiter\TemplateSetting@templatetestSetting')->name('templatetestSetting');
	Route::post('/templatetestContactSetting', 'Recruiter\TemplateSetting@templatetestContactSetting')->name('templatetestContactSetting');
	Route::post('/template_setting_message_post', 'Recruiter\TemplateSetting@template_setting_message_post')->name('template_setting_message_post');
	Route::post('/templatetestMailSetting', 'Recruiter\TemplateSetting@templatetestMailSetting')->name('templatetestMailSetting');
	//Recruiter Test Templates Setting Routes Ended

	/* Host Test Routes */
	Route::get('/host_test_page/{id}', 'Recruiter\HostController@host_test_page')->name('host_test_page');
	//Add Host Test Post request
	Route::post('/host_test_post', 'Recruiter\HostController@host_test_post')->name('host_test_post');

	//Delete Host
	Route::post('/delete_host', 'Recruiter\HostController@host_test_del')->name('host_test_del');

	//Terminate host //host_terminate
	Route::post('/host_terminate', 'Recruiter\HostController@host_terminate')->name('host_terminate');

	//Public preview of host
	Route::get('/publicpreview-test-page/{id}/{flag}', 'Recruiter\HostController@host_public_preview')->name('preview_public_testpage');

	//Library controller
	Route::get('/library/{id?}', 'Recruiter\LibraryController@lib_index')->name('lib_index');

	//Library ini filter
	Route::post('/library-filter', 'Recruiter\LibraryController@libFilter')->name('libFilter');

	//Library single detail data.
	Route::post('/library-question-detail', 'Recruiter\LibraryController@lib_ques_detail')->name('lib_ques_detail');

	Route::post('/create_public_page_view', 'Recruiter\Public_view_pageController@create')->name('Public_view_page');
	Route::post('/edit_public_page_view/{id?}','Recruiter\Public_view_pageController@edit')->name('edit_public_page_view');
	Route::post('/update_public_page_view','Recruiter\Public_view_pageController@update')->name('update_public_page_view');

	Route::get('/delete_public_page_view/{id?}','Recruiter\Public_view_pageController@delete')->name('delete_public_page_view');


	Route::post('/upload_cover_image/{id?}','Recruiter\Public_view_pageController@cover_image')->name('upload_cover_image');

	Route::post('/insert_image_tags','Recruiter\Public_view_pageController@insert_tags')->name('insert_image_tags');
	Route::post('/data_image_tags/{id?}','Recruiter\Public_view_pageController@data_tags')->name('data_image_tags');
	Route::get('/delete_image_tags','Recruiter\Public_view_pageController@delete_tags')->name('delete_image_tags');

	Route::post('/advance_filter','Recruiter\LibraryController@advance_filter')->name('advance_filter');
	Route::post("ajax_tag_post", "Recruiter\TemplateSetting@ajax_tag_post");
	Route::post("delete_question_tag", "Recruiter\TemplateSetting@delete_question_tag")->name('delete_question_tag');

	//Advance setting form post request
	Route::post('/advance_settings', 'Recruiter\TemplateSetting@advance_setting_form')->name('advance_setting_form');

	Route::post('/advance_settings_1', 'Recruiter\TemplateSetting@advance_setting_form_1')->name('advance_setting_form_1');
	
	Route::post('/advance_settings_data', 'Recruiter\TemplateSetting@advance_settings_data')->name('advance_settings_data');	

	Route::get('/publicPreviewtest_model', 'Recruiter\TemplatesController@publicPreviewtest_model')->name('publicPreviewtest_model');


});




/*Recruiter Routes Ended*/