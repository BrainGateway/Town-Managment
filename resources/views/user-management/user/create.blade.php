@extends('layouts.app')

@section('content')
<!--begin::Post-->
<div class="post fs-base d-flex flex-column-fluid" id="kt_post">

    <div id="kt_content_container" class="container-fluid">


        <div id="kt_modal_add_role">
            <!--begin::Form-->
            <form id="kt_modal_add_role_form" method="post" action="{{route('users.store')}}" autocomplete="off">
                @csrf

                <div class="card card-custom gutter-b">

                    <div class="card-header flex-wrap py-3">
                        <div class="card-title">
                            <h3 class="card-label">
                                Create Users
                                <span class="d-block text-muted pt-2 font-size-sm">
                                    Create Users and manage with roles
                                </span>
                            </h3>
                        </div>
                        <div class="card-toolbar">
                            <a href="{{ route("users.index") }}" class="btn btn-sm btn-primary">
                                Users List
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <!--begin: Datatable-->
                        <div class="row">
                            <div class="form-group col-md-3">
                                <!--begin::Input group-->
                                <div class="fv-row  fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="required">First Name</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="first_name" class="form-control form-control-sm"  placeholder="First name" value="{{ old("first_name") }}" autocomplete="off">
                                    <!--end::Input-->
                                    @error('first_name')
                                        <div class="fv-plugins-message-container invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <!--end::Input group-->
                            </div><!-- col end -->
                            <div class="form-group col-md-3">
                                <!--begin::Input group-->
                                <div class="fv-row  fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="required">Last Name</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="last_name" class="form-control form-control-sm"  placeholder="Last name" value="{{ old("last_name") }}" autocomplete="off">
                                    <!--end::Input-->
                                    @error('last_name')
                                        <div class="fv-plugins-message-container invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <!--end::Input group-->
                            </div><!-- col end -->

                            <div class="form-group col-md-3">
                                <!--begin::Input group-->
                                <div class="fv-row  fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="required" for="user_email">Email</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="email" name="user_email" id="user_email" class="form-control form-control-sm" placeholder="example@domain.com" value="{{ old("user_email") }}" autocomplete="off">
                                    <div class="error text-danger d-none" id="email_error">
                                        Please enter a valid email address
                                    </div>
                                    <!--end::Input-->
                                    @error('user_email')
                                    <div class="fv-plugins-message-container invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <!--end::Input group-->
                            </div><!-- col end -->

                            <div class="form-group col-md-3">
                                <!--begin::Input group-->
                                <div class="fv-row  fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label for="password" class="required">Password</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="password" name="password" id="password" class="form-control form-control-sm" placeholder="Password" value="{{ old("password") }}" autocomplete="off">
                                    <!--end::Input-->
                                    @error('password')
                                    <div class="fv-plugins-message-container invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <!--end::Input group-->
                            </div><!-- col end -->

                            <div class="form-group col-md-3">
                                <!--begin::Input group-->
                                <div class="fv-row  fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label for="password_confirmation" class="required">Confirm Password</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control form-control-sm" placeholder="Confirm Password" value="{{ old("password_confirmation") }}" autocomplete="off">
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


                                        @forelse( $roles as $role )
                                            <div class="form-group mb-5 col-md-4">
                                                <!--begin::Input row-->
                                                <div class="d-flex fv-row">
                                                    <!--begin::Radio-->
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <!--begin::Input-->
                                                        <input class="form-check-input me-3 role_permissions" name="user_role[]" type="checkbox" value="{{ $role->id }}" id="{{ $role->name }}">
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


                    </div>

                    <div class="card-footer">

                        <!--begin::Actions-->
                        <a href="{{ route("users.index") }}" class="btn btn-secondary btn-sm me-3">
                            Discard
                        </a>
                        <button type="submit" class="btn btn-primary btn-sm">
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
@endsection
@section('scripts_plugins')
<script src="{{ asset('metronic/plugins/global/plugins.bundle.js') }}"></script>
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

    function validateForm(event) {
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
    function validateEmail(email) {
        const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }
    document.getElementById('user_email').addEventListener('keyup', validateForm);
    document.getElementById('kt_modal_add_role_form').addEventListener('submit', validateForm);
</script>
@endsection
