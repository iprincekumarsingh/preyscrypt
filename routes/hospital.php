<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\hospital\HospitalController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\web\ReportCategories;
use App\Http\Controllers\web\WebController;
use Illuminate\Support\Facades\Route;
use Twilio\TwiML\Video\Room;


Route::post('/search', [HospitalController::class, 'search'])->name('hospita.search');

Route::controller(HospitalController::class)->group(function () {


    Route::get('/', 'index')->name('hospital.home');

    Route::get('/{customerId}/user', 'SingleUser')->name('hospital.user.profile');

    Route::post('/report/categories', 'saveCategories')->name('report.saveCategories');

    Route::get('/report/categories', 'reportCategories')->name('reportCategories');

    Route::get('/users', 'users')->name('hospital.users');

    Route::get('/user/search/', 'search_user')->name('hospital.user.search');

    Route::post('/hospital/upload/', 'hospital_upload_user_report')->name('hospital.user.upload');

    Route::get('/hospital/report/view/{document_id}', 'hospital_pdf_view')->name('hospital.pdf');

});