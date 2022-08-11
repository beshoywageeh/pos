<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class client extends Model
{
    use HasFactory;
use HasTranslations;
protected $fillable = ['name','phone','address','country_id'];
public $translatable=['name'];

    public function country(){
        return $this->belongsTo(country::class);
    }
}
