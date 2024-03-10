
@extends('front.layouts.app')

@section('main')
    <section class="section-6 bg-2">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Account Settings</li>
                                <li class="breadcrumb-item active">{{ strtoupper(Auth::user()->name)}}</li>
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

                    @yield('cnContent')
                </div>
            </div>
        </div>
    </section>
@endsection
