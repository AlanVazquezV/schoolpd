<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// api routes that need auth

Route::middleware(['auth:api', 'rbac'])->group(function () {


/* routes for Assistance Controller  */	
	Route::get('assistance', 'AssistanceController@index');
	Route::get('assistance/index', 'AssistanceController@index');
	Route::get('assistance/index/{filter?}/{filtervalue?}', 'AssistanceController@index');	
	Route::get('assistance/view/{rec_id}', 'AssistanceController@view');	
	Route::post('assistance/add', 'AssistanceController@add');	
	Route::any('assistance/edit/{rec_id}', 'AssistanceController@edit');	
	Route::any('assistance/delete/{rec_id}', 'AssistanceController@delete');

/* routes for Assistance_Confirmation Controller  */	
	Route::get('assistance_confirmation', 'Assistance_ConfirmationController@index');
	Route::get('assistance_confirmation/index', 'Assistance_ConfirmationController@index');
	Route::get('assistance_confirmation/index/{filter?}/{filtervalue?}', 'Assistance_ConfirmationController@index');	
	Route::get('assistance_confirmation/view/{rec_id}', 'Assistance_ConfirmationController@view');	
	Route::post('assistance_confirmation/add', 'Assistance_ConfirmationController@add');	
	Route::any('assistance_confirmation/edit/{rec_id}', 'Assistance_ConfirmationController@edit');	
	Route::any('assistance_confirmation/delete/{rec_id}', 'Assistance_ConfirmationController@delete');

/* routes for Classes Controller  */	
	Route::get('classes', 'ClassesController@index');
	Route::get('classes/index', 'ClassesController@index');
	Route::get('classes/index/{filter?}/{filtervalue?}', 'ClassesController@index');	
	Route::get('classes/view/{rec_id}', 'ClassesController@view');	
	Route::post('classes/add', 'ClassesController@add');	
	Route::any('classes/edit/{rec_id}', 'ClassesController@edit');	
	Route::any('classes/delete/{rec_id}', 'ClassesController@delete');

/* routes for Classes_Modality Controller  */	
	Route::get('classes_modality', 'Classes_ModalityController@index');
	Route::get('classes_modality/index', 'Classes_ModalityController@index');
	Route::get('classes_modality/index/{filter?}/{filtervalue?}', 'Classes_ModalityController@index');	
	Route::get('classes_modality/view/{rec_id}', 'Classes_ModalityController@view');	
	Route::post('classes_modality/add', 'Classes_ModalityController@add');	
	Route::any('classes_modality/edit/{rec_id}', 'Classes_ModalityController@edit');	
	Route::any('classes_modality/delete/{rec_id}', 'Classes_ModalityController@delete');

/* routes for Classes_Status Controller  */	
	Route::get('classes_status', 'Classes_StatusController@index');
	Route::get('classes_status/index', 'Classes_StatusController@index');
	Route::get('classes_status/index/{filter?}/{filtervalue?}', 'Classes_StatusController@index');	
	Route::get('classes_status/view/{rec_id}', 'Classes_StatusController@view');	
	Route::post('classes_status/add', 'Classes_StatusController@add');	
	Route::any('classes_status/edit/{rec_id}', 'Classes_StatusController@edit');	
	Route::any('classes_status/delete/{rec_id}', 'Classes_StatusController@delete');

/* routes for Cycle Controller  */	
	Route::get('cycle', 'CycleController@index');
	Route::get('cycle/index', 'CycleController@index');
	Route::get('cycle/index/{filter?}/{filtervalue?}', 'CycleController@index');	
	Route::get('cycle/view/{rec_id}', 'CycleController@view');	
	Route::post('cycle/add', 'CycleController@add');	
	Route::any('cycle/edit/{rec_id}', 'CycleController@edit');	
	Route::any('cycle/delete/{rec_id}', 'CycleController@delete');

/* routes for Permissions Controller  */	
	Route::get('permissions', 'PermissionsController@index');
	Route::get('permissions/index', 'PermissionsController@index');
	Route::get('permissions/index/{filter?}/{filtervalue?}', 'PermissionsController@index');	
	Route::get('permissions/view/{rec_id}', 'PermissionsController@view');	
	Route::post('permissions/add', 'PermissionsController@add');	
	Route::any('permissions/edit/{rec_id}', 'PermissionsController@edit');	
	Route::any('permissions/delete/{rec_id}', 'PermissionsController@delete');

/* routes for Schedule Controller  */	
	Route::get('schedule', 'ScheduleController@index');
	Route::get('schedule/index', 'ScheduleController@index');
	Route::get('schedule/index/{filter?}/{filtervalue?}', 'ScheduleController@index');	
	Route::get('schedule/view/{rec_id}', 'ScheduleController@view');	
	Route::post('schedule/add', 'ScheduleController@add');	
	Route::any('schedule/edit/{rec_id}', 'ScheduleController@edit');	
	Route::any('schedule/delete/{rec_id}', 'ScheduleController@delete');

/* routes for Schedule_Name Controller  */	
	Route::get('schedule_name', 'Schedule_NameController@index');
	Route::get('schedule_name/index', 'Schedule_NameController@index');
	Route::get('schedule_name/index/{filter?}/{filtervalue?}', 'Schedule_NameController@index');	
	Route::get('schedule_name/view/{rec_id}', 'Schedule_NameController@view');	
	Route::post('schedule_name/add', 'Schedule_NameController@add');	
	Route::any('schedule_name/edit/{rec_id}', 'Schedule_NameController@edit');	
	Route::any('schedule_name/delete/{rec_id}', 'Schedule_NameController@delete');

/* routes for User Controller  */	
	Route::get('user', 'UserController@index');
	Route::get('user/index', 'UserController@index');
	Route::get('user/index/{filter?}/{filtervalue?}', 'UserController@index');	
	Route::get('user/view/{rec_id}', 'UserController@view');	
	Route::any('account/edit', 'AccountController@edit');	
	Route::get('account', 'AccountController@index');	
	Route::post('account/changepassword', 'AccountController@changepassword');	
	Route::get('account/currentuserdata', 'AccountController@currentuserdata');	
	Route::post('user/add', 'UserController@add');	
	Route::any('user/edit/{rec_id}', 'UserController@edit');	
	Route::any('user/delete/{rec_id}', 'UserController@delete');

/* routes for User_Status Controller  */	
	Route::get('user_status', 'User_StatusController@index');
	Route::get('user_status/index', 'User_StatusController@index');
	Route::get('user_status/index/{filter?}/{filtervalue?}', 'User_StatusController@index');	
	Route::get('user_status/view/{rec_id}', 'User_StatusController@view');	
	Route::post('user_status/add', 'User_StatusController@add');	
	Route::any('user_status/edit/{rec_id}', 'User_StatusController@edit');	
	Route::any('user_status/delete/{rec_id}', 'User_StatusController@delete');

/* routes for User_Types Controller  */	
	Route::get('user_types', 'User_TypesController@index');
	Route::get('user_types/index', 'User_TypesController@index');
	Route::get('user_types/index/{filter?}/{filtervalue?}', 'User_TypesController@index');	
	Route::get('user_types/view/{rec_id}', 'User_TypesController@view');	
	Route::post('user_types/add', 'User_TypesController@add');	
	Route::any('user_types/edit/{rec_id}', 'User_TypesController@edit');	
	Route::any('user_types/delete/{rec_id}', 'User_TypesController@delete');

});

Route::get('home', 'HomeController@index');
	
	Route::post('auth/login', 'AuthController@login');
	Route::get('login', 'AuthController@login')->name('login');
		
	Route::post('auth/forgotpassword', 'AuthController@forgotpassword')->name('password.reset');	
	Route::post('auth/resetpassword', 'AuthController@resetpassword');
	
	Route::get('components_data/cycle_option_list/{arg1?}', 'Components_dataController@cycle_option_list');	
	Route::get('components_data/status_option_list/{arg1?}', 'Components_dataController@status_option_list');	
	Route::get('components_data/modality_option_list/{arg1?}', 'Components_dataController@modality_option_list');	
	Route::get('components_data/user_option_list/{arg1?}', 'Components_dataController@user_option_list');	
	Route::get('components_data/id_option_list/{arg1?}', 'Components_dataController@id_option_list');	
	Route::get('components_data/name_option_list/{arg1?}', 'Components_dataController@name_option_list');	
	Route::get('components_data/class_option_list/{arg1?}', 'Components_dataController@class_option_list');	
	Route::get('components_data/type_option_list/{arg1?}', 'Components_dataController@type_option_list');	
	Route::get('components_data/user_username_exist/{arg1?}', 'Components_dataController@user_username_exist');	
	Route::get('components_data/user_email_exist/{arg1?}', 'Components_dataController@user_email_exist');	
	Route::get('components_data/status_option_list_2/{arg1?}', 'Components_dataController@status_option_list_2');	
	Route::get('components_data/schedule_option_list/{arg1?}', 'Components_dataController@schedule_option_list');	
	Route::get('components_data/getcount_user/{arg1?}', 'Components_dataController@getcount_user');


/* routes for FileUpload Controller  */	
Route::post('fileuploader/upload/{fieldname}', 'FileUploaderController@upload');
Route::post('fileuploader/s3upload/{fieldname}', 'FileUploaderController@s3upload');
Route::post('fileuploader/remove_temp_file', 'FileUploaderController@remove_temp_file');