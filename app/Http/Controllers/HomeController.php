<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormEmail;
use App\Models\Category;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    // This method will show our home page
    public function index() {

        $categories = Category::where('status',1)->orderBy('name','ASC')->take(8)->get();

        $newCategories = Category::where('status',1)->orderBy('name','ASC')->get();

        $featuredJobs = Job::where('status', '=', '1')
                        ->where('is_featured','=','1')
                        ->orderBy('created_at','DESC')
                        ->take(6)->get();

        $popularJobs = Job::where('status', '=', '1')
                        ->where('is_popular','=', '1')
                        ->orderBy('created_at','DESC')
                        ->take(6)->get();

        $latestJobs = Job::where('status', '=', '1')
                        ->orderBy('created_at', 'desc')
                        ->take(12)->get();




        return view('front.home',[
            'categories' => $categories,
            'featuredJobs' => $featuredJobs,
            'popularJobs' => $popularJobs,
            'latestJobs' => $latestJobs,
            'newCategories' => $newCategories
        ]);
    }

    public function about(){
        return view('front.about');
    }
     public function blogs (){
        return view('front.blogs');
    }
     public function contact(){
        return view('front.contact');
    }

    // Send Notification Email to Employer
    public function contactFormEmail( Request $request){

        $request->validate([
           'name'=> 'required',
            'email'=> 'required|email',
            'phone'=> 'required',
            'subject'=> 'required',
            'message'=> 'required'
        ]);
        $mailData = [
            'name' => $request->input('name'),
            'email' => $request->  input('email'),
            'phone' => $request-> input('phone'),
            'subject' => $request-> input('subject'),
            'message' => $request-> input('message')
        ];

        Mail::to("mail.w3web@gmail.com")->send(new ContactFormEmail($mailData));

//        $message = 'Email sent successfully!';

//        session()->flash('success',$message);
//
//        return response()->json([
//            'status' => true,
//            'message' => $message
//        ]);
        return redirect()->back()->with('success', 'Email sent successfully!');
    }




//    End of File
}
