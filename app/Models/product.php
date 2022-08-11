<?php

namespace App\Models;
use Spatie\Translatable\HasTranslations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class product extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $fillable=['name','price','category_id'];
public $translatable=['name'];

    public function category(){
        return $this->belongsTo(category::class);
    }
}
