@extends('layouts.app')

@section('content')
<!--begin::Post-->
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
<div class="post fs-base d-flex flex-column-fluid" id="kt_post">

    <div id="kt_content_container" class="container-fluid">


        <div id="kt_modal_add_role">
            <!--begin::Form-->
            <form id="kt_modal_update_town" method="post" action="{{route('towns.update', $town->id)}}" enctype="multipart/form-data">
                @csrf
               @method('patch')

                <div class="card card-custom gutter-b">
                    <div class="card-header flex-wrap py-3">
                        <div class="card-title">
                            <h3 class="card-label">
                                Update Town

                            </h3>
                        </div>
                        <div class="card-toolbar">

                            <a href="{{ route('towns.index') }}" class="btn btn-sm btn-primary me-2">
                                TOWN List
                            </a>


                        </div>
                    </div>
                    <div class="card-body">
                        <!--begin: Datatable-->
                        <div class="row">
                            <div class="form-group mb-6 col-md-6">
                                <!--begin::Input group-->
                                <div class="fv-row  fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="required form-label">Town Name</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="name" class="form-control"  placeholder="Name" value="{{ $town->name }}" autocomplete="off" required>
                                    <!--end::Input-->
                                    @error('name')
                                        <div class="fv-plugins-message-container invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <!--end::Input group-->
                            </div>
                            
                            <div class="form-group mb-6 col-md-6">
                                <!--begin::Input group-->
                                <div class="fv-row  fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="required form-label">Phone Number</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="phoneNumber" class="form-control"  placeholder="Phone Number" value="{{ $town->phoneNumber }}" autocomplete="off" required>
                                    <!--end::Input-->
                                    @error('phoneNumber')
                                        <div class="fv-plugins-message-container invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <!--end::Input group-->
                            </div>
                            
                            
                            <!-- col end -->
                        </div><!-- row end -->
                        <div class="row">
                            <div class="form-group mb-6 col-md-12">
                                <!--begin::Input group-->
                                <div class="fv-row  fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="required form-label">Town Address</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="address" class="form-control"  placeholder="Town Address" value="{{ $town->address }}" autocomplete="off" required>
                                    <!--end::Input-->
                                    @error('address')
                                        <div class="fv-plugins-message-container invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!-- col end -->
                        </div><!-- row end -->
                        <div class="row">
                            <div class="form-group mb-6 col-md-6">
                                <!--begin::Input group-->
                                <div class="fv-row  fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="required form-label">Num Of Plots</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="NumOfPlots" class="form-control"  placeholder="Number Of Plots" value="{{ $town->NumOfPlots }}" autocomplete="off" required>
                                    <!--end::Input-->
                                    @error('NumOfPlots')
                                        <div class="fv-plugins-message-container invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <!--end::Input group-->
                            </div>
                            
                            <div class="form-group mb-6 col-md-6">
                                <!--begin::Input group-->
                                <div class="fv-row  fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="required form-label">Image</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="file" name="logo" class="form-control"  placeholder="logo" value="{{ $town->logo }}" autocomplete="off" required>
                                    <!--end::Input-->
                                    @error('logo')
                                        <div class="fv-plugins-message-container invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <!--end::Input group-->
                            </div>
                            
                            
                            <!-- col end -->
                        </div><!-- row end -->
                        
                    </div>

                    <div class="card-footer">

                        <!--begin::Actions-->

                        <button type="submit" class="btn btn-primary btn-sm me-2">
                          Submit
                        </button>
                        <!--end::Actions-->

                    </div><!-- card footer end -->

                </div>

            </form>
            <!--end::Form-->
        </div>



    </div>
</div>
    <script>
        $(document).ready(function() {
            $("#kt_modal_update_town").validate({
                rules: {
                    name : {
                        required: true,
                        minlength: 3
                    },
                },
                messages : {
                    name: {
                        required: "The name field is required.",
                        minlength: "Name should be at least 3 characters"
                    },
                }
            });
        });
    </script>
<!--end::Post-->
@endsection
@section('scripts_plugins')
<script src="{{ asset('metronic/plugins/global/plugins.bundle.js') }}"></script>
@endsection
