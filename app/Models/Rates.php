<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rates extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function transaction()
    {
        return $this->hasMany(Transaction::class, 'kota_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }
}
