<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;

     /**
     * Make relationship of breakdowns
     *
     * @return hasMany(Modal, 'name');
     */
    public function breakdowns()
    {
        return $this->hasMany(Breakdown::class);
    }

    /**
     * Make relationship of devices
     *
     * @return hasMany(Modal, 'name');
     */
    public function devices()
    {
        return $this->hasMany(Device::class);
    }

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'label',
        'description',
    ];
}
