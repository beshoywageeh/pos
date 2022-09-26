<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class product extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = ['name', 'sales_price','opening_balance', 'purchase_price','category_id','barcode','notes'];

    public $translatable = ['name'];

    public function category()
    {
        return $this->belongsTo(category::class);
    }

}
