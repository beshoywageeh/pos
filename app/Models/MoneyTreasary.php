<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoneyTreasary extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'date', 'amount', 'type', 'note', 'user_id'];

    public function client()
    {
        return $this->belongsTo(client::class);
    }

    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function formatcurrncy($money)
    {
        return number_format($money, '2').' '.env('MAIN_CURRENCY');
    }

    public function formatdate()
    {
        return $this->created_at->format('Y-m-d');
    }

    public function current_balance()
    {
        $date = $this->payed_at;
        $client = $this->client_id;
        $debit = MoneyTreasary::where('client_id', $client)->where('payed_at', '<=', $date)->sum('debit');
        $credit = MoneyTreasary::where('client_id', $client)->where('payed_at', '<=', $date)->sum('credit');
        $final_balance = number_format($debit - $credit, '2').' '.env('MAIN_CURRENCY');

        return $final_balance;
    }
}
