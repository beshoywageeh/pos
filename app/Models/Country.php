<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Country extends Model
{
    use HasFactory;
Use HasTranslations;
public $translatable = ['name'];
public $fillable = ['name'];
    public function client()
    {
        return $this->hasmany(client::class);
    }
}
