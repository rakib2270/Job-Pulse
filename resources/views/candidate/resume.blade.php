
@extends('candidate.candidate') // Adjust the layout as needed

@section('cnContent')
    <div class="container">
        <div class="card">
            <div class="card-header">Upload Resume</div>

            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ url('/upload-resume') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="resume">Resume</label>
                        <input type="file" name="resume" class="form-control" required>
                        @error('resume')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Upload Resume</button>
                </form>
            </div>
        </div>
    </div>
@endsection
