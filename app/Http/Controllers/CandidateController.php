<?php

namespace App\Http\Controllers;

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

        // Delete existing resume file if it exists
        if ($user->resume) {
            Storage::delete('resumes/' .$user->resume);
        }

        // Store the new resume file
        $resumePath = $request->file('resume')->store('resumes');

        // Update the user's resume field in the database
        $user->update(['resume' => basename($resumePath)]);

        return redirect()->back()->with('success', 'Resume uploaded successfully!');
    }




}
