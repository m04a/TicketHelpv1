<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    use HasFactory;

    public function Department()
    {
        return $this->belongsTo(Department::Class);
    }

    public function User()
    {
        return $this->belongsTo(User::Class);
    }

    protected $fillable = [
        'id',
        'tittle',
        'description'
    ];
}
