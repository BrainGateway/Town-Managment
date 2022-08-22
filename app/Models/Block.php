<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class Block extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'NumOfPlots',
        'town_id',
        'logo'
    ];
    
    public static function indexBlock(){
        $data = Block::query();
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('logo', function($row){
            $html = '<img src="'.asset("assets/images/".$row->logo).'" class=""   height = "55px" alt="Responsive image">';
            return $html;
        })
        ->addColumn('action', function ($row) {
            $html = '<a href="' . route("block.edit", $row->id) . '" class="btn-sm btn btn-clean btn-icon btn-light-primary me-2 p-0 " data-type="edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit this Company">
                            <i class="fa fa-pencil-alt"></i>
                        </a>';
            $html .= '<a href="javascript:void(0);" class="btn-sm btn btn-clean btn-icon btn-light-danger p-0 delete-action" data-delete="' . $row->id . '" title="delete details" data-type="edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete this Company">
                            <i class="fa fa-trash"></i>
                        </button>';

            return $html;
        })
        ->rawColumns(['action' , 'logo'])
        ->make(true);

    }
    public static function createBlock($data){

        try {
            
            $block = Block::create($data);
           
            return $block ; 
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            Log::debug($th->getTraceAsString());
            return response()->json(['status'=>'error', 'message'=>$th->getMessage()]);
            
        }

    }


    public static function updateBlock($id , $data){
        try {
            
            Block::whereId($id)->update($data);
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            Log::debug($th->getTraceAsString());
            return response()->json(['status'=> 'error', 'message'=> $th->getMessage()]);
        }
    }

    public static function destroyBlock($id){
        try {
            $block = Block::findOrFail($id);
            $block->delete();
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            Log::debug($th->getTraceAsString());
            return response()->json(['status'=>'error', 'message'=>$th->getMessage()]);
        }
    }
}

