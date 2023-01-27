<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Marche extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'ref',
        'objet',
        'annee',
        'type',
        'imputationBudgetaire',
        'prestataire',
        'montant'
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
}
