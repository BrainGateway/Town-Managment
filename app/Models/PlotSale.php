<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use App\Model\User;

class PlotSale extends Model
{
    use HasFactory;
    protected $table ='plot_sales';

    protected $fillable = [
        'plot_number',
        'size',
        'dimension',
        'form_number',
        'plot_price',
        'discount',
        'registration_charges',
        'deal_price',
        'installments',
        'deal_validity',
        'sale_man',
        'mmd',
        'register_only',
        'town_id',
        'block_id',
        'owner_plot',
        'nominee_owner_plot'
    ];

    public static function indexPlotSale(){
        $data = PlotSale::query();
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function ($row) {
            $html = '<a href="' . route("plot-sale.edit", $row->id) . '" class="btn-sm btn btn-clean btn-icon btn-light-primary me-2 p-0 " data-type="edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit this Company">
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
    public static function createPloteSale($data){

        try {
            $nominee_info = Arr::only($data , ['nominee_name','nominee_father_name','nominee_address','nominee_phone_number','nominee_cnic','nominee_email','nominee_password','nominee_profile_img','nominee_cnic_front_img','nominee_cnic_back_img']);
            $owner_info   = Arr::only($data , ['owner_name','owner_father_name','owner_address','owner_phone_number','owner_cnic','owner_email','owner_password' ,'owner_profile_img','owner_cnic_front_img','owner_cnic_back_img']);
            $plot_info    = Arr::only($data , ['plot_number','size','dimension','form_number','plot_price','discount','registration_charges','deal_price','installments','deal_validity','sale_man','mmd','register_only']);
            console.log($nominee_info);
            $create_nominee = createUser($owner_info);
            if($create_nominee){
                $create_nominee = createUser($owner_info);

            }

            $plotsale = PlotSale::create($data);
            return $plotsale ;
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            Log::debug($th->getTraceAsString());
            return response()->json(['status'=>'error', 'message'=>$th->getMessage()]);

        }

    }


    public static function updatePlotSale($id , $data){
        try {
            PlotSale::whereId($id)->update($data);
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            Log::debug($th->getTraceAsString());
            return response()->json(['status'=> 'error', 'message'=> $th->getMessage()]);
        }
    }

    public static function destroyPlotSale($id){
        try {
            $plotSale = PlotSale::findOrFail($id);
            $plotSale->delete();
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            Log::debug($th->getTraceAsString());
            return response()->json(['status'=>'error', 'message'=>$th->getMessage()]);
        }
    }

    public static function createUser($data){
        try {

            dd($data);
            $user = User::create($data);
            return $user ;
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            Log::debug($th->getTraceAsString());
            return response()->json(['status'=>'error', 'message'=>$th->getMessage()]);

        }
    }


}
