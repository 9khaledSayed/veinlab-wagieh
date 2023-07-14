<?php

use App\Http\Controllers\Dashboard\InvoiceController;
use App\Models\Patient;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'dashboard', 'namespace' => 'Dashboard', 'as' => 'dashboard.', 'middleware' => ['web', 'auth:employee', 'set_locale']], function () {

    /** set theme mode ( light , dark ) **/
    Route::get('/change-theme-mode/{mode}', function ($mode) {

        session()->put('theme_mode', $mode);
        return redirect()->back();
    });

    /** dashboard index **/
    Route::get('/', 'DashboardController@index')->name('index');
    /** resources routes **/
    Route::resource('roles', 'RoleController');
    Route::resource('employees', 'EmployeeController');
    Route::resource('news-subscribers', 'NewsSubscriberController')->except(['store', 'create', 'show']);
    Route::resource('settings', 'SettingController')->only(['index', 'store']);

    Route::resource('packages', 'PackageController');
    Route::get('package/seasonal-packages', 'PackageController@seasonalPackages')->name('packages.seasonal-packages');

    /* Patients Routes */
    Route::resource('patients','PatientController');
    Route::get('export-excel-patients','PatientController@exportExcel')->name('patients.exportExcel');
    Route::get('patients/search','PatientController@search')->name('patients.search');

    /* Doctors Routes */
    Route::resource('doctors', 'DoctorController');

    /* Medical Center Routes */
    Route::resource('medical-centers', 'HospitalController');

    /* Sectors Routes */
    Route::resource('sectors', 'SectorController');

    /*  Main analysis */
    Route::resource('main-analysis', 'MainAnalysisController');
    Route::get('mainAnalysis/laboratories','MainAnalysisController@laboratories')->name('main-analysis.laboratories');
    Route::get('export-excel-main-analysis', 'MainAnalysisController@exportExcel')->name('main-analysis.exportExcel');

    /*  Sub analysis */
    Route::resource('sub-analysis', 'SubAnalysisController');
    Route::get('export-excel-sub-analysis', 'SubAnalysisController@exportExcel')->name('sub-analysis.exportExcel');

//    /*  Insurance Companies  */
//    Route::resource('insurance-companies', 'InsuranceCompanyController');
//    Route::get('export-excel-insurance-companies', 'InsuranceCompanyController@exportExcel')->name('insurance-companies.exportExcel');

    /* Home Visits Routes  */

    Route::resource('home-visits', 'HomeVisitController');
    Route::get('export-excel-home-visits', 'HomeVisitController@exportExcel')->name('home-visits.exportExcel');

    /** ajax routes **/
    Route::get('role/{role}/employees', 'RoleController@employees');

    /* Nationality Routes */
    Route::resource('nationalities', 'NationalityController');

    /* Branches Routes */
    Route::resource('branches', 'BranchController');

    /** employee profile routes **/

    Route::view('edit-profile', 'dashboard.employees.edit-profile')->name('edit-profile');
    Route::put('update-profile', 'EmployeeController@updateProfile')->name('update-profile');
    Route::put('update-password', 'EmployeeController@updatePassword')->name('update-password');

    /** Trash routes */

    Route::get('trash/{modelName?}', 'TrashController@index')->name('trash');
    Route::get('trash/{modelName}/{id}', 'TrashController@restore');
    Route::delete('trash/{modelName}/{id}', 'TrashController@forceDelete');

    /** promo code*/
    Route::resource('promoCode',  'PromoCodeController');
    Route::resource('marketers',  'MarketerController');

    /** Start Route Invoices */
    Route::resource('invoices', 'InvoiceController');
    Route::get('invoice-generate-pdf/{id}','SendInvoiceController@generateInvoicePdf')->name('invoice.generate'); //big
    Route::get('bill-generate-pdf/{id}','SendInvoiceController@generateBillPdf')->name('bill.generate'); //small
    Route::post("invoices/{id}/send_via_whatsapp","SendInvoiceController@sendViaWhatsapp")->withoutMiddleware('auth');

    Route::get("print-invoice/{id}","PatientController@printInvoice")->name('print-invoice');

    /** End Route Invoices */

    Route::get('affiliate/settings', 'PromoCodeSettingController@updateSettings')->name('affiliate.settings');
    Route::post('affiliate/settings/{type}', 'PromoCodeSettingController@editSettings');


    /* DeductionAndAdditionTypes types */
    Route::resource('deduction-and-additions', 'DeductionAndAdditionController');

    /* external laboratories */
    Route::resource('laboratories', 'LaboratoryController');

    /* Allowance types */
    Route::resource('allowance-types', 'AllowanceTypeController');

    /* VacationTypes Routes */
    Route::resource('vacation-types','VacationTypeController');


    /* Waiting-labs Routes */
    Route::resource('waiting-labs','WaitingLabController')->except('show');
    Route::get('waiting-labs/finished', 'WaitingLabController@finishedAnalysis')->name('waiting-labs.finished');
    Route::get('waiting-labs/pending' , 'WaitingLabController@pendingAnalysis')->name('waiting-labs.pending');
    Route::get('waiting-labs-archives', 'WaitingLabController@WaitingLabArchives')->name('waiting-labs-archive');
    Route::post('waiting-labs/archives', 'WaitingLabController@ArchiveWaitingLab')->name('waiting-labs.archives');

    /*Results Routes */
    Route::resource('results','ResultController')->except('edit');
    Route::get('results/{waiting_lab}/edit', 'ResultController@edit')->name('results.edit');
    Route::post("approve-result","ResultController@approve")->name('approve.result');
    Route::put("/disapprove-result/{id}","WaitingLabController@disApprove");
    Route::get("print-result/{id}","ResultController@printResult")->name('result.print');
    Route::get("print-results/{id}","ResultController@printResults")->name('results.print');
    Route::post("result/{id}/send_via_whatsapp","SendResultController@sendViaWhatsapp")->withoutMiddleware('auth')->name('result.send_whatsapp');
    Route::post("result/{id}/send_via_email","SendResultController@sendViaEmail")->withoutMiddleware('auth')->name('result.send_email');
    Route::post("result/{id}/send_via_web_notification","SendResultController@sendViaWebNotification")->withoutMiddleware('auth')->name('result.send_web_notification');



    /* Settings Routes */
    Route::resource('settings', 'SettingController')->only(['index', 'store']);
    Route::get('settings/company-information', 'SettingController@companyInfo')->name('settings.company-information');
    Route::post('settings/company-information', 'SettingController@storeCompanyInfo')->name('settings.company-information.store');
    Route::get('settings/tax', 'SettingController@tax')->name('settings.tax');
    Route::post('settings/tax', 'SettingController@storeTax')->name('settings.tax.store');
    Route::get('settings/home-visits', 'SettingController@homeVisits')->name('settings.home-visits');
    Route::post('settings/home-visits', 'SettingController@storeHomeVisits')->name('settings.home-visits.store');
});
