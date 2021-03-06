<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::auth();
Route::get('/logout', 'Auth\LoginController@logout');
Route::group(['middleware' => ['auth']], function () {
    
    /**
     * Main
     */
        Route::get('/', 'PagesController@dashboard');
        Route::get('dashboard', 'PagesController@dashboard')->name('dashboard');
        
    /**
     * Users
     */
    Route::group(['prefix' => 'users'], function () {
        Route::get('/data', 'UsersController@anyData')->name('users.data');
        Route::get('/taskdata/{id}', 'UsersController@taskData')->name('users.taskdata');
        Route::get('/leaddata/{id}', 'UsersController@leadData')->name('users.leaddata');
        Route::get('/clientdata/{id}', 'UsersController@clientData')->name('users.clientdata');
        Route::get('/users', 'UsersController@users')->name('users.users');
    });
        Route::resource('users', 'UsersController');

	 /**
     * Roles
     */
        Route::resource('roles', 'RolesController');
    /**
     * Clients
     */
    Route::group(['prefix' => 'clients'], function () {
        Route::get('/data', 'ClientsController@anyData')->name('clients.data');
        Route::post('/create/cvrapi', 'ClientsController@cvrapiStart');
        Route::post('/upload/{id}', 'DocumentsController@upload');
        Route::patch('/updateassign/{id}', 'ClientsController@updateAssign');
    });
        Route::resource('clients', 'ClientsController');
	    Route::resource('documents', 'DocumentsController');
	
      
    /**
     * Tasks
     */
    Route::group(['prefix' => 'tasks'], function () {
        Route::get('/data', 'TasksController@anyData')->name('tasks.data');
        Route::patch('/updatestatus/{id}', 'TasksController@updateStatus');
        Route::patch('/updateassign/{id}', 'TasksController@updateAssign');
        Route::post('/updatetime/{id}', 'TasksController@updateTime');
    });
        Route::resource('tasks', 'TasksController');

    /**
     * Leads
     */
    Route::group(['prefix' => 'leads'], function () {
        Route::get('/data', 'LeadsController@anyData')->name('leads.data');
        Route::patch('/updateassign/{id}', 'LeadsController@updateAssign');
        Route::patch('/updatestatus/{id}', 'LeadsController@updateStatus');
        Route::patch('/updatefollowup/{id}', 'LeadsController@updateFollowup')->name('leads.followup');
    });
        Route::resource('leads', 'LeadsController');
        Route::post('/comments/{type}/{id}', 'CommentController@store');
    /**
     * Settings
     */
    Route::group(['prefix' => 'settings'], function () {
        Route::get('/', 'SettingsController@index')->name('settings.index');
        Route::patch('/permissionsUpdate', 'SettingsController@permissionsUpdate');
        Route::patch('/overall', 'SettingsController@updateOverall');
    });

    /**
     * Departments
     */
        Route::resource('departments', 'DepartmentsController'); 

    /**
     * Integrations
     */
    Route::group(['prefix' => 'integrations'], function () {
        Route::get('Integration/slack', 'IntegrationsController@slack');
    });
        Route::resource('integrations', 'IntegrationsController');

    /**
     * Notifications
     */
    Route::group(['prefix' => 'notifications'], function () {
        Route::post('/markread', 'NotificationsController@markRead')->name('notification.read');
        Route::get('/markall', 'NotificationsController@markAll');
        Route::get('/{id}', 'NotificationsController@markRead');
    });

    /**
     * Invoices
     */
    Route::group(['prefix' => 'invoices'], function () {
        Route::post('/updatepayment/{id}', 'InvoicesController@updatePayment')->name('invoice.payment.date');
        Route::post('/reopenpayment/{id}', 'InvoicesController@reopenPayment')->name('invoice.payment.reopen');
        Route::post('/sentinvoice/{id}', 'InvoicesController@updateSentStatus')->name('invoice.sent');
        Route::post('/newitem/{id}', 'InvoicesController@newItem')->name('invoice.new.item');
    });
        Route::resource('invoices', 'InvoicesController');
});
/**
 * Mobile
 */
Route::group(['prefix' => 'mobile'],function() {
    Route::get('/','MobileController@index')->name('mobile.index');
    Route::get('/agentlogin','MobileController@agentLogin')->name('mobile.agentlogin');
    Route::post('/agentlogincheck','MobileController@agentLoginCheck')->name('mobile.agentlogincheck');
    Route::get('/agentindex','MobileController@agentIndex')->name('mobile.agentindex');
    Route::get('/agentlogout','MobileController@agentLogout')->name('mobile.agentlogout');
    Route::post('/agentpwdchg','MobileController@agentChangePassword')->name('mobile.agentpwdchg');
    Route::get('/getproducts','MobileController@getProducts')->name('mobile.getproducts');
    Route::get('/getcolors','MobileController@getColors')->name('mobile.getcolors');
    Route::get('/getsizes','MobileController@getSizes')->name('mobile.getsizes');
    Route::post('/applyworksheet','MobileController@applyWorksheet')->name('mobile.applyworksheet');


    Route::get('/clientconfirm','MobileController@worksheetClientConfirm')->name('mobile.clientconfirm');
    Route::get('/worksheetuploadindex','MobileController@worksheetUploadIndex')->name('mobile.worksheetuploadindex');
    Route::post('/worksheetupload','MobileController@worksheetUpload')->name('mobile.worksheetupload');
    Route::post('/imageupload','MobileController@imageUpload')->name('mobile.imageupload');


    Route::get('/worksheetenqindex','MobileController@worksheetEnqIndex')->name('mobile.worksheetenqindex');
    Route::get('/getworksheetlist','MobileController@getWorksheetList')->name('mobile.getworksheetlist');
    Route::get('/getworksheetdetails','MobileController@getWorksheetDetails')->name('mobile.getworksheetdetails');
    Route::post('/uploadpostrecord','MobileController@uploadPostrecord')->name('mobile.uploadpostrecord');
});

/**
 * Worksheet
 */
Route::group(['prefix' => 'worksheet'],function() {
    Route::get('/list','WorksheetController@worksheetIndex')->name('worksheet.list');
    Route::get('/getworksheets','WorksheetController@getWorksheets')->name('worksheet.getWorksheets');
    Route::get('/getworksheetdetails','WorksheetController@getWorksheetDetails')->name('worksheet.getWorksheetdetails');
    Route::get('/getcarriers','WorksheetController@getCarriers')->name('worksheet.getcarriers');
    Route::get('/getsuppliers','WorksheetController@getSuppliers')->name('worksheet.getsuppliers');

    Route::post('/processauth','WorksheetController@processAuth')->name('worksheet.processauth');
    Route::post('/processwaitshoes','WorksheetController@processWaitshoes')->name('worksheet.processwaitshoes');
    Route::post('/processrepair','WorksheetController@processRepair')->name('worksheet.processrepair');
    Route::post('/processsendback','WorksheetController@processSendback')->name('worksheet.processsendback');
    Route::post('/changestatus','WorksheetController@changeStatus')->name('worksheet.changestatus');
});
