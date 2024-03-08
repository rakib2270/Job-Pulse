<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use App\Models\JobType;
use App\Models\User;
use Illuminate\Database\Events\TransactionBeginning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Pagination;

class AdminController extends Controller
{

    public function admin()
    {
        $jobCounts = Job::where('company_status','1')->get()->count();
        $activeJobs = Job::where('company_status','1')->where('status','1')->get()->count();
        $pendingJobs = Job::where('company_status','0')->get()->count();
            return view('admin.dashboard', [
            'jobCounts'=>$jobCounts,
            'activeJobs'=>$activeJobs,
            'pendingJobs'=>$pendingJobs
            ]);

    }

    // Company List
    public function companyList()
    {
        // Retrieve and pass data as needed
        $companies = Company::all(); // Assuming you have a Company model

        return view('admin.company_list', compact('companies'));
    }

    // Pages
    public function pages()
    {
        // Your logic for managing pages goes here

        return view('components.pages');
    }

    // Plugins
    public function plugins()
    {
        // Your logic for managing plugins goes here

        return view('components.plugins');
    }


//   Method To Show All Company list




//Method To Show All Jobs.

    public function adminJobs(){
        $jobs = Job::all();
        return view('admin.jobs', [
            'jobs' => $jobs
        ]);
    }


    // Manage Jobs
    public function manageJobs()
    {

        $users = User::all();
        $jobs = Job::all();
        $categories = Category::all();

        return view('admin.manage_jobs',[
            'users'=>$users,
            'jobs'=>$jobs,
            'categories'=>$categories
        ]);

    }

    // Create Job Form
    public function createJob()
    {
        $categories = Category::all();
        $jobTypes = JobType::all();

        return view('front.account.job.create', compact('categories', 'jobTypes'));
    }

    // Store Job
    public function storeJob(Request $request)
    {
        $validator = Validator::make($request->all(), [


        ]);

        if ($validator->fails()) {
            return redirect('/admin/jobs/create')
                ->withErrors($validator)
                ->withInput();
        }

        // Create and store the job
        // You need to modify this part based on your actual fields
        Job::create([
            'title' => $request->input('title'),
            'category_id' => $request->input('category_id'),
            'job_type_id' => $request->input('job_type_id'),
            // Add other fields as needed
        ]);

        return redirect('/admin/jobs')->with('success', 'Job created successfully.');
    }

    // Edit Job Form
    public function editJob($id)
    {
        $job = Job::findOrFail($id);
        $categories = Category::all();
        $jobTypes = JobType::all();

        return view('admin.edit_job', compact('job', 'categories', 'jobTypes'));
    }

    // Update Job
    public function updateJob(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            // Add validation rules for job update fields
        ]);

        if ($validator->fails()) {
            return redirect("/admin/jobs/edit/{$id}")
                ->withErrors($validator)
                ->withInput();
        }

        // Update the job
        $job = Job::findOrFail($id);
        $job->update([
            'title' => $request->input('title'),
            'company_name' => $request->input('company_name'),
            'company_status' => $request->input('company_status'),
            'status' => $request->input('status'),
            // Add other fields as needed
        ]);

        return redirect('/admin/jobs')->with('success', 'Job updated successfully.');
    }

    // Delete Job
    public function deleteJob($id)
    {
        // Delete the job
        Job::findOrFail($id)->delete();

        return redirect('/admin/jobs')->with('success', 'Job deleted successfully.');
    }



/* -------------------------------------------------*/
//  Methods For Company Routes
/* -------------------------------------------------*/


    public function allUsers(){
         $users = User::all();
        return view('admin.all-users',[
            'users'=>$users
        ]);
      }

   public function manageEmployee(){
         $employes = User::all()->where('role','=','employee');
        return view('admin.employee-list',[
            'employes'=>$employes
        ]);
      }


/* -------------------------------------------------*/
//  Methods For Company Routes
/* -------------------------------------------------*/

















//    End of Controller
}
