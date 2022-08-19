<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class MiddleMan extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'phoneNumber',
        'picture',
        'cnic',
        'town_id'
    ] ;

    public static function indexMMD(){

        try {
            $data = MiddleMan::query();
            return DataTables::of($data)
            ->addIndexColumn()
            ->addIndexColumn('picture', function($row){
                $html = '<img src="'.asset("mmd/".$row->picture).'" class=""   height = "55px" alt="Responsive image">';
                return $html;
            })
            ->addColumn('action', function ($row) {
                $html = '<a href="' . route("middleMan.edit", $row->id) . '" class="btn-sm btn btn-clean btn-icon btn-light-primary me-2 p-0 " data-type="edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit this Company">
                                <i class="fa fa-pencil-alt"></i>
                            </a>';
                $html .= '<a href="javascript:void(0);" class="btn-sm btn btn-clean btn-icon btn-light-danger p-0 delete-action" data-delete="' . $row->id . '" title="delete details" data-type="edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete this Company">
                                <i class="fa fa-trash"></i>
                            </button>';

                return $html;
            })
            ->rawColumns(['action' , 'picture'])
            ->make(true);
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            Log::debug($th->getTraceAsString());
            return response()->json(['status'=>'error', 'message'=>$th->getMessage()]);
        }
        
    }
    public static function createMmd($data)
    {
        try{
            $mmd  = MiddleMan::create($data);
            
            return $mmd;



            
        } catch(\Throwable $th) {
            Log::debug($th->getMessage());
            Log::debug($th->getTraceAsString());
            return response()->json(['status'=>'error', 'message'=>$th->getMessage()]);
        }
    }


    public static function updateMmd($data){
        try {
            $mmd = MiddleMan::update($data);
            return $mmd;
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            Log::debug($th->getTraceAsString());
            return response()->json(['status' => 'error' , 'Message' => $th->getMessage()]);
        }
    }

    public static function destroyMmd($id){
        try {
            $mmd = MiddleMan::findOrFail($id);
            $mmd->delete();
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            Log::debug($th->getTraceAsString());
            return response()->json(['status' => 'error' , 'Message' => $th->getMessage()]);
        }
    }

}
