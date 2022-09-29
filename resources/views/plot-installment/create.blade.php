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

    <form id="kt_modal_add_plot_form" method="post" action="{{ route('installments.store') }}" autocomplete="off" enctype="multipart/form-data">
        @csrf
        <div class="card card-custom gutter-b">

            <div class="card-header flex-wrap py-3">
                <div class="card-title">
                    <h3 class="card-label">
                        Create Plot
                    </h3>
                </div>
                <div class="card-toolbar">
                    <a href="{{ route('installments.index') }}" class="btn btn-sm btn-primary">
                        Plots Installments
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group mb-4 col-md-4">
                        <!--begin::Input group-->
                        <div class="fv-row  fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="required form-label">Plot Number</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" value="{{old('plot_number')}}" name="plot_number" class="form-control" required>
                            @error('plot_number')
                                <div class="fv-plugins-message-container invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!--end::Input group-->
                    </div><!-- col end -->
                    <div class="form-group mb-4 col-md-4">
                        <!--begin::Input group-->
                        <div class="fv-row  fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="required form-label">Owner Name</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" value="{{old('plot_owner')}}" name="plot_owner" class="form-control" required>
                            @error('plot_owner')
                                <div class="fv-plugins-message-container invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!--end::Input group-->
                    </div><!-- col end -->
                    <div class="form-group mb-4 col-md-4">
                        <!--begin::Input group-->
                        <div class="fv-row  fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="required form-label">Deal Amount</label>

                            <!--end::Label-->
                            <!--begin::Input-->
                            <input class="form-control" type="deal_amount" id="deal_amount" name="deal_amount" min="1" max="180" value="{{ old('deal_amount') }}" required>
                            @error('deal_amount')
                                <div class="fv-plugins-message-container invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!--end::Input group-->
                    </div><!-- col end -->
                    <div class="form-group mb-4 col-md-4">
                        <!--begin::Input group-->
                        <div class="fv-row  fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="required form-label">Payment Type</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" value="{{old('payment_type')}}" name="payment_type" class="form-control" required>
                            @error('payment_type')
                                <div class="fv-plugins-message-container invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!--end::Input group-->
                    </div><!-- col end -->

                    <div class="form-group mb-4 col-md-4">
                        <!--begin::Input group-->
                        <div class="fv-row  fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="required form-label">Already Paid</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" value="{{old('paid_amount')}}" name="paid_amount" class="form-control" required>
                            @error('paid_amount')
                                <div class="fv-plugins-message-container invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!--end::Input group-->
                    </div><!-- col end -->
                    <div class="form-group mb-4 col-md-4">
                        <!--begin::Input group-->
                        <div class="fv-row  fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="required form-label">Deposit Amount</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" value="{{old('deposit_amount')}}" name="deposit_amount" class="form-control" required>
                            @error('deposit_amount')
                                <div class="fv-plugins-message-container invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!--end::Input group-->
                    </div><!-- col end -->
                    <div class="form-group mb-4 col-md-4">
                        <!--begin::Input group-->
                        <div class="fv-row  fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="required form-label">Remaining Amount</label>

                            <!--end::Label-->
                            <!--begin::Input-->
                            <input class="form-control" type="remaining_amount" id="remaining_amount" name="remaining_amount" min="1" max="180" value="{{ old('remaining_amount') }}" required>
                            @error('remaining_amount')
                                <div class="fv-plugins-message-container invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!--end::Input group-->
                    </div><!-- col end -->
                    <div class="form-group mb-4 col-md-4">
                        <!--begin::Input group-->
                        <div class="fv-row  fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="required form-label">Slip Number</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" value="{{old('slip_number')}}" name="slip_number" class="form-control" required>
                            @error('slip_number')
                                <div class="fv-plugins-message-container invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!--end::Input group-->
                    </div><!-- col end -->
                    <div class="form-group mb-4 col-md-4">
                        <!--begin::Input group-->
                        <div class="fv-row  fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="required form-label">Auto Generated Number</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" value="{{old('auto_number')}}" name="auto_number" class="form-control" required>
                            @error('auto_number')
                                <div class="fv-plugins-message-container invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!--end::Input group-->
                    </div><!-- col end -->
                    <div class="form-group mb-4 col-md-4">
                        <!--begin::Input group-->
                        <div class="fv-row  fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="required form-label">Payment Method</label>

                            <!--end::Label-->
                            <!--begin::Input-->
                            <input class="form-control" type="payment_method" id="payment_method" name="payment_method" min="1" max="180" value="{{ old('payment_method') }}" required>
                            @error('payment_method')
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
                    <a href="{{ route('installments.index') }}" class="btn btn-secondary btn-sm me-3">
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
            $("#kt_modal_add_plot_form").validate({
              rules: {
                plot_number : {
                    required: true,
                },
                plot_type : {
                    required: true,
                },
                size : {
                    required: true,
                },
                dimension : {
                    required: true,
                },

              },
              messages : {
                plot_number: {
                    required: "The name field is required.",
                },
                plot_type: {
                    required: "The description field is required.",
                },
                size: {
                    required: "The short code field is required.",
                },
                dimension: {
                    required: "The minimum time required field is required.",
                },
              }
            });
        });

    </script>
@endsection

