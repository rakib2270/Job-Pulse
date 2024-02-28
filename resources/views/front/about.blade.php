<!-- about.blade.php -->

@extends('front.layouts.app')

@section('content')

    <section class="section-0 lazy d-flex bg-image-style dark align-items-center mb-4"  class="" data-bg="{{ asset('assets/images/banner3.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-20 col-xl-8 ">
                    <h1>About Us</h1>
                    <p class="text-gray-700 mb-8">
                        Welcome to Job Pulse, your go-to platform for connecting employers and job seekers. At Job Pulse, we believe in making the job search and recruitment process efficient and effective.
                    </p>
                    <div class="banner-btn mt-5"><a href="#" class="btn btn-primary mb-4 mb-sm-0">Learn More...</a></div>
                </div>
            </div>
        </div>
    </section>

    <div class="container mx-auto mt-8">
        <div class="max-w-2xl mx-auto bg-white rounded-md overflow-hidden shadow-md p-6">
            <h2 class="text-3xl font-semibold mb-4">Who We are?</h2>



            <p class="text-gray-700 mb-4">
                Our mission is to bridge the gap between talent and opportunity, providing a user-friendly and streamlined experience for both employers and job seekers. Whether you are looking for your dream job or seeking top-notch talent for your company, Job Pulse is here to help.
            </p>

            <p class="text-gray-700 mb-4">
                Key features of Job Pulse:
            <ul class="list-disc pl-6">
                <li>Comprehensive job listings</li>
                <li>Advanced search and filtering options</li>
                <li>User-friendly application process</li>
                <li>Secure employer accounts for seamless recruitment</li>
                <li>And much more!</li>
            </ul>
            </p>

            <p class="text-gray-700">
                Join Job Pulse today and take the next step in your career journey or find the perfect candidate for your team!
            </p>
        </div>
    </div>

@endsection

