<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'oauth_google',
        'oauth_github',
        'oauth_discord',
        'oauth_instagram',
        'oauth_facebook',
        'oauth_vk',
        'oauth_reddit',
        'oauth_gitlab',
    ];
}
