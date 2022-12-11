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
    protected $hidden = ['id', 'sales_unit', 'purchase_unit', 'purchase_price', 'opening_balance', 'notes', 'img', 'created_at', 'updated_at', 'category_id'];
    public $translatable = ['name'];

    public function category()
    {
        return $this->belongsTo(category::class);
    }

}
