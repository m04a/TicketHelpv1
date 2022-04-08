<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'label',
        'type_id',
        'zone_id',
    ];

     /**
     * Make relationship of zones
     *
     * @return belongsTo(Modal, 'name');
     */
    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }

     /**
     * Make relationship of types
     *
     * @return belongsTo(Modal, 'name');
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    /**
     * Make relationship of breakdowns
     *
     * @return hasMany(Modal, 'name');
     */
    public function breakdowns()
    {
        return $this->hasMany(Breakdown::class);
    }
}
