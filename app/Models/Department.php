<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;


    public function Question()
    {
        return $this->hasMany(Question::Class);
    }

    public function Suggestion()
    {
        return $this->hasMany(Suggestion::Class);
    }

    public function Breakdown()
    {
        return $this->hasMany(Breakdown::Class);
    }

    protected $fillable = [
        'id',
        'name'
    ];
}
