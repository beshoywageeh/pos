<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class category extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = ['name', 'notes'];

    public $translatable = ['name'];

    public function products()
    {
        return $this->hasMany(product::class);
    }

    public function format_date()
    {
        return $this->created_at->format('Y-m-d');
    }
}
