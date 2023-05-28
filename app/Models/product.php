<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class product extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = ['name', 'sales_price', 'opening_balance', 'purchase_price', 'category_id', 'barcode', 'notes', 'sales_unit', 'purchase_unit'];


    public $translatable = ['name'];

    public function category()
    {
        return $this->belongsTo(category::class);
    }
    public function format_price($money)
    {
        $price = number_format($money, 2) . ' ' . env('MAIN_CURRENCY');
        return $price;
    }
}
