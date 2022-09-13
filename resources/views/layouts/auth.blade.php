<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="shortcut icon" href="{{ asset('media/logos/favicon.ico') }}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
</head>
<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed aside-enabled aside-fixed"   style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px" >
<!--begin::Authentication-->
<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"
    style="background-image: url({{ asset('media/illustrations/progress-hd.png') }})">

    <!--begin::Content-->
    <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
        <!--begin::Logo-->
        <a href="{{route('login')}}" class="mb-12">
            <img alt="Logo" src="{{asset('img/logo-cartlow.svg')}}" class="h-50px"/>
        </a>
        <!--end::Logo-->

        <!--begin::Wrapper-->
        <div class="w-lg-500px bg-white rounded shadow-sm p-10 p-lg-15 mx-auto">
            @yield('content')
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Content-->
</div>
<!--end::Authentication-->
<script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('js/scripts.bundle.js') }}"></script>
<script src="{{ asset('js/custom/authentication/sign-in/general.js') }}"></script>
</body>
<!--end::Body-->
</html>
