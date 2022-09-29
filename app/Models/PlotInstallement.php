<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;


class PlotInstallement extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_type',
        'deposit_amount',
        'slip_number',
        'auto_slip_number',
        'payment_method',
        'deposit_slip',
        'town_id',
        'number_of_plot',
        'owner_plot'
    ];

    protected $table = 'plot_installements';

    public static function indexPlotInstallement()
    {
        $data = PlotInstallement::query();

        return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $html = '<a href="' . route("plot-installements.edit", $row->id) . '" class="btn-sm btn btn-clean btn-icon btn-light-primary me-2 p-0 " data-type="edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit this Company">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>';
                    $html .= '<a href="javascript:void(0);" class="btn-sm btn btn-clean btn-icon btn-light-danger p-0 delete-action" data-delete="' . $row->id . '" title="delete details" data-type="edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete this Company">
                                    <i class="fa fa-trash"></i>
                                </button>';

                    return $html;
                })
                ->rawColumns(['action'])
                ->make(true);

    }

    public static function createPlotInstallement($data)
    {
        try{
            $plotInstallement  = PlotInstallement::create($data);
            return $plotInstallement;

        } catch(\Throwable $th) {
            Log::debug($th->getMessage());
            Log::debug($th->getTraceAsString());
            return response()->json(['status'=>'error', 'message'=>$th->getMessage()]);
        }
    }

    public static function updatePlotInstallement($id, $data)
    {
        try{
            PlotInstallement::whereId($id)->update($data);
        } catch(\Throwable $th) {
            Log::debug($th->getMessage());
            Log::debug($th->getTraceAsString());
            return response()->json(['status'=>'error', 'message'=>$th->getMessage()]);
        }
    }

    public static function destroyPlotInstallement($id)
    {
        try{
            $plotInstallement = PlotInstallement::findOrFail($id);
            $plotInstallement->delete();
        } catch(\Throwable $th) {
            Log::debug($th->getMessage());
            Log::debug($th->getTraceAsString());
            return response()->json(['status'=>'error', 'message'=>$th->getMessage()]);
        }
    }
}
