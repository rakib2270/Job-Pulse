
@extends('front.layouts.app')

@section('main')
    <section class="section-5 bg-2">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Account Settings</li>
                            </ol>
                    </nav>
                </div>
            </div>
            <div  class="row">
                <div class="col-lg-3">
                    @include('candidate.sidebar')
                </div>
                <div style="height: 600px" class="col-lg-9">
                    @include('front.message')

                    <h2  class="mt-3 pb-0">Hello  {{ strtoupper(Auth::user()->name)}}..!!</h2><br>
                    <h1>WELCOME TO DASHBOARD!!</h1>
                    <h2>Find Your Dream Job Now</h2>
                    <p>Job Pulse is Always ready to support you. </p>
                    <p>Please Contact our support team for any help.</p>
                    <p>We are always able to help you.</p>
                    <h2>{{ strtoupper(Auth::user()->name)}} You are one of the Topper in Job Pulse</h2>
                    <p>Happy Journey.</p>
                    <p>Have a good day.</p>

                </div>
            </div>
        </div>
    </section>
@endsection
