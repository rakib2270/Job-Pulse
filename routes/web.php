<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\admin\DasboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/rg', function () {
//     return view('front.account.login');
// });

    // Frontend Routes
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/about',[HomeController::class,'about'])->name('about');
Route::get('/blogs',[HomeController::class,'blogs'])->name('blogs');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');
Route::post('/contact/mail',[HomeController::class,'contactFormEmail'])->name('contactMail');
Route::get('/jobs',[JobsController::class,'index'])->name('jobs');
Route::get('/jobs/detail/{id}',[JobsController::class,'detail'])->name('jobDetail');
Route::post('/apply-job',[JobsController::class,'applyJob'])->name('applyJob');
Route::post('/save-job',[JobsController::class,'saveJob'])->name('saveJob');



    // Admin Routes
Route::group(['prefix' => 'admin','middleware' => 'admin'], function(){
    Route::get('/dashboard',[AdminController::class,'admin'])->name('admin.dashboard');
    Route::get('/company/list',[AdminController::class, 'companies'])->name('company.list');
    // Manage Jobs
    Route::get('/admin/jobs', [AdminController::class, 'manageJobs'])->name('admin.manageJobs');
    Route::get('/admin/jobs/create', [AdminController::class, 'createJob'])->name('admin.createJob');
    Route::post('/admin/jobs/store', [AdminController::class, 'storeJob'])->name('admin.storeJob');
    Route::get('/admin/jobs/edit/{id}', [AdminController::class, 'editJob'])->name('admin.editJob');
    Route::put('/admin/jobs/update/{id}', [AdminController::class, 'updateJob'])->name('admin.updateJob');
    Route::delete('/admin/jobs/delete/{id}', [AdminController::class, 'deleteJob'])->name('admin.deleteJob');

    // Manage Users
    Route::get('/admin/users', [AdminController::class, 'manageUsers'])->name('admin.manageUsers');
    Route::get('/admin/users/edit/{id}', [AdminController::class, 'createUser'])->name('admin.createUser');
    Route::get('/admin/users/edit/{id}', [AdminController::class, 'storeUser'])->name('admin.storeUser');
    Route::get('/admin/users/edit/{id}', [AdminController::class, 'editUser'])->name('admin.editUser');
    Route::put('/admin/users/update/{id}', [AdminController::class, 'updateUser'])->name('admin.updateUser');
    Route::delete('/admin/users/delete/{id}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');

    // Manage Companies
    Route::get('/admin/companies', [AdminController::class, 'manageCompanies'])->name('admin.manageCompanies');
    Route::get('/admin/companies/create', [AdminController::class, 'createCompany'])->name('admin.createCompany');
    Route::post('/admin/companies/store', [AdminController::class, 'storeCompany'])->name('admin.storeCompany');
    Route::get('/admin/companies/edit/{id}', [AdminController::class, 'editCompany'])->name('admin.editCompany');
    Route::put('/admin/companies/update/{id}', [AdminController::class, 'updateCompany'])->name('admin.updateCompany');
    Route::delete('/admin/companies/delete/{id}', [AdminController::class, 'deleteCompany'])->name('admin.deleteCompany');

    // Manage Categories
    Route::get('/admin/categories', [AdminController::class, 'manageCategories'])->name('admin.manageCategories');
    Route::get('/admin/categories/create', [AdminController::class, 'createCategory'])->name('admin.createCategory');
    Route::post('/admin/categories/store', [AdminController::class, 'storeCategory'])->name('admin.editCategory');
    Route::get('/admin/categories/edit/{id}', [AdminController::class, 'editCategory'])->name('admin.editCategory');
    Route::put('/admin/categories/update/{id}', [AdminController::class, 'updateCategory'])->name('admin.updateCategory');
    Route::delete('/admin/categories/delete/{id}', [AdminController::class, 'deleteCategory'])->name('admin.deleteCategory');

    // Manage Subscriptions
    Route::get('/admin/subscriptions', [AdminController::class, 'manageSubscriptions'])->name('admin.manageSubscriptions');
    Route::get('/admin/subscriptions/edit/{id}', [AdminController::class, 'editSubscription'])->name('admin.editSubscription');
    Route::put('/admin/subscriptions/update/{id}', [AdminController::class, 'updateSubscription'])->name('admin.updateSubscription');
    Route::delete('/admin/subscriptions/delete/{id}', [AdminController::class, 'deleteSubscription'])->name('admin.deleteSubscription');

    // Reporting
    Route::get('/admin/reports', [AdminController::class, 'viewReports'])->name('admin.viewReports');

    // Settings
    Route::get('/admin/settings', [AdminController::class, 'viewSettings'])->name('admin.viewSettings');
    Route::post('/admin/settings/update', [AdminController::class, 'updateSettings'])->name('admin.updateSettings');

});




// Employee Routes
Route::group(['prefix' => 'employee','middleware' => 'employee'], function(){
    Route::get('/dashboard',[EmployeeController::class,'index'])->name('employee.dashboard');
});



//  Candidate Routes
Route::group(['prefix' => 'candidate','middleware' => 'candidate'], function(){
    Route::get('/dashboard',[CandidateController::class,'index'])->name('candidate.dashboard');
});


// Guest Routes
Route::group(['prefix' => 'account'], function(){

    // Guest Route
    Route::group(['middleware' => 'guest'], function(){
        Route::get('/login',[AccountController::class,'login'])->name('account.login');
        Route::get('/register',[AccountController::class,'registration'])->name('account.registration');

        Route::post('/process-register',[AccountController::class,'processRegistration'])->name('account.processRegistration');
        Route::post('/authenticate',[AccountController::class,'authenticate'])->name('account.authenticate');
    });


    // Authenticated Routes
    Route::group(['middleware' => 'auth'], function(){
        Route::get('/profile',[AccountController::class,'profile'])->name('account.profile');
        Route::put('/update-profile',[AccountController::class,'updateProfile'])->name('account.updateProfile');
        Route::get('/logout',[AccountController::class,'logout'])->name('account.logout');
        Route::post('/update-profile-pic',[AccountController::class,'updateProfilePic'])->name('account.updateProfilePic');
        Route::get('/create-job',[AccountController::class,'createJob'])->name('account.createJob');
        Route::post('/save-job',[AccountController::class,'saveJob'])->name('account.saveJob');
        Route::get('/my-jobs',[AccountController::class,'myJobs'])->name('account.myJobs');
        Route::get('/my-jobs/edit/{jobId}',[AccountController::class,'editJob'])->name('account.editJob');
        Route::post('/update-job/{jobId}',[AccountController::class,'updateJob'])->name('account.updateJob');
        Route::post('/delete-job',[AccountController::class,'deleteJob'])->name('account.deleteJob');
        Route::get('/my-job-applications',[AccountController::class,'myJobApplications'])->name('account.myJobApplications');

        Route::post('/remove-job-application',[AccountController::class,'removeJobs'])->name('account.removeJobs');
        Route::get('/saved-jobs',[AccountController::class,'savedJobs'])->name('account.savedJobs');
        Route::post('/remove-saved-job',[AccountController::class,'removeSavedJob'])->name('account.removeSavedJob');
        Route::post('/update-password',[AccountController::class,'updatePassword'])->name('account.updatePassword');

    });

});
