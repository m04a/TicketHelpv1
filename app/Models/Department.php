<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

     /**
     * Make relationship of questions
     *
     * @return hasMany(Modal, 'name');
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    /**
     * Make relationship of suggestions
     *
     * @return hasMany(Modal, 'name');
     */
    public function suggestions()
    {
        return $this->hasMany(Suggestion::class);
    }

     /**
     * Make relationship of breakdowns
     *
     * @return hasMany(Modal, 'name');
     */
    public function breakdowns()
    {
        return $this->hasMany(Breakdown::class);
    }

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name'
    ];
}
