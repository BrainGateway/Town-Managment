@extends('layouts.app')
@section('content')
<div class="post fs-base d-flex flex-column-fluid" id="kt_post">

    <div id="kt_content_container" class="container-fluid">
        <div class="d-flex flex-column flex-xl-row">
            <!--begin::Sidebar-->
            <div class="flex-column flex-lg-row-auto w-100 w-lg-300px mb-10">
                <!--begin::Card-->
                <div class="card card-flush">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2 class="mb-0">
                                {{ $role->name }}
                            </h2>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    @if( !$role->permissions->isEmpty() )
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Permissions-->
                            <div class="d-flex flex-column text-gray-600">

                                @forelse( $role->permissions as $permission )
                                    <div class="d-flex align-items-center py-2">
                                        <span class="bullet bg-primary me-3"></span>
                                        {{ $permission->name }}
                                    </div>
                                @empty

                                    <div class="fv-plugins-message-container invalid-feedback">
                                        Permissions not found
                                    </div>
                                @endforelse

                            </div>
                            <!--end::Permissions-->
                        </div>
                        <!--end::Card body-->
                    @endif
                    <!--begin::Card footer-->
                    <div class="card-footer pt-0">
                        @can("Role=write")
                        <a href="{{ route("roles.edit", $role->id) }}" class="btn btn-light btn-active-primary">
                            Edit Role
                        </a>
                        @endcan
                    </div>
                    <!--end::Card footer-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Sidebar-->
            <!--begin::Content-->
            <div class="flex-lg-row-fluid ms-lg-10">
                <!--begin::Card-->
                <div class="card card-flush mb-6 mb-xl-9">
                    <!--begin::Card header-->
                    <div class="card-header pt-5">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2 class="d-flex align-items-center">Users Assigned
                                <span class="text-gray-600 fs-6 ms-1"></span>
                            </h2>
                        </div>
                        <!--end::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Group actions-->
                            <div class="d-flex justify-content-end align-items-center d-none" data-kt-view-roles-table-toolbar="selected">
                                <div class="fw-bolder me-5">
                                    <span class="me-2" data-kt-view-roles-table-select="selected_count">5</span>
                                    Selected
                                </div>
                                <button type="button" class="btn btn-danger" data-kt-view-roles-table-select="delete_selected">
                                    Delete Selected
                                </button>
                            </div>
                            <!--end::Group actions-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">

                        @if( !$getUsers->isEmpty() )
                            <!--begin::Table-->
                            <div id="kt_roles_view_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0 dataTable no-footer" id="kt_roles_view_table" role="grid">
                                        <!--begin::Table head-->
                                        <thead>
                                        <!--begin::Table row-->
                                        <tr class="fw-bolder fs-7 fw-bolder text-gray-800 px-7" role="row">
                                            <th class="min-w-50px sorting" tabindex="0" aria-controls="kt_roles_view_table" rowspan="1" colspan="1" aria-label="ID: activate to sort column ascending" style="width: 78.1562px;">ID</th>
                                            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_roles_view_table" rowspan="1" colspan="1" aria-label="User: activate to sort column ascending" style="width: 308.016px;">User</th>
                                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_roles_view_table" rowspan="1" colspan="1" aria-label="Joined Date: activate to sort column ascending" style="width: 183.609px;">Joined Date</th>
                                            <!-- <th class="text-end min-w-100px sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 134.469px;">Actions</th> -->
                                        </tr>
                                        <!--end::Table row-->
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody class="fw-bold text-gray-600">

                                        @foreach( $getUsers as $user )
                                            <tr class="odd">
                                                <!--begin::ID-->
                                                <td>
                                                    {{ $user->id }}
                                                </td>
                                                <!--begin::ID-->
                                                <!--begin::User=-->
                                                <td class="d-flex align-items-center">
                                                    <!--begin:: Avatar -->
                                                    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                        @can("User=write")
                                                        <a href="{{ route("users.edit", $user->id) }}">
                                                            <div class="symbol-label fs-3 bg-light-danger text-danger">
                                                                {{ mb_substr($user->first_name, 0, 1) }}
                                                            </div>
                                                        </a>
                                                        @endcan
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::User details-->
                                                    <div class="d-flex flex-column">
                                                        @can("User=write")
                                                        <a href="{{ route("users.edit", $user->id) }}" class="text-gray-800 text-hover-primary mb-1">
                                                            {{ $user->first_name }}
                                                        </a>
                                                        @endcan
                                                        <span>
                                                            {{ $user->email }}
                                                        </span>
                                                    </div>
                                                    <!--begin::User details-->
                                                </td>
                                                <!--end::user=-->
                                                <!--begin::Joined date=-->
                                                <td data-order="2021-05-05T17:20:00+05:00">
                                                    {{ $user->created_at }}
                                                </td>
                                                <!--end::Joined date=-->
                                                <!--begin::Action=-->
                                                <!-- <td class="text-end"> -->
                                                    <!-- <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">Actions -->
                                                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-down.svg-->
                                                        <!-- <span class="svg-icon svg-icon-5 m-0">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                                            <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)"></path>
                                                                        </g>
                                                                    </svg>
                                                                </span> -->
                                                        <!--end::Svg Icon--></a>
                                                    <!--begin::Menu-->
                                                    <!-- <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true" style=""> -->
                                                        <!--begin::Menu item-->
                                                        <!-- <div class="menu-item px-3"> -->
                                                            <!-- <a href="/metronic8/demo1/apps/user-management/users/view.html" class="menu-link px-3">View</a> -->
                                                        <!-- </div> -->
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <!-- <div class="menu-item px-3"> -->
                                                            <!-- <a href="#" class="menu-link px-3" data-kt-roles-table-filter="delete_row">Delete</a> -->
                                                        <!-- </div> -->
                                                        <!--end::Menu item-->
                                                    <!-- </div> -->
                                                    <!--end::Menu-->
                                                <!-- </td> -->
                                                <!--end::Action=-->
                                            </tr>
                                        @endforeach

                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                </div>
                            <!--end::Table-->
                        @else
                            <div class="fv-plugins-message-container invalid-feedback">
                                Users not found
                            </div>
                        @endif

                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Content-->
        </div>





    </div>

</div>
@endsection
@section('scripts')

@endsection
