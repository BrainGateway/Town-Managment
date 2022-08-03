<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <title>{{ config('app.name', 'Cartlow') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{ asset('media/logos/favicon.ico') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    @yield('style_plugins')
    <link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    @yield('styles')
</head>
<body id="kt_body"
      class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed aside-enabled aside-fixed"
      style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    @include('sweetalert::alert')
    <!--begin::Page-->
    <div class="page d-flex flex-row flex-column-fluid">
        @include('partials.aside.aside')

        <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
            @include('partials.header.header')

            <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" style="margin-top:50px" id="kt_content">

                <!--begin::Post-->
                    <div class="post fs-base d-flex flex-column-fluid" id="kt_post">
                        @yield('content')
                    </div>
                    <!--end::Post-->
                </div>
                <!--end::Content-->
                @include('partials.footer.footer')
            </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::Root-->
<script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('js/scripts.bundle.js') }}"></script>
<script src="{{ asset('js/custom/widgets.js') }}"></script>
@yield('scripts_plugins')
@yield('scripts')

</body>
<!--end::Body-->
</html>
