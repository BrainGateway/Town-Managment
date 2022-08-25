<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PlotSize extends Model
{
    use HasFactory;
    protected $fillable = [
        'size',
        'dimension',
        'town_id'
    ];


    public static function indexPlotSize()
    {
        $data = PlotSize::query();
        return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $html = '<a href="' . route("size-dimensions.edit", $row->id) . '" class="btn-sm btn btn-clean btn-icon btn-light-primary me-2 p-0 " data-type="edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit this Company">
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

    public static function createPlotSize($data)
    {
        try{
            $plotSize  = PlotSize::create($data);
            return $plotSize;

        } catch(\Throwable $th) {
            Log::debug($th->getMessage());
            Log::debug($th->getTraceAsString());
            return response()->json(['status'=>'error', 'message'=>$th->getMessage()]);
        }
    }

    public static function updatePlotSize($id, $data)
    {
        try{
            PlotSize::whereId($id)->update($data);
        } catch(\Throwable $th) {
            Log::debug($th->getMessage());
            Log::debug($th->getTraceAsString());
            return response()->json(['status'=>'error', 'message'=>$th->getMessage()]);
        }
    }

    public static function destroyPlotSize($id)
    {
        try{
            $plotSize = PlotSize::findOrFail($id);
            $plotSize->delete();
        } catch(\Throwable $th) {
            Log::debug($th->getMessage());
            Log::debug($th->getTraceAsString());
            return response()->json(['status'=>'error', 'message'=>$th->getMessage()]);
        }
    }
}
