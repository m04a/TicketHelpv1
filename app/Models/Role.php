<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'label',
    ];

     /**
     * Make relationship of users
     *
     * @return hasMany(Modal, 'name');
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
