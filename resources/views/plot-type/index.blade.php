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
                            Town List

                        </h3>
                    </div>
                    @can("User=create")
                    <div class="card-toolbar">
                    <a href="{{ route('plot-types.create') }}" class="btn btn-sm btn-primary">
                            Create Town
                        </a>

                    </div>
                    @endcan
                </div>

            </div>

            <div class="card">
                <!--begin::Card body-->
                <div class="card-body  pt-6">
                    <!--begin::Table-->
                    <div id="kt_table_plot_types_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer ">
                        <div class="table-responsive">
                            <table class="table table-striped table-row-bordered table-sm  w-100  border rounded align-middle" id="kt_table_plot_type">
                                <!--begin::Table head-->
                                <thead>
                                <!--begin::Table row-->
                                <tr class="fw-bolder fs-7 fw-bolder text-gray-800 px-7" >
                                    <th>
                                        Sr.
                                    </th>
                                    <th>
                                        Plot Type
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

    $(function () {

        var table = $('#kt_table_plot_type').DataTable({

            stateSave: false,
            processing: true,
            serverSide: true,
            searching: true,
            dom: 'Bfrtip',
            ajax: {
                url: "{{ route('plot-types.index') }}",
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

                {data: 'name',                  name: 'name'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            lengthMenu: [
                [10, 25, 50, -1],
                ['10 rows', '25 rows', '50 rows', 'Show all']
            ],
            buttons: [
                    {
                        extend: 'copyHtml5',
                        exportOptions: {
                            columns: [ 0, 1, 2, 4, 5, 6]
                        }

                    },
                    {
                        extend: 'csvHtml5',
                        exportOptions: {
                            columns: [ 0, 1, 2, 4, 5, 6]
                        }

                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [ 0, 1, 2, 4, 5, 6]
                        }

                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [ 0, 1, 2, 4, 5, 6]
                        }
                    },

                    'pageLength',
                    'colvis',
                ],


        });



      });
        // Add event listener for opening and closing details
    $('#kt_table_plot_type tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );

        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( template(row.data()) ).show();
            tr.addClass('shown');
        }
    });

      $(".card-body").on("click", ".delete-action", function () {
        var hidden_user_id = $('#hidden_user_id').val();
         let deleteId = $(this).attr("data-delete"),
             url = "{{ route('plot-types.destroy', ":id") }}",
             table = $('#kt_table_plot_type').DataTable();
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
