<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'type_id',
        'zone_id', 
    ];

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }

    public function type()
    {
        return $this->belongsTo(Types::class);
    }

    public function breakdowns()
    {
        return $this->hasMany(Breakdown::class);
    }
}
