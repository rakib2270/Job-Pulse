<div class="card account-nav border-0 shadow mb-4 mb-lg-0">
    <div class="card-body p-0">
        <ul class="list-group list-group-flush ">
            <li class="list-group-item d-flex justify-content-between p-3">
                <a href="{{ route('account.profile') }}">Back To Account</a>
            </li>
              <li class="list-group-item d-flex justify-content-between p-3">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('admin.allUsers') }}">See Users</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('admin.jobs') }}">Jobs</a>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('admin.manageEmployee') }}">Employee List</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('blogs') }}">Blogs</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="#">Pages</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="#">Plugins</a>
            </li>

        </ul>
        <div style="margin-top: 300px" class="list-group-item d-flex justify-content-between align-items-center p-3">
            <a href="{{ route('account.logout') }}">Logout</a>
        </div>
    </div>
</div>

