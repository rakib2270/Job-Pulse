<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use function Laravel\Prompts\error;

class CandidateController extends Controller
{

    public function index(){
        return view('candidate.dashboard');
    }

    public function showUploadForm()
    {
        return view('resumes.upload');
    }

    public function upload(Request $request)
    {
        // Validate the file
        $request->validate([
            'resume' => 'required|mimes:pdf|max:4096',
        ]);

        $user = Auth::user();
        $applied_resume = JobApplication::where('user_id', $user->id);

        // Delete existing resume file if it exists
        if ($user->resume) {
            Storage::delete('resumes/' . $user->resume);
        }

        // Get the user's name and create a unique filename with timestamp
        $userName = $user->name; // Use Str::slug() instead of str_slug()
        $timestamp = now()->timestamp;
        $resumeFileName = "{$userName}_Resume_{$timestamp}.pdf";

        // Store the new resume file with the unique filename
        $resumePath = $request->file('resume')->storeAs('resumes', $resumeFileName);

        // Update the user's resume field in the database
        $user->update(['resume' => $resumeFileName]);
        $applied_resume->update(['user_resume' => $resumeFileName]);

        return redirect()->back()->with('success', 'Resume uploaded successfully!');
    }


    public function detailsPage (){
        return view('candidate.applicant-details');
    }



}
