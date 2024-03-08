@extends('front.layouts.app')

@section('main')
<section class="section-0 lazy d-flex bg-image-style dark align-items-center "  class="" data-bg="{{ asset('assets/images/banner5.jpg') }}">
    <div class="container">
        <div class="row">

            <div  class="col-12 col-xl-8v ">
                <div class="typewriter">
                    <div class="wrapper">
                        <div class="centeredBox">
                            <span id="typewriter" data-array=""></span>
                            <span class="cursor"></span>
                            <div class="banner-btn mt-5"><a href="/jobs" class="btn btn-outline-primary me-2">Explore Now</a></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="section-1 py-5 ">
    <div class="container">
        <div class="card border-0 shadow p-5">
            <form action="{{ route("jobs") }}" method="GET">
                <div class="row">
                    <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                        <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Keywords">
                    </div>
                    <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                        <input type="text" class="form-control" name="location" id="location" placeholder="Location">
                    </div>
                    <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                        <select name="category" id="category" class="form-control">
                            <option value="">Select a Category</option>
                            @if ($newCategories->isNotEmpty())
                                @foreach ($newCategories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class=" col-md-3 mb-xs-3 mb-sm-3 mb-lg-0">
                        <div class="d-grid gap-2">
                            {{-- <a href="jobs.html" class="btn btn-primary btn-block">Search</a> --}}
                            <button type="submit" class="btn btn-primary btn-block">Search</button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</section>


<section class="section-3  py-5">
    <div class="container">
        <h2>Featured Jobs</h2>
        <div class="row pt-5">
            <div class="job_listing_area">
                <div class="job_lists">
                    <div class="row">
                        @if ($featuredJobs->isNotEmpty())
                            @foreach ($featuredJobs as $featuredJob)
                                <div class="col-md-4">
                                    <div class="card border-0 p-3 shadow mb-4">
                                        <div class="card-body">
                                            <h3 class="border-0 fs-5 pb-2 mb-0">{{ $featuredJob->title }}</h3>

                                            <p>{{ Str::words(strip_tags($featuredJob->description), 5) }}</p>

                                            <div class="bg-light p-3 border">
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                    <span class="ps-1">{{ $featuredJob->location }}</span>
                                                </p>
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                    <span class="ps-1">{{ $featuredJob->jobType->name }}</span>
                                                </p>
                                                @if (!is_null($featuredJob->salary))
                                                    <p class="mb-0">
                                                        <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                        <span class="ps-1">{{ $featuredJob->salary }}</span>
                                                    </p>
                                                @endif
                                            </div>

                                            <div class="d-grid mt-3">
                                                <a href="{{ route('jobDetail',$featuredJob->id) }}" class="btn btn-primary btn-lg">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="section-3  py-5">
    <div class="container">
        <h2>Popular Jobs</h2>
        <div class="row pt-5">
            <div class="job_listing_area">
                <div class="job_lists">
                    <div class="row">
                        @if ($popularJobs->isNotEmpty())
                            @foreach ($popularJobs as $popularJob)
                                <div class="col-md-4">
                                    <div class="card border-0 p-3 shadow mb-4">
                                        <div class="card-body">
                                            <h3 class="border-0 fs-5 pb-2 mb-0">{{ $popularJob->title }}</h3>

                                            <p>{{ Str::words(strip_tags($popularJob->description), 5) }}</p>

                                            <div class="bg-light p-3 border">
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                    <span class="ps-1">{{ $popularJob->location }}</span>
                                                </p>
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                    <span class="ps-1">{{ $popularJob->jobType->name }}</span>
                                                </p>
                                                @if (!is_null($popularJob->salary))
                                                    <p class="mb-0">
                                                        <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                        <span class="ps-1">{{ $popularJob->salary }}</span>
                                                    </p>
                                                @endif
                                            </div>

                                            <div class="d-grid mt-3">
                                                <a href="{{ route('jobDetail',$popularJob->id) }}" class="btn btn-primary btn-lg">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="section-3 bg-2 py-5">
    <div class="container">
        <h2>Latest Jobs</h2>
        <div class="row pt-5">
            <div class="job_listing_area">
                <div class="job_lists">
                    <div class="row">
                        @if ($latestJobs->isNotEmpty())
                            @foreach ($latestJobs as $latestJob)
                                <div class="col-md-4">
                                    <div class="card border-0 p-3 shadow mb-4">
                                        <div class="card-body">
                                            <h3 class="border-0 fs-5 pb-2 mb-0">{{ $latestJob->title }}</h3>

                                            <p>{{ Str::words(strip_tags($latestJob->description), 5) }}</p>

                                            <div class="bg-light p-3 border">
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                    <span class="ps-1">{{ $latestJob->location }}</span>
                                                </p>
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                    <span class="ps-1">{{ $latestJob->jobType->name }}</span>
                                                </p>
                                                @if (!is_null($latestJob->salary))
                                                    <p class="mb-0">
                                                        <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                        <span class="ps-1">{{ $latestJob->salary }}</span>
                                                    </p>
                                                @endif
                                            </div>

                                            <div class="d-grid mt-3">
                                                <a href="{{ route('jobDetail',$latestJob->id) }}" class="btn btn-primary btn-lg">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@section('customJs')
    <script>
        // The typewriter element
        var typeWriterElement = document.getElementById('typewriter');

        // The TextArray:
        var textArray = ["Welcome To Job Pulse.", "Find Your Dream Job","Thousand of Jobs Available.", "Explore Now..."];

        // You can also do this by transfering it through a data-attribute
        // var textArray = typeWriterElement.getAttribute('data-array');


        // function to generate the backspace effect
        function delWriter(text, i, cb) {
            if (i >= 0 ) {
                typeWriterElement.innerHTML = text.substring(0, i--);
                // generate a random Number to emulate backspace hitting.
                var rndBack = 10 + Math.random() * 20;
                setTimeout(function() {
                    delWriter(text, i, cb);
                },rndBack);
            } else if (typeof cb == 'function') {
                setTimeout(cb,1000);
            }
        };

        // function to generate the keyhitting effect
        function typeWriter(text, i, cb) {
            if ( i < text.length+1 ) {
                typeWriterElement.innerHTML = text.substring(0, i++);
                // generate a random Number to emulate Typing on the Keyboard.
                var rndTyping = 100 - Math.random() * 20;
                setTimeout( function () {
                    typeWriter(text, i++, cb)
                },rndTyping);
            } else if (i === text.length+1) {
                setTimeout( function () {
                    delWriter(text, i, cb)
                },1000);
            }
        };

        // the main writer function
        function StartWriter(i) {
            if (typeof textArray[i] == "undefined") {
                setTimeout( function () {
                    StartWriter(0)
                },1000);
            } else if(i < textArray[i].length+1) {
                typeWriter(textArray[i], 0, function () {
                    StartWriter(i+1);
                });
            }
        };
        // wait one second then start the typewriter
        setTimeout( function () {
            StartWriter(0);
        },1000);

    </script>
@endsection
