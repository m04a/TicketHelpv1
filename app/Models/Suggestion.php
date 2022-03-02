<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    use HasFactory;

    public function department()
    {
        return $this->belongsTo(Department::Class);
    }

    public function user()
    {
        return $this->belongsTo(User::Class);
    }

    protected $fillable = [
        'id',
        'tittle',
        'description',
        'department_id',
        'user_id'
    ];
}
