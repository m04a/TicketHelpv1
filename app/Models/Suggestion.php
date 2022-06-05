<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    use HasFactory;

     /**
     * Make relationship of departaments
     *
     * @return belongsTo(Modal, 'name');
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

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
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'title',
        'description',
        'department_id',
        'user_id'
    ];
}
