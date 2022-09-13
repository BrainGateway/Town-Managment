@extends('layouts.app')

@section('content')
<div class="container-fluid" id="app">

    <div class="card" id="kt_modal_add_role">
        <div class="card-header">
            <div class="card-title">Create Role</div>
            <span class="float-right mt-4">

        </div>
        <form method="POST" action="{{ route('roles.store') }}">
            @csrf
        <div class="card-body">
            <input type='hidden' id='values' name='values' />

            <div class="row">
                <div class="col-6">

                    <div class="form-group">
                        {{ Form::label('Role name', 'Role name',array('class'=>'col-form-label')) }}<span class="required"> </span>
                        {{ Form::text('name', Request::old('name'), array('class' => 'form-control form-control-sm')) }}
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                </div>
                @if( !$permissions->isEmpty() )

                                    <!--begin::Permissions-->
                                    <div class="fv-row">
                                        <!--begin::Label-->
                                        <label class="fs-5 fw-bolder form-label mb-2">
                                            Role Permissions
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Table wrapper-->
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table class="table table-striped table-row-bordered table-sm  w-100  border rounded align-middle">
                                                <!--begin::Table body-->
                                                <tbody class="text-gray-600 fw-bold">
                                                <!--begin::Table row-->
                                                <tr class="fw-bolder fs-7 fw-bolder text-gray-800 px-7" >
                                                    <td class="text-gray-800">
                                                        Administrator Access
                                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Allows a full access to the system" aria-label="Allows a full access to the system"></i></td>
                                                    <td>
                                                        <!--begin::Checkbox-->
                                                        <label class="form-check form-check-custom form-check-solid me-9">
                                                            <input class="form-check-input" type="checkbox" value="" id="kt_roles_select_all">
                                                            <span class="form-check-label" for="kt_roles_select_all">Select all</span>
                                                        </label>
                                                        <!--end::Checkbox-->
                                                    </td>
                                                </tr>
                                                <!--end::Table row-->
                                                @foreach( $permissions as $permission )
                                                    <!--begin::Table row-->
                                                    <tr class="fw-bolder fs-7 fw-bolder text-gray-800 px-7" >
                                                        <!--begin::Label-->
                                                        <td class="text-gray-800">
                                                            {{ $permission->name }}
                                                        </td>
                                                        <!--end::Label-->
                                                        <!--begin::Options-->
                                                        <td>
                                                            <!--begin::Wrapper-->
                                                            <div class="d-flex">
                                                                <!--begin::Checkbox-->
                                                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                    <input class="form-check-input permission_chk" type="checkbox" name="read[]" value="{{ $permission->name }}">
                                                                    <span class="form-check-label">Read</span>
                                                                </label>
                                                                <!--end::Checkbox-->
                                                                <!--begin::Checkbox-->
                                                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                    <input class="form-check-input permission_chk" type="checkbox" name="write[]" value="{{ $permission->name }}">
                                                                    <span class="form-check-label">Write</span>
                                                                </label>
                                                                <!--end::Checkbox-->
                                                                <!--begin::Checkbox-->
                                                                <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                                    <input class="form-check-input permission_chk" type="checkbox" name="create[]" value="{{ $permission->name }}">
                                                                    <span class="form-check-label">Create</span>
                                                                </label>
                                                                <!--end::Checkbox-->
                                                            </div>
                                                            <!--end::Wrapper-->
                                                        </td>
                                                        <!--end::Options-->
                                                    </tr>
                                                    <!--end::Table row-->
                                                @endforeach


                                                </tbody>
                                                <!--end::Table body-->
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                        <!--end::Table wrapper-->
                                    </div>
                                    <!--end::Permissions-->

                                @endif
                <div class="card-footer">

                    <button type="submit" class="btn btn-primary btn-sm ">
                       Submit

                    </button>
                </div><!-- card footer end -->
            </div>

        </div>
    </div>
    {{ Form::close() }}
</div>
@endsection
@section('scripts')
<script>
$(document).ready(function() {
    $("#kt_modal_add_role").on("change", "#kt_roles_select_all", function() {
        if (this.checked) {
            $('.permission_chk').prop('checked',true);
        } else {
            $('.permission_chk').prop('checked',false);
        }
    });
});
</script>
@endsection
