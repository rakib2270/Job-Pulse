
<div class="card border-0 shadow mb-4 p-3">
    <div class="s-body text-center mt-3">

        @if (Auth::user()->image != '')

            <img src="{{ asset('profile_pic/thumb/'.Auth::user()->image) }}" alt="avatar"  class="rounded-circle img-fluid" style="width: 150px;">
        @else
            <img src="{{ asset('assets/images/avatar7.png') }}" alt="avatar"  class="rounded-circle img-fluid" style="width: 150px;">
        @endif

        <h5 class="mt-3 pb-0">{{ Auth::user()->name }}</h5>
        <p class="text-muted mb-1 fs-6">{{ Auth::user()->designation }}</p>
            <div class="d-flex justify-content-center mb-2">
                <button  data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="btn btn-primary">Change Profile Picture</button>
            </div>
        </div>
</div>



<div class="card account-nav border-0 shadow mb-4 mb-lg-0">
    <div class="card-body p-0">
        <ul class="list-group list-group-flush ">
           @if(Auth::user()->role == 'candidate')
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <form action="{{ route('resume.upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h2>Upload You CV</h2>
                    <div class="mb-3">
                        <label>File Type/.pdf</label>
                        <input type="file" name="resume" class="form-control" />
                    </div>
                    <div class="p-2">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>

                </form>
            </li>
            @endif

            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('account.logout') }}">Logout</a>
            </li>
        </ul>
    </div>
</div>
