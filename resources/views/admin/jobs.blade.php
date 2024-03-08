@extends('admin.admin')

@section('dbContent')
    <h3 style="text-align: center; text-decoration: underline" >All Jobs </h3>

                @include('front.message')
                    <div class="job_listing_area">
                        <div class="job_lists">
                            <div class="row">
                                @if ($jobs->isNotEmpty())
                                    @foreach ($jobs as $job)
                                        <div class="col-md-4">
                                            <div class="card border-0 p-3 shadow mb-4">
                                                <div class="card-body">
                                                    <h3 class="border-0 fs-5 pb-2 mb-0">{{ $job->title }}</h3>

                                                    <p>{{ Str::words(strip_tags($job->description), $words=10, '...') }}</p>

                                                    <div class="bg-light p-3 border">
                                                        <p class="mb-0">
                                                            <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                            <span class="ps-1">{{ $job->location }}</span>
                                                        </p>
                                                        <p class="mb-0">
                                                            <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                            <span class="ps-1">{{ $job->jobType->name }}</span>
                                                        </p>
                                                        {{-- <p>Keywords: {{ $job->keywords }}</p>
                                                        <p>Category: {{ $job->category->name }}</p>
                                                        <p>Experience: {{ $job->experience }}</p> --}}
                                                        @if (!is_null($job->salary))
                                                            <p class="mb-0">
                                                                <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                                <span class="ps-1">{{ $job->salary }}</span>
                                                            </p>
                                                        @endif
                                                    </div>

                                                    <div class="d-grid mt-3">
                                                        <a href="{{ route('jobDetail',$job->id) }}" class="btn btn-primary btn-lg">Details</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-md-12">Jobs not found</div>

                                @endif


                            </div>
                        </div>
                    </div>



@endsection

@section('customJs')
    <script>
        $("#searchForm").submit(function(e){
            e.preventDefault();

            var url = '{{ route("jobs") }}?';

            var keyword = $("#keyword").val();
            var location = $("#location").val();
            var category = $("#category").val();
            var experience = $("#experience").val();
            var sort = $("#sort").val();

            var checkedJobTypes = $("input:checkbox[name='job_type']:checked").map(function(){
                return $(this).val();
            }).get();

            // If keyword has a value
            if (keyword != "") {
                url += '&keyword='+keyword;
            }

            // If location has a value
            if (location != "") {
                url += '&location='+location;
            }

            // If category has a value
            if (category != "") {
                url += '&category='+category;
            }

            // If experience has a value
            if (experience != "") {
                url += '&experience='+experience;
            }

            // If user has checked job types
            if (checkedJobTypes.length > 0) {
                url += '&jobType='+checkedJobTypes;
            }

            url += '&sort='+sort;

            window.location.href=url;

        });

        $("#sort").change(function(){
            $("#searchForm").submit();
        });

    </script>
@endsection
