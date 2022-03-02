<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    public function User()
    {
        return $this->belongsTo(User::Class);
    }

    public function Question()
    {
        return $this->belongsTo(Question::Class);
    }

    public function Breakdown()
    {
        return $this->belongsTo(Question::Class);
    }

    protected $fillable = [
        'id',
        'content'
    ];
}
