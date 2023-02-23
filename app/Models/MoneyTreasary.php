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
}
