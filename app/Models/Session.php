<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Session extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'dateDebut',
        'dateFin',
        'periode',
        'nbreParticipants',
        'nbreJours',
        'lieu',
        'animateur',
        'marche_id',
        'theme_id'

    ];
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
    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }
    public function marche()
    {
        return $this->belongsTo(Marche::class);
    }
    public function agents()
    {

        return $this->belongsToMany(Agent::class)->withTimestamps();

    }
}
