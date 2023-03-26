<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\hospital\HospitalController;
use App\Http\Controllers\user\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $report = \App\Models\Reports::where('user_id', Auth::user()->customer_id)->get();
    return view('welcome', compact('report'));
})->name('home')->middleware('webguard');

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login');
    Route::post('/login', 'postLogin')->name('auth.login');
    Route::get('/verify/{id}', 'verify')->name('auth.verify');
    Route::post('/verify/{id}', 'postVerify')->name('auth.postVerify');

    Route::get('/resend/phone/otp/{phone}', 'resend_otp')->name('auth.resend_otp');
});
Route::controller(UserController::class)->group(function () {
    Route::get('/profile', 'profile')->name('user.profile');
    Route::get('/new_user', 'new_user')->name('user.new_user');
    Route::post('/new_user', 'update_user')->name('user.update');
    Route::get('/report/category/{id}', 'report_category')->name('user.report_category');
    Route::post('/upload_report', 'upload_report')->name('user.upload_report');
    Route::get('/prescription', 'prescription')->name('user.prescription');
    Route::post('/upload/prescription', 'upload_prescription')->name('user.upload_prescription');
    // pdf viewer 
    Route::get('/report/view/{document_id}', 'pdf_view')->name('user.pdf');
    Route::get('/prescription/view/{presNumber}', 'prescription_view')->name('user.prescription_pdf');


    Route::get('/report/search', 'search_report')->name('user.search_report');



    Route::post('/update/profile', 'update_profile')->name('user.update_profile');
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('home');
})->name('logout');