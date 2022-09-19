<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

class DatatableBasicController extends Controller
{
    public function index()
    {
        return view('datatables.basic');
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $users = DB::table('datatables_example');

            $datatables = Datatables::of($users)
                ->editColumn('id', function ($users) {
                    return 'CLT-' . $users->id;
                })
                ->addColumn('full_name', function ($users) {
                    return $users->first_name . ' ' . $users->last_name;
                })
                ->editColumn('amount', function ($users) {
                    return 'Rs. ' . $users->amount;
                })
                ->editColumn('created_at', function ($users) {
                    return Carbon::parse($users->created_at)->format('d M Y');
                })
                ->addColumn('button', function ($users) {
                    return '<button type="button" class="btn btn-sm btn-primary" data-id="' . $users->id . '">Edit</button>';
                })
                ->rawColumns(['button', 'full_name', 'amount', 'id', 'created_at']);
            return $datatables->make(true);
        }

    }
}
