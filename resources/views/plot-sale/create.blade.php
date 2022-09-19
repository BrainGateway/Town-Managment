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

    <form id="kt_modal_add_sale_plot_form" method="post" action="{{ route('plot-sales.store') }}" autocomplete="off" enctype="multipart/form-data">
        @csrf
        <div class="card card-custom gutter-b">

            <div class="card-header flex-wrap py-3">
                <div class="card-title">
                    <h3 class="card-label">
                        Sale Plot
                    </h3>
                </div>
                <div class="card-toolbar">
                    <a href="{{ route('plot-sales.index') }}" class="btn btn-sm btn-primary">
                        Sold Plot List
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group mb-6 col-md-6">
                        <label class="form-label required fw-bold fs-6 ">Plot Number</label>
                        <div class="input-group mb-3">

                            <select class="ptb-0 selectpicker form-select " id="plot_number"    name="plot_number" required>
                                <option value="0" data-select2-id="select2-data-2-qxmy">Select Plot Number</option>
                                @foreach ($plots as $plot)
                                    <option @if( old('plot_number') == $plot->id) selected @endif  value="{{ $plot->id }}">{{ $plot->plot_number }}</option>
                                @endforeach
                            </select>
                            @error('plot_number')
                                <div class="fv-plugins-message-container invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group mb-6 col-md-6">
                        <!--begin::Input group-->
                        <div class="fv-row  fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="required form-label">Plot Size</label>

                            <!--end::Label-->
                            <!--begin::Input-->
                            <input class="form-control" type="size" id="plot_size" name="size" value="{{ old('size') }}" placeholder="Plot Size" required>
                            @error('size')
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
                            <label class="required form-label">Dimension</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" value="{{old('dimension')}}" id="plot_dimension" name="dimension" placeholder="Plot Dimension" class="form-control" required>
                            @error('dimension')
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
                            <label class="required form-label">Form Number</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" value="{{old('form_number')}}" name="form_number" placeholder="Enter Form Number" class="form-control" required>
                            @error('form_number')
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
                            <label class="required form-label">Plot Price</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="number" min="0" value="{{old('plot_price')}}" id="plot_price" name="plot_price" min = 0  class="form-control" required>
                            @error('plot_price')
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
                            <label class="required form-label">Discount</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="number" min="0" value="{{old('discount')}}" id="discount" name="discount" min = 0 class="form-control"  required>
                            @error('discount')
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
                            <label class="required form-label">Registration Charges</label>

                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="number" class="form-control" placeholder="Registration Charges" type="registration_charges" id="registration_charges" name="registration_charges" value="{{ old('registration_charges') }}" required>
                            @error('registration_charges')
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
                            <label class="required form-label">Deal Price</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="number" min="0" value="{{old('deal_price')}}" name="deal_price" id="deal_price" class="form-control" required>
                            @error('deal_price')
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
                            <label class="required form-label">Installments</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="number" value="{{old('installments')}}" placeholder="Number of Installments" name="installments" class="form-control" required>
                            @error('installments')
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
                            <label class="required form-label">Deal Validity</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="number" value="{{old('deal_validity')}}" placeholder="deal_validity" name="deal_validity" class="form-control" required>
                            @error('deal_validity')
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
                            <label class="required form-label">Saleman</label>

                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control" type="sale_man" id="sale_man" name="sale_man" placeholder="Saleman Name"  value="{{ old('sale_man') }}" required>
                            @error('sale_man')
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
                            <label class="required form-label">mmd</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" value="{{old('mmd')}}" name="mmd" class="form-control">
                            @error('mmd')
                                <div class="fv-plugins-message-container invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!--end::Input group-->
                    </div><!-- col end -->
                    <div class="form-group mb-6 col-md-6">
                        <div class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" value="" name ="register_only" id="flexSwitchDefault"/>
                            <label class="form-check-label" for="flexSwitchDefault">
                                Register Only
                            </label>
                        </div>
                    </div>

                    <hr class ="my-5">

                    {{-- Start Owner Form --}}
                    <div class="form-group mb-6 col-md-6">
                        <!--begin::Input group-->
                        <div class="fv-row  fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="required form-label">Customer Name</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" value="{{old('owner_name')}}" name="owner_name" placeholder="Customer Name" class="form-control" required>
                            @error('owner_name')
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
                            <label class="required form-label">Father Name</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" value="{{old('owner_father_name')}}" name="owner_father_name" placeholder="Father Name" class="form-control" required>
                            @error('owner_father_name')
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
                            <input type="text" value="{{old('owner_address')}}" name="owner_address" placeholder="Address" class="form-control" required>
                            @error('owner_address')
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
                            <label class="required form-label">Mobile Number</label>

                            <!--end::Label-->
                            <!--begin::Input-->
                            <input class="form-control" type="number"  name="owner_phone_number" placeholder="Phone Number"  value="{{ old('owner_phone_number') }}" required>
                            @error('owner_phone_number')
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
                            <label class="required form-label">CNIC</label>

                            <!--end::Label-->
                            <!--begin::Input-->
                            <input class="form-control" type="number"  name="owner_cnic" placeholder="Enter CNIC"  value="{{ old('owner_cnic') }}" required>
                            @error('owner_cnic')
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
                            <label class="required form-label">Email</label>

                            <!--end::Label-->
                            <!--begin::Input-->
                            <input class="form-control" type="email"  name="owner_email" placeholder="Enter Emial"  value="{{ old('owner_email') }}" required>
                            @error('owner_email')
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
                            <label class="required form-label">Password</label>

                            <!--end::Label-->
                            <!--begin::Input-->
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa fa-eye owner_toggle_password" aria-hidden="true"></i></span>
                                <input class="form-control" type="password" id="owner_password"  name="owner_password"  value="{{ old('owner_password') }}" required>
                            </div>
                            @error('owner_password')
                                <div class="fv-plugins-message-container invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!--end::Input group-->
                    </div><!-- col end -->

                    <div class="form-group mb-4 col-md-4">
                        <!--begin::Image input-->
                        <div class="image-input image-input-circle" data-kt-image-input="true" style="background-image: url(http://127.0.0.1:8000/media/avatars/blank.png)">
                            <!--begin::Image preview wrapper-->
                            <div class="image-input-wrapper w-125px h-125px" style="background-image: url(http://127.0.0.1:8000/media/avatars/blank.png)"></div>
                            <!--end::Image preview wrapper-->

                            <!--begin::Edit button-->
                            <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="change"
                            data-bs-toggle="tooltip"
                            data-bs-dismiss="click"
                            title="Change avatar">
                                <i class="bi bi-pencil-fill fs-7"></i>

                                <!--begin::Inputs-->
                                <input type="file" name="owner_profile_img" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="avatar_remove" />
                                <!--end::Inputs-->
                            </label>
                            <!--end::Edit button-->

                            <!--begin::Cancel button-->
                            <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="cancel"
                            data-bs-toggle="tooltip"
                            data-bs-dismiss="click"
                            title="Cancel avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Cancel button-->

                            <!--begin::Remove button-->
                            <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="remove"
                            data-bs-toggle="tooltip"
                            data-bs-dismiss="click"
                            title="Remove avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Remove button-->
                        </div>
                        <!--end::Image input-->
                    </div><!-- col end -->
                    <div class="form-group mb-4 col-md-4">
                        <!--begin::Image input-->
                        <div class="image-input " data-kt-image-input="true" style="background-image: url(http://127.0.0.1:8000/media/avatars/blank.png)">
                            <!--begin::Image preview wrapper-->
                            <div class="image-input-wrapper w-125px h-125px" style="background-image: url(http://127.0.0.1:8000/media/avatars/blank.png)"></div>
                            <!--end::Image preview wrapper-->

                            <!--begin::Edit button-->
                            <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="change"
                            data-bs-toggle="tooltip"
                            data-bs-dismiss="click"
                            title="Change avatar">
                                <i class="bi bi-pencil-fill fs-7"></i>

                                <!--begin::Inputs-->
                                <input type="file" name="owner_cnic_front_img" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="avatar_remove" />
                                <!--end::Inputs-->
                            </label>
                            <!--end::Edit button-->

                            <!--begin::Cancel button-->
                            <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="cancel"
                            data-bs-toggle="tooltip"
                            data-bs-dismiss="click"
                            title="Cancel avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Cancel button-->

                            <!--begin::Remove button-->
                            <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="remove"
                            data-bs-toggle="tooltip"
                            data-bs-dismiss="click"
                            title="Remove avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Remove button-->
                        </div>
                        <!--end::Image input-->
                    </div><!-- col end -->
                    <div class="form-group mb-4 col-md-4">
                        <!--begin::Image input-->
                        <div class="image-input" data-kt-image-input="true" style="background-image: url(http://127.0.0.1:8000/media/avatars/blank.png)">
                            <!--begin::Image preview wrapper-->
                            <div class="image-input-wrapper w-125px h-125px" style="background-image: url(http://127.0.0.1:8000/media/avatars/blank.png)"></div>
                            <!--end::Image preview wrapper-->

                            <!--begin::Edit button-->
                            <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="change"
                            data-bs-toggle="tooltip"
                            data-bs-dismiss="click"
                            title="Change avatar">
                                <i class="bi bi-pencil-fill fs-7"></i>

                                <!--begin::Inputs-->
                                <input type="file" name="owner_cnic_back_img" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="avatar_remove" />
                                <!--end::Inputs-->
                            </label>
                            <!--end::Edit button-->

                            <!--begin::Cancel button-->
                            <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="cancel"
                            data-bs-toggle="tooltip"
                            data-bs-dismiss="click"
                            title="Cancel avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Cancel button-->

                            <!--begin::Remove button-->
                            <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="remove"
                            data-bs-toggle="tooltip"
                            data-bs-dismiss="click"
                            title="Remove avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Remove button-->
                        </div>
                        <!--end::Image input-->
                    </div><!-- col end -->
                    {{-- End Owner --}}

                    <hr class ="my-5">
                    {{-- Start Nominee Form --}}
                    <div class=" form-group mb-6 col-md-6">
                        <!--begin::Input group-->
                        <div class="fv-row  fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="required form-label">Nominee Name</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" value="{{old('nominee_name')}}" name="nominee_name" placeholder="Enter Name" class="form-control" required>
                            @error('nominee_name')
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
                            <label class="required form-label">Father Name</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" value="{{old('nominee_father_name')}}" name="nominee_father_name" placeholder="Father Name" class="form-control" required>
                            @error('nominee_father_name')
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
                            <input type="text" value="{{old('nominee_address')}}" name="nominee_address" placeholder="Address" class="form-control" required>
                            @error('nominee_address')
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
                            <label class="required form-label">Mobile Number</label>

                            <!--end::Label-->
                            <!--begin::Input-->
                            <input class="form-control" type="number"  name="nominee_phone_number" placeholder="Phone Number"  value="{{ old('nominee_phone_number') }}" required>
                            @error('nominee_phone_number')
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
                            <label class="required form-label">CNIC</label>

                            <!--end::Label-->
                            <!--begin::Input-->
                            <input class="form-control" type="number"  name="nominee_cnic" placeholder="Enter CNIC" value="{{ old('nominee_cnic') }}" required>
                            @error('nominee_cnic')
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
                            <label class="required form-label">Email</label>

                            <!--end::Label-->
                            <!--begin::Input-->
                            <input class="form-control" type="email"  name="nominee_email" placeholder="Enter Email" value="{{ old('nominee_email') }}" required>
                            @error('nominee_email')
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
                            <label class="required form-label">Password</label>

                            <!--end::Label-->
                            <!--begin::Input-->
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa fa-eye nominee_toggle_password" aria-hidden="true"></i></span>
                                <input class="form-control" type="password" id="nominee_password"  name="nominee_password"  value="{{ old('nominee_password') }}" required>
                            </div>
                            @error('nominee_password')
                                <div class="fv-plugins-message-container invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!--end::Input group-->
                    </div><!-- col end -->
                    <div class="form-group mb-4 col-md-4">
                        <!--begin::Image input-->
                        <div class="image-input image-input-circle" data-kt-image-input="true" style="background-image: url(http://127.0.0.1:8000/media/avatars/blank.png)">
                            <!--begin::Image preview wrapper-->
                            <div class="image-input-wrapper w-125px h-125px" style="background-image: url(http://127.0.0.1:8000/media/avatars/blank.png)"></div>
                            <!--end::Image preview wrapper-->

                            <!--begin::Edit button-->
                            <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="change"
                            data-bs-toggle="tooltip"
                            data-bs-dismiss="click"
                            title="Change avatar">
                                <i class="bi bi-pencil-fill fs-7"></i>

                                <!--begin::Inputs-->
                                <input type="file" name="nominee_profile_img" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="avatar_remove" />
                                <!--end::Inputs-->
                            </label>
                            <!--end::Edit button-->

                            <!--begin::Cancel button-->
                            <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="cancel"
                            data-bs-toggle="tooltip"
                            data-bs-dismiss="click"
                            title="Cancel avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Cancel button-->

                            <!--begin::Remove button-->
                            <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="remove"
                            data-bs-toggle="tooltip"
                            data-bs-dismiss="click"
                            title="Remove avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Remove button-->
                        </div>
                        <!--end::Image input-->
                    </div><!-- col end -->
                    <div class="form-group mb-4 col-md-4">
                        <!--begin::Image input-->
                        <div class="image-input " data-kt-image-input="true" style="background-image: url(http://127.0.0.1:8000/media/avatars/blank.png)">
                            <!--begin::Image preview wrapper-->
                            <div class="image-input-wrapper w-125px h-125px" style="background-image: url(http://127.0.0.1:8000/media/avatars/blank.png)"></div>
                            <!--end::Image preview wrapper-->

                            <!--begin::Edit button-->
                            <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="change"
                            data-bs-toggle="tooltip"
                            data-bs-dismiss="click"
                            title="Change avatar">
                                <i class="bi bi-pencil-fill fs-7"></i>

                                <!--begin::Inputs-->
                                <input type="file" name="nominee_cnic_front_img" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="avatar_remove" />
                                <!--end::Inputs-->
                            </label>
                            <!--end::Edit button-->

                            <!--begin::Cancel button-->
                            <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="cancel"
                            data-bs-toggle="tooltip"
                            data-bs-dismiss="click"
                            title="Cancel avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Cancel button-->

                            <!--begin::Remove button-->
                            <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="remove"
                            data-bs-toggle="tooltip"
                            data-bs-dismiss="click"
                            title="Remove avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Remove button-->
                        </div>
                        <!--end::Image input-->
                    </div><!-- col end -->
                    <div class="form-group mb-4 col-md-4">
                        <!--begin::Image input-->
                        <div class="image-input" data-kt-image-input="true" style="background-image: url(http://127.0.0.1:8000/media/avatars/blank.png)">
                            <!--begin::Image preview wrapper-->
                            <div class="image-input-wrapper w-125px h-125px" style="background-image: url(http://127.0.0.1:8000/media/avatars/blank.png)"></div>
                            <!--end::Image preview wrapper-->

                            <!--begin::Edit button-->
                            <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="change"
                            data-bs-toggle="tooltip"
                            data-bs-dismiss="click"
                            title="Change avatar">
                                <i class="bi bi-pencil-fill fs-7"></i>

                                <!--begin::Inputs-->
                                <input type="file" name="nominee_cnic_back_img" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="avatar_remove" />
                                <!--end::Inputs-->
                            </label>
                            <!--end::Edit button-->

                            <!--begin::Cancel button-->
                            <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="cancel"
                            data-bs-toggle="tooltip"
                            data-bs-dismiss="click"
                            title="Cancel avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Cancel button-->

                            <!--begin::Remove button-->
                            <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="remove"
                            data-bs-toggle="tooltip"
                            data-bs-dismiss="click"
                            title="Remove avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Remove button-->
                        </div>
                        <!--end::Image input-->
                    </div><!-- col end -->
                    {{-- End Nominee --}}



                </div>

                <div class="card-footer">

                    <!--begin::Actions-->
                    <a href="{{ route('plot-sales.index') }}" class="btn btn-secondary btn-sm me-3">
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
            $("#kt_modal_add_sale_plot_form").validate({
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

