@extends('admin.admin')

@section('dbContent')
    <h3 style="text-align: center; text-decoration: underline" >Dashboard </h3>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <div class="content">
           <div class="card1">
               <div class="icon"><i class="material-icons md-36">favorite_border</i></div>
               <br>
               <h5 style="color: whitesmoke" >Active Companies</h5>

               <h3  class="text">{{ $jobCounts }} </h3>
           </div>
           <div class="card1">
               <div class="icon"><i class="material-icons md-36">alternate_email</i></div>
               <br>
               <h5 style="color: whitesmoke" >Pending Companies</h5>
               <h3  class="text">{{ $pendingJobs }}</h3>
           </div>
           <div class="card1">
               <div class="icon"><i class="material-icons md-36">face</i></div>
               <br>
               <h5 style="color: whitesmoke" >Active Jobs</h5>
               <h3 class="text">{{ $activeJobs }}</h3>
           </div>
    </div>


@endsection
