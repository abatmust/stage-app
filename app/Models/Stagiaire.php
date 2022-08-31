<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Stagiaire extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'phone',
        'cin',
        'gender_situation',
        'institut',
        'ville'
    ];
    protected static function booted()
    {
        static::creating(function ($stagiaire) {
            $stagiaire->user_id = Auth::id();
        });
    }
    public function demandes()
    {

        return $this->belongsToMany(Demande::class);
    }
    public function creater()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
