<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Demande extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'num_saf',
        'date_saf',
        'pieces',
        'pj',
        'periode_demandee',
        'observation'
    ];
    protected static function booted()
{
    static::creating(function ($demande) {
        $demande->user_id = Auth::id();
    });
}
    public function stagiaires()
    {

        return $this->belongsToMany(Stagiaire::class)->withTimestamps();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
