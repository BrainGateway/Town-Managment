@extends('layouts.app')

@section('styles')
    <link href="{{asset('plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <!--begin::Post-->
    <div class="post fs-base d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-fluid">
            <div class="card card-custom gutter-b mb-5">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">
                            Users List

                        </h3>
                    </div>
                    @can("User=create")
                    <div class="card-toolbar">
                    <a href="{{ route("users.create") }}" class="btn btn-sm btn-primary">
                            Create User
                        </a>

                    </div>
                    @endcan
                </div>

            </div>

            <div class="card">
                <!--begin::Card body-->
                <div class="card-body  pt-6">
                    <!--begin::Table-->
                    <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer ">
                        <div class="table-responsive">
                            <table class="table table-striped table-row-bordered table-sm  w-100  border rounded align-middle" id="kt_table_users">
                                <!--begin::Table head-->
                                <thead>
                                <!--begin::Table row-->
                                <tr class="fw-bolder fs-7 fw-bolder text-gray-800 px-7" >
                                <th>
                                    Sr.
                                </th>
                                <th>
                                    User
                                </th>
                                <th>
                                    Role
                                </th>
                                <th>
                                    Permissions
                                </th>
                                <th>
                                    Joined Date
                                </th>
                                <th class="w-82px">
                                    Action
                                </th>
                                </tr>
                                <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                </tbody>
                                <!--end::Table body-->
                            </table>
                        </div>
                    </div>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
        </div>
    </div>




@endsection
@section('scripts_plugins')
<script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}"></script>
@endsection
@section('scripts')

<script type="text/javascript">
    jQuery(document).ready(function () {
        window.table = $('#kt_table_users').DataTable({
            stateSave: false,
            processing: true,
            serverSide: true,
            searching: true,
            ajax: {
                url: "{{ route('users-lists') }}",
                data: function ( data ) {
                    //alert(data.massage);
                    data.all_search = $('#all_search').val(),
                    data.user_title = $('#user_title').val(),
                    data.user_role = $('#user_role').val(),
                    data.user_permission = $('#user_permission').val(),
                    data.reset = $('#reset').attr("data-value");
                }
            },
            "fnDrawCallback": function(settings, json) {
                $("[data-bs-toggle='tooltip']").tooltip();
            },
            order: [0, 'desc'],
            columns: [
                {
                    "title": "Sr.",
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                    "className": "text-center",
                },
                {data: 'userInfo',"className": "",},
                {data: 'userRole', name: 'action', orderable: true, searchable: true},
                {data: 'userPermissions', name: 'action', orderable: true, searchable: true},
                {data: 'created_at'},
                {data: 'action', name: 'action', orderable: true, searchable: true},
            ],
            lengthMenu: [
                [10, 25, 50, -1],
                ['10 rows', '25 rows', '50 rows', 'Show all']
            ],
            buttons: [
                'pageLength',
            ]
        });
        $('#search').on('click', function (e) {
            $("#reset").attr("data-value", "");
            table.draw();
        });
        $('#reset').on('click', function (e) {

            Swal.fire({
                title: 'Are you sure?',
                text: "This will clear your selected filters",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, reset it!'
            }).then((result) => {
                if(result.isConfirmed === true) {
                    $(this).attr("data-value", "reset");

                    $('#all_search').val('');

                    $('#user_title').val('');
                    $('#user_title').trigger('change');

                    $('#user_role').val('');
                    $('#user_role').trigger('change');

                    $('#user_permission').val('');
                    $('#user_permission').trigger('change');

                    table.draw();
                }
            });

        });


    });

    $(".card-body").on("click", ".delete-action", function () {
       var hidden_user_id = $('#hidden_user_id').val();
        let deleteId = $(this).attr("data-delete"),
            url = "{{ route("users.destroy", ":id") }}",
            table = $('#kt_table_users').DataTable();
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
                        if(hidden_user_id != deleteId){
                        table.ajax.reload();
                        }
                        Swal.fire(
                            'Deleted!',
                            data.message,
                            'success'
                        );
                    }
                });
            }
        });

    })
</script>
@endsection


