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

    protected $hidden = ['id', 'created_at', 'updated_at', 'opening_balance'];

    public $translatable = ['name'];

    public function country()
    {
        return $this->belongsTo(country::class);
    }

    public function salesinvs()
    {
        return $this->hasMany(Client_MoneyTreasary_Salesinvs::class, 'salesinv_id', 'id');
    }

    public function totalBalance()
    {
        $sales = number_format(salesinv::where('client_id', $this->id)->sum('total'), '2') . ' ' . env('MAIN_CURRENCY');

        return $sales;
    }

    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function money_transaction()
    {
        return $this->hasMany(Client_MoneyTreasary_Salesinvs::class, 'money_treasary', 'id');
    }
    public function formatcurrncy($money)
    {
        return number_format($money, '2') . ' ' . env('MAIN_CURRENCY');
    }
}
