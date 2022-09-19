@extends('layouts.app')

@section('content')
<!--begin::Post-->
<div class="post fs-base d-flex flex-column-fluid" id="kt_post">

    <div id="kt_content_container" class="container-fluid">


        <div id="kt_modal_add_role">
            <!--begin::Form-->
            <form id="kt_modal_add_role_form" method="post" action="{{route('users.update', $user->id)}}">
                @csrf
                <input name="_method" type="hidden" value="PUT">

                <div class="card card-custom gutter-b">
                    <div class="card-header flex-wrap py-3">
                        <div class="card-title">
                            <h3 class="card-label">
                                Update Users
                                <span class="d-block text-muted pt-2 font-size-sm">
                                    Update Users and manage with roles
                                </span>
                            </h3>
                        </div>
                        <div class="card-toolbar">
                            @can("User=read")
                            <a href="{{ route("users.index") }}" class="btn btn-sm btn-primary me-2">
                                Users List
                            </a>
                            @endcan
                            @can("Change Password=create")
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#changePassword">
                                Change Password
                            </button>
                            @endcan
                        </div>
                    </div>
                    <div class="card-body">
                        <!--begin: Datatable-->


                               <div class="form-group col-md-12">
                                <div class="row">
                                        <!--begin::Input group-->
                                        <div class="form-group col-md-4">
                                            <!--begin::Label-->
                                            <label class="required">First Name</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="first_name" class="form-control form-control-sm" placeholder="first name" value="{{ old("first_name", $user->first_name) }}">
                                            <!--end::Input-->
                                            @error('first_name')
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <!--begin::Label-->
                                            <label class="required">Last Name</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="last_name" class="form-control form-control-sm" placeholder="Last name" value="{{ old("last_name", $user->last_name) }}">
                                            <!--end::Input-->
                                            @error('last_name')
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <!--begin::Input group-->
                                            <div class="fv-row fv-plugins-icon-container">
                                                <!--begin::Label-->
                                                <label class="required" for="user_email">Email</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="email" name="user_email" id="user_email" class="form-control form-control-sm" placeholder="example@domain.com" value="{{ old("user_email", $user->email) }}">

                                                <div class="error text-danger d-none" id="email_error">
                                                    Please enter a valid email address
                                                </div><!--end::Input-->
                                                @error('user_email')
                                                <div class="fv-plugins-message-container invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <!--end::Input group-->
                                        </div><!-- col end -->
                                        <!--end::Input group-->
                                    </div><!-- col end -->





                        </div><!-- row end -->

                        <div class="row">

                            <div class="form-group mb-5 col-md-12">
                                <!--begin::Input group-->
                                <div class="mb-7">
                                    <!--begin::Label-->
                                    <label class="required fw-bold fs-6 mb-5">Role</label>
                                    @error('user_role')
                                        <div class="fv-plugins-message-container invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                <!--end::Label-->
                                    <!--begin::Roles-->

                                    <div class="row row-cols-1 row-cols-md-3 row-cols-xl-5">

                                        @php
                                            $selectedRoles = $user->roles->pluck("name")->toArray();
                                        @endphp
                                        <div class="form-group mb-5 col-md-4">
                                            <!--begin::Input row-->
                                            <div class="d-flex fv-row">
                                                <!--begin::Radio-->
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <!--begin::Input-->
                                                    <input class="form-check-input me-3 role_permissions" name="user_role[]" type="checkbox" value="only_permissions" id="only_permissions" @if( count($selectedRoles) < 0 || empty($selectedRoles) )  checked  @endif>
                                                    <!--end::Input-->
                                                    <!--begin::Label-->
                                                    <label class="form-check-label" for="only_permissions">
                                                        <div class="fw-bolder text-gray-800">
                                                            Only Permissions
                                                        </div>
                                                        <div class="text-gray-600">
                                                            Get only permissions without the Roles
                                                        </div>
                                                    </label>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Radio-->
                                            </div>
                                            <!--end::Input row-->
                                        </div><!-- col end -->

                                        @forelse( $roles as $role )
                                            <div class="form-group mb-5 col-md-4">
                                                <!--begin::Input row-->
                                                <div class="d-flex fv-row">
                                                    <!--begin::Radio-->
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <!--begin::Input-->
                                                        <input class="form-check-input me-3" name="user_role[]" type="checkbox" value="{{ $role->id }}" id="{{ $role->name }}" {{ (in_array($role->name, $selectedRoles)) ? "checked" : "" }}>
                                                        <!--end::Input-->
                                                        <!--begin::Label-->
                                                        <label class="form-check-label" for="{{ $role->name }}">
                                                            <div class="fw-bolder text-gray-800">
                                                                {{ $role->name }}
                                                            </div>
                                                            <div class="text-gray-600">
                                                                {{ $role->detail }}
                                                            </div>
                                                        </label>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!--end::Radio-->
                                                </div>
                                                <!--end::Input row-->
                                            </div><!-- col end -->
                                        @empty
                                            No Roles found
                                        @endforelse

                                    </div><!-- row end -->


                                    <!--end::Roles-->
                                </div>
                                <!--end::Input group-->
                            </div><!-- col end -->

                        </div><!-- row end -->

                        <div class="row">

                            <div class="form-group mb-5 col-md-12">
                                <!--begin::Input group-->
                                <div class="mb-7">

                                    <div id="permissions-con">
                                        @include("user-management.user.include.permissions", compact("permissions", "selectedPermissions"))

                                    </div>

                                </div>
                                <!--end::Input group-->
                            </div><!-- col end -->

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
<!-- Modal-->
    <div class="modal fade" id="changePassword" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header m-0 pb-0">
                    <h5 class="modal-title" id=""> Change Password </h5>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <span class="svg-icon svg-icon-1">
                            <i class="fa fa-times"></i>
                        </span>
                    </div>
                </div>

                <div class="modal-body scroll-y">

                    <div class="bg-danger text-white flex flex-center mb-3 p-3 d-none" id="change-password-error">

                    </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <!--begin::Input group-->
                                <div class="fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label for="password" class="required">Password</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="password" name="password" id="password" class="form-control form-control-sm" placeholder="Password" value="{{ old("password") }}">
                                    <!--end::Input-->
                                    @error('password')
                                    <div class="fv-plugins-message-container invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <!--end::Input group-->
                            </div><!-- col end -->

                            <div class="form-group col-md-4">
                                <!--begin::Input group-->
                                <div class="fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label for="password_confirmation" class="required">Confirm Password</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control form-control-sm" placeholder="Confirm Password" value="{{ old("password_confirmation") }}">
                                    <!--end::Input-->
                                    @error('password_confirmation')
                                    <div class="fv-plugins-message-container invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <!--end::Input group-->
                            </div><!-- col end -->
                        </div><!-- row end -->

                        <div class="block mt-5">

                            <!--begin::Actions-->
                            <button class="btn btn-secondary btn-sm" data-bs-dismiss="modal">
                                Cancel
                            </button>
                            <button type="button" class="btn btn-primary change-password btn-sm me-2" data-user="{{ $user->id }}">
                               change password
                            </button>
                            <!--end::Actions-->

                        </div><!-- row end -->


                </div>
            </div>
        </div>
    </div>
<!--end::Post-->
@endsection
@section('scripts')
<script src="{{ asset('metronic/plugins/global/plugins.bundle.js') }}"></script>
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

    function getWarehouses( url, sendData ){

        if( sendData !== "" && url !== "" ){
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 'X-Requested-With': 'XMLHttpRequest'},
                url: url,
                type: "GET",
                data: sendData,
                success: function(data) {
                    var html = '';
                    for (var i = 0; i < data.length; i++) {
                        var warehouseId = data[i].id;
                        var warehouseTitle = data[i].title;
                        html += '<option value="'+warehouseId+'">' + warehouseTitle + '</option>';
                    }
                    $('#user_warehouses').html(html);
                }
            });
        } else {
            alert("No any country found.");
        }
    }


    let roleElement = document.getElementsByName("user_role[]");
    for (var i=0, l=roleElement.length; i<l; i++) {
        roleElement[i].addEventListener('change', getPermissions, false);
    }
    function getPermissions(e) {

        /*const roleId = e.target.value,
            showPermissionsList = document.getElementById("permissions-con"),
            sendData = `id=${roleId}`,
            url = "{{ route("get-permissions-by-role") }}";*/


        var currentRoleVal = e.target.value,
            roleId = "",
            roleIdsArr = [],
            sendData = "",
            roleCheckedElements = document.querySelectorAll("input[name='user_role[]']:checked");

        const showPermissionsList = document.getElementById("permissions-con"),
            url = "{{ route("get-permissions-by-role") }}";

        if( currentRoleVal != "only_permissions" ) {

            document.getElementById("only_permissions").checked = false;
            for (let checkbox of roleCheckedElements) {
                if (checkbox.checked) {
                    roleIdsArr.push(checkbox.value);
                }
            }

            // roleIdsArr.splice(roleIdsArr.indexOf('only_permissions'), 1);
            sendData = `id=${roleIdsArr}`;

        } // Role If Condition

        if( currentRoleVal == "only_permissions" && e.target.checked == true ) {

            for (let checkbox of roleCheckedElements) {
                if (checkbox.checked && checkbox.value !== "only_permissions") {
                    checkbox.checked = false;
                }
            }
            roleId = e.target.value;
            sendData = `id=${roleId}`;

        } // Only Permission If Condition

        if( sendData != "" ) {

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'X-Requested-With': 'XMLHttpRequest'
                },
                url: url,
                type: "POST",
                data: sendData,
                success: function (data) {
                    showPermissionsList.innerHTML = data;
                }
            });

        }

    }

    function validateForm(event)
    {
        var email = document.getElementById('user_email');

        if(!validateEmail(email.value)) {
            document.getElementById('email_error').classList.remove('d-none');
            event.preventDefault();
            return false;
        } else {
            document.getElementById('email_error').classList.add('d-none');
            return true;
        }
    }
    document.getElementById('user_email').addEventListener('keyup', validateForm);
    document.getElementById('kt_modal_add_role_form').addEventListener('submit', validateForm);



    $(".modal-body").on("click", ".change-password", function () {

        let deleteId = $(this).attr("data-user"),
            changePassUrl = "{{route('update-password', ":id")}}",
            password = document.getElementById("password"),
            passwordConfirmation = document.getElementById("password_confirmation"),
            userEmail = document.getElementById("user_email"),
            data = {
                "user_email": userEmail.value,
                "password": password.value,
                "password_confirmation": passwordConfirmation.value,
            },
            errorBlock = document.getElementById("change-password-error");

        changePassUrl = changePassUrl.replace(':id', deleteId);
        errorBlock.classList.add("d-none");

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 'X-Requested-With': 'XMLHttpRequest'},
            url: changePassUrl,
            type: "PATCH",
            data: data,
            success: function(data) {

                if( data.code == 0 ) {
                    password.value = "";
                    password_confirmation.value = "";
                    Swal.fire(
                        'Password Changed',
                        data.message,
                        'success'
                    );
                } else {
                    Swal.fire(
                        'Password Not Changed',
                        data.message,
                        'error'
                    );
                }
            },
            error: function (data) {

                errorBlock.classList.remove("d-none");
                errorBlock.innerHTML = "";
                if( data.responseJSON.errors.user_email && data.responseJSON.errors.user_email != "" ){
                    errorBlock.innerHTML += `<p>${data.responseJSON.errors.user_email}</p>`;
                }
                if( data.responseJSON.errors.password && data.responseJSON.errors.password != "" ){
                    errorBlock.innerHTML += `<p>${data.responseJSON.errors.password}</p>`;
                }
            }
        });

    });

    function validateEmail(email) {
        const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }
</script>

@endsection
