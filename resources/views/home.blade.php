@extends('layouts.app')

@section('content')
    <!--begin::Container-->
    {{-- <div id="kt_content_container" class="container">

    </div> --}}
    <div id="kt_content_container" class="app-container container-xxl">
        {{ __('Dashboard') }}

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        {{ __('You are logged in!') }}
        <!--begin::Row-->
        <div class="row gy-5 g-xl-10">
            <!--begin::Col-->
            <div class="col-sm-6 col-xl-2 mb-xl-10">
                <!--begin::Card widget 2-->
                <div class="card h-lg-100">
                    <!--begin::Body-->
                    <div class="card-body d-flex justify-content-between align-items-start flex-column">
                        <!--begin::Icon-->
                        <div class="m-0">
                            <!--begin::Svg Icon | path: icons/duotune/maps/map004.svg-->
                            <span class="svg-icon svg-icon-2hx svg-icon-gray-600">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3" d="M18.4 5.59998C21.9 9.09998 21.9 14.8 18.4 18.3C14.9 21.8 9.2 21.8 5.7 18.3L18.4 5.59998Z" fill="currentColor"></path>
                                    <path d="M12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2ZM19.9 11H13V8.8999C14.9 8.6999 16.7 8.00005 18.1 6.80005C19.1 8.00005 19.7 9.4 19.9 11ZM11 19.8999C9.7 19.6999 8.39999 19.2 7.39999 18.5C8.49999 17.7 9.7 17.2001 11 17.1001V19.8999ZM5.89999 6.90002C7.39999 8.10002 9.2 8.8 11 9V11.1001H4.10001C4.30001 9.4001 4.89999 8.00002 5.89999 6.90002ZM7.39999 5.5C8.49999 4.7 9.7 4.19998 11 4.09998V7C9.7 6.8 8.39999 6.3 7.39999 5.5ZM13 17.1001C14.3 17.3001 15.6 17.8 16.6 18.5C15.5 19.3 14.3 19.7999 13 19.8999V17.1001ZM13 4.09998C14.3 4.29998 15.6 4.8 16.6 5.5C15.5 6.3 14.3 6.80002 13 6.90002V4.09998ZM4.10001 13H11V15.1001C9.1 15.3001 7.29999 16 5.89999 17.2C4.89999 16 4.30001 14.6 4.10001 13ZM18.1 17.1001C16.6 15.9001 14.8 15.2 13 15V12.8999H19.9C19.7 14.5999 19.1 16.0001 18.1 17.1001Z" fill="currentColor"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Icon-->
                        <!--begin::Section-->
                        <div class="d-flex flex-column my-7">
                            <!--begin::Number-->
                            <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">327</span>
                            <!--end::Number-->
                            <!--begin::Follower-->
                            <div class="m-0">
                                <span class="fw-semibold fs-6 text-gray-400">Projects</span>
                            </div>
                            <!--end::Follower-->
                        </div>
                        <!--end::Section-->
                        <!--begin::Badge-->
                        <span class="badge badge-light-success fs-base">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                        <span class="svg-icon svg-icon-5 svg-icon-success ms-n1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor"></rect>
                                <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->2.1%</span>
                        <!--end::Badge-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card widget 2-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-sm-6 col-xl-2 mb-xl-10">
                <!--begin::Card widget 2-->
                <div class="card h-lg-100">
                    <!--begin::Body-->
                    <div class="card-body d-flex justify-content-between align-items-start flex-column">
                        <!--begin::Icon-->
                        <div class="m-0">
                            <!--begin::Svg Icon | path: icons/duotune/graphs/gra001.svg-->
                            <span class="svg-icon svg-icon-2hx svg-icon-gray-600">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3" d="M14 3V21H10V3C10 2.4 10.4 2 11 2H13C13.6 2 14 2.4 14 3ZM7 14H5C4.4 14 4 14.4 4 15V21H8V15C8 14.4 7.6 14 7 14Z" fill="currentColor"></path>
                                    <path d="M21 20H20V8C20 7.4 19.6 7 19 7H17C16.4 7 16 7.4 16 8V20H3C2.4 20 2 20.4 2 21C2 21.6 2.4 22 3 22H21C21.6 22 22 21.6 22 21C22 20.4 21.6 20 21 20Z" fill="currentColor"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Icon-->
                        <!--begin::Section-->
                        <div class="d-flex flex-column my-7">
                            <!--begin::Number-->
                            <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">27,5M</span>
                            <!--end::Number-->
                            <!--begin::Follower-->
                            <div class="m-0">
                                <span class="fw-semibold fs-6 text-gray-400">Stock Qty</span>
                            </div>
                            <!--end::Follower-->
                        </div>
                        <!--end::Section-->
                        <!--begin::Badge-->
                        <span class="badge badge-light-success fs-base">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                        <span class="svg-icon svg-icon-5 svg-icon-success ms-n1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor"></rect>
                                <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->2.1%</span>
                        <!--end::Badge-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card widget 2-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-sm-6 col-xl-2 mb-xl-10">
                <!--begin::Card widget 2-->
                <div class="card h-lg-100">
                    <!--begin::Body-->
                    <div class="card-body d-flex justify-content-between align-items-start flex-column">
                        <!--begin::Icon-->
                        <div class="m-0">
                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs048.svg-->
                            <span class="svg-icon svg-icon-2hx svg-icon-gray-600">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3" d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" fill="currentColor"></path>
                                    <path d="M8.70001 6C8.10001 5.7 7.39999 5.40001 6.79999 5.10001C7.79999 4.00001 8.90001 3 10.1 2.2C10.7 2.1 11.4 2 12 2C12.7 2 13.3 2.1 13.9 2.2C12 3.2 10.2 4.5 8.70001 6ZM12 8.39999C13.9 6.59999 16.2 5.30001 18.7 4.60001C18.1 4.00001 17.4 3.6 16.7 3.2C14.4 4.1 12.2 5.40001 10.5 7.10001C11 7.50001 11.5 7.89999 12 8.39999ZM7 20C7 20.2 7 20.4 7 20.6C6.2 20.1 5.49999 19.6 4.89999 19C4.59999 18 4.00001 17.2 3.20001 16.6C2.80001 15.8 2.49999 15 2.29999 14.1C4.99999 14.7 7 17.1 7 20ZM10.6 9.89999C8.70001 8.09999 6.39999 6.9 3.79999 6.3C3.39999 6.9 2.99999 7.5 2.79999 8.2C5.39999 8.6 7.7 9.80001 9.5 11.6C9.8 10.9 10.2 10.4 10.6 9.89999ZM2.20001 10.1C2.10001 10.7 2 11.4 2 12C2 12 2 12 2 12.1C4.3 12.4 6.40001 13.7 7.60001 15.6C7.80001 14.8 8.09999 14.1 8.39999 13.4C6.89999 11.6 4.70001 10.4 2.20001 10.1ZM11 20C11 14 15.4 9.00001 21.2 8.10001C20.9 7.40001 20.6 6.8 20.2 6.2C13.8 7.5 9 13.1 9 19.9C9 20.4 9.00001 21 9.10001 21.5C9.80001 21.7 10.5 21.8 11.2 21.9C11.1 21.3 11 20.7 11 20ZM19.1 19C19.4 18 20 17.2 20.8 16.6C21.2 15.8 21.5 15 21.7 14.1C19 14.7 16.9 17.1 16.9 20C16.9 20.2 16.9 20.4 16.9 20.6C17.8 20.2 18.5 19.6 19.1 19ZM15 20C15 15.9 18.1 12.6 22 12.1C22 12.1 22 12.1 22 12C22 11.3 21.9 10.7 21.8 10.1C16.8 10.7 13 14.9 13 20C13 20.7 13.1 21.3 13.2 21.9C13.9 21.8 14.5 21.7 15.2 21.5C15.1 21 15 20.5 15 20Z" fill="currentColor"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Icon-->
                        <!--begin::Section-->
                        <div class="d-flex flex-column my-7">
                            <!--begin::Number-->
                            <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">149M</span>
                            <!--end::Number-->
                            <!--begin::Follower-->
                            <div class="m-0">
                                <span class="fw-semibold fs-6 text-gray-400">Stock Value</span>
                            </div>
                            <!--end::Follower-->
                        </div>
                        <!--end::Section-->
                        <!--begin::Badge-->
                        <span class="badge badge-light-danger fs-base">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
                        <span class="svg-icon svg-icon-5 svg-icon-danger ms-n1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor"></rect>
                                <path d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z" fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->0.47%</span>
                        <!--end::Badge-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card widget 2-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-sm-6 col-xl-2 mb-xl-10">
                <!--begin::Card widget 2-->
                <div class="card h-lg-100">
                    <!--begin::Body-->
                    <div class="card-body d-flex justify-content-between align-items-start flex-column">
                        <!--begin::Icon-->
                        <div class="m-0">
                            <!--begin::Svg Icon | path: icons/duotune/maps/map002.svg-->
                            <span class="svg-icon svg-icon-2hx svg-icon-gray-600">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.7 4.19995L4 6.30005V18.8999L8.7 16.8V19L3.1 21.5C2.6 21.7 2 21.4 2 20.8V6C2 5.4 2.3 4.89995 2.9 4.69995L8.7 2.09998V4.19995Z" fill="currentColor"></path>
                                    <path d="M15.3 19.8L20 17.6999V5.09992L15.3 7.19989V4.99994L20.9 2.49994C21.4 2.29994 22 2.59989 22 3.19989V17.9999C22 18.5999 21.7 19.1 21.1 19.3L15.3 21.8998V19.8Z" fill="currentColor"></path>
                                    <path opacity="0.3" d="M15.3 7.19995L20 5.09998V17.7L15.3 19.8V7.19995Z" fill="currentColor"></path>
                                    <path opacity="0.3" d="M8.70001 4.19995V2L15.4 5V7.19995L8.70001 4.19995ZM8.70001 16.8V19L15.4 22V19.8L8.70001 16.8Z" fill="currentColor"></path>
                                    <path opacity="0.3" d="M8.7 16.8L4 18.8999V6.30005L8.7 4.19995V16.8Z" fill="currentColor"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Icon-->
                        <!--begin::Section-->
                        <div class="d-flex flex-column my-7">
                            <!--begin::Number-->
                            <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">89M</span>
                            <!--end::Number-->
                            <!--begin::Follower-->
                            <div class="m-0">
                                <span class="fw-semibold fs-6 text-gray-400">C APEX</span>
                            </div>
                            <!--end::Follower-->
                        </div>
                        <!--end::Section-->
                        <!--begin::Badge-->
                        <span class="badge badge-light-success fs-base">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                        <span class="svg-icon svg-icon-5 svg-icon-success ms-n1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor"></rect>
                                <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->2.1%</span>
                        <!--end::Badge-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card widget 2-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-sm-6 col-xl-2 mb-5 mb-xl-10">
                <!--begin::Card widget 2-->
                <div class="card h-lg-100">
                    <!--begin::Body-->
                    <div class="card-body d-flex justify-content-between align-items-start flex-column">
                        <!--begin::Icon-->
                        <div class="m-0">
                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs037.svg-->
                            <span class="svg-icon svg-icon-2hx svg-icon-gray-600">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3" d="M2.10001 10C3.00001 5.6 6.69998 2.3 11.2 2L8.79999 4.39999L11.1 7C9.60001 7.3 8.30001 8.19999 7.60001 9.59999L4.5 12.4L2.10001 10ZM19.3 11.5L16.4 14C15.7 15.5 14.4 16.6 12.7 16.9L15 19.5L12.6 21.9C17.1 21.6 20.8 18.2 21.7 13.9L19.3 11.5Z" fill="currentColor"></path>
                                    <path d="M13.8 2.09998C18.2 2.99998 21.5 6.69998 21.8 11.2L19.4 8.79997L16.8 11C16.5 9.39998 15.5 8.09998 14 7.39998L11.4 4.39998L13.8 2.09998ZM12.3 19.4L9.69998 16.4C8.29998 15.7 7.3 14.4 7 12.8L4.39999 15.1L2 12.7C2.3 17.2 5.7 20.9 10 21.8L12.3 19.4Z" fill="currentColor"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Icon-->
                        <!--begin::Section-->
                        <div class="d-flex flex-column my-7">
                            <!--begin::Number-->
                            <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">72.4%</span>
                            <!--end::Number-->
                            <!--begin::Follower-->
                            <div class="m-0">
                                <span class="fw-semibold fs-6 text-gray-400">OPEX</span>
                            </div>
                            <!--end::Follower-->
                        </div>
                        <!--end::Section-->
                        <!--begin::Badge-->
                        <span class="badge badge-light-danger fs-base">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
                        <span class="svg-icon svg-icon-5 svg-icon-danger ms-n1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor"></rect>
                                <path d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z" fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->0.647%</span>
                        <!--end::Badge-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card widget 2-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-sm-6 col-xl-2 mb-5 mb-xl-10">
                <!--begin::Card widget 2-->
                <div class="card h-lg-100">
                    <!--begin::Body-->
                    <div class="card-body d-flex justify-content-between align-items-start flex-column">
                        <!--begin::Icon-->
                        <div class="m-0">
                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
                            <span class="svg-icon svg-icon-2hx svg-icon-gray-600">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="currentColor"></path>
                                    <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="currentColor"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Icon-->
                        <!--begin::Section-->
                        <div class="d-flex flex-column my-7">
                            <!--begin::Number-->
                            <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">106M</span>
                            <!--end::Number-->
                            <!--begin::Follower-->
                            <div class="m-0">
                                <span class="fw-semibold fs-6 text-gray-400">Saving</span>
                            </div>
                            <!--end::Follower-->
                        </div>
                        <!--end::Section-->
                        <!--begin::Badge-->
                        <span class="badge badge-light-success fs-base">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                        <span class="svg-icon svg-icon-5 svg-icon-success ms-n1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor"></rect>
                                <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->2.1%</span>
                        <!--end::Badge-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card widget 2-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->
        <!--begin::Row-->
        <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
            <!--begin::Col-->
            <div class="col-xl-4">
                <!--begin::Chart widget 19-->
                <div class="card card-flush h-100 mb-5 mb-xl-10">
                    <!--begin::Header-->
                    <div class="card-header pt-7">
                        <!--begin::Title-->
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-dark">Leading Companies</span>
                            <span class="text-gray-400 pt-2 fw-semibold fs-6">8k social visitors</span>
                        </h3>
                        <!--end::Title-->
                        <!--begin::Toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Nav-->
                            <ul class="nav" id="kt_chart_widget_19_tabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light active fw-bold px-4 me-1" data-bs-toggle="tab" id="kt_chart_widget_19_tab_1" href="#kt_chart_widget_19_tab_content_1" aria-selected="true" role="tab">2022</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bold px-4" data-bs-toggle="tab" id="kt_chart_widget_19_tab_2" href="#kt_chart_widget_19_tab_content_2" aria-selected="false" tabindex="-1" role="tab">Month</a>
                                </li>
                            </ul>
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-0">
                        <!--begin::Tab Content (ishlamayabdi)-->
                        <div class="tab-content">
                            <!--begin::Tap pane-->
                            <div class="tab-pane fade show active" id="kt_chart_widget_19_tab_content_1" role="tabpanel" aria-labelledby="#kt_chart_widget_19_tab_1">
                                <!--begin::Chart container-->
                                <div id="kt_charts_widget_19_chart_1" class="w-100 h-400px mb-13 mt-n4"><div style="position: relative; height: 100%;"><div style="position: absolute; width: 317px; height: 400px;"><div><canvas width="396" height="500" style="position: absolute; top: 0px; left: 0px; width: 317px; height: 400px;"></canvas><canvas width="396" height="500" style="position: absolute; top: 0px; left: 0px; width: 317px; height: 400px;"></canvas></div></div><div style="overflow: hidden; width: 317px; height: 400px;"></div><div role="alert" style="z-index: -100000; opacity: 0; position: absolute; top: 0px;"></div><div role="application" style="position: absolute; pointer-events: none; top: 0px; left: 0px; overflow: hidden; width: 317px; height: 400px;"><div role="button" aria-label="Zoom Out" style="position: absolute; pointer-events: none; top: 8px; left: -48px; width: 4px; height: 4px;" tabindex="0"></div></div><div><div role="tooltip" style="position: absolute; opacity: 1e-07; pointer-events: none;">19%</div><div role="tooltip" style="position: absolute; opacity: 1e-07; pointer-events: none;">Human Resources: 68%</div></div></div></div>
                                <!--end::Chart container-->
                                <!--begin::Items-->
                                <div class="m-0">
                                    <!--begin::Item-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Section-->
                                        <div class="d-flex align-items-center me-5">
                                            <!--begin::Flag-->
                                            <img src="media/avatars/blank.png" class="me-4 w-30px" style="border-radius: 4px" alt="">
                                            <!--end::Flag-->
                                            <!--begin::Content-->
                                            <div class="me-5">
                                                <!--begin::Title-->
                                                <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Abstergo Ltd.</a>
                                                <!--end::Title-->
                                                <!--begin::Desc-->
                                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Community</span>
                                                <!--end::Desc-->
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Section-->
                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Number-->
                                            <span class="text-gray-800 fw-bold fs-4 me-3">579</span>
                                            <!--end::Number-->
                                            <!--begin::Info-->
                                            <div class="m-0">
                                                <!--begin::Label-->
                                                <span class="badge badge-light-success fs-base">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                                <span class="svg-icon svg-icon-5 svg-icon-success ms-n1">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor"></rect>
                                                        <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->2.6%</span>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Separator-->
                                    <div class="separator separator-dashed my-4"></div>
                                    <!--end::Separator-->
                                    <!--begin::Item-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Section-->
                                        <div class="d-flex align-items-center me-5">
                                            <!--begin::Flag-->
                                            <img src="media/avatars/blank.png" class="me-4 w-30px" style="border-radius: 4px" alt="">
                                            <!--end::Flag-->
                                            <!--begin::Content-->
                                            <div class="me-5">
                                                <!--begin::Title-->
                                                <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Binford Ltd.</a>
                                                <!--end::Title-->
                                                <!--begin::Desc-->
                                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Social Media</span>
                                                <!--end::Desc-->
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Section-->
                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Number-->
                                            <span class="text-gray-800 fw-bold fs-4 me-3">2,588</span>
                                            <!--end::Number-->
                                            <!--begin::Info-->
                                            <div class="m-0">
                                                <!--begin::Label-->
                                                <span class="badge badge-light-danger fs-base">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
                                                <span class="svg-icon svg-icon-5 svg-icon-danger ms-n1">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor"></rect>
                                                        <path d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z" fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->0.4%</span>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Separator-->
                                    <div class="separator separator-dashed my-4"></div>
                                    <!--end::Separator-->
                                    <!--begin::Item-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Section-->
                                        <div class="d-flex align-items-center me-5">
                                            <!--begin::Flag-->
                                            <img src="media/avatars/blank.png" class="me-4 w-30px" style="border-radius: 4px" alt="">
                                            <!--end::Flag-->
                                            <!--begin::Content-->
                                            <div class="me-5">
                                                <!--begin::Title-->
                                                <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Barone LLC.</a>
                                                <!--end::Title-->
                                                <!--begin::Desc-->
                                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Messanger</span>
                                                <!--end::Desc-->
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Section-->
                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Number-->
                                            <span class="text-gray-800 fw-bold fs-4 me-3">794</span>
                                            <!--end::Number-->
                                            <!--begin::Info-->
                                            <div class="m-0">
                                                <!--begin::Label-->
                                                <span class="badge badge-light-success fs-base">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                                <span class="svg-icon svg-icon-5 svg-icon-success ms-n1">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor"></rect>
                                                        <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->0.2%</span>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Separator-->
                                    <div class="separator separator-dashed my-4"></div>
                                    <!--end::Separator-->
                                    <!--begin::Item-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Section-->
                                        <div class="d-flex align-items-center me-5">
                                            <!--begin::Flag-->
                                            <img src="media/avatars/blank.png" class="me-4 w-30px" style="border-radius: 4px" alt="">
                                            <!--end::Flag-->
                                            <!--begin::Content-->
                                            <div class="me-5">
                                                <!--begin::Title-->
                                                <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Abstergo Ltd.</a>
                                                <!--end::Title-->
                                                <!--begin::Desc-->
                                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Video Channel</span>
                                                <!--end::Desc-->
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Section-->
                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Number-->
                                            <span class="text-gray-800 fw-bold fs-4 me-3">1,578</span>
                                            <!--end::Number-->
                                            <!--begin::Info-->
                                            <div class="m-0">
                                                <!--begin::Label-->
                                                <span class="badge badge-light-success fs-base">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                                <span class="svg-icon svg-icon-5 svg-icon-success ms-n1">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor"></rect>
                                                        <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->4.1%</span>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Separator-->
                                    <div class="separator separator-dashed my-4"></div>
                                    <!--end::Separator-->
                                    <!--begin::Item-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Section-->
                                        <div class="d-flex align-items-center me-5">
                                            <!--begin::Flag-->
                                            <img src="media/avatars/blank.png" class="me-4 w-30px" style="border-radius: 4px" alt="">
                                            <!--end::Flag-->
                                            <!--begin::Content-->
                                            <div class="me-5">
                                                <!--begin::Title-->
                                                <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Biffco Enterprises</a>
                                                <!--end::Title-->
                                                <!--begin::Desc-->
                                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Social Network</span>
                                                <!--end::Desc-->
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Section-->
                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Number-->
                                            <span class="text-gray-800 fw-bold fs-4 me-3">3,458</span>
                                            <!--end::Number-->
                                            <!--begin::Info-->
                                            <div class="m-0">
                                                <!--begin::Label-->
                                                <span class="badge badge-light-success fs-base">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                                <span class="svg-icon svg-icon-5 svg-icon-success ms-n1">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor"></rect>
                                                        <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->8.3%</span>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Separator-->
                                    <div class="separator separator-dashed my-4"></div>
                                    <!--end::Separator-->
                                    <!--begin::Item-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Section-->
                                        <div class="d-flex align-items-center me-5">
                                            <!--begin::Flag-->
                                            <img src="media/avatars/blank.png" class="me-4 w-30px" style="border-radius: 4px" alt="">
                                            <!--end::Flag-->
                                            <!--begin::Content-->
                                            <div class="me-5">
                                                <!--begin::Title-->
                                                <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Big Kahuna Burger</a>
                                                <!--end::Title-->
                                                <!--begin::Desc-->
                                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Social Network</span>
                                                <!--end::Desc-->
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Section-->
                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Number-->
                                            <span class="text-gray-800 fw-bold fs-4 me-3">2,047</span>
                                            <!--end::Number-->
                                            <!--begin::Info-->
                                            <div class="m-0">
                                                <!--begin::Label-->
                                                <span class="badge badge-light-success fs-base">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                                <span class="svg-icon svg-icon-5 svg-icon-success ms-n1">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor"></rect>
                                                        <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->1.9%</span>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Items-->
                            </div>
                            <!--end::Tap pane-->
                            <!--begin::Tap pane-->
                            <div class="tab-pane fade" id="kt_chart_widget_19_tab_content_2" role="tabpanel" aria-labelledby="#kt_chart_widget_19_tab_2">
                                <!--begin::Chart container-->
                                <div id="kt_charts_widget_19_chart_2" class="w-100 h-400px mb-13 mt-n4"><div style="position: relative; height: 100%;"><div style="position: absolute; width: 0px; height: 0px;"><div><canvas width="0" height="0" style="position: absolute; top: 0px; left: 0px; width: 0px; height: 0px;"></canvas><canvas style="position: absolute; top: 0px; left: 0px;"></canvas></div></div><div style="overflow: hidden;"></div><div role="alert" style="z-index: -100000; opacity: 0; position: absolute; top: 0px;"></div><div role="application" style="position: absolute; pointer-events: none; top: 0px; left: 0px; overflow: hidden; width: 0px; height: 0px;"><div role="button" aria-label="Zoom Out" style="position: absolute; pointer-events: none; top: 8px; left: -48px; width: 40px; height: 40px;"></div></div><div></div></div></div>
                                <!--end::Chart container-->
                                <!--begin::Items-->
                                <div class="m-0">
                                    <!--begin::Item-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Section-->
                                        <div class="d-flex align-items-center me-5">
                                            <!--begin::Flag-->
                                            <img src="media/avatars/blank.png" class="me-4 w-30px" style="border-radius: 4px" alt="">
                                            <!--end::Flag-->
                                            <!--begin::Content-->
                                            <div class="me-5">
                                                <!--begin::Title-->
                                                <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Abstergo Ltd.</a>
                                                <!--end::Title-->
                                                <!--begin::Desc-->
                                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Community</span>
                                                <!--end::Desc-->
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Section-->
                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Number-->
                                            <span class="text-gray-800 fw-bold fs-4 me-3">579</span>
                                            <!--end::Number-->
                                            <!--begin::Info-->
                                            <div class="m-0">
                                                <!--begin::Label-->
                                                <span class="badge badge-light-success fs-base">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                                <span class="svg-icon svg-icon-5 svg-icon-success ms-n1">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor"></rect>
                                                        <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->2.6%</span>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Separator-->
                                    <div class="separator separator-dashed my-4"></div>
                                    <!--end::Separator-->
                                    <!--begin::Item-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Section-->
                                        <div class="d-flex align-items-center me-5">
                                            <!--begin::Flag-->
                                            <img src="media/avatars/blank.png" class="me-4 w-30px" style="border-radius: 4px" alt="">
                                            <!--end::Flag-->
                                            <!--begin::Content-->
                                            <div class="me-5">
                                                <!--begin::Title-->
                                                <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Binford Ltd.</a>
                                                <!--end::Title-->
                                                <!--begin::Desc-->
                                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Social Media</span>
                                                <!--end::Desc-->
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Section-->
                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Number-->
                                            <span class="text-gray-800 fw-bold fs-4 me-3">2,588</span>
                                            <!--end::Number-->
                                            <!--begin::Info-->
                                            <div class="m-0">
                                                <!--begin::Label-->
                                                <span class="badge badge-light-danger fs-base">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
                                                <span class="svg-icon svg-icon-5 svg-icon-danger ms-n1">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor"></rect>
                                                        <path d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z" fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->0.4%</span>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Separator-->
                                    <div class="separator separator-dashed my-4"></div>
                                    <!--end::Separator-->
                                    <!--begin::Item-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Section-->
                                        <div class="d-flex align-items-center me-5">
                                            <!--begin::Flag-->
                                            <img src="media/avatars/blank.png" class="me-4 w-30px" style="border-radius: 4px" alt="">
                                            <!--end::Flag-->
                                            <!--begin::Content-->
                                            <div class="me-5">
                                                <!--begin::Title-->
                                                <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Barone LLC.</a>
                                                <!--end::Title-->
                                                <!--begin::Desc-->
                                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Messanger</span>
                                                <!--end::Desc-->
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Section-->
                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Number-->
                                            <span class="text-gray-800 fw-bold fs-4 me-3">794</span>
                                            <!--end::Number-->
                                            <!--begin::Info-->
                                            <div class="m-0">
                                                <!--begin::Label-->
                                                <span class="badge badge-light-success fs-base">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                                <span class="svg-icon svg-icon-5 svg-icon-success ms-n1">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor"></rect>
                                                        <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->0.2%</span>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Separator-->
                                    <div class="separator separator-dashed my-4"></div>
                                    <!--end::Separator-->
                                    <!--begin::Item-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Section-->
                                        <div class="d-flex align-items-center me-5">
                                            <!--begin::Flag-->
                                            <img src="media/avatars/blank.png" class="me-4 w-30px" style="border-radius: 4px" alt="">
                                            <!--end::Flag-->
                                            <!--begin::Content-->
                                            <div class="me-5">
                                                <!--begin::Title-->
                                                <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Abstergo Ltd.</a>
                                                <!--end::Title-->
                                                <!--begin::Desc-->
                                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Video Channel</span>
                                                <!--end::Desc-->
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Section-->
                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Number-->
                                            <span class="text-gray-800 fw-bold fs-4 me-3">1,578</span>
                                            <!--end::Number-->
                                            <!--begin::Info-->
                                            <div class="m-0">
                                                <!--begin::Label-->
                                                <span class="badge badge-light-success fs-base">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                                <span class="svg-icon svg-icon-5 svg-icon-success ms-n1">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor"></rect>
                                                        <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->4.1%</span>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Separator-->
                                    <div class="separator separator-dashed my-4"></div>
                                    <!--end::Separator-->
                                    <!--begin::Item-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Section-->
                                        <div class="d-flex align-items-center me-5">
                                            <!--begin::Flag-->
                                            <img src="media/avatars/blank.png" class="me-4 w-30px" style="border-radius: 4px" alt="">
                                            <!--end::Flag-->
                                            <!--begin::Content-->
                                            <div class="me-5">
                                                <!--begin::Title-->
                                                <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Biffco Enterprises</a>
                                                <!--end::Title-->
                                                <!--begin::Desc-->
                                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Social Network</span>
                                                <!--end::Desc-->
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Section-->
                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Number-->
                                            <span class="text-gray-800 fw-bold fs-4 me-3">3,458</span>
                                            <!--end::Number-->
                                            <!--begin::Info-->
                                            <div class="m-0">
                                                <!--begin::Label-->
                                                <span class="badge badge-light-success fs-base">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                                <span class="svg-icon svg-icon-5 svg-icon-success ms-n1">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor"></rect>
                                                        <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->8.3%</span>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Separator-->
                                    <div class="separator separator-dashed my-4"></div>
                                    <!--end::Separator-->
                                    <!--begin::Item-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Section-->
                                        <div class="d-flex align-items-center me-5">
                                            <!--begin::Flag-->
                                            <img src="media/avatars/blank.png" class="me-4 w-30px" style="border-radius: 4px" alt="">
                                            <!--end::Flag-->
                                            <!--begin::Content-->
                                            <div class="me-5">
                                                <!--begin::Title-->
                                                <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Big Kahuna Burger</a>
                                                <!--end::Title-->
                                                <!--begin::Desc-->
                                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Social Network</span>
                                                <!--end::Desc-->
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Section-->
                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Number-->
                                            <span class="text-gray-800 fw-bold fs-4 me-3">2,047</span>
                                            <!--end::Number-->
                                            <!--begin::Info-->
                                            <div class="m-0">
                                                <!--begin::Label-->
                                                <span class="badge badge-light-success fs-base">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                                <span class="svg-icon svg-icon-5 svg-icon-success ms-n1">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor"></rect>
                                                        <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->1.9%</span>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Items-->
                            </div>
                            <!--end::Tap pane-->
                        </div>
                        <!--end::Tab Content-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Chart widget 19-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-8 mb-5 mb-xl-10">
                <!--begin::Chart widget 38-->
                <div class="card card-flush h-xl-50 mb-xl-10">
                    <!--begin::Header-->
                    <div class="card-header pt-7">
                        <!--begin::Title-->
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-800">LOI Issued by Departments</span>
                            <span class="text-gray-400 mt-1 fw-semibold fs-6">Counted in Millions</span>
                        </h3>
                        <!--end::Title-->
                        <!--begin::Toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Daterangepicker(defined in src/js/layout/app.js)-->
                            <div data-kt-daterangepicker="true" data-kt-daterangepicker-opens="left" class="btn btn-sm btn-light d-flex align-items-center px-4" data-kt-initialized="1">
                                <!--begin::Display range-->
                                <div class="text-gray-600 fw-bold">24 Jul 2022 - 22 Aug 2022</div>
                                <!--end::Display range-->
                                <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                <span class="svg-icon svg-icon-1 ms-2 me-0">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor"></path>
                                        <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor"></path>
                                        <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Daterangepicker-->
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body d-flex align-items-end px-0 pt-3 pb-5">
                        <!--begin::Chart-->
                        <div id="kt_charts_widget_38_chart" class="h-325px w-100 min-h-auto ps-4 pe-6" style="min-height: 340px;"><div id="apexchartsm23j3pnb" class="apexcharts-canvas apexchartsm23j3pnb apexcharts-theme-light" style="width: 752.5px; height: 325px;"><svg id="SvgjsSvg1367" width="752.5" height="325" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1369" class="apexcharts-inner apexcharts-graphical" transform="translate(60.60000228881836, 30)"><defs id="SvgjsDefs1368"><linearGradient id="SvgjsLinearGradient1373" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1374" stop-opacity="0" stop-color="rgba(216,227,240,0)" offset="0"></stop><stop id="SvgjsStop1375" stop-opacity="0" stop-color="rgba(190,209,230,0)" offset="1"></stop><stop id="SvgjsStop1376" stop-opacity="0" stop-color="rgba(190,209,230,0)" offset="1"></stop></linearGradient><clipPath id="gridRectMaskm23j3pnb"><rect id="SvgjsRect1378" width="687.8999977111816" height="256.11199999999997" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMaskm23j3pnb"></clipPath><clipPath id="nonForecastMaskm23j3pnb"></clipPath><clipPath id="gridRectMarkerMaskm23j3pnb"><rect id="SvgjsRect1379" width="685.8999977111816" height="258.11199999999997" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><rect id="SvgjsRect1377" width="27.275999908447265" height="254.11199999999997" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke-dasharray="3" fill="url(#SvgjsLinearGradient1373)" class="apexcharts-xcrosshairs" y2="254.11199999999997" filter="none" fill-opacity="0.9"></rect><g id="SvgjsG1426" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1427" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"><text id="SvgjsText1429" font-family="inherit" x="48.70714269365583" y="283.11199999999997" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1430">E2E</tspan><title>E2E</title></text><text id="SvgjsText1432" font-family="inherit" x="146.1214280809675" y="283.11199999999997" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1433">IMC</tspan><title>IMC</title></text><text id="SvgjsText1435" font-family="inherit" x="243.53571346827914" y="283.11199999999997" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1436">SSMC</tspan><title>SSMC</title></text><text id="SvgjsText1438" font-family="inherit" x="340.9499988555908" y="283.11199999999997" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1439">SSBD</tspan><title>SSBD</title></text><text id="SvgjsText1441" font-family="inherit" x="438.3642842429025" y="283.11199999999997" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1442">ICCD</tspan><title>ICCD</title></text><text id="SvgjsText1444" font-family="inherit" x="535.7785696302142" y="283.11199999999997" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1445">PAN</tspan><title>PAN</title></text><text id="SvgjsText1447" font-family="inherit" x="633.1928550175259" y="283.11199999999997" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1448">SBN</tspan><title>SBN</title></text></g></g><g id="SvgjsG1466" class="apexcharts-grid"><g id="SvgjsG1467" class="apexcharts-gridlines-horizontal"><line id="SvgjsLine1469" x1="0" y1="0" x2="681.8999977111816" y2="0" stroke="#e4e6ef" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1470" x1="0" y1="63.52799999999999" x2="681.8999977111816" y2="63.52799999999999" stroke="#e4e6ef" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1471" x1="0" y1="127.05599999999998" x2="681.8999977111816" y2="127.05599999999998" stroke="#e4e6ef" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1472" x1="0" y1="190.58399999999997" x2="681.8999977111816" y2="190.58399999999997" stroke="#e4e6ef" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1473" x1="0" y1="254.11199999999997" x2="681.8999977111816" y2="254.11199999999997" stroke="#e4e6ef" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG1468" class="apexcharts-gridlines-vertical"></g><line id="SvgjsLine1475" x1="0" y1="254.11199999999997" x2="681.8999977111816" y2="254.11199999999997" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine1474" x1="0" y1="1" x2="0" y2="254.11199999999997" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1380" class="apexcharts-bar-series apexcharts-plot-series"><g id="SvgjsG1381" class="apexcharts-series" rel="1" seriesName="LOIxIssued" data:realIndex="0"><path id="SvgjsPath1385" d="M 35.0691427394322 254.11199999999997L 35.0691427394322 144.7616Q 35.0691427394322 139.7616 40.0691427394322 139.7616L 55.34514264787947 139.7616Q 60.34514264787947 139.7616 60.34514264787947 144.7616L 60.34514264787947 144.7616L 60.34514264787947 254.11199999999997L 60.34514264787947 254.11199999999997z" fill="rgba(0,158,247,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskm23j3pnb)" pathTo="M 35.0691427394322 254.11199999999997L 35.0691427394322 144.7616Q 35.0691427394322 139.7616 40.0691427394322 139.7616L 55.34514264787947 139.7616Q 60.34514264787947 139.7616 60.34514264787947 144.7616L 60.34514264787947 144.7616L 60.34514264787947 254.11199999999997L 60.34514264787947 254.11199999999997z" pathFrom="M 35.0691427394322 254.11199999999997L 35.0691427394322 254.11199999999997L 60.34514264787947 254.11199999999997L 60.34514264787947 254.11199999999997L 60.34514264787947 254.11199999999997L 60.34514264787947 254.11199999999997L 60.34514264787947 254.11199999999997L 35.0691427394322 254.11199999999997" cy="139.7616" cx="131.48342812674386" j="0" val="54" barHeight="114.35039999999998" barWidth="27.275999908447265"></path><path id="SvgjsPath1391" d="M 132.48342812674386 254.11199999999997L 132.48342812674386 170.1728Q 132.48342812674386 165.1728 137.48342812674386 165.1728L 152.75942803519112 165.1728Q 157.75942803519112 165.1728 157.75942803519112 170.1728L 157.75942803519112 170.1728L 157.75942803519112 254.11199999999997L 157.75942803519112 254.11199999999997z" fill="rgba(0,158,247,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskm23j3pnb)" pathTo="M 132.48342812674386 254.11199999999997L 132.48342812674386 170.1728Q 132.48342812674386 165.1728 137.48342812674386 165.1728L 152.75942803519112 165.1728Q 157.75942803519112 165.1728 157.75942803519112 170.1728L 157.75942803519112 170.1728L 157.75942803519112 254.11199999999997L 157.75942803519112 254.11199999999997z" pathFrom="M 132.48342812674386 254.11199999999997L 132.48342812674386 254.11199999999997L 157.75942803519112 254.11199999999997L 157.75942803519112 254.11199999999997L 157.75942803519112 254.11199999999997L 157.75942803519112 254.11199999999997L 157.75942803519112 254.11199999999997L 132.48342812674386 254.11199999999997" cy="165.1728" cx="228.8977135140555" j="1" val="42" barHeight="88.93919999999999" barWidth="27.275999908447265"></path><path id="SvgjsPath1397" d="M 229.8977135140555 254.11199999999997L 229.8977135140555 100.29199999999997Q 229.8977135140555 95.29199999999997 234.8977135140555 95.29199999999997L 250.17371342250277 95.29199999999997Q 255.17371342250277 95.29199999999997 255.17371342250277 100.29199999999997L 255.17371342250277 100.29199999999997L 255.17371342250277 254.11199999999997L 255.17371342250277 254.11199999999997z" fill="rgba(0,158,247,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskm23j3pnb)" pathTo="M 229.8977135140555 254.11199999999997L 229.8977135140555 100.29199999999997Q 229.8977135140555 95.29199999999997 234.8977135140555 95.29199999999997L 250.17371342250277 95.29199999999997Q 255.17371342250277 95.29199999999997 255.17371342250277 100.29199999999997L 255.17371342250277 100.29199999999997L 255.17371342250277 254.11199999999997L 255.17371342250277 254.11199999999997z" pathFrom="M 229.8977135140555 254.11199999999997L 229.8977135140555 254.11199999999997L 255.17371342250277 254.11199999999997L 255.17371342250277 254.11199999999997L 255.17371342250277 254.11199999999997L 255.17371342250277 254.11199999999997L 255.17371342250277 254.11199999999997L 229.8977135140555 254.11199999999997" cy="95.29199999999997" cx="326.3119989013672" j="2" val="75" barHeight="158.82" barWidth="27.275999908447265"></path><path id="SvgjsPath1403" d="M 327.3119989013672 254.11199999999997L 327.3119989013672 26.175999999999988Q 327.3119989013672 21.175999999999988 332.3119989013672 21.175999999999988L 347.58799880981445 21.175999999999988Q 352.58799880981445 21.175999999999988 352.58799880981445 26.175999999999988L 352.58799880981445 26.175999999999988L 352.58799880981445 254.11199999999997L 352.58799880981445 254.11199999999997z" fill="rgba(0,158,247,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskm23j3pnb)" pathTo="M 327.3119989013672 254.11199999999997L 327.3119989013672 26.175999999999988Q 327.3119989013672 21.175999999999988 332.3119989013672 21.175999999999988L 347.58799880981445 21.175999999999988Q 352.58799880981445 21.175999999999988 352.58799880981445 26.175999999999988L 352.58799880981445 26.175999999999988L 352.58799880981445 254.11199999999997L 352.58799880981445 254.11199999999997z" pathFrom="M 327.3119989013672 254.11199999999997L 327.3119989013672 254.11199999999997L 352.58799880981445 254.11199999999997L 352.58799880981445 254.11199999999997L 352.58799880981445 254.11199999999997L 352.58799880981445 254.11199999999997L 352.58799880981445 254.11199999999997L 327.3119989013672 254.11199999999997" cy="21.175999999999988" cx="423.72628428867887" j="3" val="110" barHeight="232.93599999999998" barWidth="27.275999908447265"></path><path id="SvgjsPath1409" d="M 424.72628428867887 254.11199999999997L 424.72628428867887 210.4072Q 424.72628428867887 205.4072 429.72628428867887 205.4072L 445.00228419712613 205.4072Q 450.00228419712613 205.4072 450.00228419712613 210.4072L 450.00228419712613 210.4072L 450.00228419712613 254.11199999999997L 450.00228419712613 254.11199999999997z" fill="rgba(0,158,247,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskm23j3pnb)" pathTo="M 424.72628428867887 254.11199999999997L 424.72628428867887 210.4072Q 424.72628428867887 205.4072 429.72628428867887 205.4072L 445.00228419712613 205.4072Q 450.00228419712613 205.4072 450.00228419712613 210.4072L 450.00228419712613 210.4072L 450.00228419712613 254.11199999999997L 450.00228419712613 254.11199999999997z" pathFrom="M 424.72628428867887 254.11199999999997L 424.72628428867887 254.11199999999997L 450.00228419712613 254.11199999999997L 450.00228419712613 254.11199999999997L 450.00228419712613 254.11199999999997L 450.00228419712613 254.11199999999997L 450.00228419712613 254.11199999999997L 424.72628428867887 254.11199999999997" cy="205.4072" cx="521.1405696759905" j="4" val="23" barHeight="48.70479999999999" barWidth="27.275999908447265"></path><path id="SvgjsPath1415" d="M 522.1405696759905 254.11199999999997L 522.1405696759905 74.8808Q 522.1405696759905 69.8808 527.1405696759905 69.8808L 542.4165695844378 69.8808Q 547.4165695844378 69.8808 547.4165695844378 74.8808L 547.4165695844378 74.8808L 547.4165695844378 254.11199999999997L 547.4165695844378 254.11199999999997z" fill="rgba(0,158,247,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskm23j3pnb)" pathTo="M 522.1405696759905 254.11199999999997L 522.1405696759905 74.8808Q 522.1405696759905 69.8808 527.1405696759905 69.8808L 542.4165695844378 69.8808Q 547.4165695844378 69.8808 547.4165695844378 74.8808L 547.4165695844378 74.8808L 547.4165695844378 254.11199999999997L 547.4165695844378 254.11199999999997z" pathFrom="M 522.1405696759905 254.11199999999997L 522.1405696759905 254.11199999999997L 547.4165695844378 254.11199999999997L 547.4165695844378 254.11199999999997L 547.4165695844378 254.11199999999997L 547.4165695844378 254.11199999999997L 547.4165695844378 254.11199999999997L 522.1405696759905 254.11199999999997" cy="69.8808" cx="618.5548550633022" j="5" val="87" barHeight="184.23119999999997" barWidth="27.275999908447265"></path><path id="SvgjsPath1421" d="M 619.5548550633022 254.11199999999997L 619.5548550633022 153.23199999999997Q 619.5548550633022 148.23199999999997 624.5548550633022 148.23199999999997L 639.8308549717494 148.23199999999997Q 644.8308549717494 148.23199999999997 644.8308549717494 153.23199999999997L 644.8308549717494 153.23199999999997L 644.8308549717494 254.11199999999997L 644.8308549717494 254.11199999999997z" fill="rgba(0,158,247,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskm23j3pnb)" pathTo="M 619.5548550633022 254.11199999999997L 619.5548550633022 153.23199999999997Q 619.5548550633022 148.23199999999997 624.5548550633022 148.23199999999997L 639.8308549717494 148.23199999999997Q 644.8308549717494 148.23199999999997 644.8308549717494 153.23199999999997L 644.8308549717494 153.23199999999997L 644.8308549717494 254.11199999999997L 644.8308549717494 254.11199999999997z" pathFrom="M 619.5548550633022 254.11199999999997L 619.5548550633022 254.11199999999997L 644.8308549717494 254.11199999999997L 644.8308549717494 254.11199999999997L 644.8308549717494 254.11199999999997L 644.8308549717494 254.11199999999997L 644.8308549717494 254.11199999999997L 619.5548550633022 254.11199999999997" cy="148.23199999999997" cx="715.9691404506138" j="6" val="50" barHeight="105.87999999999998" barWidth="27.275999908447265"></path><g id="SvgjsG1383" class="apexcharts-bar-goals-markers" style="pointer-events: none"><g id="SvgjsG1384" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1390" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1396" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1402" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1408" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1414" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1420" className="apexcharts-bar-goals-groups"></g></g></g><g id="SvgjsG1382" class="apexcharts-datalabels" data:realIndex="0"><g id="SvgjsG1387" class="apexcharts-data-labels" transform="rotate(0)"><text id="SvgjsText1389" font-family="inherit" x="47.707142693655825" y="127.76159999999999" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="600" fill="#181c32" class="apexcharts-datalabel" cx="47.707142693655825" cy="127.76159999999999" style="font-family: inherit;">54</text></g><g id="SvgjsG1393" class="apexcharts-data-labels" transform="rotate(0)"><text id="SvgjsText1395" font-family="inherit" x="145.12142808096746" y="153.1728" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="600" fill="#181c32" class="apexcharts-datalabel" cx="145.12142808096746" cy="153.1728" style="font-family: inherit;">42</text></g><g id="SvgjsG1399" class="apexcharts-data-labels" transform="rotate(0)"><text id="SvgjsText1401" font-family="inherit" x="242.53571346827914" y="83.29199999999997" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="600" fill="#181c32" class="apexcharts-datalabel" cx="242.53571346827914" cy="83.29199999999997" style="font-family: inherit;">75</text></g><g id="SvgjsG1405" class="apexcharts-data-labels" transform="rotate(0)"><text id="SvgjsText1407" font-family="inherit" x="339.9499988555908" y="9.175999999999988" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="600" fill="#181c32" class="apexcharts-datalabel" cx="339.9499988555908" cy="9.175999999999988" style="font-family: inherit;">110</text></g><g id="SvgjsG1411" class="apexcharts-data-labels" transform="rotate(0)"><text id="SvgjsText1413" font-family="inherit" x="437.36428424290244" y="193.4072" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="600" fill="#181c32" class="apexcharts-datalabel" cx="437.36428424290244" cy="193.4072" style="font-family: inherit;">23</text></g><g id="SvgjsG1417" class="apexcharts-data-labels" transform="rotate(0)"><text id="SvgjsText1419" font-family="inherit" x="534.7785696302142" y="57.880799999999994" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="600" fill="#181c32" class="apexcharts-datalabel" cx="534.7785696302142" cy="57.880799999999994" style="font-family: inherit;">87</text></g><g id="SvgjsG1423" class="apexcharts-data-labels" transform="rotate(0)"><text id="SvgjsText1425" font-family="inherit" x="632.1928550175259" y="136.23199999999997" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="600" fill="#181c32" class="apexcharts-datalabel" cx="632.1928550175259" cy="136.23199999999997" style="font-family: inherit;">50</text></g></g></g><line id="SvgjsLine1476" x1="0" y1="0" x2="681.8999977111816" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1477" x1="0" y1="0" x2="681.8999977111816" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1478" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1479" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1480" class="apexcharts-point-annotations"></g></g><g id="SvgjsG1449" class="apexcharts-yaxis" rel="0" transform="translate(30.60000228881836, 0)"><g id="SvgjsG1450" class="apexcharts-yaxis-texts-g"><text id="SvgjsText1452" font-family="inherit" x="20" y="31.4" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1453">120M</tspan><title>120M</title></text><text id="SvgjsText1455" font-family="inherit" x="20" y="94.928" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1456">90M</tspan><title>90M</title></text><text id="SvgjsText1458" font-family="inherit" x="20" y="158.456" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1459">60M</tspan><title>60M</title></text><text id="SvgjsText1461" font-family="inherit" x="20" y="221.98399999999998" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1462">30M</tspan><title>30M</title></text><text id="SvgjsText1464" font-family="inherit" x="20" y="285.51199999999994" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1465">0M</tspan><title>0M</title></text></g></g><g id="SvgjsG1370" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend" style="max-height: 162.5px;"></div><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-title" style="font-family: inherit; font-size: 12px;"></div><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(0, 158, 247);"></span><div class="apexcharts-tooltip-text" style="font-family: inherit; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
                        <!--end::Chart-->
                    </div>
                    <!--end: Card Body-->
                </div>
                <!--end::Chart widget 38-->
                <!--begin::Chart widget 20-->
                <div class="card card-flush h-xl-50">
                    <!--begin::Header-->
                    <div class="card-header py-5">
                        <!--begin::Title-->
                        <h3 class="card-title fw-bold text-gray-800">Monthly Targets</h3>
                        <!--end::Title-->
                        <!--begin::Toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Daterangepicker(defined in src/js/layout/app.js)-->
                            <div data-kt-daterangepicker="true" data-kt-daterangepicker-opens="left" class="btn btn-sm btn-light d-flex align-items-center px-4" data-kt-initialized="1">
                                <!--begin::Display range-->
                                <div class="text-gray-600 fw-bold">24 Jul 2022 - 22 Aug 2022</div>
                                <!--end::Display range-->
                                <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                <span class="svg-icon svg-icon-1 ms-2 me-0">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor"></path>
                                        <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor"></path>
                                        <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Daterangepicker-->
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Card body-->
                    <div class="card-body d-flex justify-content-between flex-column pb-0 px-0 pt-1">
                        <!--begin::Items-->
                        <div class="d-flex flex-wrap d-grid gap-5 px-9 mb-5">
                            <!--begin::Item-->
                            <div class="me-md-2">
                                <!--begin::Statistics-->
                                <div class="d-flex mb-2">
                                    <span class="fs-4 fw-semibold text-gray-400 me-1">$</span>
                                    <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">12,706</span>
                                </div>
                                <!--end::Statistics-->
                                <!--begin::Description-->
                                <span class="fs-6 fw-semibold text-gray-400">Targets for April</span>
                                <!--end::Description-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="border-start-dashed border-end-dashed border-1 border-gray-300 px-5 ps-md-10 pe-md-7 me-md-5">
                                <!--begin::Statistics-->
                                <div class="d-flex mb-2">
                                    <span class="fs-4 fw-semibold text-gray-400 me-1">$</span>
                                    <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">8,035</span>
                                </div>
                                <!--end::Statistics-->
                                <!--begin::Description-->
                                <span class="fs-6 fw-semibold text-gray-400">Actual for April</span>
                                <!--end::Description-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="m-0">
                                <!--begin::Statistics-->
                                <div class="d-flex align-items-center mb-2">
                                    <!--begin::Currency-->
                                    <span class="fs-4 fw-semibold text-gray-400 align-self-start me-1">$</span>
                                    <!--end::Currency-->
                                    <!--begin::Value-->
                                    <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">4,684</span>
                                    <!--end::Value-->
                                    <!--begin::Label-->
                                    <span class="badge badge-light-success fs-base">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr067.svg-->
                                    <span class="svg-icon svg-icon-7 svg-icon-success ms-n1">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.5" d="M13 9.59998V21C13 21.6 12.6 22 12 22C11.4 22 11 21.6 11 21V9.59998H13Z" fill="currentColor"></path>
                                            <path d="M5.7071 7.89291C5.07714 8.52288 5.52331 9.60002 6.41421 9.60002H17.5858C18.4767 9.60002 18.9229 8.52288 18.2929 7.89291L12.7 2.3C12.3 1.9 11.7 1.9 11.3 2.3L5.7071 7.89291Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->4.5%</span>
                                    <!--end::Label-->
                                </div>
                                <!--end::Statistics-->
                                <!--begin::Description-->
                                <span class="fs-6 fw-semibold text-gray-400">GAP</span>
                                <!--end::Description-->
                            </div>
                            <!--end::Item-->
                        </div>
                        <!--end::Items-->
                        <!--begin::Chart-->
                        <div id="kt_charts_widget_20" class="min-h-auto ps-4 pe-6" data-kt-chart-info="Revenue" style="height: 300px; min-height: 315px;"><div id="apexcharts9bxm29erj" class="apexcharts-canvas apexcharts9bxm29erj apexcharts-theme-light" style="width: 752.5px; height: 300px;"><svg id="SvgjsSvg1244" width="752.5" height="300" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg apexcharts-zoomable" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1246" class="apexcharts-inner apexcharts-graphical" transform="translate(57.03750038146973, 30)"><defs id="SvgjsDefs1245"><clipPath id="gridRectMask9bxm29erj"><rect id="SvgjsRect1251" width="692.4624996185303" height="224.60426687240601" x="-3.5" y="-1.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMask9bxm29erj"></clipPath><clipPath id="nonForecastMask9bxm29erj"></clipPath><clipPath id="gridRectMarkerMask9bxm29erj"><rect id="SvgjsRect1252" width="689.4624996185303" height="225.60426687240601" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><linearGradient id="SvgjsLinearGradient1257" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1258" stop-opacity="0.4" stop-color="rgba(241,65,108,0.4)" offset="0"></stop><stop id="SvgjsStop1259" stop-opacity="0" stop-color="rgba(255,255,255,0)" offset="0.8"></stop><stop id="SvgjsStop1260" stop-opacity="0" stop-color="rgba(255,255,255,0)" offset="1"></stop></linearGradient></defs><g id="SvgjsG1263" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1264" class="apexcharts-xaxis-texts-g" transform="translate(0, -10)"><text id="SvgjsText1266" font-family="inherit" x="0" y="244.60426687240601" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)"><tspan id="SvgjsTspan1267"></tspan><title></title></text><text id="SvgjsText1269" font-family="inherit" x="38.081249978807236" y="244.60426687240601" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)"><tspan id="SvgjsTspan1270"></tspan><title></title></text><text id="SvgjsText1272" font-family="inherit" x="76.16249995761447" y="244.60426687240601" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)"><tspan id="SvgjsTspan1273"></tspan><title></title></text><text id="SvgjsText1275" font-family="inherit" x="114.2437499364217" y="244.60426687240601" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 115.38976860046387 239.2042784690857)"><tspan id="SvgjsTspan1276">Apr 04</tspan><title>Apr 04</title></text><text id="SvgjsText1278" font-family="inherit" x="152.32499991522894" y="244.60426687240601" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)"><tspan id="SvgjsTspan1279"></tspan><title></title></text><text id="SvgjsText1281" font-family="inherit" x="190.4062498940362" y="244.60426687240601" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)"><tspan id="SvgjsTspan1282"></tspan><title></title></text><text id="SvgjsText1284" font-family="inherit" x="228.48749987284344" y="244.60426687240601" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 229.4874973297119 239.2042784690857)"><tspan id="SvgjsTspan1285">Apr 07</tspan><title>Apr 07</title></text><text id="SvgjsText1287" font-family="inherit" x="266.5687498516507" y="244.60426687240601" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)"><tspan id="SvgjsTspan1288"></tspan><title></title></text><text id="SvgjsText1290" font-family="inherit" x="304.64999983045794" y="244.60426687240601" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)"><tspan id="SvgjsTspan1291"></tspan><title></title></text><text id="SvgjsText1293" font-family="inherit" x="342.7312498092652" y="244.60426687240601" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 343.73124504089355 239.2042784690857)"><tspan id="SvgjsTspan1294">Apr 10</tspan><title>Apr 10</title></text><text id="SvgjsText1296" font-family="inherit" x="380.81249978807244" y="244.60426687240601" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)"><tspan id="SvgjsTspan1297"></tspan><title></title></text><text id="SvgjsText1299" font-family="inherit" x="418.8937497668797" y="244.60426687240601" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)"><tspan id="SvgjsTspan1300"></tspan><title></title></text><text id="SvgjsText1302" font-family="inherit" x="456.97499974568694" y="244.60426687240601" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 457.9750118255615 239.2042784690857)"><tspan id="SvgjsTspan1303">Apr 13</tspan><title>Apr 13</title></text><text id="SvgjsText1305" font-family="inherit" x="495.0562497244942" y="244.60426687240601" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)"><tspan id="SvgjsTspan1306"></tspan><title></title></text><text id="SvgjsText1308" font-family="inherit" x="533.1374997033015" y="244.60426687240601" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)"><tspan id="SvgjsTspan1309"></tspan><title></title></text><text id="SvgjsText1311" font-family="inherit" x="571.2187496821088" y="244.60426687240601" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 572.21875 239.2042784690857)"><tspan id="SvgjsTspan1312">Apr 18</tspan><title>Apr 18</title></text><text id="SvgjsText1314" font-family="inherit" x="609.299999660916" y="244.60426687240601" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)"><tspan id="SvgjsTspan1315"></tspan><title></title></text><text id="SvgjsText1317" font-family="inherit" x="647.3812496397233" y="244.60426687240601" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)"><tspan id="SvgjsTspan1318"></tspan><title></title></text><text id="SvgjsText1320" font-family="inherit" x="685.4624996185305" y="244.60426687240601" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)"><tspan id="SvgjsTspan1321"></tspan><title></title></text></g></g><g id="SvgjsG1345" class="apexcharts-grid"><g id="SvgjsG1346" class="apexcharts-gridlines-horizontal"><line id="SvgjsLine1348" x1="0" y1="0" x2="685.4624996185303" y2="0" stroke="#e4e6ef" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1349" x1="0" y1="36.934044478734336" x2="685.4624996185303" y2="36.934044478734336" stroke="#e4e6ef" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1350" x1="0" y1="73.86808895746867" x2="685.4624996185303" y2="73.86808895746867" stroke="#e4e6ef" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1351" x1="0" y1="110.80213343620301" x2="685.4624996185303" y2="110.80213343620301" stroke="#e4e6ef" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1352" x1="0" y1="147.73617791493734" x2="685.4624996185303" y2="147.73617791493734" stroke="#e4e6ef" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1353" x1="0" y1="184.67022239367168" x2="685.4624996185303" y2="184.67022239367168" stroke="#e4e6ef" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1354" x1="0" y1="221.60426687240601" x2="685.4624996185303" y2="221.60426687240601" stroke="#e4e6ef" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG1347" class="apexcharts-gridlines-vertical"></g><line id="SvgjsLine1356" x1="0" y1="221.60426687240601" x2="685.4624996185303" y2="221.60426687240601" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine1355" x1="0" y1="1" x2="0" y2="221.60426687240601" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1253" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG1254" class="apexcharts-series" seriesName="Revenue" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1261" d="M 0 221.60426687240601L 0 120.87505465767526C 13.328437492582532 120.87505465767526 24.752812486224705 120.87505465767526 38.081249978807236 120.87505465767526C 51.409687471389766 120.87505465767526 62.83406246503194 87.29865058609812 76.16249995761447 87.29865058609812C 89.49093745019701 87.29865058609812 100.91531244383917 87.29865058609812 114.24374993642171 87.29865058609812C 127.57218742900425 87.29865058609812 138.9965624226464 53.72224651452143 152.32499991522894 53.72224651452143C 165.65343740781148 53.72224651452143 177.07781240145363 53.72224651452143 190.40624989403616 53.72224651452143C 203.7346873866187 53.72224651452143 215.15906238026088 87.29865058609812 228.48749987284342 87.29865058609812C 241.81593736542595 87.29865058609812 253.2403123590681 87.29865058609812 266.56874985165064 87.29865058609812C 279.8971873442332 87.29865058609812 291.3215623378753 53.72224651452143 304.6499998304579 53.72224651452143C 317.97843732304045 53.72224651452143 329.40281231668257 53.72224651452143 342.73124980926514 53.72224651452143C 356.05968730184765 53.72224651452143 367.4840622954898 87.29865058609812 380.81249978807233 87.29865058609812C 394.14093728065484 87.29865058609812 405.56531227429707 87.29865058609812 418.8937497668796 87.29865058609812C 432.2221872594621 87.29865058609812 443.6465622531043 120.87505465767526 456.97499974568683 120.87505465767526C 470.30343723826934 120.87505465767526 481.72781223191157 120.87505465767526 495.0562497244941 120.87505465767526C 508.3846872170766 120.87505465767526 519.8090622107187 87.29865058609812 533.1374997033013 87.29865058609812C 546.4659371958838 87.29865058609812 557.890312189526 87.29865058609812 571.2187496821085 87.29865058609812C 584.5471871746911 87.29865058609812 595.9715621683332 60.43752732883695 609.2999996609158 60.43752732883695C 622.6284371534983 60.43752732883695 634.0528121471405 60.43752732883695 647.381249639723 60.43752732883695C 660.7096871323056 60.43752732883695 672.1340621259477 87.29865058609812 685.4624996185303 87.29865058609812C 685.4624996185303 87.29865058609812 685.4624996185303 87.29865058609812 685.4624996185303 221.60426687240601M 685.4624996185303 87.29865058609812z" fill="url(#SvgjsLinearGradient1257)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask9bxm29erj)" pathTo="M 0 221.60426687240601L 0 120.87505465767526C 13.328437492582532 120.87505465767526 24.752812486224705 120.87505465767526 38.081249978807236 120.87505465767526C 51.409687471389766 120.87505465767526 62.83406246503194 87.29865058609812 76.16249995761447 87.29865058609812C 89.49093745019701 87.29865058609812 100.91531244383917 87.29865058609812 114.24374993642171 87.29865058609812C 127.57218742900425 87.29865058609812 138.9965624226464 53.72224651452143 152.32499991522894 53.72224651452143C 165.65343740781148 53.72224651452143 177.07781240145363 53.72224651452143 190.40624989403616 53.72224651452143C 203.7346873866187 53.72224651452143 215.15906238026088 87.29865058609812 228.48749987284342 87.29865058609812C 241.81593736542595 87.29865058609812 253.2403123590681 87.29865058609812 266.56874985165064 87.29865058609812C 279.8971873442332 87.29865058609812 291.3215623378753 53.72224651452143 304.6499998304579 53.72224651452143C 317.97843732304045 53.72224651452143 329.40281231668257 53.72224651452143 342.73124980926514 53.72224651452143C 356.05968730184765 53.72224651452143 367.4840622954898 87.29865058609812 380.81249978807233 87.29865058609812C 394.14093728065484 87.29865058609812 405.56531227429707 87.29865058609812 418.8937497668796 87.29865058609812C 432.2221872594621 87.29865058609812 443.6465622531043 120.87505465767526 456.97499974568683 120.87505465767526C 470.30343723826934 120.87505465767526 481.72781223191157 120.87505465767526 495.0562497244941 120.87505465767526C 508.3846872170766 120.87505465767526 519.8090622107187 87.29865058609812 533.1374997033013 87.29865058609812C 546.4659371958838 87.29865058609812 557.890312189526 87.29865058609812 571.2187496821085 87.29865058609812C 584.5471871746911 87.29865058609812 595.9715621683332 60.43752732883695 609.2999996609158 60.43752732883695C 622.6284371534983 60.43752732883695 634.0528121471405 60.43752732883695 647.381249639723 60.43752732883695C 660.7096871323056 60.43752732883695 672.1340621259477 87.29865058609812 685.4624996185303 87.29865058609812C 685.4624996185303 87.29865058609812 685.4624996185303 87.29865058609812 685.4624996185303 221.60426687240601M 685.4624996185303 87.29865058609812z" pathFrom="M -1 2437.6469355964773L -1 2437.6469355964773L 38.081249978807236 2437.6469355964773L 76.16249995761447 2437.6469355964773L 114.24374993642171 2437.6469355964773L 152.32499991522894 2437.6469355964773L 190.40624989403616 2437.6469355964773L 228.48749987284342 2437.6469355964773L 266.56874985165064 2437.6469355964773L 304.6499998304579 2437.6469355964773L 342.73124980926514 2437.6469355964773L 380.81249978807233 2437.6469355964773L 418.8937497668796 2437.6469355964773L 456.97499974568683 2437.6469355964773L 495.0562497244941 2437.6469355964773L 533.1374997033013 2437.6469355964773L 571.2187496821085 2437.6469355964773L 609.2999996609158 2437.6469355964773L 647.381249639723 2437.6469355964773L 685.4624996185303 2437.6469355964773"></path><path id="SvgjsPath1262" d="M 0 120.87505465767526C 13.328437492582532 120.87505465767526 24.752812486224705 120.87505465767526 38.081249978807236 120.87505465767526C 51.409687471389766 120.87505465767526 62.83406246503194 87.29865058609812 76.16249995761447 87.29865058609812C 89.49093745019701 87.29865058609812 100.91531244383917 87.29865058609812 114.24374993642171 87.29865058609812C 127.57218742900425 87.29865058609812 138.9965624226464 53.72224651452143 152.32499991522894 53.72224651452143C 165.65343740781148 53.72224651452143 177.07781240145363 53.72224651452143 190.40624989403616 53.72224651452143C 203.7346873866187 53.72224651452143 215.15906238026088 87.29865058609812 228.48749987284342 87.29865058609812C 241.81593736542595 87.29865058609812 253.2403123590681 87.29865058609812 266.56874985165064 87.29865058609812C 279.8971873442332 87.29865058609812 291.3215623378753 53.72224651452143 304.6499998304579 53.72224651452143C 317.97843732304045 53.72224651452143 329.40281231668257 53.72224651452143 342.73124980926514 53.72224651452143C 356.05968730184765 53.72224651452143 367.4840622954898 87.29865058609812 380.81249978807233 87.29865058609812C 394.14093728065484 87.29865058609812 405.56531227429707 87.29865058609812 418.8937497668796 87.29865058609812C 432.2221872594621 87.29865058609812 443.6465622531043 120.87505465767526 456.97499974568683 120.87505465767526C 470.30343723826934 120.87505465767526 481.72781223191157 120.87505465767526 495.0562497244941 120.87505465767526C 508.3846872170766 120.87505465767526 519.8090622107187 87.29865058609812 533.1374997033013 87.29865058609812C 546.4659371958838 87.29865058609812 557.890312189526 87.29865058609812 571.2187496821085 87.29865058609812C 584.5471871746911 87.29865058609812 595.9715621683332 60.43752732883695 609.2999996609158 60.43752732883695C 622.6284371534983 60.43752732883695 634.0528121471405 60.43752732883695 647.381249639723 60.43752732883695C 660.7096871323056 60.43752732883695 672.1340621259477 87.29865058609812 685.4624996185303 87.29865058609812" fill="none" fill-opacity="1" stroke="#f1416c" stroke-opacity="1" stroke-linecap="butt" stroke-width="3" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask9bxm29erj)" pathTo="M 0 120.87505465767526C 13.328437492582532 120.87505465767526 24.752812486224705 120.87505465767526 38.081249978807236 120.87505465767526C 51.409687471389766 120.87505465767526 62.83406246503194 87.29865058609812 76.16249995761447 87.29865058609812C 89.49093745019701 87.29865058609812 100.91531244383917 87.29865058609812 114.24374993642171 87.29865058609812C 127.57218742900425 87.29865058609812 138.9965624226464 53.72224651452143 152.32499991522894 53.72224651452143C 165.65343740781148 53.72224651452143 177.07781240145363 53.72224651452143 190.40624989403616 53.72224651452143C 203.7346873866187 53.72224651452143 215.15906238026088 87.29865058609812 228.48749987284342 87.29865058609812C 241.81593736542595 87.29865058609812 253.2403123590681 87.29865058609812 266.56874985165064 87.29865058609812C 279.8971873442332 87.29865058609812 291.3215623378753 53.72224651452143 304.6499998304579 53.72224651452143C 317.97843732304045 53.72224651452143 329.40281231668257 53.72224651452143 342.73124980926514 53.72224651452143C 356.05968730184765 53.72224651452143 367.4840622954898 87.29865058609812 380.81249978807233 87.29865058609812C 394.14093728065484 87.29865058609812 405.56531227429707 87.29865058609812 418.8937497668796 87.29865058609812C 432.2221872594621 87.29865058609812 443.6465622531043 120.87505465767526 456.97499974568683 120.87505465767526C 470.30343723826934 120.87505465767526 481.72781223191157 120.87505465767526 495.0562497244941 120.87505465767526C 508.3846872170766 120.87505465767526 519.8090622107187 87.29865058609812 533.1374997033013 87.29865058609812C 546.4659371958838 87.29865058609812 557.890312189526 87.29865058609812 571.2187496821085 87.29865058609812C 584.5471871746911 87.29865058609812 595.9715621683332 60.43752732883695 609.2999996609158 60.43752732883695C 622.6284371534983 60.43752732883695 634.0528121471405 60.43752732883695 647.381249639723 60.43752732883695C 660.7096871323056 60.43752732883695 672.1340621259477 87.29865058609812 685.4624996185303 87.29865058609812" pathFrom="M -1 2437.6469355964773L -1 2437.6469355964773L 38.081249978807236 2437.6469355964773L 76.16249995761447 2437.6469355964773L 114.24374993642171 2437.6469355964773L 152.32499991522894 2437.6469355964773L 190.40624989403616 2437.6469355964773L 228.48749987284342 2437.6469355964773L 266.56874985165064 2437.6469355964773L 304.6499998304579 2437.6469355964773L 342.73124980926514 2437.6469355964773L 380.81249978807233 2437.6469355964773L 418.8937497668796 2437.6469355964773L 456.97499974568683 2437.6469355964773L 495.0562497244941 2437.6469355964773L 533.1374997033013 2437.6469355964773L 571.2187496821085 2437.6469355964773L 609.2999996609158 2437.6469355964773L 647.381249639723 2437.6469355964773L 685.4624996185303 2437.6469355964773"></path><g id="SvgjsG1255" class="apexcharts-series-markers-wrap" data:realIndex="0"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1364" r="0" cx="0" cy="0" class="apexcharts-marker w8vatc39i no-pointer-events" stroke="#f1416c" fill="#f1416c" fill-opacity="1" stroke-width="3" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG1256" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine1358" x1="0" y1="0" x2="0" y2="221.60426687240601" stroke="#f1416c" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="221.60426687240601" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><line id="SvgjsLine1359" x1="0" y1="0" x2="685.4624996185303" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1360" x1="0" y1="0" x2="685.4624996185303" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1361" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1362" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1363" class="apexcharts-point-annotations"></g><rect id="SvgjsRect1365" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-zoom-rect"></rect><rect id="SvgjsRect1366" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-selection-rect"></rect></g><g id="SvgjsG1322" class="apexcharts-yaxis" rel="0" transform="translate(27.037500381469727, 0)"><g id="SvgjsG1323" class="apexcharts-yaxis-texts-g"><text id="SvgjsText1325" font-family="inherit" x="20" y="31.6" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1326">$362</tspan><title>$362</title></text><text id="SvgjsText1328" font-family="inherit" x="20" y="68.53404447873433" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1329">$357</tspan><title>$357</title></text><text id="SvgjsText1331" font-family="inherit" x="20" y="105.46808895746867" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1332">$351</tspan><title>$351</title></text><text id="SvgjsText1334" font-family="inherit" x="20" y="142.402133436203" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1335">$346</tspan><title>$346</title></text><text id="SvgjsText1337" font-family="inherit" x="20" y="179.33617791493734" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1338">$340</tspan><title>$340</title></text><text id="SvgjsText1340" font-family="inherit" x="20" y="216.27022239367167" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1341">$335</tspan><title>$335</title></text><text id="SvgjsText1343" font-family="inherit" x="20" y="253.204266872406" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1344">$330</tspan><title>$330</title></text></g></g><rect id="SvgjsRect1357" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect><g id="SvgjsG1247" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend" style="max-height: 150px;"></div><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-title" style="font-family: inherit; font-size: 12px;"></div><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(241, 65, 108);"></span><div class="apexcharts-tooltip-text" style="font-family: inherit; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light"><div class="apexcharts-xaxistooltip-text" style="font-family: inherit; font-size: 12px;"></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
                        <!--end::Chart-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Chart widget 20-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->


        <div class="row gy-5 g-xl-10">
            <!--begin::Col-->
            <div class="col-xxl-6 mb-5 mb-xl-10">
                <!--begin::Chart widget 8-->
                <div class="card card-flush h-xl-100">
                    <!--begin::Header-->
                    <div class="card-header pt-5">
                        <!--begin::Title-->
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-dark">Performance Overview</span>
                            <span class="text-gray-400 mt-1 fw-semibold fs-6">Users from all channels</span>
                        </h3>
                        <!--end::Title-->
                        <!--begin::Toolbar-->
                        <div class="card-toolbar">
                            <ul class="nav" id="kt_chart_widget_8_tabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bold px-4 me-1" data-bs-toggle="tab" id="kt_chart_widget_8_week_toggle" href="#kt_chart_widget_8_week_tab" aria-selected="false" tabindex="-1" role="tab">Month</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bold px-4 me-1 active" data-bs-toggle="tab" id="kt_chart_widget_8_month_toggle" href="#kt_chart_widget_8_month_tab" aria-selected="true" role="tab">Week</a>
                                </li>
                            </ul>
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-6">
                        <!--begin::Tab content-->
                        <div class="tab-content">
                            <!--begin::Tab pane-->
                            <div class="tab-pane fade" id="kt_chart_widget_8_week_tab" role="tabpanel" aria-labelledby="#kt_chart_widget_8_week_toggle">
                                <!--begin::Statistics-->
                                <div class="mb-5">
                                    <!--begin::Statistics-->
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="fs-1 fw-semibold text-gray-400 me-1 mt-n1">$</span>
                                        <span class="fs-3x fw-bold text-gray-800 me-2 lh-1 ls-n2">18,89</span>
                                        <span class="badge badge-light-success fs-base">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                        <span class="svg-icon svg-icon-5 svg-icon-success ms-n1">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor"></rect>
                                                <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->4,8%</span>
                                    </div>
                                    <!--end::Statistics-->
                                    <!--begin::Description-->
                                    <span class="fs-6 fw-semibold text-gray-400">Avarage cost per interaction</span>
                                    <!--end::Description-->
                                </div>
                                <!--end::Statistics-->
                                <!--begin::Chart-->
                                <div id="kt_chart_widget_8_week_chart" class="ms-n5 min-h-auto" style="height: 425px"></div>
                                <!--end::Chart-->
                                <!--begin::Items-->
                                <div class="d-flex flex-wrap pt-5">
                                    <!--begin::Item-->
                                    <div class="d-flex flex-column me-7 me-lg-16 pt-sm-3 pt-6">
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center mb-3 mb-sm-6">
                                            <!--begin::Bullet-->
                                            <span class="bullet bullet-dot bg-primary me-2 h-10px w-10px"></span>
                                            <!--end::Bullet-->
                                            <!--begin::Label-->
                                            <span class="fw-bold text-gray-600 fs-6">Social Campaigns</span>
                                            <!--end::Label-->
                                        </div>
                                        <!--ed::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Bullet-->
                                            <span class="bullet bullet-dot bg-danger me-2 h-10px w-10px"></span>
                                            <!--end::Bullet-->
                                            <!--begin::Label-->
                                            <span class="fw-bold text-<gray-600 fs-6">Google Ads</span>
                                            <!--end::Label-->
                                        </div>
                                        <!--ed::Item-->
                                    </div>
                                    <!--ed::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex flex-column me-7 me-lg-16 pt-sm-3 pt-6">
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center mb-3 mb-sm-6">
                                            <!--begin::Bullet-->
                                            <span class="bullet bullet-dot bg-success me-2 h-10px w-10px"></span>
                                            <!--end::Bullet-->
                                            <!--begin::Label-->
                                            <span class="fw-bold text-gray-600 fs-6">Email Newsletter</span>
                                            <!--end::Label-->
                                        </div>
                                        <!--ed::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Bullet-->
                                            <span class="bullet bullet-dot bg-warning me-2 h-10px w-10px"></span>
                                            <!--end::Bullet-->
                                            <!--begin::Label-->
                                            <span class="fw-bold text-gray-600 fs-6">Courses</span>
                                            <!--end::Label-->
                                        </div>
                                        <!--ed::Item-->
                                    </div>
                                    <!--ed::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex flex-column pt-sm-3 pt-6">
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center mb-3 mb-sm-6">
                                            <!--begin::Bullet-->
                                            <span class="bullet bullet-dot bg-info me-2 h-10px w-10px"></span>
                                            <!--end::Bullet-->
                                            <!--begin::Label-->
                                            <span class="fw-bold text-gray-600 fs-6">TV Campaign</span>
                                            <!--end::Label-->
                                        </div>
                                        <!--ed::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Bullet-->
                                            <span class="bullet bullet-dot bg-success me-2 h-10px w-10px"></span>
                                            <!--end::Bullet-->
                                            <!--begin::Label-->
                                            <span class="fw-bold text-gray-600 fs-6">Radio</span>
                                            <!--end::Label-->
                                        </div>
                                        <!--ed::Item-->
                                    </div>
                                    <!--ed::Item-->
                                </div>
                                <!--ed::Items-->
                            </div>
                            <!--end::Tab pane-->
                            <!--begin::Tab pane-->
                            <div class="tab-pane fade active show" id="kt_chart_widget_8_month_tab" role="tabpanel" aria-labelledby="#kt_chart_widget_8_month_toggle">
                                <!--begin::Statistics-->
                                <div class="mb-5">
                                    <!--begin::Statistics-->
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="fs-1 fw-semibold text-gray-400 me-1 mt-n1">$</span>
                                        <span class="fs-3x fw-bold text-gray-800 me-2 lh-1 ls-n2">8,55</span>
                                        <span class="badge badge-light-success fs-base">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                        <span class="svg-icon svg-icon-5 svg-icon-success ms-n1">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor"></rect>
                                                <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->2.2%</span>
                                    </div>
                                    <!--end::Statistics-->
                                    <!--begin::Description-->
                                    <span class="fs-6 fw-semibold text-gray-400">Avarage cost per interaction</span>
                                    <!--end::Description-->
                                </div>
                                <!--end::Statistics-->
                                <!--begin::Chart-->
                                <div id="kt_chart_widget_8_month_chart" class="ms-n5 min-h-auto" style="height: 425px; min-height: 440px;"><div id="apexchartsrtx5n8dz" class="apexcharts-canvas apexchartsrtx5n8dz apexcharts-theme-light" style="width: 539px; height: 425px;"><svg id="SvgjsSvg1057" width="539" height="425" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg apexcharts-zoomable" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1059" class="apexcharts-inner apexcharts-graphical" transform="translate(50.47500038146973, 30)"><defs id="SvgjsDefs1058"><clipPath id="gridRectMaskrtx5n8dz"><rect id="SvgjsRect1065" width="472.5249996185303" height="360.8" x="-2" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMaskrtx5n8dz"></clipPath><clipPath id="nonForecastMaskrtx5n8dz"></clipPath><clipPath id="gridRectMarkerMaskrtx5n8dz"><rect id="SvgjsRect1066" width="472.5249996185303" height="364.8" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><rect id="SvgjsRect1064" width="0" height="360.8" x="83" y="0" rx="0" ry="0" opacity="1" stroke-width="1" stroke="#b6b6b6" stroke-dasharray="3" fill="#b1b9c4" class="apexcharts-xcrosshairs" y2="360.8" filter="none" fill-opacity="0.9" x1="83" x2="83"></rect><g id="SvgjsG1116" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1117" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"><text id="SvgjsText1119" font-family="inherit" x="0" y="389.8" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1120">0</tspan><title>0</title></text><text id="SvgjsText1122" font-family="inherit" x="66.93214280264718" y="389.8" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1123">100</tspan><title>100</title></text><text id="SvgjsText1125" font-family="inherit" x="133.86428560529436" y="389.8" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1126">200</tspan><title>200</title></text><text id="SvgjsText1128" font-family="inherit" x="200.7964284079415" y="389.8" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1129">300</tspan><title>300</title></text><text id="SvgjsText1131" font-family="inherit" x="267.7285712105887" y="389.8" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1132">400</tspan><title>400</title></text><text id="SvgjsText1134" font-family="inherit" x="334.66071401323586" y="389.8" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1135">500</tspan><title>500</title></text><text id="SvgjsText1137" font-family="inherit" x="401.592856815883" y="389.8" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1138">600</tspan><title>600</title></text><text id="SvgjsText1140" font-family="inherit" x="468.52499961853016" y="389.8" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1141">700</tspan><title>700</title></text></g></g><g id="SvgjsG1168" class="apexcharts-grid"><g id="SvgjsG1169" class="apexcharts-gridlines-horizontal"><line id="SvgjsLine1179" x1="0" y1="0" x2="468.5249996185303" y2="0" stroke="#e4e6ef" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1180" x1="0" y1="51.542857142857144" x2="468.5249996185303" y2="51.542857142857144" stroke="#e4e6ef" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1181" x1="0" y1="103.08571428571429" x2="468.5249996185303" y2="103.08571428571429" stroke="#e4e6ef" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1182" x1="0" y1="154.62857142857143" x2="468.5249996185303" y2="154.62857142857143" stroke="#e4e6ef" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1183" x1="0" y1="206.17142857142858" x2="468.5249996185303" y2="206.17142857142858" stroke="#e4e6ef" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1184" x1="0" y1="257.7142857142857" x2="468.5249996185303" y2="257.7142857142857" stroke="#e4e6ef" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1185" x1="0" y1="309.25714285714287" x2="468.5249996185303" y2="309.25714285714287" stroke="#e4e6ef" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1186" x1="0" y1="360.8" x2="468.5249996185303" y2="360.8" stroke="#e4e6ef" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG1170" class="apexcharts-gridlines-vertical"></g><line id="SvgjsLine1171" x1="0" y1="361.8" x2="0" y2="361.8" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1172" x1="66.93214321136475" y1="361.8" x2="66.93214321136475" y2="361.8" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1173" x1="133.8642807006836" y1="361.8" x2="133.8642807006836" y2="361.8" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1174" x1="200.79643535614014" y1="361.8" x2="200.79643535614014" y2="361.8" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1175" x1="267.7285737991333" y1="361.8" x2="267.7285737991333" y2="361.8" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1176" x1="334.66068744659424" y1="361.8" x2="334.66068744659424" y2="361.8" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1177" x1="401.5928716659546" y1="361.8" x2="401.5928716659546" y2="361.8" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1178" x1="468.5250062942505" y1="361.8" x2="468.5250062942505" y2="361.8" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1188" x1="0" y1="360.8" x2="468.5249996185303" y2="360.8" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine1187" x1="0" y1="1" x2="0" y2="360.8" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1067" class="apexcharts-bubble-series apexcharts-plot-series"><g id="SvgjsG1068" class="apexcharts-series" seriesName="SocialxCampaigns" data:longestSeries="true" rel="1" data:realIndex="0"><g id="SvgjsG1069" class="apexcharts-series-markers-wrap" data:realIndex="0"><g id="SvgjsG1071" class="" clip-path="url(#gridRectMarkerMaskrtx5n8dz)"><circle id="SvgjsCircle1072" r="0" cx="83.66517850330898" cy="206.17142857142858" class="apexcharts-marker wlr8y3vi9" fill="#009ef7" fill-opacity="1" stroke-width="0" stroke-opacity="0.9" rel="0" j="0" index="0" default-marker-size="0"></circle><circle id="SvgjsCircle1073" r="0" cx="83.66517850330898" cy="0" class="apexcharts-nullpoint" fill="#009ef7" fill-opacity="1" stroke-width="0" stroke-opacity="0.9" rel="1" j="1" index="0" default-marker-size="0"></circle></g><g id="SvgjsG1074" class="apexcharts-series-markers apexcharts-series-bubble" clip-path="url(#gridRectMarkerMaskrtx5n8dz)"><circle id="SvgjsCircle1075" r="60.13333333333333" cx="83.66517850330898" cy="206.17142857142858" x="79.66517850330898" y="202.17142857142858" fill="rgba(0,158,247,1)" fill-opacity="1" stroke-width="0" stroke-dasharray="0" stroke-opacity="0.9" width="0" height="0" rel="0" j="0" index="0" default-marker-size="60.13333333333333" class="apexcharts-marker"></circle></g><g class="apexcharts-series-markers"><circle id="SvgjsCircle1194" r="0" cx="0" cy="0" class="apexcharts-marker w0ajfd4s6" fill="#009ef7" fill-opacity="1" stroke-width="0" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG1076" class="apexcharts-series" seriesName="EmailxNewsletter" data:longestSeries="true" rel="2" data:realIndex="1"><g id="SvgjsG1077" class="apexcharts-series-markers-wrap" data:realIndex="1"><g id="SvgjsG1079" class="" clip-path="url(#gridRectMarkerMaskrtx5n8dz)"><circle id="SvgjsCircle1080" r="0" cx="167.33035700661796" cy="180.4" class="apexcharts-marker wpul9a5at" fill="#50cd89" fill-opacity="1" stroke-width="0" stroke-opacity="0.9" rel="0" j="0" index="1" default-marker-size="0"></circle><circle id="SvgjsCircle1081" r="0" cx="83.66517850330898" cy="0" class="apexcharts-nullpoint" fill="#50cd89" fill-opacity="1" stroke-width="0" stroke-opacity="0.9" rel="1" j="1" index="1" default-marker-size="0"></circle></g><g id="SvgjsG1082" class="apexcharts-series-markers apexcharts-series-bubble" clip-path="url(#gridRectMarkerMaskrtx5n8dz)"><circle id="SvgjsCircle1083" r="52.61666666666667" cx="167.33035700661796" cy="180.4" x="163.33035700661796" y="176.4" fill="rgba(80,205,137,1)" fill-opacity="1" stroke-width="0" stroke-dasharray="0" stroke-opacity="0.9" width="0" height="0" rel="0" j="0" index="1" default-marker-size="52.61666666666667" class="apexcharts-marker"></circle></g><g class="apexcharts-series-markers"><circle id="SvgjsCircle1195" r="0" cx="0" cy="0" class="apexcharts-marker wfkh2nw73g" fill="#50cd89" fill-opacity="1" stroke-width="0" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG1084" class="apexcharts-series" seriesName="TVxCampaign" data:longestSeries="true" rel="3" data:realIndex="2"><g id="SvgjsG1085" class="apexcharts-series-markers-wrap" data:realIndex="2"><g id="SvgjsG1087" class="" clip-path="url(#gridRectMarkerMaskrtx5n8dz)"><circle id="SvgjsCircle1088" r="0" cx="234.26249980926517" cy="128.85714285714286" class="apexcharts-marker w9nt1k0dw" fill="#ffc700" fill-opacity="1" stroke-width="0" stroke-opacity="0.9" rel="0" j="0" index="2" default-marker-size="0"></circle><circle id="SvgjsCircle1089" r="0" cx="83.66517850330898" cy="0" class="apexcharts-nullpoint" fill="#ffc700" fill-opacity="1" stroke-width="0" stroke-opacity="0.9" rel="1" j="1" index="2" default-marker-size="0"></circle></g><g id="SvgjsG1090" class="apexcharts-series-markers apexcharts-series-bubble" clip-path="url(#gridRectMarkerMaskrtx5n8dz)"><circle id="SvgjsCircle1091" r="45.1" cx="234.26249980926517" cy="128.85714285714286" x="230.26249980926517" y="124.85714285714286" fill="rgba(255,199,0,1)" fill-opacity="1" stroke-width="0" stroke-dasharray="0" stroke-opacity="0.9" width="0" height="0" rel="0" j="0" index="2" default-marker-size="45.1" class="apexcharts-marker"></circle></g><g class="apexcharts-series-markers"><circle id="SvgjsCircle1196" r="0" cx="0" cy="0" class="apexcharts-marker wa8ouowbz" fill="#ffc700" fill-opacity="1" stroke-width="0" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG1092" class="apexcharts-series" seriesName="GooglexAds" data:longestSeries="true" rel="4" data:realIndex="3"><g id="SvgjsG1093" class="apexcharts-series-markers-wrap" data:realIndex="3"><g id="SvgjsG1095" class="" clip-path="url(#gridRectMarkerMaskrtx5n8dz)"><circle id="SvgjsCircle1096" r="0" cx="301.19464261191234" cy="231.94285714285715" class="apexcharts-marker wte01o4jki" fill="#f1416c" fill-opacity="1" stroke-width="0" stroke-opacity="0.9" rel="0" j="0" index="3" default-marker-size="0"></circle><circle id="SvgjsCircle1097" r="0" cx="83.66517850330898" cy="0" class="apexcharts-nullpoint" fill="#f1416c" fill-opacity="1" stroke-width="0" stroke-opacity="0.9" rel="1" j="1" index="3" default-marker-size="0"></circle></g><g id="SvgjsG1098" class="apexcharts-series-markers apexcharts-series-bubble" clip-path="url(#gridRectMarkerMaskrtx5n8dz)"><circle id="SvgjsCircle1099" r="37.583333333333336" cx="301.19464261191234" cy="231.94285714285715" x="297.19464261191234" y="227.94285714285715" fill="rgba(241,65,108,1)" fill-opacity="1" stroke-width="0" stroke-dasharray="0" stroke-opacity="0.9" width="0" height="0" rel="0" j="0" index="3" default-marker-size="37.583333333333336" class="apexcharts-marker"></circle></g><g class="apexcharts-series-markers"><circle id="SvgjsCircle1197" r="0" cx="0" cy="0" class="apexcharts-marker wyxfput4" fill="#f1416c" fill-opacity="1" stroke-width="0" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG1100" class="apexcharts-series" seriesName="Courses" data:longestSeries="true" rel="5" data:realIndex="4"><g id="SvgjsG1101" class="apexcharts-series-markers-wrap" data:realIndex="4"><g id="SvgjsG1103" class="" clip-path="url(#gridRectMarkerMaskrtx5n8dz)"><circle id="SvgjsCircle1104" r="0" cx="334.6607140132359" cy="103.08571428571429" class="apexcharts-marker wrm3jwe76" fill="#7239ea" fill-opacity="1" stroke-width="0" stroke-opacity="0.9" rel="0" j="0" index="4" default-marker-size="0"></circle><circle id="SvgjsCircle1105" r="0" cx="83.66517850330898" cy="0" class="apexcharts-nullpoint" fill="#7239ea" fill-opacity="1" stroke-width="0" stroke-opacity="0.9" rel="1" j="1" index="4" default-marker-size="0"></circle></g><g id="SvgjsG1106" class="apexcharts-series-markers apexcharts-series-bubble" clip-path="url(#gridRectMarkerMaskrtx5n8dz)"><circle id="SvgjsCircle1107" r="45.1" cx="334.6607140132359" cy="103.08571428571429" x="330.6607140132359" y="99.08571428571429" fill="rgba(114,57,234,1)" fill-opacity="1" stroke-width="0" stroke-dasharray="0" stroke-opacity="0.9" width="0" height="0" rel="0" j="0" index="4" default-marker-size="45.1" class="apexcharts-marker"></circle></g><g class="apexcharts-series-markers"><circle id="SvgjsCircle1198" r="0" cx="0" cy="0" class="apexcharts-marker w4rlw0ykb" fill="#7239ea" fill-opacity="1" stroke-width="0" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG1108" class="apexcharts-series" seriesName="Radio" data:longestSeries="true" rel="6" data:realIndex="5"><g id="SvgjsG1109" class="apexcharts-series-markers-wrap" data:realIndex="5"><g id="SvgjsG1111" class="" clip-path="url(#gridRectMarkerMaskrtx5n8dz)"><circle id="SvgjsCircle1112" r="0" cx="401.5928568158831" cy="231.94285714285715" class="apexcharts-marker wh64ncf2o" fill="#43ced7" fill-opacity="1" stroke-width="0" stroke-opacity="0.9" rel="0" j="0" index="5" default-marker-size="0"></circle><circle id="SvgjsCircle1113" r="0" cx="83.66517850330898" cy="0" class="apexcharts-nullpoint" fill="#43ced7" fill-opacity="1" stroke-width="0" stroke-opacity="0.9" rel="1" j="1" index="5" default-marker-size="0"></circle></g><g id="SvgjsG1114" class="apexcharts-series-markers apexcharts-series-bubble" clip-path="url(#gridRectMarkerMaskrtx5n8dz)"><circle id="SvgjsCircle1115" r="42.093333333333334" cx="401.5928568158831" cy="231.94285714285715" x="397.5928568158831" y="227.94285714285715" fill="rgba(67,206,215,1)" fill-opacity="1" stroke-width="0" stroke-dasharray="0" stroke-opacity="0.9" width="0" height="0" rel="0" j="0" index="5" default-marker-size="42.093333333333334" class="apexcharts-marker"></circle></g><g class="apexcharts-series-markers"><circle id="SvgjsCircle1199" r="0" cx="0" cy="0" class="apexcharts-marker wojan2h4a" fill="#43ced7" fill-opacity="1" stroke-width="0" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG1070" class="apexcharts-datalabels" data:realIndex="0"></g><g id="SvgjsG1078" class="apexcharts-datalabels" data:realIndex="1"></g><g id="SvgjsG1086" class="apexcharts-datalabels" data:realIndex="2"></g><g id="SvgjsG1094" class="apexcharts-datalabels" data:realIndex="3"></g><g id="SvgjsG1102" class="apexcharts-datalabels" data:realIndex="4"></g><g id="SvgjsG1110" class="apexcharts-datalabels" data:realIndex="5"></g></g><line id="SvgjsLine1189" x1="0" y1="0" x2="468.5249996185303" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1190" x1="0" y1="0" x2="468.5249996185303" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1191" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1192" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1193" class="apexcharts-point-annotations"></g><rect id="SvgjsRect1200" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-zoom-rect"></rect><rect id="SvgjsRect1201" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-selection-rect"></rect></g><g id="SvgjsG1142" class="apexcharts-yaxis" rel="0" transform="translate(20.475000381469727, 0)"><g id="SvgjsG1143" class="apexcharts-yaxis-texts-g"><text id="SvgjsText1145" font-family="inherit" x="20" y="31.7" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1146">700</tspan><title>700</title></text><text id="SvgjsText1148" font-family="inherit" x="20" y="83.24285714285715" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1149">600</tspan><title>600</title></text><text id="SvgjsText1151" font-family="inherit" x="20" y="134.78571428571428" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1152">500</tspan><title>500</title></text><text id="SvgjsText1154" font-family="inherit" x="20" y="186.32857142857142" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1155">400</tspan><title>400</title></text><text id="SvgjsText1157" font-family="inherit" x="20" y="237.87142857142857" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1158">300</tspan><title>300</title></text><text id="SvgjsText1160" font-family="inherit" x="20" y="289.4142857142857" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1161">200</tspan><title>200</title></text><text id="SvgjsText1163" font-family="inherit" x="20" y="340.95714285714286" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1164">100</tspan><title>100</title></text><text id="SvgjsText1166" font-family="inherit" x="20" y="392.5" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1167">0</tspan><title>0</title></text></g></g><g id="SvgjsG1060" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend" style="max-height: 212.5px;"></div><div class="apexcharts-tooltip apexcharts-theme-light" style="left: 139.475px; top: 114.7px;"><div class="apexcharts-tooltip-title" style="font-family: inherit; font-size: 12px;">Clicks: 125</div><div class="apexcharts-tooltip-series-group apexcharts-active" style="order: 1; display: flex;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(0, 158, 247);"></span><div class="apexcharts-tooltip-text" style="font-family: inherit; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">Social Campaigns: </span><span class="apexcharts-tooltip-text-y-value">$300K</span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label">Impression: </span><span class="apexcharts-tooltip-text-z-value">40</span></div></div></div><div class="apexcharts-tooltip-series-group" style="order: 2; display: none;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(0, 158, 247);"></span><div class="apexcharts-tooltip-text" style="font-family: inherit; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">Social Campaigns: </span><span class="apexcharts-tooltip-text-y-value">$300K</span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label">Impression: </span><span class="apexcharts-tooltip-text-z-value">40</span></div></div></div><div class="apexcharts-tooltip-series-group" style="order: 3; display: none;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(0, 158, 247);"></span><div class="apexcharts-tooltip-text" style="font-family: inherit; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">Social Campaigns: </span><span class="apexcharts-tooltip-text-y-value">$300K</span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label">Impression: </span><span class="apexcharts-tooltip-text-z-value">40</span></div></div></div><div class="apexcharts-tooltip-series-group" style="order: 4; display: none;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(0, 158, 247);"></span><div class="apexcharts-tooltip-text" style="font-family: inherit; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">Social Campaigns: </span><span class="apexcharts-tooltip-text-y-value">$300K</span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label">Impression: </span><span class="apexcharts-tooltip-text-z-value">40</span></div></div></div><div class="apexcharts-tooltip-series-group" style="order: 5; display: none;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(0, 158, 247);"></span><div class="apexcharts-tooltip-text" style="font-family: inherit; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">Social Campaigns: </span><span class="apexcharts-tooltip-text-y-value">$300K</span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label">Impression: </span><span class="apexcharts-tooltip-text-z-value">40</span></div></div></div><div class="apexcharts-tooltip-series-group" style="order: 6; display: none;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(0, 158, 247);"></span><div class="apexcharts-tooltip-text" style="font-family: inherit; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">Social Campaigns: </span><span class="apexcharts-tooltip-text-y-value">$300K</span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label">Impression: </span><span class="apexcharts-tooltip-text-z-value">40</span></div></div></div></div><div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light"><div class="apexcharts-xaxistooltip-text" style="font-family: inherit; font-size: 12px;">Clicks: 125</div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
                                <!--end::Chart-->
                                <!--begin::Items-->
                                <div class="d-flex flex-wrap pt-5">
                                    <!--begin::Item-->
                                    <div class="d-flex flex-column me-7 me-lg-16 pt-sm-3 pt-6">
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center mb-3 mb-sm-6">
                                            <!--begin::Bullet-->
                                            <span class="bullet bullet-dot bg-primary me-2 h-10px w-10px"></span>
                                            <!--end::Bullet-->
                                            <!--begin::Label-->
                                            <span class="fw-bold text-gray-600 fs-6">Social Campaigns</span>
                                            <!--end::Label-->
                                        </div>
                                        <!--ed::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Bullet-->
                                            <span class="bullet bullet-dot bg-danger me-2 h-10px w-10px"></span>
                                            <!--end::Bullet-->
                                            <!--begin::Label-->
                                            <span class="fw-bold text-gray-600 fs-6">Google Ads</span>
                                            <!--end::Label-->
                                        </div>
                                        <!--ed::Item-->
                                    </div>
                                    <!--ed::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex flex-column me-7 me-lg-16 pt-sm-3 pt-6">
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center mb-3 mb-sm-6">
                                            <!--begin::Bullet-->
                                            <span class="bullet bullet-dot bg-success me-2 h-10px w-10px"></span>
                                            <!--end::Bullet-->
                                            <!--begin::Label-->
                                            <span class="fw-bold text-gray-600 fs-6">Email Newsletter</span>
                                            <!--end::Label-->
                                        </div>
                                        <!--ed::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Bullet-->
                                            <span class="bullet bullet-dot bg-warning me-2 h-10px w-10px"></span>
                                            <!--end::Bullet-->
                                            <!--begin::Label-->
                                            <span class="fw-bold text-gray-600 fs-6">Courses</span>
                                            <!--end::Label-->
                                        </div>
                                        <!--ed::Item-->
                                    </div>
                                    <!--ed::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex flex-column pt-sm-3 pt-6">
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center mb-3 mb-sm-6">
                                            <!--begin::Bullet-->
                                            <span class="bullet bullet-dot bg-info me-2 h-10px w-10px"></span>
                                            <!--end::Bullet-->
                                            <!--begin::Label-->
                                            <span class="fw-bold text-gray-600 fs-6">TV Campaign</span>
                                            <!--end::Label-->
                                        </div>
                                        <!--ed::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Bullet-->
                                            <span class="bullet bullet-dot bg-success me-2 h-10px w-10px"></span>
                                            <!--end::Bullet-->
                                            <!--begin::Label-->
                                            <span class="fw-bold text-gray-600 fs-6">Radio</span>
                                            <!--end::Label-->
                                        </div>
                                        <!--ed::Item-->
                                    </div>
                                    <!--ed::Item-->
                                </div>
                                <!--ed::Items-->
                            </div>
                            <!--end::Tab pane-->
                        </div>
                        <!--end::Tab content-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Chart widget 8-->
            </div>
            <!--end::Col-->
        </div>

    </div>
    <!--end::Container-->
@endsection
