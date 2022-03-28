<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;


    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function suggestions()
    {
        return $this->hasMany(Suggestion::class);
    }

    public function breakdowns()
    {
        return $this->hasMany(Breakdown::class);
    }

    protected $fillable = [
        'id',
        'name'
    ];
}
