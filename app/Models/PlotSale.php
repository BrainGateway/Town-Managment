<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

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

        DB::beginTransaction();
        try {

            $nominee_info['name']              = $data['nominee_name'];
            $nominee__info['guardian_name']    = $data['nominee_father_name'];
            $nominee_info['email']             = $data['nominee_email'];
            $nominee_info['cnic']              = $data['nominee_cnic'];
            $nominee_info['mobile_number']     = $data['nominee_phone_number'];
            $nominee_info['address']           = $data['nominee_address'];
            $nominee_info['profile_image']     = $data['nominee_profile_img'];
            $nominee_info['cnic_front_image']  = $data['nominee_cnic_front_img'];
            $nominee_info['cnic_back_image']   = $data['nominee_cnic_back_img'];
            $nominee__info['password']         = $data['nominee_password'];

            $owner_info['name']                = $data['owner_name'];
            $owner_info['guardian_name']       = $data['owner_father_name'];
            $owner_info['email']               = $data['owner_email'];
            $owner_info['cnic']                = $data['owner_cnic'];
            $owner_info['mobile_number']       = $data['owner_phone_number'];
            $owner_info['address']             = $data['owner_address'];
            $owner_info['profile_image']       = $data['owner_profile_img'];
            $owner_info['cnic_front_image']    = $data['owner_cnic_front_img'];
            $owner_info['cnic_back_image']     = $data['owner_cnic_back_img'];
            $owner_info['password']            = $data['owner_password'];

            $plot_info    = Arr::only($data , ['plot_number','size','dimension','form_number','plot_price','discount','registration_charges','deal_price','installments','deal_validity','sale_man','mmd','register_only']);

            $create_nominee = PlotSale::createUser($nominee_info);
            if($create_nominee){
                $create_owner = PlotSale::createUser($owner_info);
                if ($create_owner) {
                    $plot_info['town_id']               = 1;
                    $plot_info['block_id']              = 1;
                    $plot_info['owner_plot']            = $create_owner->id;
                    $plot_info['nominee_owner_plot']    = $create_nominee->id;

                    $plotsale = PlotSale::create($plot_info);
                    
                    // $this->generatePdf($plot_info);
                }
            }
            DB::commit();

            return $plotsale ;
        } catch (\Throwable $th) {
            DB::rollback();
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
            $user = User::create($data);
            return $user ;
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            Log::debug($th->getTraceAsString());
            return response()->json(['status'=>'error', 'message'=>$th->getMessage()]);
        }

    }


    public function generatePdf($data)
    {
        try{
            
            $data = $data;
            dd('generatePdf' , $data );
            $pdf = PDF::loadView('document.pdf', $data,[],
            [
              'orientation'              => 'P',
              'margin_left'              => 0,
              'margin_right'             => 0,
              'margin_top'               => 0,
              'margin_bottom'            => 0,
              'default_font_size'        => '8',
              'format'                   => [101.6, 50.8]
            ]);
            // $pdf->setPaper('a4', 'potrait');
            return $pdf->stream('document.pdf');

        } catch(\Throwable $th) {
            Log::debug($th->getMessage());
            Log::debug($th->getTraceAsString());
            return response()->json(['status'=>'error', 'message'=>$th->getMessage()]);
        }
    }


}
