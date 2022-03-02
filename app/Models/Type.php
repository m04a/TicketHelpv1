<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'description',
    ];

    public function Device()
    {
        return $this->hasMany(Device::class);
    }
}
