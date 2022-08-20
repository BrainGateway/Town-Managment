<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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


}
