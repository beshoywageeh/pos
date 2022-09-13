<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class client extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = ['name', 'phone', 'address', 'country_id'];

    public $translatable = ['name'];

    public function country()
    {
        return $this->belongsTo(country::class);
    }

    public function salesinvs()
    {
        return $this->hasMany(salesinv::class,'client_id','id');
    }
    public function totalBalance()
    {
        $sales = number_format(salesinv::where('client_id',$this->id)->sum('total'),'2');
        return $sales;
    }
    public function user()
    {
        return $this->belongsTo(user::class);
    }
}
