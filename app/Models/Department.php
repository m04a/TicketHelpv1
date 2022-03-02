<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;


    public function questions()
    {
        return $this->hasMany(Question::Class);
    }

    public function suggestions()
    {
        return $this->hasMany(Suggestion::Class);
    }

    public function breakdowns()
    {
        return $this->hasMany(Breakdown::Class);
    }

    protected $fillable = [
        'id',
        'name'
    ];
}
