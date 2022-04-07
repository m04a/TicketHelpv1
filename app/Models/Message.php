<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
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
     * Make relationship of questions
     *
     * @return belongsTo(Modal, 'name');
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

     /**
     * Make relationship of breakdowns
     *
     * @return belongsTo(Modal, 'name');
     */
    public function breakdown()
    {
        return $this->belongsTo(Question::class);
    }

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'content',
        'user_id',
        'question_id',
        'breakdown_id'
    ];
}
