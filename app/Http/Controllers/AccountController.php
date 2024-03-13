<?php

namespace App\Http\Controllers;

use App\Mail\MagicLoginLink;
use App\Models\Category;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\JobType;
use App\Models\SavedJob;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
class AccountController extends Controller
{
    // This method will show user registration page
    public function registration() {
        return view('front.account.registration');
    }

    // This method will save a user
    public function processRegistration(Request $request) {
        $validator = Validator::make($request->all(),[
            'role'=>'required',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|same:confirm_password',
            'confirm_password' => 'required',
        ]);

        if ($validator->passes()) {

            $user = new User();
            $user->role = $request->role;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->company_status = '1';
            $user->save();

            session()->flash('success','You have registerd successfully.');

            return response()->json([
                'status' => true,
                'errors' => []
            ]);

        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }




    // This method will show user login page
    public function login() {
        return view('front.account.login');
    }

    public function authenticate(Request $request) {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->passes()) {

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('account.profile');
            } else {
                return redirect()->route('account.login')->with('error','Either Email/Password is incorrect');
            }
        } else {
            return redirect()->route('account.login')
                ->withErrors($validator)
                ->withInput($request->only('email'));
        }
    }





//    Login With Magic Link

    public function magicLoginPage() {
        return view('front.account.login-link');
    }

    public function getLoginLink(Request $request){
        $this->validate($request, [
            'email' => 'required|email|exists:users',
        ]);

        Mail::to($request->email)->send(mailable: new MagicLoginLink($request->email));


        return back()->with('success','We have sent a magic link to your email');
    }


    public function loginByMagicLink( User $user){

        auth()->login($user);
        return redirect()->route('account.profile');
    }





    public function profile() {

        $id = Auth::user()->id;

        $user = User::where('id',$id)->first();

        return view('front.account.profile',[
            'user' => $user
        ]);
    }

    public function updateProfile(Request $request) {

        $id = Auth::user()->id;

        $validator = Validator::make($request->all(),[
            'name' => 'required|min:5|max:20',
            'email' => 'required|email|unique:users,email,'.$id.',id'
        ]);


        if ($validator->passes()) {

            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->designation = $request->designation;
            $user->save();

            session()->flash('success','Profile updated successfully.');

            return response()->json([
                'status' => true,
                'errors' => []
            ]);

        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }

    }

    public function logout() {
        Auth::logout();
        return redirect()->route('account.login');
    }
    public function updateProfilePic(Request $request) {
        //dd($request->all());

        $id = Auth::user()->id;

        $validator = Validator::make($request->all(),[
            'image' => 'nullable|mimes:image,png,jpg,jpeg,svg,webp',
        ]);

        if ($validator->passes()) {

            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = $id.'-'.time().'.'.$ext;
            $image->move(public_path('/profile_pic/'), $imageName);


            // Create a small thumbnail
            $sourcePath = public_path('/profile_pic/'.$imageName);
            $manager = new ImageManager(Driver::class);
            $image = $manager->read($sourcePath);

            // crop the best fitting 5:3 (600x360) ratio and resize to 600x360 pixel
            $image->cover(150, 150);
            $image->toPng()->save(public_path('/profile_pic/thumb/'.$imageName));

            // Delete Old Profile Pic
            File::delete(public_path('/profile_pic/thumb/'.Auth::user()->image));
            File::delete(public_path('/profile_pic/'.Auth::user()->image));

            User::where('id',$id)->update(['image' => $imageName]);

            session()->flash('success','Profile picture updated successfully.');

            return response()->json([
                'status' => true,
                'errors' => []
            ]);

        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }







    public function myJobApplications(){
        $jobApplications = JobApplication::where('user_id',Auth::user()->id)
            ->with(['job','job.jobType','job.applications'])
            ->orderBy('created_at','DESC')
            ->paginate(10);

        return view('front.account.job.my-job-applications',[
            'jobApplications' => $jobApplications
        ]);
    }

    public function removeJobs(Request $request){
        $jobApplication = JobApplication::where([
                'id' => $request->id,
                'user_id' => Auth::user()->id]
        )->first();

        if ($jobApplication == null) {
            session()->flash('error','Job application not found');
            return response()->json([
                'status' => false,
            ]);
        }

        JobApplication::find($request->id)->delete();
        session()->flash('success','Job application removed successfully.');

        return response()->json([
            'status' => true,
        ]);

    }

    public function savedJobs(){
        // $jobApplications = JobApplication::where('user_id',Auth::user()->id)
        //         ->with(['job','job.jobType','job.applications'])
        //         ->paginate(10);

        $savedJobs = SavedJob::where([
            'user_id' => Auth::user()->id
        ])->with(['job','job.jobType','job.applications'])
            ->orderBy('created_at','DESC')
            ->paginate(10);

        return view('front.account.job.saved-jobs',[
            'savedJobs' => $savedJobs
        ]);
    }

    public function removeSavedJob(Request $request){
        $savedJob = SavedJob::where([
                'id' => $request->id,
                'user_id' => Auth::user()->id]
        )->first();

        if ($savedJob == null) {
            session()->flash('error','Job not found');
            return response()->json([
                'status' => false,
            ]);
        }

        SavedJob::find($request->id)->delete();
        session()->flash('success','Job removed successfully.');

        return response()->json([
            'status' => true,
        ]);

    }

    public function updatePassword(Request $request){
        $validator = Validator::make($request->all(),[
            'new_password' => 'required|min:5',
            'confirm_password' => 'required|same:new_password',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

//        if (Hash::check($request->old_password, Auth::user()->password) == false){
//            session()->flash('error','Your old password is incorrect.');
//            return response()->json([
//                'status' => true
//            ]);
//        }


        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($request->new_password);
        $user->save();

        session()->flash('success','Password updated successfully.');
        return response()->json([
            'status' => true
        ]);

    }
}
