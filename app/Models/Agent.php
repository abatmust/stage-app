<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Agent extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'mle',
        'nom',
        'prenom',
        'affectation',
        'specialite',
        'diplome',
        'observation'

    ];
    protected $primaryKey = 'mle';

    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';
    protected static function booted()
    {
        static::creating(function ($marche) {
            $marche->user_id = Auth::id();
        });
    }
    public function creater()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
