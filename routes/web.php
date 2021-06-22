<?php
//to serve files frm storage_path
//Artisan::call('storage:link', [] );

Route::get('/read_sms', 'smsController@readSMS')->name('read_sms');
Route::get('/send_bulk_sms', 'smsController@sendBulkSMSForm')->name('send_bulk_sms');
Route::post('/send_bulk_sms', 'smsController@sendBulkSMS')->name('send_bulk_sms');
Route::get('/sent_bulk_sms_messages', 'smsController@sentBulkSMSMessages')->name('sent_bulk_sms_messages');

Route::get('/send_sms', 'smsController@sendSMSForm')->name('send_sms');
Route::post('/sendSMS', 'smsController@sendSMS')->name('sendSMS');
Route::get('/sent_sms_messages', 'smsController@sentSMSMessages')->name('sent_sms_messages');

Route::get('/public-login', 'Auth\LoginController@public_login_form')->name('public_login');
Route::post('/public-login', 'Auth\LoginController@public_login')->name('public_login');
Route::get('/sign_up', 'Auth\LoginController@sign_up_form')->name('sign_up');
Route::get('/choose_subscription_plan/{userId}', 'Auth\LoginController@choose_subscription_plan_form')->name('choose_subscription_plan');
Route::post('/choose_subscription_plan/{userId}', 'Auth\LoginController@choose_subscription_plan')->name('choose_subscription_plan');

Route::get('language_interpreter/{keyWord?}', 'Language_stringController@language_interpreter')->name('language_interpreter');

Route::get('/users_manageAccounts/{id?}', 'UserController@manageAccountsPage')->name('users.manageAccounts');
Route::post('/users_manageAccounts/{id?}', 'UserController@manageAccounts')->name('users.manageAccounts');
Route::post('/user_mannual/{selectedLang?}', 'UserController@user_mannual')->name('users.user_mannual');
Auth::routes();
Route::post('/user/logout', 'Auth\LoginController@logout')->name('user.logout');

// filter
Route::get("/tabya_kebelles/{tabyaId}", "KebelleController@tabya_kebelles")->name("tabya_kebelles");
Route::get("/wereda_tabyas/{weredaId}", "KebelleController@wereda_tabyas")->name("wereda_tabyas");
Route::get("/wereda_schools/{weredaId}", "KebelleController@wereda_schools")->name("wereda_schools");
Route::get("/wereda_subWeredas/{weredaId}", "KebelleController@wereda_subWeredas")->name("wereda_subWeredas");

Route::get("/region_zones/{regionId}", "KebelleController@region_zones")->name("region_zones");
Route::get("/zone_weredas/{zoneId}", "KebelleController@zone_weredas")->name("zone_weredas");
// UnAssigned user filter 
Route::get("/unAssigned_zone_weredas/{zoneId}", "KebelleController@unAssigned_zone_weredas")->name("unAssigned_zone_weredas");
Route::get("/unAssigned_wereda_tabyas/{weredaId}", "KebelleController@unAssigned_wereda_tabyas")->name("unAssigned_wereda_tabyas");
Route::get("/unAssigned_tabya_kebelles/{tabyaId}", "KebelleController@unAssigned_tabya_kebelles")->name("unAssigned_tabya_kebelles");


Route::middleware(['Front'])->group(function () {

//product_types 
Route::get('/product_types-create', 'product_typeController@create')->name('product_types.create');
Route::get('/product_types-show/{id}', 'product_typeController@show')->name('product_types.show');
Route::get('/product_types-edit/{id}', 'product_typeController@edit')->name('product_types.edit');
Route::post('/product_types-update/{id}', 'product_typeController@update')->name('product_types.update');
Route::get('/product_types-index', 'product_typeController@index')->name('product_types.index');
Route::post('/product_types-store', 'product_typeController@store')->name('product_types.store');
Route::get('/product_types-confirm_delete/{id}', 'product_typeController@delete')->name('product_types.delete');
Route::get('/product_types-destroy/{id}', 'product_typeController@destroy')->name('product_types.destroy');

//locations 
Route::get('/locations-create', 'locationController@create')->name('locations.create');
Route::get('/locations-show/{id}', 'locationController@show')->name('locations.show');
Route::get('/locations-edit/{id}', 'locationController@edit')->name('locations.edit');
Route::post('/locations-update/{id}', 'locationController@update')->name('locations.update');
Route::get('/locations-index', 'locationController@index')->name('locations.index');
Route::post('/locations-store', 'locationController@store')->name('locations.store');
Route::get('/locations-confirm_delete/{id}', 'locationController@delete')->name('locations.delete');
Route::get('/locations-destroy/{id}', 'locationController@destroy')->name('locations.destroy');
//location_product_prices 
Route::get('/location_product_prices-create/{productTypeId}', 'location_product_priceController@create')->name('location_product_prices.create');
Route::get('/location_product_prices-show/{id}', 'location_product_priceController@show')->name('location_product_prices.show');
Route::get('/location_product_prices-edit/{id}', 'location_product_priceController@edit')->name('location_product_prices.edit');
Route::post('/location_product_prices-update/{id}', 'location_product_priceController@update')->name('location_product_prices.update');
Route::get('/location_product_prices-index', 'location_product_priceController@index')->name('location_product_prices.index');
Route::post('/location_product_prices-store/{productTypeId}', 'location_product_priceController@store')->name('location_product_prices.store');
Route::get('/location_product_prices-confirm_delete/{id}', 'location_product_priceController@delete')->name('location_product_prices.delete');
Route::get('/location_product_prices-destroy/{id}', 'location_product_priceController@destroy')->name('location_product_prices.destroy');
Route::get('/products_list', 'location_product_priceController@products_list')->name('products_list');
//recipient_categories 
Route::get('/recipient_categories-create', 'recipient_categoryController@create')->name('recipient_categories.create');
Route::get('/recipient_categories-show/{id}', 'recipient_categoryController@show')->name('recipient_categories.show');
Route::get('/recipient_categories-edit/{id}', 'recipient_categoryController@edit')->name('recipient_categories.edit');
Route::post('/recipient_categories-update/{id}', 'recipient_categoryController@update')->name('recipient_categories.update');
Route::get('/recipient_categories-index', 'recipient_categoryController@index')->name('recipient_categories.index');
Route::post('/recipient_categories-store', 'recipient_categoryController@store')->name('recipient_categories.store');
Route::get('/recipient_categories-confirm_delete/{id}', 'recipient_categoryController@delete')->name('recipient_categories.delete');
Route::get('/recipient_categories-destroy/{id}', 'recipient_categoryController@destroy')->name('recipient_categories.destroy');
//recipients 
Route::get('/recipients-create', 'recipientController@create')->name('recipients.create');
Route::get('/recipients-show/{id}', 'recipientController@show')->name('recipients.show');
Route::get('/recipients-edit/{id}', 'recipientController@edit')->name('recipients.edit');
Route::post('/recipients-update/{id}', 'recipientController@update')->name('recipients.update');
Route::get('/recipients-index', 'recipientController@index')->name('recipients.index');
Route::post('/recipients-store', 'recipientController@store')->name('recipients.store');
Route::get('/recipients-confirm_delete/{id}', 'recipientController@delete')->name('recipients.delete');
Route::get('/recipients-destroy/{id}', 'recipientController@destroy')->name('recipients.destroy');
Route::post('/importRecipientsFromExcel', 'recipientController@importRecipientsFromExcel')->name('importRecipientsFromExcel');















//OLD Routes
Route::get('/generate_transfer_results_from_wereda_to_wereda', 'transfer_resultsController@generate_transfer_results_from_wereda_to_wereda')->name('generate_transfer_results_from_wereda_to_wereda');
Route::get('/generate_transfer_results_from_school_to_school', 'transfer_resultsController@generate_transfer_results_from_school_to_school')->name('generate_transfer_results_from_school_to_school');

//transfer_requests_from_school_to_schools 
Route::get('/transfer_requests_from_school_to_schools-create', 'transfer_requests_from_school_to_schoolController@create')->name('transfer_requests_from_school_to_schools.create');
Route::get('/transfer_requests_from_school_to_schools-show/{id}', 'transfer_requests_from_school_to_schoolController@show')->name('transfer_requests_from_school_to_schools.show');
Route::get('/transfer_requests_from_school_to_schools-edit/{id}', 'transfer_requests_from_school_to_schoolController@edit')->name('transfer_requests_from_school_to_schools.edit');
Route::post('/transfer_requests_from_school_to_schools-update/{id}', 'transfer_requests_from_school_to_schoolController@update')->name('transfer_requests_from_school_to_schools.update');
Route::get('/transfer_requests_from_school_to_schools-index', 'transfer_requests_from_school_to_schoolController@index')->name('transfer_requests_from_school_to_schools.index');
Route::post('/transfer_requests_from_school_to_schools-store', 'transfer_requests_from_school_to_schoolController@store')->name('transfer_requests_from_school_to_schools.store');
Route::get('/transfer_requests_from_school_to_schools-confirm_delete/{id}', 'transfer_requests_from_school_to_schoolController@delete')->name('transfer_requests_from_school_to_schools.delete');
Route::get('/transfer_requests_from_school_to_schools-destroy/{id}', 'transfer_requests_from_school_to_schoolController@destroy')->name('transfer_requests_from_school_to_schools.destroy');

//transfer_requests_from_wereda_to_weredas 
Route::get('/transfer_requests_from_wereda_to_weredas-create', 'transfer_requests_from_wereda_to_weredaController@create')->name('transfer_requests_from_wereda_to_weredas.create');
Route::get('/transfer_requests_from_wereda_to_weredas-show/{id}', 'transfer_requests_from_wereda_to_weredaController@show')->name('transfer_requests_from_wereda_to_weredas.show');
Route::get('/transfer_requests_from_wereda_to_weredas-edit/{id}', 'transfer_requests_from_wereda_to_weredaController@edit')->name('transfer_requests_from_wereda_to_weredas.edit');
Route::post('/transfer_requests_from_wereda_to_weredas-update/{id}', 'transfer_requests_from_wereda_to_weredaController@update')->name('transfer_requests_from_wereda_to_weredas.update');
Route::get('/transfer_requests_from_wereda_to_weredas-index', 'transfer_requests_from_wereda_to_weredaController@index')->name('transfer_requests_from_wereda_to_weredas.index');
Route::post('/transfer_requests_from_wereda_to_weredas-store', 'transfer_requests_from_wereda_to_weredaController@store')->name('transfer_requests_from_wereda_to_weredas.store');
Route::get('/transfer_requests_from_wereda_to_weredas-confirm_delete/{id}', 'transfer_requests_from_wereda_to_weredaController@delete')->name('transfer_requests_from_wereda_to_weredas.delete');
Route::get('/transfer_requests_from_wereda_to_weredas-destroy/{id}', 'transfer_requests_from_wereda_to_weredaController@destroy')->name('transfer_requests_from_wereda_to_weredas.destroy');

//school_teacher_acceptance_capacities 
Route::get('/school_teacher_acceptance_capacities-create', 'school_teacher_acceptance_capacityController@create')->name('school_teacher_acceptance_capacities.create');
Route::get('/school_teacher_acceptance_capacities-show/{id}', 'school_teacher_acceptance_capacityController@show')->name('school_teacher_acceptance_capacities.show');
Route::get('/school_teacher_acceptance_capacities-edit/{id}', 'school_teacher_acceptance_capacityController@edit')->name('school_teacher_acceptance_capacities.edit');
Route::post('/school_teacher_acceptance_capacities-update/{id}', 'school_teacher_acceptance_capacityController@update')->name('school_teacher_acceptance_capacities.update');
Route::get('/school_teacher_acceptance_capacities-index', 'school_teacher_acceptance_capacityController@index')->name('school_teacher_acceptance_capacities.index');
Route::post('/school_teacher_acceptance_capacities-store', 'school_teacher_acceptance_capacityController@store')->name('school_teacher_acceptance_capacities.store');
Route::get('/school_teacher_acceptance_capacities-confirm_delete/{id}', 'school_teacher_acceptance_capacityController@delete')->name('school_teacher_acceptance_capacities.delete');
Route::get('/school_teacher_acceptance_capacities-destroy/{id}', 'school_teacher_acceptance_capacityController@destroy')->name('school_teacher_acceptance_capacities.destroy');

//wereda_teacher_acceptance_capacities 
Route::get('/wereda_teacher_acceptance_capacities-create', 'wereda_teacher_acceptance_capacityController@create')->name('wereda_teacher_acceptance_capacities.create');
Route::get('/wereda_teacher_acceptance_capacities-show/{id}', 'wereda_teacher_acceptance_capacityController@show')->name('wereda_teacher_acceptance_capacities.show');
Route::get('/wereda_teacher_acceptance_capacities-edit/{id}', 'wereda_teacher_acceptance_capacityController@edit')->name('wereda_teacher_acceptance_capacities.edit');
Route::post('/wereda_teacher_acceptance_capacities-update/{id}', 'wereda_teacher_acceptance_capacityController@update')->name('wereda_teacher_acceptance_capacities.update');
Route::get('/wereda_teacher_acceptance_capacities-index', 'wereda_teacher_acceptance_capacityController@index')->name('wereda_teacher_acceptance_capacities.index');
Route::post('/wereda_teacher_acceptance_capacities-store', 'wereda_teacher_acceptance_capacityController@store')->name('wereda_teacher_acceptance_capacities.store');
Route::get('/wereda_teacher_acceptance_capacities-confirm_delete/{id}', 'wereda_teacher_acceptance_capacityController@delete')->name('wereda_teacher_acceptance_capacities.delete');
Route::get('/wereda_teacher_acceptance_capacities-destroy/{id}', 'wereda_teacher_acceptance_capacityController@destroy')->name('wereda_teacher_acceptance_capacities.destroy');

//educational_levels 
Route::get('/educational_levels-create', 'educational_levelController@create')->name('educational_levels.create');
Route::get('/educational_levels-show/{id}', 'educational_levelController@show')->name('educational_levels.show');
Route::get('/educational_levels-edit/{id}', 'educational_levelController@edit')->name('educational_levels.edit');
Route::post('/educational_levels-update/{id}', 'educational_levelController@update')->name('educational_levels.update');
Route::get('/educational_levels-index', 'educational_levelController@index')->name('educational_levels.index');
Route::post('/educational_levels-store', 'educational_levelController@store')->name('educational_levels.store');
Route::get('/educational_levels-confirm_delete/{id}', 'educational_levelController@delete')->name('educational_levels.delete');
Route::get('/educational_levels-destroy/{id}', 'educational_levelController@destroy')->name('educational_levels.destroy');

//schools 
Route::get('/schools-create', 'schoolController@create')->name('schools.create');
Route::get('/schools-show/{id}', 'schoolController@show')->name('schools.show');
Route::get('/schools-edit/{id}', 'schoolController@edit')->name('schools.edit');
Route::post('/schools-update/{id}', 'schoolController@update')->name('schools.update');
Route::get('/schools-index', 'schoolController@index')->name('schools.index');
Route::post('/schools-store', 'schoolController@store')->name('schools.store');
Route::get('/schools-confirm_delete/{id}', 'schoolController@delete')->name('schools.delete');
Route::get('/schools-destroy/{id}', 'schoolController@destroy')->name('schools.destroy');

//request_types 
Route::get('/request_types-create', 'request_typeController@create')->name('request_types.create');
Route::get('/request_types-show/{id}', 'request_typeController@show')->name('request_types.show');
Route::get('/request_types-edit/{id}', 'request_typeController@edit')->name('request_types.edit');
Route::post('/request_types-update/{id}', 'request_typeController@update')->name('request_types.update');
Route::get('/request_types-index', 'request_typeController@index')->name('request_types.index');
Route::post('/request_types-store', 'request_typeController@store')->name('request_types.store');
Route::get('/request_types-confirm_delete/{id}', 'request_typeController@delete')->name('request_types.delete');
Route::get('/request_types-destroy/{id}', 'request_typeController@destroy')->name('request_types.destroy');

//rounds 
Route::get('/rounds-create', 'roundController@create')->name('rounds.create');
Route::get('/rounds-show/{id}', 'roundController@show')->name('rounds.show');
Route::get('/rounds-edit/{id}', 'roundController@edit')->name('rounds.edit');
Route::post('/rounds-update/{id}', 'roundController@update')->name('rounds.update');
Route::get('/rounds-index', 'roundController@index')->name('rounds.index');
Route::post('/rounds-store', 'roundController@store')->name('rounds.store');
Route::get('/rounds-confirm_delete/{id}', 'roundController@delete')->name('rounds.delete');
Route::get('/rounds-destroy/{id}', 'roundController@destroy')->name('rounds.destroy');

//transfer_categories 
Route::get('/transfer_categories-create', 'transfer_categoryController@create')->name('transfer_categories.create');
Route::get('/transfer_categories-show/{id}', 'transfer_categoryController@show')->name('transfer_categories.show');
Route::get('/transfer_categories-edit/{id}', 'transfer_categoryController@edit')->name('transfer_categories.edit');
Route::post('/transfer_categories-update/{id}', 'transfer_categoryController@update')->name('transfer_categories.update');
Route::get('/transfer_categories-index', 'transfer_categoryController@index')->name('transfer_categories.index');
Route::post('/transfer_categories-store', 'transfer_categoryController@store')->name('transfer_categories.store');
Route::get('/transfer_categories-confirm_delete/{id}', 'transfer_categoryController@delete')->name('transfer_categories.delete');
Route::get('/transfer_categories-destroy/{id}', 'transfer_categoryController@destroy')->name('transfer_categories.destroy');

//jobs 
Route::get('/jobs-create', 'jobController@create')->name('jobs.create');
Route::get('/jobs-show/{id}', 'jobController@show')->name('jobs.show');
Route::get('/jobs-edit/{id}', 'jobController@edit')->name('jobs.edit');
Route::post('/jobs-update/{id}', 'jobController@update')->name('jobs.update');
Route::get('/jobs-index', 'jobController@index')->name('jobs.index');
Route::post('/jobs-store', 'jobController@store')->name('jobs.store');
Route::get('/jobs-confirm_delete/{id}', 'jobController@delete')->name('jobs.delete');
Route::get('/jobs-destroy/{id}', 'jobController@destroy')->name('jobs.destroy');

//measurment_types 
Route::get('/measurment_types-create', 'measurment_typeController@create')->name('measurment_types.create');
Route::get('/measurment_types-show/{id}', 'measurment_typeController@show')->name('measurment_types.show');
Route::get('/measurment_types-edit/{id}', 'measurment_typeController@edit')->name('measurment_types.edit');
Route::post('/measurment_types-update/{id}', 'measurment_typeController@update')->name('measurment_types.update');
Route::get('/measurment_types-index', 'measurment_typeController@index')->name('measurment_types.index');
Route::post('/measurment_types-store', 'measurment_typeController@store')->name('measurment_types.store');
Route::get('/measurment_types-confirm_delete/{id}', 'measurment_typeController@delete')->name('measurment_types.delete');
Route::get('/measurment_types-destroy/{id}', 'measurment_typeController@destroy')->name('measurment_types.destroy');

//subjects 
Route::get('/subjects-create', 'subjectController@create')->name('subjects.create');
Route::get('/subjects-show/{id}', 'subjectController@show')->name('subjects.show');
Route::get('/subjects-edit/{id}', 'subjectController@edit')->name('subjects.edit');
Route::post('/subjects-update/{id}', 'subjectController@update')->name('subjects.update');
Route::get('/subjects-index', 'subjectController@index')->name('subjects.index');
Route::post('/subjects-store', 'subjectController@store')->name('subjects.store');
Route::get('/subjects-confirm_delete/{id}', 'subjectController@delete')->name('subjects.delete');
Route::get('/subjects-destroy/{id}', 'subjectController@destroy')->name('subjects.destroy');



//documents 
Route::get('stream_media/{editionId}', 'documentController@streamMedia')->name('stream_media');
Route::get('stream_text_image/{editionId}', 'documentController@streamText_Image')->name('stream_text_image');
Route::get('stream_ads_image/{adId}', 'documentController@streamAds_Image')->name('stream_ads_image');
Route::get('/documents-play/{editionId}', 'documentController@play')->name('documents.play');
Route::get('/documents-playlist/{category?}', 'documentController@playlist')->name('documents.playlist');

/*
//medias 
Route::get('/medias-create', 'mediaController@create')->name('medias.create');
Route::get('/medias-show/{id}', 'mediaController@show')->name('medias.show');
Route::get('/medias-edit/{id}', 'mediaController@edit')->name('medias.edit');
Route::post('/medias-update/{id}', 'mediaController@update')->name('medias.update');
Route::get('/medias-index', 'mediaController@index')->name('medias.index');
Route::post('/medias-store', 'mediaController@store')->name('medias.store');
Route::get('/medias-confirm_delete/{id}', 'mediaController@delete')->name('medias.delete');
Route::get('/medias-destroy/{id}', 'mediaController@destroy')->name('medias.destroy');*/

Route::post('upload', 'mediaController@upload')->name('upload');
Route::get('stream_video', 'mediaController@streamVideo')->name('stream_video');
Route::get('stream_audio', 'mediaController@streamAudio')->name('stream_audio');
/*
Route::get('stream_media/{editionId}', 'mediaController@streamMedia')->name('stream_media');
Route::get('stream_text_image/{editionId}', 'mediaController@streamText_Image')->name('stream_text_image');
*/
/*  new routes*/



Route::get('/medias-create', 'mediaController@create')->name('medias.create');


Route::get('/403', 'Controller@error_403')->name('403');
Route::get('/generateReportByDateInterval', 'HomeController@generateReportByDateInterval')->name('generateReportByDateInterval');
Route::get('/search_menus/{key?}', 'HomeController@search_menus')->name('search_menus');

Route::get('backup', 'BackupController@backup')->name('backup');

/*---Excel Reports--------*/

Route::post('/importExcel', 'ExportExcelController@importExcel')->name('importExcel');
Route::get('/reports_index', 'ExportExcelController@reports_index')->name('reports_index');

Route::get('/export_excel/', 'ExportExcelController@index')->name('export_excel');
Route::get('/export_excel/{type}', 'ExportExcelController@excel')->name('export_excel.excel');
Route::get('/Total_documents_report/{type?}', 'ExportExcelController@Total_documents_report')->name('Total_documents_report');
Route::get('/reports', 'reportController@reports')->name('reports');

/*---end of Reports ---*/

Route::get('/language_strings-create', 'Language_stringController@create')->name('language_strings.create');
Route::post('/language_strings-store', 'Language_stringController@store')->name('language_strings.store');
Route::get('/language_strings-edit', 'Language_stringController@edit')->name('language_strings.edit');
Route::post('/language_strings-update', 'Language_stringController@update')->name('language_strings.update');


Route::get('/changeLanguage/{lang}', 'Language_stringController@changeLanguage')->name('language_strings.changeLanguage');

//logs 
Route::get('/clearLogs_confirmation', 'logsController@clearLogs_confirmation')->name('logs.clearLogs_confirmation');
Route::get('/clearLogs', 'logsController@clearLogs')->name('logs.clearLogs');
Route::get('/logsAll', 'logsController@logsAll')->name('logs.logsAll');

//messages 
Route::get('/messages-create', 'messageController@create')->name('messages.create');
Route::get('/messages-show_inbox/{id}', 'messageController@show_inbox')->name('messages.show_inbox');
Route::get('/messages-show_outbox/{id}', 'messageController@show_outbox')->name('messages.show_outbox');
Route::get('/messages-edit/{id}', 'messageController@edit')->name('messages.edit');
Route::post('/messages-update/{id}', 'messageController@update')->name('messages.update');
Route::get('/messages-inbox/{userId}', 'messageController@inbox')->name('messages.inbox');
Route::get('/messages-outbox/{userId}', 'messageController@outbox')->name('messages.outbox');
Route::post('/messages-store', 'messageController@store')->name('messages.store');
Route::get('/messages-confirm_delete/{id}', 'messageController@delete')->name('messages.delete');
Route::get('/messages-destroy/{id}', 'messageController@destroy')->name('messages.destroy');

//roles 
Route::get('/roles-create', 'roleController@create')->name('roles.create');
Route::get('/roles-show/{id}', 'roleController@show')->name('roles.show');
Route::get('/roles-edit/{id}', 'roleController@edit')->name('roles.edit');
Route::post('/roles-update/{id}', 'roleController@update')->name('roles.update');
Route::get('/roles-index', 'roleController@index')->name('roles.index');
Route::post('/roles-store', 'roleController@store')->name('roles.store');
Route::get('/roles-confirm_delete/{id}', 'roleController@delete')->name('roles.delete');
Route::get('/roles-destroy/{id}', 'roleController@destroy')->name('roles.destroy');

Route::get('/', 'HomeController@showWelcomePage')->name('welcome');
Route::get('/setSystemElementsIfNotExisted', 'Auth\LoginController@setSystemElementsIfNotExisted');

/*blog Route*/
Route::get('/blogs-index', 'blogController@index')->name('blogs.index');
Route::get('/blogs-create', 'blogController@create')->name('blogs.create');
Route::get('/blogs-edit/{id}', 'blogController@edit')->name('blogs.edit');
Route::get('/blogs-show/{id}', 'blogController@show')->name('blogs.show');
Route::post('/blogs-store', 'blogController@store')->name('blogs.store');
Route::post('/blogs-update/{id}', 'blogController@update')->name('blogs.update');
Route::get('/blogs-confirm_delete/{id}', 'blogController@delete')->name('blogs.delete');
Route::get('/blogs-destroy/{id}', 'blogController@destroy')->name('blogs.destroy');

/*Route::get('/externalBlogsIndex', 'ShopController@externalBlogsIndex')->name('blogs.externalBlogsIndex');
Route::get('/externalBlogPage/{blogId}', 'ShopController@externalBlogPage')->name('blogs.externalBlogPage');
Route::get('/searchByKey/{key}', 'ShopController@searchByKey')->name('shop.searchByKey');


//About Route
Route::get('/abouts_externalAboutPage', 'ShopController@externalAboutPage')->name('abouts.externalAboutPage');
*/
Route::get('/abouts-index', 'aboutController@index')->name('abouts.index');
Route::get('/abouts-create', 'aboutController@create')->name('abouts.create');
Route::get('/abouts-edit/{id}', 'aboutController@edit')->name('abouts.edit');
Route::get('/abouts-show/{id}', 'aboutController@show')->name('abouts.show');
Route::post('/abouts-store', 'aboutController@store')->name('abouts.store');
Route::post('/abouts-update/{id}', 'aboutController@update')->name('abouts.update');
Route::get('/abouts-confirm_delete/{id}', 'aboutController@delete')->name('abouts.delete');
Route::get('/abouts-destroy/{id}', 'aboutController@destroy')->name('abouts.destroy');

/*----------OLD ROUTES-----------------------*/

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/sent-sms-report', 'ExportExcelController@sentSmsReport')->name('sentSmsReport');
Route::get('/sent-sms-report-exel/{type}', 'ExportExcelController@sentSmsReportExel')->name('sentSmsReportExel');
Route::get('/received-sms-report', 'ExportExcelController@receivedSmsReport')->name('receivedSmsReport');
Route::get('/received-sms-report-exel/{type}', 'ExportExcelController@receivedSmsReportExel')->name('receivedSmsReportExel');
Route::get('/productLocationPricesPrint/{locationId?}/{productTypeId?}', 'HomeController@productLocationPricesPrint')->name('productLocationPricesPrint');
Route::get('/productLocationPricesExcel/{type}/{locationId?}/{productTypeId?}', 'ExportExcelController@productLocationPricesExcel')->name('productLocationPricesExcel');

Route::get('/system_metadata', 'HomeController@system_metadata')->name('system_metadata');
Route::get('/address_structure', 'HomeController@address_structure')->name('address_structure');
Route::get('/resources/manage-more', 'HomeController@manageMore')->name('resources.manageMore');
Route::get('/resources/manageMore_3rdLevel', 'HomeController@manageMore_3rdLevel')->name('resources.manageMore_3rdLevel');

/*------------------USERS----------------------------------------------*/
Route::get('/new_users', 'UserController@newUsers')->name('users.newUsers');
Route::get('/rejected_users', 'UserController@rejectedUsers')->name('users.rejectedUsers');
Route::get('/users-index', 'UserController@index')->name('users.index');
Route::get('/users-create', 'UserController@create')->name('users.create');
Route::get('/users-edit/{id}', 'UserController@edit')->name('users.edit');
Route::get('/users-show/{id}', 'UserController@show')->name('users.show');
Route::post('/users-store', 'UserController@store')->name('users.store');
Route::post('/users-update/{id}', 'UserController@update')->name('users.update');
Route::get('/users-confirm_delete/{id}', 'UserController@delete')->name('users.delete');
Route::get('/users-destroy/{id}', 'UserController@destroy')->name('users.destroy');

Route::get('/users_getUser/{id}', 'UserController@getUser')->name('users.getUser');

Route::get('/approvals_intro', 'HomeController@approvals_intro')->name('approvals_intro');
Route::get('/approve_new_user/{id}/{approvalStatus}', 'UserController@approveNewUser')->name('users.approveNewUser');
Route::get('/approve_new_document/{id}/{approvalStatus}', 'documentController@approveNewDocument')->name('documents.approveNewDocument');
Route::get('/change_user_status/{id}', 'UserController@changeStatus')->name('users.changeStatus');
Route::get('/users_import', 'UserController@usersImport')->name('users.import');
Route::post('/users_import_post', 'UserController@usersImportPost')->name('users.import.post');


/*------------------permissionS----------------*/
Route::get('/approveDocumentPermissions/{id}', 'documentController@approveDocumentPermissions')->name('permissions.approveDocumentPermissions');
Route::get('/permissions_save/step1', 'permissionController@step1')->name('permissions.step1');
Route::get('/permissions_save/step2/{id}', 'permissionController@step2')->name('permissions.step2');
Route::get('/permissions_save/{actionType}', 'permissionController@savePermission')->name('permissions.save');
Route::get('/permissions_save/checkAll/{actionType}', 'permissionController@checkAllPermissions')->name('permissions.checkAll');
/*--document permissions--*/
Route::get('/document_role_permissions/{id}', 'permissionController@document_role_permissions')->name('permissions.document_role_permissions');
Route::get('/document_permissions_save/{actionType}', 'permissionController@saveDocumentPermission')->name('document_permissions_save.save');
Route::get('/document_permissions_save/checkAll/{actionType}', 'permissionController@checkAllDocumentPermissions')->name('document_permissions_save.checkAll');
/*--end of document permissions*/

/*---POPULATES SIDEBAR ----*/
Route::get('/list-permitted-resources', 'permissionController@listPermittedResources')->name('list.permitted.resources');

/*-------------------LOGO and IMAGE-------------*/
Route::post('/logo_update', 'logoController@update')->name('logo.logo_update');
Route::get('/logo_edit', 'logoController@edit')->name('logo.edit');

Route::get('/getLiveCount', 'HomeController@getLiveCount');
/*-------------------END OF COUNTERS-------------*/

Route::get('/settings-index', 'SettingController@index')->name('settings.index');
Route::post('/settings-update/{id}', 'SettingController@update')->name('settings.update');

//countries 
Route::get('/countries-create', 'countriesController@create')->name('countries.create');
Route::get('/countries-show/{id}', 'countriesController@show')->name('countries.show');
Route::get('/countries-edit/{id}', 'countriesController@edit')->name('countries.edit');
Route::post('/countries-update/{id}', 'countriesController@update')->name('countries.update');
Route::get('/countries-index', 'countriesController@index')->name('countries.index');
Route::post('/countries-store', 'countriesController@store')->name('countries.store');
Route::get('/countries-confirm_delete/{id}', 'countriesController@delete')->name('countries.delete');
Route::get('/countries-destroy/{id}', 'countriesController@destroy')->name('countries.destroy');

//regions 
Route::get('/regions-create', 'regionController@create')->name('regions.create');
Route::get('/regions-show/{id}', 'regionController@show')->name('regions.show');
Route::get('/regions-edit/{id}', 'regionController@edit')->name('regions.edit');
Route::post('/regions-update/{id}', 'regionController@update')->name('regions.update');
Route::get('/regions-index', 'regionController@index')->name('regions.index');
Route::post('/regions-store', 'regionController@store')->name('regions.store');
Route::get('/regions-confirm_delete/{id}', 'regionController@delete')->name('regions.delete');
Route::get('/regions-destroy/{id}', 'regionController@destroy')->name('regions.destroy');

//zones 
Route::get('/zones-create', 'zoneController@create')->name('zones.create');
Route::get('/zones-show/{id}', 'zoneController@show')->name('zones.show');
Route::get('/zones-edit/{id}', 'zoneController@edit')->name('zones.edit');
Route::post('/zones-update/{id}', 'zoneController@update')->name('zones.update');
Route::get('/zones-index', 'zoneController@index')->name('zones.index');
Route::post('/zones-store', 'zoneController@store')->name('zones.store');
Route::get('/zones-confirm_delete/{id}', 'zoneController@delete')->name('zones.delete');
Route::get('/zones-destroy/{id}', 'zoneController@destroy')->name('zones.destroy');

//weredas 
Route::get('/weredas-create', 'weredaController@create')->name('weredas.create');
Route::get('/weredas-show/{id}', 'weredaController@show')->name('weredas.show');
Route::get('/weredas-edit/{id}', 'weredaController@edit')->name('weredas.edit');
Route::post('/weredas-update/{id}', 'weredaController@update')->name('weredas.update');
Route::get('/weredas-index', 'weredaController@index')->name('weredas.index');
Route::post('/weredas-store', 'weredaController@store')->name('weredas.store');
Route::get('/weredas-confirm_delete/{id}', 'weredaController@delete')->name('weredas.delete');
Route::get('/weredas-destroy/{id}', 'weredaController@destroy')->name('weredas.destroy');

// Tabyas
Route::get('/tabyas-create', 'tabyaController@create')->name('tabyas.create');
Route::get('/tabyas-show/{id}', 'tabyaController@show')->name('tabyas.show');
Route::get('/tabyas-edit/{id}', 'tabyaController@edit')->name('tabyas.edit');
Route::post('/tabyas-update/{id}', 'tabyaController@update')->name('tabyas.update');
Route::get('/tabyas-index', 'tabyaController@index')->name('tabyas.index');
Route::post('/tabyas-store', 'tabyaController@store')->name('tabyas.store');
Route::get('/tabyas-confirm_delete/{id}', 'tabyaController@delete')->name('tabyas.delete');
Route::get('/tabyas-destroy/{id}', 'tabyaController@destroy')->name('tabyas.destroy');

// Kebelles
Route::get('/kebelles-create', 'KebelleController@create')->name('kebelles.create');
Route::get('/kebelles-show/{id}', 'KebelleController@show')->name('kebelles.show');
Route::get('/kebelles-edit/{id}', 'KebelleController@edit')->name('kebelles.edit');
Route::post('/kebelles-update/{id}', 'KebelleController@update')->name('kebelles.update');
Route::get('/kebelles-index', 'KebelleController@index')->name('kebelles.index');
Route::post('/kebelles-store', 'KebelleController@store')->name('kebelles.store');
Route::get('/kebelles-confirm_delete/{id}', 'KebelleController@delete')->name('kebelles.delete');
Route::get('/kebelles-destroy/{id}', 'KebelleController@destroy')->name('kebelles.destroy');



});
