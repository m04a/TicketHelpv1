<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;

    public function Breakdown()
    {
        return $this->hasMany(Breakdown::Class);
    }

    public function Device()
    {
        return $this->hasMany(Device::Class);
    }

    protected $fillable = [
        'id',
        'label',
        'description',
    ];
}