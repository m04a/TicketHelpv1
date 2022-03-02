<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    public function User()
    {
        return $this->belongsTo(User::Class);
    }

    public function Department()
    {
        return $this->belongsTo(Department::Class);
    }

    public function Message()
    {
        return $this->hasMany(Message::Class);
    }
}
