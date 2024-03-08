
<section>

        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow py-3">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}"> <img style="width: 50px; height: 50px" src="{{asset('assets/images/jobpulse.png')}}">JOB PULSE</a>
                <button class="navbar-toggler" type="button" data-bs	-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-0 ms-sm-0 me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('jobs') }}">Jobs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/blogs">Blogs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/contact">Contact</a>
                        </li>
                    </ul>

                    @if(!Auth::check())
                        <a class="btn btn-outline-primary me-2" href="{{route('account.login')}}" type="submit">Login</a>
                        <a class="btn btn-outline-primary me-2" href="{{route('account.registration')}}" type="submit">Register</a>
                    @else
                        @if (Auth::user()->role == 'admin')
                            <a class="btn btn-outline-primary me-2" href="{{ route('admin.dashboard') }}" type="submit">Admin</a>
                        @elseif (Auth::user()->role == 'employee')
                            <a class="btn btn-outline-primary me-2" href="{{ route('account.createJob') }}" type="submit">Post a Job</a>
                            <a class="btn btn-outline-primary me-2" href="{{ route('employee.dashboard') }}" type="submit">Dashboard</a>
                        @elseif (Auth::user()->role == 'candidate')
                            <a class="btn btn-outline-primary me-2" href="{{ route('candidate.dashboard') }}" type="submit">Dashboard</a>
                        @endif
                        <a class="btn btn-outline-primary me-2" href="{{ route('account.profile') }}" type="submit">Account</a>
                    @endif


                </div>
            </div>
        </nav>+

</section>

