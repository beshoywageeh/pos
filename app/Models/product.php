<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class product extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = ['name', 'price', 'category_id'];

    public $translatable = ['name'];

    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function products()
    {
        return $this->hasMany(products::class);
    }
}
