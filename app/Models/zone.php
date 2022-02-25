<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class zone extends Model
{
    use HasFactory;

    public function zone()
    {
        return $this->hasMany(Comment::Breakdown);
        return $this->hasMany(Comment::Device);
    }

    protected $fillable = [
        'id',
        'label',
        'description',
    ];

}

