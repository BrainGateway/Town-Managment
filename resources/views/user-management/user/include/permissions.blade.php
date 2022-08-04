

{{--@if( !$permissions->isEmpty() )--}}
@if( !empty($permissions) )

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
                <tr>
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
                                    <input class="form-check-input permission_chk" type="checkbox" name="read[]" value="{{ $permission->name }}" <?php if(!empty($selectedPermissions)){ ?>{{ (in_array( $selectedRead, $selectedPermissions) ) ? "checked" : "" }}<?php } ?>>
                                    <span class="form-check-label">Read </span>
                                </label>
                                <!--end::Checkbox-->
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input permission_chk" type="checkbox" name="write[]" value="{{ $permission->name }}" <?php if(!empty($selectedPermissions)){ ?> {{ (in_array( $selectedWrite, $selectedPermissions) ) ? "checked" : "" }}<?php } ?>>
                                    <span class="form-check-label">Write </span>
                                </label>
                                <!--end::Checkbox-->
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input permission_chk" type="checkbox" name="create[]" value="{{ $permission->name }}" <?php if(!empty($selectedPermissions)){ ?> {{ (in_array( $selectedCreate, $selectedPermissions) ) ? "checked" : "" }}<?php } ?>>
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
