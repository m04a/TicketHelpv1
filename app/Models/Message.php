<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function breakdown()
    {
        return $this->belongsTo(Question::class);
    }

    protected $fillable = [
        'id',
        'content',
        'user_id',
        'question_id',
        'breakdown_id'
    ];
}
