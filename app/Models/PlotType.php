<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlotType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'town_id'
    ];


    public static function indexBlock(){
        $data = PlotType::query();
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function ($row) {
            $html = '<a href="' . route("plotType.edit", $row->id) . '" class="btn-sm btn btn-clean btn-icon btn-light-primary me-2 p-0 " data-type="edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit this Company">
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
    public static function createPlotType($data){

        try {
            
            $plotType = PlotType::create($data);
            return $plotType ; 
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            Log::debug($th->getTraceAsString());
            return response()->json(['status'=>'error', 'message'=>$th->getMessage()]);
            
        }

    }


    public static function updatePlotType($id , $data){
        try {
            
            PlotType::whereId($id)->update($data);
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            Log::debug($th->getTraceAsString());
            return response()->json(['status'=> 'error', 'message'=> $th->getMessage()]);
        }
    }

    public static function destroyPlotType($id){
        try {
            $plotType = PlotType::findOrFail($id);
            $plotType->delete();
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            Log::debug($th->getTraceAsString());
            return response()->json(['status'=>'error', 'message'=>$th->getMessage()]);
        }
    }


}
