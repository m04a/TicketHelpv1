<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

     /**
     * Make relationship of users
     *
     * @return belongsTo(Modal, 'name');
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

     /**
     * Make relationship of departments
     *
     * @return belongsTo(Modal, 'name');
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

     /**
     * Make relationship of messages
     *
     * @return hasMany(Modal, 'name');
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
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
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'tittle',
        'description',
        'department_id',
        'user_id',
        'manager_id'
    ];
}
