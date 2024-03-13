@extends('front.layouts.app')

@section('main')

<section class="section-5">
    <div class="container my-5">
        <div class="py-lg-2">&nbsp;</div>

        @if(Session::has('success'))
        <div class="alert alert-success">
            <p class="mb-0 pb-0">{{ Session::get('success') }}</p>
        </div>
        @endif

        @if(Session::has('error'))
        <div class="alert alert-danger">
            <p class="mb-0 pb-0">{{ Session::get('error') }}</p>
        </div>
        @endif


        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <div class="card shadow border-0 p-5">
                    <h1 class="h3"> Login With Magic Link </h1>
                    <div class="types" style="height: 120px">
                        <p style="color: green" id="multipleStrings"></p>  {{-- This Line is Used For Typewriter --}}
                    </div>

                    <form action="{{ route('magicLink.login') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="example@example.com">

                            @error('email')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror

                        </div>
                            <div class="justify-content-between d-flex">
                            <button type="submit" class="btn btn-primary mt-2">Get Magic Link</button>
                                <div class="mt-4 text-center">
                                    <a  href="{{ route('account.login') }}">Back</a>
                                </div>
                            </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="py-lg-5">&nbsp;</div>
    </div>
</section>
@endsection

@section('customJs')
    <script>
        // Multiple String Writer

        new TypeIt("#multipleStrings", {
            strings: ["Hello Dear,","If You Forget Your Password!", "Don't Worry, You Can Easily Login With Magic Link","Give Your Email Please."],
            speed: 20,
            waitUntilVisible: true,
        }).go();
    </script>
@endsection
