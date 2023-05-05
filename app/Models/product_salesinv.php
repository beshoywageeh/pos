<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_salesinv extends Model
{
    use HasFactory;

    public $timestamps = false;

//    public $incrementing = false;
    protected $fillable = ['product_id', 'salesinvs_id', 'quantity'];

    public function salesinv()
    {
        return $this->hasOne(salesinv::class, 'salesinv_id', 'id');
    }

    public function products()
    {
        return $this->belongsTo(product::class, 'product_id', 'id');
    }
}
