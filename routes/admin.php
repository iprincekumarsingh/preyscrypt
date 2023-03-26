<?php

use App\Http\Controllers\admin\AdminController;
use Illuminate\Support\Facades\Route;




Route::controller(AdminController::class)->group(function () {
        Route::get('/settings', 'settings')->name('admin.settings');
        Route::post('/users/add', 'user_add')->name('admin.user.add');

        Route::get('/analytics', 'analytics')->name('admin.analytics');

        Route::get('/hospital/staff', 'staffs')->name('admin.staff');


        Route::post('/upload/logo', 'upload_logo')->name('admin.upload.logo');


        Route::get('/hospital/staff/delete/{id}', 'delete_staff')->name('admin.staff.delete');

        Route::get('/admin/staff/block/{id}', 'block_staff')->name('admin.staff.block');
        Route::get('/admin/staff/unblock/{id}', 'unblock_staff')->name('admin.staff.unblock');

});