@extends('layouts.app')

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    {{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>  --}}



<style>

    label.error {
        color: #F1416C;
        margin-top: 5px;
    }

    input.error {
        border: 1px dashed #F1416C;
        color: #F1416C;
    }
    </style>

<div class="container-fluid" id="app">

    <form id="kt_modal_add_test_form" method="post" action="{{ route('towns.store') }}" autocomplete="off" enctype="multipart/form-data">
        @csrf
        <div class="card card-custom gutter-b">

            <div class="card-header flex-wrap py-3">
                <div class="card-title">
                    <h3 class="card-label">
                        Create Town
                    </h3>
                </div>
                <div class="card-toolbar">
                    <a href="{{ route('towns.index') }}" class="btn btn-sm btn-primary">
                        Towns List
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="form-group mb-6 col-md-6">
                        <!--begin::Input group-->
                        <div class="fv-row  fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="required form-label">Town Name</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" value="{{old('name')}}" name="name" class="form-control" required>
                            @error('name')
                                <div class="fv-plugins-message-container invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!--end::Input group-->
                    </div><!-- col end -->
                    <div class="form-group mb-6 col-md-6">
                        <!--begin::Input group-->
                        <div class="fv-row  fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="required form-label">phoneNumber</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" value="{{old('phoneNumber')}}" name="phoneNumber" class="form-control" required>
                            @error('phoneNumber')
                                <div class="fv-plugins-message-container invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!--end::Input group-->
                    </div><!-- col end -->
                    <div class="form-group mb-6 col-md-12">
                        <!--begin::Input group-->
                        <div class="fv-row  fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="required form-label">Address</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" value="{{old('address')}}" name="address" class="form-control" required>
                            @error('address')
                                <div class="fv-plugins-message-container invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!--end::Input group-->
                    </div><!-- col end -->
                    <div class="form-group mb-6 col-md-6">
                        <!--begin::Input group-->
                        <div class="fv-row  fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="required form-label">Number Of Plots</label>

                            <!--end::Label-->
                            <!--begin::Input-->
                            <input class="form-control" type="number" id="NumOfPlots" name="NumOfPlots" min="1" max="180" value="{{ old('NumOfPlots') }}" required>
                            @error('NumOfPlots')
                                <div class="fv-plugins-message-container invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!--end::Input group-->
                    </div><!-- col end -->
                    
                
                    <div class="form-group mb-6 col-md-6">
                        <!--begin::Input group-->
                        <div class="fv-row  fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="required form-label">logo</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="file" value="{{old('logo')}}" name="logo" class="form-control" required>
                            @error('logo')
                                <div class="fv-plugins-message-container invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!--end::Input group-->
                    </div><!-- col end -->

                    

                    
                </div>

                <div class="card-footer">

                    <!--begin::Actions-->
                    <a href="{{ route('towns.index') }}" class="btn btn-secondary btn-sm me-3">
                        Discard
                    </a>
                    <button type="submit" class="btn btn-primary btn-sm">
                       Submit
                    </button>
                    <!--end::Actions-->

                </div><!-- card footer end -->
            </form>
            {{--  @include('adminPartials.error')  --}}
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#kt_modal_add_test_form").validate({
              rules: {
                name : {
                    required: true,
                    minlength: 3
                },
                phoneNumber : {
                    required: true,
                    minlength: 11
                },
                NumOfPlots : {
                    required: true,
                    minlength: 3
                },
                address : {
                    required: true,
                    rangelength: [1, 280]
                },
                logo : {
                    required: true,
                },
                
              },
              messages : {
                name: {
                    required: "The name field is required.",
                    minlength: "Name should be at least 3 characters"
                },
                phoneNumber: {
                    required: "The description field is required.",
                    minlength: "Name should be at least 11 characters"
                },
                NumOfPlots: {
                    required: "The short code field is required.",
                    minlength: "Name should be at least 3 characters or numbers"
                },
                address: {
                    required: "The minimum time required field is required.",
                    minlength: "Please enter a value less than or equal to 280."
                },
                logo: {
                    required: "The icon field is required.",
                },
                
              }
            });
        });

    </script>
@endsection

