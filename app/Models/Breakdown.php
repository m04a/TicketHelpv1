<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breakdown extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'status',
        'department_id',
        'user_id',
        'manager_id',
        'device_id',
        'zone_id',
    ];

     /**
     * Make relationship of departments
     *
     * @return belongsTo(Modal, 'name');
     */
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

     /**
     * Make relationship of users
     *
     * @return belongsTo(Modal, 'name');
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

     /**
     * Make relationship of managers
     *
     * @return belongsTo(Modal, 'name');
     */
    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

     /**
     * Make relationship of devices
     *
     * @return belongsTo(Modal, 'name');
     */
    public function device()
    {
        return $this->belongsTo(Device::class, 'device_id');
    }

     /**
     * Make relationship of zones
     *
     * @return belongsTo(Modal, 'name');
     */
    public function zone()
    {
        return $this->belongsTo(Zone::class, 'zone_id');
    }

     /**
     * Make relationship of messages
     *
     * @return hasMany(Modal, 'name');
     */
    public function messages()
    {
        return $this->hasMany(Message::class, 'breakdown_id');
    }
}
