<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Theme extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [

        'objet'

    ];
    protected static function booted()
    {
        static::creating(function ($theme) {
            $theme->user_id = Auth::id();
        });
    }
    public function creater()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
