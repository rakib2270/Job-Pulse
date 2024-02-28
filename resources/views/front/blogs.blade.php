
<!-- blogs.blade.php -->

@extends('front.layouts.app')

@section('content')

    <section class="section-0 lazy d-flex bg-image-style dark align-items-center mb-4"  class="" data-bg="{{ asset('assets/images/banner4.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-20 col-xl-8 ">
                    <h1>Blogs</h1>
                    <p class="text-gray-700 mb-8">
                        Welcome to Job Pulse, your go-to platform for connecting employers and job seekers. At Job Pulse, we believe in making the job search and recruitment process efficient and effective.
                    </p>
                    <div class="banner-btn mt-5"><a href="#" class="btn btn-primary mb-4 mb-sm-0">Learn More...</a></div>
                </div>
            </div>
        </div>
    </section>


    <div class="container mx-auto mt-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Blog Post 1 -->
            <div class="bg-white rounded-md overflow-hidden shadow-md">
                <img src="https://via.placeholder.com/600x400" alt="Blog Post Image" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h2 class="text-xl font-semibold mb-2">Blog Post Title 1</h2>

                    <h2 class="text-3xl font-semibold mb-4">Welcome to Job Pulse Blogs!</h2>

                    <p class="text-gray-700 mb-4">
                        Hello and welcome to Job Pulse, your ultimate destination for the latest insights, career advice, and industry news. Whether you're a job seeker looking for tips on landing your dream job or an employer seeking strategies for successful recruitment, our blog is here to guide you.
                    </p>
                    <a href="#" class="text-blue-500 hover:underline">Read more</a>

                </div>
            </div>

            <!-- Blog Post 2 -->
            <div class="bg-white rounded-md overflow-hidden shadow-md">
                <img src="https://via.placeholder.com/600x400" alt="Blog Post Image" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h2 class="text-xl font-semibold mb-2">Blog Post Title 2</h2>
                    <p class="text-gray-700 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <a href="#" class="text-blue-500 hover:underline">Read more</a>
                </div>
            </div>

            <!-- Blog Post 3 -->
            <div class="bg-white rounded-md overflow-hidden shadow-md">
                <img src="https://via.placeholder.com/600x400" alt="Blog Post Image" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h2 class="text-xl font-semibold mb-2">Blog Post Title 3</h2>
                    <p class="text-gray-700 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <a href="#" class="text-blue-500 hover:underline">Read more</a>
                </div>
            </div>
        </div>
    </div>

@endsection
