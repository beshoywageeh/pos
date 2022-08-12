<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_salesinv extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function salesinv(){
        return $this->hasOne(salesinv::class);

    }
    public function products(){
        return $this->morphedByMany(product::class,'id');
    }
}
