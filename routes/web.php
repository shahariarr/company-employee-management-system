<?php

use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeProfileController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\CompanyProfileController;
use App\Http\Controllers\AdminController;




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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();


Route::middleware(['auth', 'user-access'])->group(function () {

    Route::get('/home', [HomeController::class, 'Employee'])->name('home');


    Route::get('employee_profile', [EmployeeProfileController::class, 'index'])->name('employee_profile.index');
    Route::get('employee_profile/create', [EmployeeProfileController::class, 'create'])->name('employee_profile.create');
    Route::post('employee_profile', [EmployeeProfileController::class, 'store'])->name('employee_profile.store');
    Route::get('employee_profile/edit', [EmployeeProfileController::class, 'edit'])->name('employee_profile.edit');
    Route::put('employee_profile', [EmployeeProfileController::class, 'update'])->name('employee_profile.update');



    Route::get('feedback', [FeedbackController::class, 'index'])->name('feedback.index');
    Route::get('feedback/create', [FeedbackController::class, 'create'])->name('feedback.create');
    Route::post('feedback', [FeedbackController::class, 'store'])->name('feedback.store');
    Route::get('feedback/{id}/edit', [FeedbackController::class, 'edit'])->name('feedback.edit');
    Route::put('feedback/{id}', [FeedbackController::class, 'update'])->name('feedback.update');
    Route::delete('feedback/{id}', [FeedbackController::class, 'destroy'])->name('feedback.destroy');
});




Route::middleware(['auth', 'admin-access'])->group(function () {

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');


    Route::get('/admin/all_company', [AdminController::class, 'allCompanyProfile'])->name('admin.all_company');
    Route::get('/admin/all_employee', [AdminController::class, 'allEmployeeProfile'])->name('admin.all_employee');
});




Route::middleware(['auth', 'manager-access'])->group(function () {

    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');

    Route::get('/company-profile', [CompanyProfileController::class, 'index'])->name('company_profile.index');
    Route::get('/company-profile/create', [CompanyProfileController::class, 'create'])->name('company_profile.create');
    Route::post('/company-profile', [CompanyProfileController::class, 'store'])->name('company_profile.store');
    Route::get('/company-profile/{companyProfile}/edit', [CompanyProfileController::class, 'edit'])->name('company_profile.edit');
    Route::put('/company-profile/{companyProfile}', [CompanyProfileController::class, 'update'])->name('company_profile.update');
});
