<?php

namespace App\Console\Commands;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Console\Command;
use App\Models\User;

class MonthlyInstallmentInvoiceCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'monthlyInvoice:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // \Log::info("Cron is working fine!");
        try{
            $plotOwner = User::whereHas('roles', function($q){
                $q->where('name', 'Plot Owner');
            })->get();
            dd($plotOwner);
            // $plan      = Plan::first();

            // foreach ($companies as $company) {

            //     $company        = Company::findOrFail($company->id);
            //     $companyPlan    = isset($company->packages) ? $company->packages->first() : $plan;
            //     // $devicesTested  = DeviceTestResult::whereCompanyId($id)->whereNotNull('test_id')->groupBy('serial_no')->groupBy('session_id')->count();
            //     $devicesTested   = isset($companyPlan->pivot->number_of_devices_tested) ? $companyPlan->pivot->number_of_devices_tested : 0;
            //     $diviceallowed   = $companyPlan->number_of_devices;

            //     if($companyPlan->plan_type == 'unit_based_price'){
            //         $amount                     = $company->charge_rate / 100;
            //         $price                      = $amount;
            //         $planAmount                 = $amount * $devicesTested;
            //         // $invoiceData['amount']      = $amount * $devicesTested;
            //     } else {
            //         $price = $companyPlan->price;

            //         if($devicesTested <= $diviceallowed)
            //         {
            //             $chargingPercentage = ($devicesTested / $diviceallowed);
            //             $planAmount         = $chargingPercentage * $price;

            //         } else {
            //             $extraDevices = $devicesTested - $diviceallowed;
            //             $chargingPercentage = ($extraDevices / $diviceallowed);
            //             $addingExtraAmount  = $chargingPercentage * $price;
            //             $planAmount         = $addingExtraAmount + $price;
            //         }
            //     }

            //     $invoiceData['user_id']                     = 1;
            //     $invoiceData['company_id']                  = $company->id;
            //     $invoiceData['plan_id']                     = $companyPlan->id;
            //     $invoiceData['invoice_date']                = Carbon::now()->toDateString();
            //     $invoiceData['number_of_device_tested']     = $devicesTested;

            //     if($company->tax_inclusion == 1){
            //         $tax = $company->tax_rate;
            //     }else{
            //         $tax = 0;
            //     }

            //     $taxrate            = ($tax/100)*$planAmount ;
            //     $taxAmount          = $taxrate;
            //     $grandTotalAmount   = $planAmount  - $taxAmount;
            //     $grandTotal         = round($grandTotalAmount, 2);

            //     $invoiceData['amount']                      = $grandTotal;

            // $invoice =  Invoice::createInvoice($invoiceData);
            // Invoice::whereId($invoice->id)->update([
            //     'invoice_number' => $invoice->id.''.strtotime(Carbon::now()->toDateTimeString()),
            // ]);

            // $adminUsers = User::whereCompanyId($company->id)->whereHas('roles', function($q){
            //         $q->where('name', 'Company Admin');
            //     })->get();

            //     $invoice = Invoice::whereId($invoice->id)->first();
            //     $data = [
            //         'id'            => $invoice->invoice_number,
            //         'date'          => Carbon::now()->toDateString(),
            //         'name'          => $company->name,
            //         'logo'          => $company->logo_image,
            //         'email'         => isset($adminUser) ? $adminUser->email : ' ',
            //         'address'       => $company->country.', '.$company->state.', '.$company->city.', '.$company->address,
            //         'planName'      => isset($companyPlan) ? $companyPlan->name : ' ',
            //         'description'   => isset($companyPlan) ? $companyPlan->description : ' ',
            //         'price'         => isset($price) ? round($price, 2) : ' ',
            //         'quantity'      => isset($devicesTested) ? $devicesTested : ' ',
            //         'total'         => isset($planAmount ) ? round($planAmount, 2)  : ' ',
            //         'tax'           => isset($tax) ? round($tax, 2) : ' ',
            //         'grandTotal'    => isset($grandTotal) ? round($grandTotal, 2) : ' ',
            //         'taxAmount'     => isset($taxAmount) ? round($taxAmount, 2) : ' ',
            //     ];

            //     $pdf = PDF::loadView('invoices.pdf', $data);

            //     $uploaded_file_path = public_path('upload/test/').$invoice->invoice_number;
            //     $pdf->save($uploaded_file_path);

            //     $file           = new File($uploaded_file_path);
            //     $s3_file_upload = S3FileUploadService::fileUpload($file, 'invoices', 'pdf');
            //     $path           = isset($s3_file_upload['path']) ? $s3_file_upload['path']: '';
            //     $name           = isset($s3_file_upload['file_name']) ? $s3_file_upload['file_name']: '';

            //     Invoice::whereId($invoice->id)->update([
            //         'invoice_file' => $path,
            //     ]);

            //     $mailData['company']    = $company->name;
            //     $mailData['plan']       = isset($companyPlan) ? $companyPlan->name : ' ';
            //     $mailData['amount']     = isset($grandTotal) ? round($grandTotal, 2) : ' ';

            //     $filePath = public_path('upload/test/').$name;

            //     foreach($adminUsers as $user)
            //     {
            //         $mailData['user']   = $user->first_name.' '.$user->last_name;
            //         $mailData['email']  = $user->email;
            //         $mailData['url']    = $path;
            //         $mailData['path']   = $filePath;

            //         $view       = 'emails.invoice_detail';
            //         $subject    = 'Invoice Detail';
            //         $attachment = $filePath;
            //         SendMailService::sendMail($view, $mailData, $subject, $attachment);
            //     }

            //     if(file_exists($filePath))
            //     {
            //         unlink($filePath);
            //     }
            //     Log::debug('inovice send to this company '. json_encode($company->name));
            // }

             $this->info('Successfully sent Invoices to everyone.');
        } catch(\Throwable $th) {
            Log::debug($th->getMessage());
            Log::debug($th->getTraceAsString());
            return response()->json(['status'=>'error', 'message'=>$th->getMessage()]);
        }
    }
}
