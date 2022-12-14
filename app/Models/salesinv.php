<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class salesinv extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $garded = [];

    public $translatable = ['name'];

    public function client()
    {
        return $this->belongsTo(client::class);
    }

    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\product','product_salesinvs');
    }

    public function products_salesinvs()
    {
        return $this->hasMany(product_salesinv::class);
    }
    public function formatdate()
    {
        return $this->created_at->format('Y-m-d');
    }  public function formatcurrncy()
    {
        return number_format($this->total,'2');
    }
}
