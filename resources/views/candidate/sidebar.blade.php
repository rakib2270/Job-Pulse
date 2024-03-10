

<div class="card account-nav border-0 shadow mb-4 mb-lg-0">
    <div class="card-body p-0">
        <ul class="list-group list-group-flush ">

            <li class="list-group-item d-flex justify-content-between p-3">
                <a href="{{ route('account.profile') }}">Account</a>
            </li>
            <li class="list-group-item d-flex justify-content-between p-3">
                <a href="{{ route('resumes.showUploadForm') }}">Upload Resume</a>
            </li>
             <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('jobs') }}">Find Jobs</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('account.savedJobs') }}">Saved Jobs</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('account.myJobApplications') }}">Jobs Applied</a>
            </li>

        </ul>
        <div style="margin-top: 300px" class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('account.logout') }}">Logout</a>
        </div>
    </div>
</div>
