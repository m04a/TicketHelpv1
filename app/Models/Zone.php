<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;

    public function breakdowns()
    {
        return $this->hasMany(Breakdown::class);
    }

    public function devices()
    {
        return $this->hasMany(Device::class);
    }

    protected $fillable = [
        'id',
        'label',
        'description',
    ];
}
