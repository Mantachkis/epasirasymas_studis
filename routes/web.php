<?php

Route::get('/', 'MainPageController@getMainPage')->middleware('auth');

Route::get('home', 'MainPageController@getMainPage')->middleware('auth')->name('home');

Route::prefix('')->name('epasirasymas.')->middleware(['auth', 'cors'])->group(function()
{

    Route::prefix('sutarciu_paieska')->middleware('view_agreement')->name('agreement_search.')->group(function()
    {
        Route::get('/', 'Agreement\SearchController@index')->name('searchIndex');

        Route::post('/search_form', 'Agreement\SearchController@searchForm')->name('searchForm');

        Route::post('/update_ok', 'Agreement\SearchController@updateOk')->name('updateOk');

        Route::post('/agreement_cancel_body', 'Agreement\SearchController@agreementCancelBody')->name('agreementCancelBody');

        Route::post('/agreement_cancel_confirm', 'Agreement\SearchController@agreementCancelConfirm')->name('agreementCancelConfirm');

        Route::post('/agreement_file_list', 'Agreement\SearchController@agreementFileList')->name('agreementFileList');

        Route::post('/agreement_oracle_file', 'Agreement\SearchController@agreementOracleFile')->name('agreementOracleFile');

        Route::post('/upload_file', 'Agreement\SearchController@uploadFile')->name('uploadFile');

        Route::post('/delete_file', 'Agreement\SearchController@deleteFile')->name('deleteFile');

        Route::post('/search_results', 'Agreement\SearchController@searchResults')->name('searchResults');

        Route::post('/additional_person', 'Agreement\SearchController@additionalPerson')->name('additionalPerson');

    });

    Route::prefix('sutarciu_kurimas')->middleware('create_agreement')->name('agreement_create.')->group(function()
    {
        Route::get('/', 'Agreement\CreateController@index')->name('createIndex');
        Route::get('/searchItems/{search_phrase?}', 'Agreement\CreateController@programSearchItems')->name('programSearchItems');
        Route::get('/nameSurname/{search_phrase?}', 'Agreement\CreateController@nameSurnameByPersonCode')->name('nameSurnameByPersonCode');
        Route::post('/save', 'Agreement\CreateController@save')->name('saveAgreement');
        Route::get('/get/{id}','Agreement\CreateController@getAgreement')->name('getAgreement');
    });

    Route::prefix('naudotojai')->middleware('user_editing')->name('users.')->group(function()
    {
        Route::get('/', 'Users\UsersController@index')->name('usersIndex');

        Route::post('/list', 'Users\UsersController@list')->name('usersList');

        Route::post('/edit', 'Users\UsersController@edit')->name('usersEdit');

        Route::post('/new',  'Users\UsersController@new')->name('usersNew');

        Route::post('/save', 'Users\UsersController@saveEdit')->name('usersEditSave');

        Route::post('/save_new', 'Users\UsersController@saveNew')->name('usersNewSave');
    });

    Route::prefix('magistrai')->middleware('faculty_workers')->name('magistrai.')->group(function()
    {
        Route::get('balu_suvedimas', 'Master\GradeEnterController@getMainView')->name('balu_suvedimas');

        Route::get('balu_suvedimas/{year}', 'Master\GradeEnterController@getMainViewWithYear')
            ->name('balu_suvedimas.metai')
            ->where('year', '[0-9]+');
        Route::get('balu_suvedimas/{year}/{program}/{stage}', 'Master\GradeEnterController@getMainViewFull')
            ->name('balu_suvedimas.full')
            ->where(['year' => '[0-9]+', 'program' => '[a-z0-9]+', 'stage' => '[0-9]']);

        Route::get('balu_suvedimas/file_upload/{masterId}', 'Master\GradeEnterController@getFileUploadView')
            ->name('baluFileUpload');

        Route::post('balu_suvedimas/upload/{userApp}', 'Master\GradeEnterController@upload')->name('uploadFile');

        Route::post('balu_suvedimas/grade_submit/{id}', 'Master\GradeEnterController@gradeSubmit')
            ->name('balu_suvedimas.gradeSubmit');

        Route::get('konkursine_eile', 'Master\InvitationController@getMainView')->name('konkursine_eile');

        Route::get('konkursine_eile/{year}', 'Master\InvitationController@getMainViewWithYear')
            ->name('konkursine_eile.metai')
            ->where('year', '[0-9]+');
        Route::get('konkursine_eile/{year}/{program}/{stage}', 'Master\InvitationController@getMainViewFull')
            ->name('konkursine_eile.full')
            ->where(['year' => '[0-9]+', 'program' => '[a-z0-9]+', 'stage' => '[0-9]']);

        Route::post('konkursine_eile/store_uninv_agree', 'Master\InvitationController@formAgreementUninvited')
            ->name('konkursine_eile.store_uninv_agree');

        Route::post('konkursine_eile/store_inv_agree/{reqList}', 'Master\InvitationController@formAgreementInvited')
            ->name('konkursine_eile.store_inv_agree');

        Route::post('konkursine_eile/stop_agreement/{reqList}', 'Master\InvitationController@stopAgreement')
            ->name('konkursine_eile.stop_agreement');

        Route::get('konkursine_eile/stop_agreement_modal/{reqList}', 'Master\InvitationController@getStopAgreementModalContent')
            ->name('konkursine_eile.stop_agreement_modal');

        Route::post('konkursine_eile/terminate_agreement/{reqList}', 'Master\InvitationController@terminateAgreement')
            ->name('konkursine_eile.terminate_agreement');

        Route::get('konkursine_eile/terminate_agreement_modal/{reqList}', 'Master\InvitationController@getTerminateAgreementModalContent')
            ->name('konkursine_eile.terminate_agreement_modal');
    });

    Route::prefix('nustatymai')->middleware('sd_workers')->name('settings.')->group(function()
    {
        Route::get('pedagogai/etapai/{year?}', 'Settings\SettingsControllerPed@getMainView')->middleware('sd_admin')->name('pedagogai.stage');

        Route::post('pedagogai/etapai/update/{year}', 'Settings\SettingsControllerPed@update')->middleware('sd_admin')->name('pedagogai.stage.update');

       Route::prefix('magistrai')->name('magistrai.')->group(function()
       {
           Route::get('etapai/{year?}', 'Settings\SettingsController@getMainView')->middleware('sd_admin')->name('stage');

           Route::post('etapai/update/{year}', 'Settings\SettingsController@update')->middleware('sd_admin')->name('stage.update');

           Route::get('programos/list/{year?}/{stage?}', 'Settings\MasterProgramsController@getMainView')->name('programos');

           Route::post('programos/update/{pkods}', 'Settings\MasterProgramsController@update')->name('update');

           Route::get('programos/create_view', 'Settings\MasterProgramsController@getProgramCreateBaseView')->name('program_create_base_view');

           Route::post('programos/create_view', 'Settings\MasterProgramsController@getProgramCreateView')->name('program_create_view');

           Route::post('programos/create', 'Settings\MasterProgramsController@create')->name('program_create');

           Route::get('programos/export/{year}', 'Settings\MasterProgramsController@export')->name('export');

           Route::get('program_content', 'Settings\MasterProgramsController@getProgramModalContent')->name('program_modal_content');

           Route::get('koeficientai/{year?}', 'Settings\CoeficientsController@getMainView')->name('koeficientai');

           Route::get('coeficient_content', 'Settings\CoeficientsController@getProgramEditView')->name('coeficient_program_content');

           Route::get('koeficientai/update/{state_code}/{year}/{pkods}', 'Settings\CoeficientsController@update')->name('coeficient_update');
       });

       Route::prefix('prasymai')->name('applications.')->group(function(){

           Route::get('pagrindinis', 'Settings\ApplicationController@getMainView')->name('main');

           Route::get('prasymas', 'Settings\ApplicationController@getMainViewWithParams')->name('applicationsSearch');

           Route::get('prasymas/update/{app}', 'Settings\ApplicationController@update')->name('update');

           Route::get('app_content/{app}', 'Settings\ApplicationController@getApplicationModalContent')->name('appModalContent');
       });

       Route::prefix('pavardes')->name('surnameChange.')->group(function()
       {
          Route::get('pavardziu_keitimas', 'Settings\SurnameChangeController@getMainView')->name('surnMain');

          Route::get('update/{id}', 'Settings\SurnameChangeController@update')->name('update');
       });
    });

    Route::prefix('ataskaitos')->middleware('faculty_workers')->name('reports.')->group(function()
    {
       Route::get('kandidatu', 'Master\ReportsController@getApplicantsMainView')->name('applicantsBase');

       Route::get('candidate_data', 'Master\ReportsController@getMasterApplicantJsonData')->name('applicantData');

       Route::get('programu', 'Master\ProgramReportController@getProgramReportView')->name('programReportBase');

       Route::get('programu/{year}/{program}/{type}/{stage}', 'Master\ProgramReportController@getProgramReportViewFull')->name('programReportFull');

       Route::get('isakymu', 'Master\AgreementAcceptanceOrdersReportController@getMainView')->name('ordersReport');

       Route::get('isakymu/report', 'Master\AgreementAcceptanceOrdersReportController@getMainViewWithReport')->name('ordersReportFull');

        Route::get('programu', 'Master\ProgramReportController@getProgramReportView')->name('programReportBase');

        Route::get('statistika','Master\ProgramStatisticsController@getStatisticsReportBaseView')->name('statisticsReportBase');
        Route::get('statistika/{year}/{faculty}/{stage}', 'Master\ProgramStatisticsController@getStatisticsReportViewFull')->name('statisticsReportFull');
    });

    Route::get('prasymai/{app}', 'SubmittedAppTableController@getMainView')->name('submittedApplications');

    Route::get('submittedUserApplication/{userApplicationId?}', 'SubmittedAppTableController@getSubmittedApplication')->name('getSubmittedUserApplication');

    Route::post('submittedUserApplication/{userApplication?}/lock', 'SubmittedAppTableController@submittedApplicationLock')->name('lockSubmittedUserApplication');

    Route::post('submittedUserApplication/{userApplication?}/unlock', 'SubmittedAppTableController@submittedApplicationUnlock')->name('unlockSubmittedUserApplication');

    Route::get('submitterUserApplications/{application}/export', 'SubmittedAppTableController@exportApplicationUserInfoDataToExcel')->name('exportAppDataToExcel');

    Route::post('submittedUserApplications/comment', 'SubmittedAppTableController@saveComment')->name('saveComment');

    Route::get('userApplicationAnswers/{userApplicationId?}', 'UserApplicationDisplayController@getApplicationFieldView');

    Route::post('userApplicationAnswers/update/{id}', 'UserApplicationDisplayController@update')->name('userAppUpdate');

    Route::prefix('emails')->middleware('faculty_workers')->name('emails.')->group(function(){
        Route::get('missingDocEmailForm', 'MailController@getMissingDocView')->name('missingDocs');
        Route::post('missingDocEmailForm', 'MailController@sendMail')->name('sendMail');
    });

    Route::prefix('foreigner-entry')->middleware('foreigner_entry')->name('foreignerDataEntry.')->group(function(){
        Route::get('index', 'ForeignerDataEntry\ForeignerDataEntryController@getIndex')->name('index');

        Route::get('create', 'ForeignerDataEntry\ForeignerDataEntryController@getEntryDataForm')->name('create');

        Route::post('store', 'ForeignerDataEntry\ForeignerDataEntryController@storeEntryDataForm')->name('store');

        Route::get('appData/{id}', 'ForeignerDataEntry\ForeignerDataEntryController@getForeignerApplicationData')->name('getAppData');

        Route::get('get-programs/{stkods}', 'ForeignerDataEntry\ForeignerDataEntryController@getProgramsByFaculty')->name('getProgramListByFaculty');

        Route::get('export-to-excel', 'ForeignerDataEntry\ForeignerDataEntryController@getForeignerDataExcelExport')->name('getExcel');
    });

    Route::prefix('scholarship')->middleware('scholarship')->name('scholarship.')->group(function() {
        Route::get('view', 'ScholarshipController@view')->name('view');
    });

});

/**
 * Authentication routes.
 */
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::post('logout', 'Auth\LoginController@logout');
