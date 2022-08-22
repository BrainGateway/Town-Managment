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

    <form id="kt_modal_add_plot_type_form" method="post" action="{{ route('plot-types.store') }}" autocomplete="off" enctype="multipart/form-data">
        @csrf
        <div class="card card-custom gutter-b">

            <div class="card-header flex-wrap py-3">
                <div class="card-title">
                    <h3 class="card-label">
                        Create Plot Type
                    </h3>
                </div>
                <div class="card-toolbar">
                    <a href="{{ route('plot-types.index') }}" class="btn btn-sm btn-primary">
                        Plot Types List
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="form-group mb-12 col-md-12">
                        <!--begin::Input group-->
                        <div class="fv-row  fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="required form-label">Plot Type</label>
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

                </div>

                <div class="card-footer">

                    <!--begin::Actions-->
                    <a href="{{ route('plot-types.index') }}" class="btn btn-secondary btn-sm me-3">
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
            $("#kt_modal_add_plot_type_form").validate({
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
@endsection

