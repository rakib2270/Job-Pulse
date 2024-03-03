<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use App\Models\JobType;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    public function admin() {
        return view('admin.dashboard');
    }

//   Method To Show All Company list

    // Manage Jobs
    public function manageJobs()
    {
        $jobs = Job::all();
        return view('front.jobs', compact('jobs'));
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
            'category_id' => $request->input('category_id'),
            'job_type_id' => $request->input('job_type_id'),
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



















//    End of Controller
}
