<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Facade\FlareClient\Http\Response;


class Plot extends Model
{
    use HasFactory;
    protected $table = 'number_plots';
    protected $fillable = [
        'plot_number',
        'plot_type',
        'size',
        'dimension',
        'town_id'
    ];


    public static function indexTown()
    {
        $data = Plot::query();
        return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $html = '<a href="' . route("plots.edit", $row->id) . '" class="btn-sm btn btn-clean btn-icon btn-light-primary me-2 p-0 " data-type="edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit this Company">
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

    public static function createplot($data)
    {
        // try{
            $plot  = Plot::create($data);
            return $plot;

        // } catch(\Throwable $th) {
        //     Log::debug($th->getMessage());
        //     Log::debug($th->getTraceAsString());
        //     return response()->json(['status'=>'error', 'message'=>$th->getMessage()]);
        // }
    }

    public static function updatePlot($id, $data)
    {
        try{
            Plot::whereId($id)->update($data);
        } catch(\Throwable $th) {
            Log::debug($th->getMessage());
            Log::debug($th->getTraceAsString());
            return response()->json(['status'=>'error', 'message'=>$th->getMessage()]);
        }
    }

    public static function destroyPlot($id)
    {
        try{
            $plot = Plot::findOrFail($id);
            $plot->delete();
        } catch(\Throwable $th) {
            Log::debug($th->getMessage());
            Log::debug($th->getTraceAsString());
            return response()->json(['status'=>'error', 'message'=>$th->getMessage()]);
        }
    }
}
