<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'label',
        'description',
    ];

     /**
     * Make relationship of devices
     *
     * @return hasMany(Modal, 'name');
     */
    public function devices()
    {
        return $this->hasMany(Device::class);
    }
}
