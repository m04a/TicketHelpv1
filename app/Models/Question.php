<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::Class);
    }

    public function department()
    {
        return $this->belongsTo(Department::Class);
    }

    public function messages()
    {
        return $this->hasMany(Message::Class);
    }

    protected $fillable = [
        'id',
        'tittle',
        'description',
        'department_id',
        'user_id',
        'manager_id'
    ];
}
