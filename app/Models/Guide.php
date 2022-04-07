<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guide extends Model
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
        'content',
        'user_id',
    ];

     /**
     * Make relationship of users
     *
     * @return belongsTo(Modal, 'name');
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
