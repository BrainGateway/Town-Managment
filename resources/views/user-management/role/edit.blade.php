@extends('layouts.app')

@section('content')
<!--begin::Post-->
<div class="post fs-base d-flex flex-column-fluid" id="kt_post">

<!--begin::Container-->
    <div id="kt_content_container" class="container-fluid">

        <div id="kt_modal_add_role">
            <!--begin::Form-->
            <form id="kt_modal_add_role_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{ route("roles.update", $role->id) }}" method="POST">
                @csrf
                <input name="_method" type="hidden" value="PUT">

            <!--begin::Card-->
                <div class="card card-custom gutter-b">
                    <div class="card-header flex-wrap py-3">
                        <div class="card-title">
                            <h3 class="card-label">
                                Update Role

                            </h3>
                        </div>
                    </div>

                    <div class="card-body">


                        <!--begin::Scroll-->
                        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_role_scroll">
                            <!--begin::Input group-->
                            <div class="fv-row mb-10 fv-plugins-icon-container">
                                <!--begin::Label-->
                                <label for="role_name" class="fs-5 fw-bolder form-label mb-2">
                                    <span class="required">Role name</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input class="form-control form-control-sm" placeholder="Enter a role name" name="name" id="role_name" value="{{ $role->name }}">
                                <!--end::Input-->
                                @error('name')
                                <div class="fv-plugins-message-container invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <!--end::Input group-->

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
                                            @php
                                                $selectedRead = $permission->name."_read";
                                                $selectedCreate = $permission->name."_create";
                                                $selectedWrite = $permission->name."_write";
                                            @endphp

                                            <!--begin::Table row-->
                                            <tr>
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
                                                            <input class="form-check-input permission_chk" type="checkbox" name="read[]" value="{{ $permission->name }}" {{ (in_array( $selectedRead, $selectedPermissions) ) ? "checked" : "" }}>
                                                            <span class="form-check-label">Read </span>
                                                        </label>
                                                        <!--end::Checkbox-->
                                                        <!--begin::Checkbox-->
                                                        <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                            <input class="form-check-input permission_chk" type="checkbox" name="write[]" value="{{ $permission->name }}" {{ (in_array( $selectedWrite, $selectedPermissions) ) ? "checked" : "" }}>
                                                            <span class="form-check-label">Write </span>
                                                        </label>
                                                        <!--end::Checkbox-->
                                                        <!--begin::Checkbox-->
                                                        <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input permission_chk" type="checkbox" name="create[]" value="{{ $permission->name }}" {{ (in_array( $selectedCreate, $selectedPermissions) ) ? "checked" : "" }}>
                                                            <span class="form-check-label">Create </span>
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

                        </div>
                        <!--end::Scroll-->

                    </div><!-- cart body end -->
                    <div class="card-footer">


                        <button type="submit" class="btn btn-sm btn-primary" data-kt-roles-modal-action="submit">

                            Update
                        </button>
                        <!--end::Actions-->

                    </div><!-- card footer end -->

                </div>
                <!--end::Card-->


            </form>
            <!--end::Form-->
        </div>

    </div>
    <!--end::Container-->

</div>
<!--end::Post-->
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
