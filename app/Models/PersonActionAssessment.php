<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonActionAssessment extends Model
{
    use HasFactory;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'person_action_assessment';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['questions'];
    
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'questions' => 'array',
    ];
}