<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Stage extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'dateDebut',
        'dateFin',
        'subject',
        'attestationStatut',
        'attestationReferences',
        'stagiaire_id',
        'affectation'
    ];
    protected static function booted()
    {
        static::creating(function ($stage) {
            $stage->user_id = Auth::id();
        });
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function stagiaire()
    {
        return $this->belongsTo(Stagiaire::class);
    }
    public function creater()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
