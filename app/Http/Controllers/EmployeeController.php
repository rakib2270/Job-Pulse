<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\JobType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function index() {
        $user = Job::where('user_id', Auth::user()->id);
        $activeJobs = $user->where('company_status','1')->where('status','1')->count();
        $pendingJobs = $user->where('status','0')->count();
        $applicants = JobApplication::where('employer_id', Auth::user()->id)->count();
        return view('employee.dashboard',[
            'activeJobs'=>$activeJobs,
            'pendingJobs'=>$pendingJobs,
            'applicants'=>$applicants
        ]);
    }



//    Method To Show My Jobs
    public function myJobs() {

        $jobs = Job::where('user_id',Auth::user()->id)->with('jobType')

            ->orderBy('created_at','DESC')->paginate(10);
        return view('employee.job.my-jobs',[
            'jobs' => $jobs
        ]);
    }



//    Method To Create New Job
    public function createJob() {

        $categories = Category::orderBy('name','ASC')->where('status',1)->get();

        $jobTypes = JobType::orderBy('name','ASC')->where('status',1)->get();

        return view('employee.job.create',[
            'categories' =>  $categories,
            'jobTypes' =>  $jobTypes,
        ]);
    }



//    Method To Edit Job
    public function editJob(Request $request, $id) {


        $categories = Category::orderBy('name','ASC')->where('status',1)->get();
        $jobTypes = JobType::orderBy('name','ASC')->where('status',1)->get();

        $job = Job::where([
            'user_id' => Auth::user()->id,
            'id' => $id
        ])->first();

        if ($job == null) {
            abort(404);
        }


//        Method to go Edit Page with Data
        return view('employee.job.edit',[
            'categories' => $categories,
            'jobTypes' => $jobTypes,
            'job' => $job,
        ]);
    }



//      Method To Update A Job
    public function updateJob(Request $request, $id) {
//      Data Validation
        $rules = [
            'title' => 'required|min:5|max:200',
            'category' => 'required',
            'jobType' => 'required',
            'vacancy' => 'required|integer',
            'location' => 'required|max:50',
            'description' => 'required',
            'company_name' => 'required|min:3|max:75',

        ];

        $validator = Validator::make($request->all(),$rules);


//        Method To Update Data
        if ($validator->passes()) {

            $job = Job::find($id);
            $job->title = $request->title;
            $job->category_id = $request->category;
            $job->job_type_id  = $request->jobType;
            $job->user_id = Auth::user()->id;
            $job->vacancy = $request->vacancy;
            $job->salary = $request->salary;
            $job->location = $request->location;
            $job->description = $request->description;
            $job->benefits = $request->benefits;
            $job->responsibility = $request->responsibility;
            $job->qualifications = $request->qualifications;
            $job->keywords = $request->keywords;
            $job->experience = $request->experience;
            $job->company_name = $request->company_name;
            $job->company_location = $request->company_location;
            $job->company_website = $request->website;
            $job->save();

            session()->flash('success','Job updated successfully.');

            return response()->json([
                'status' => true,
                'errors' => []
            ]);

        } else {                         //If Error Found Show Error Message.
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }




//    Method To Delete a Job
    public function deleteJob(Request $request) {
//     Find Job to Delete
        $job = Job::where([
            'user_id' => Auth::user()->id,
            'id' => $request->jobId
        ])->first();

//        If Job Not Found, Show Message.
        if ($job == null) {
            session()->flash('error','Either job deleted or not found.');
            return response()->json([
                'status' => true
            ]);
        }


        Job::where('id',$request->jobId)->delete();
        session()->flash('success','Job deleted successfully.');
        return response()->json([
            'status' => true
        ]);

    }










//    End Of Controller
//    End Of Controller

}
