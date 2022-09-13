<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatatableBasic extends Model
{
    use HasFactory;

    protected $table= 'datatables_example';

    protected $fillable = [
        'first_name', 'last_name', 'amount', 'color'
    ];
}
