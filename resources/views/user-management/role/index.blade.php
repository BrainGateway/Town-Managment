@extends('layouts.app')

@section('content')
<!--begin::Post-->
    <div class="post fs-base d-flex flex-column-fluid" id="kt_post">

        <div id="kt_content_container" class="container-fluid">
            <div class="row row-cols-1 row-cols-md-3 row-cols-xl-4 g-9">

                <!--begin::Add new card-->
                <div class="ol-md-3">
                    <!--begin::Card-->
                    <div class="card h-md-100">
                        <!--begin::Card body-->
                        <div class="card-body d-flex flex-center">
                            <!--begin::Button-->
                            <a href="{{ route("roles.create") }}" class="btn btn-clear d-flex flex-column flex-center">
                                <!--begin::Illustration-->
                                <img src="{{ asset("assets/img/user-role.png") }}" alt="" class="mw-100 mh-150px mb-7">
                                <!--end::Illustration-->
                                <!--begin::Label-->
                                <div class="fw-bolder fs-3 text-gray-600 text-hover-primary">Add New Role</div>
                                <!--end::Label-->
                            </a>
                            <!--begin::Button-->
                        </div>
                        <!--begin::Card body-->
                    </div>
                    <!--begin::Card-->
                </div>
                <!--begin::Add new card-->

                @foreach( $rolesWithPermissions as $rolesWithPermission )

                    <!--begin::Col-->
                    <div class="col-md-3">
                        <!--begin::Card-->
                        <div class="card card-flush h-md-100">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>
                                        {{ $rolesWithPermission->name }}
                                    </h2>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-1">
                                <!--begin::Users-->
                                <div class="fw-bolder text-gray-600 mb-5">
                                    Total users with this role: {{ count($rolesWithPermission->users) }}
                                </div>
                                <!--end::Users-->
                                <!--begin::Permissions-->
                                <div class="d-flex flex-column text-gray-600">

                                    @php $i = 0; @endphp
                                    @foreach( $rolesWithPermission->permissions as $permission )
                                        <div class="d-flex align-items-center py-2">
                                            <span class="bullet bg-primary me-3"></span>
                                            {{ $permission->name }}
                                        </div>
                                        @php if( $i == 5) break; $i++; @endphp
                                    @endforeach

                                </div>
                                <!--end::Permissions-->
                            </div>
                            <!--end::Card body-->

                                <!--begin::Card footer-->
                                @can("Role=write")
                                <!--begin::Card footer-->
                                <div class="card-footer flex-wrap pt-0">

                                    <a href="{{ route("roles.show", $rolesWithPermission->id) }}" class="btn-sm btn btn-clean btn-icon btn-light-success me-2 p-0" data-bs-toggle="tooltip" data-bs-placement="top" title="View this role">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <a href="{{ route("roles.edit", $rolesWithPermission->id ) }}" class="btn-sm btn btn-clean btn-icon btn-light-primary me-2 p-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit this role">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>

                                    @can("Role=write")
                                        @if ( $rolesWithPermission->default != 1 )
                                            <a href="javascript:void(0);" class="btn-sm btn btn-clean btn-icon btn-light-danger delete-action" data-delete="{{ $rolesWithPermission->id }}" data-type="edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete this role">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        @endif
                                    @endcan

                                </div>
                                <!--end::Card footer-->
                            @endcan
                                <!--end::Card footer-->

                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Col-->

                @endforeach


            </div>




        </div>

    </div>




@endsection


@section('scripts')
<script>


    jQuery(document).ready(function () {

        $(".card-footer").on("click", ".delete-action", function () {

            let deleteId = $(this).attr("data-delete"),
                url = "{{ route("roles.destroy", ":id") }}";
            url = url.replace(':id', deleteId);

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 'X-Requested-With': 'XMLHttpRequest'},
                        url: url,
                        type: "DELETE",
                        data: "",
                        success: function(data) {

                            if( data.code == 0 ) {
                                Swal.fire(
                                    'Deleted!',
                                    data.message,
                                    'success'
                                );
                                window.location.reload();
                            } else {
                                Swal.fire(
                                    'Not Deleted!',
                                    data.message,
                                    'error'
                                );
                            }
                        }
                    });
                }
            });

        });

    });


</script>
@endsection

