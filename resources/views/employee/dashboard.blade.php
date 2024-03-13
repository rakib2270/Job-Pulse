@extends('employee.employee')

@section('emContent')
    <h3 style="text-align: center; text-decoration: underline" >Dashboard </h3>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <div class="content">
        <div class="card1">
            <div class="icon"><i class="material-icons md-36">favorite_border</i></div>
            <br>
            <h5 style="color: whitesmoke" >Active Jobs</h5>

            <h3  class="text">{{ $activeJobs }} </h3>
        </div>
        <div class="card1">
            <div class="icon"><i class="material-icons md-36">alternate_email</i></div>
            <br>
            <h5 style="color: whitesmoke" >Pending Jobs</h5>
            <h3  class="text">{{ $pendingJobs }}</h3>
        </div>
        <div class="card1">
            <div class="icon"><i class="material-icons md-36">face</i></div>
            <br>
            <h5 style="color: whitesmoke" >Applicants</h5>
            <h3 class="text">{{ $applicants }}</h3>
        </div>

    </div>


    @if(Auth::user()->is_paid == "0")
            <div class="content">
                <div class="card1 " >
                    <h6 class="title">When You Buy Subscription, Your Job Will Show in Featured, Popular Sections</h6>
                       <div class="text">
                            <a href="{{route('employee.checkout')}}" class=" btn btn-primary" type="submit" >Subscribe Now</a>
                        </div>
                </div>
            </div>

    @elseif(Auth::user()->is_paid == "1")
            <div class="content">
                <div class="card1 " >
                    <div class="icon"><i class="material-icons md-36">face</i></div>
                    <h6 class="title">Status</h6>
                    <h3 class="text">SUBSCRIBED</h3>
                </div>
            </div>

    @endif




@endsection
