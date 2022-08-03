
@extends('layouts.app')

@section('content')


    <div class="d-flex flex-column flex-root">
    <!--begin::Authentication - Error 404 -->
    <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url({{ asset('media/illustrations/progress-hd.png') }})">
        <!--begin::Content-->
        <div class="d-flex flex-column flex-column-fluid text-center p-10 py-lg-20">
            <!--begin::Logo-->
            <a href="" class="mb-10 pt-lg-20">
                <img alt="Logo" src="{{ asset('img/logo-cartlow.svg')}}" class="h-100px mb-5">
            </a>
            <!--end::Logo-->
            <!--begin::Wrapper-->
            <div class="pt-lg-10">
                <!--begin::Logo-->
                <h1 class="fw-bolder fs-4x text-gray-700 mb-10">
                    {{ $type }}
                </h1>
                <!--end::Logo-->
                <!--begin::Message-->
                <div class="fw-bold fs-3 text-gray-400 mb-15">
                    {{ $title }}
                    <br />
                    {{ $detail }}
                </div>
                <!--end::Message-->
                <!--begin::Action-->
                <div class="text-center">
                    <a href="/" class="btn btn-lg btn-primary fw-bolder">Go to homepage</a>
                </div>
                <!--end::Action-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Content-->
        <!--begin::Footer-->
        <div class="d-flex flex-center flex-column-auto p-10">
        </div>
        <!--end::Footer-->
    </div>
    <!--end::Authentication - Error 404-->
</div>


@endsection

