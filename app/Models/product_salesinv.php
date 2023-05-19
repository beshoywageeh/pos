<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_salesinv extends Model
{
    use HasFactory;
    use HasUuids;

    public $timestamps = false;

    //    public $incrementing = false;
    protected $fillable = ['product_barcode', 'salesinvs_id', 'quantity'];

    public function salesinv()
    {
        return $this->hasOne(salesinv::class, 'salesinv_id', 'id');
    }

    public function products()
    {
        return $this->belongsTo(product::class, 'product_barcode', 'barcode');
    }
    public function formatcurrncy($money)
    {
        return number_format($money, '2') . ' ' . env('MAIN_CURRENCY');
    }
}
