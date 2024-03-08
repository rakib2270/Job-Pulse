<!DOCTYPE html>
<html class="no-js" lang="en_AU" >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>JOB PULSE | Find Your Jobs</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no" />
    <meta name="HandheldFriendly" content="True" />
    <meta name="pinterest" content="nopin" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/ui/trumbowyg.min.css" integrity="sha512-Fm8kRNVGCBZn0sPmwJbVXlqfJmPC13zRsMElZenX6v721g/H7OukJd8XzDEBRQ2FSATK8xNF9UYvzsCtUpfeJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.dataTables.css"/>
    <!-- Fav Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/jobpulse.png')}}" />
</head>
<body data-instant-intensity="mousedown">

@include('front.layouts.header')


@yield('main')

@yield('content')

@yield('profile')

@include('front.layouts.footer')

<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{'https://code.jquery.com/jquery-3.6.4.min.js'}}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.5.1.3.min.js') }}"></script>
<script src="{{ asset('assets/js/instantpages.5.1.0.min.js') }}"></script>
<script src="{{ asset('assets/js/lazyload.17.6.0.min.js') }}"></script>
<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/trumbowyg.min.js')}}" integrity="sha512-YJgZG+6o3xSc0k5wv774GS+W1gx0vuSI/kr0E0UylL/Qg/noNspPtYwHPN9q6n59CTR/uhgXfjDXLTRI+uIryg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script src="{{ asset('assets/js/main.js')}}"></script>
<script src="{{'https://unpkg.com/typeit@8.7.1/dist/index.umd.js'}}"></script>
<script src="{{'https://cdn.datatables.net/2.0.1/js/dataTables.js'}}"></script>


@yield('customJs')

</body>

</html>
