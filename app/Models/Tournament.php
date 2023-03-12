<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function presidentAso()
    {
        return $this->belongsTo(PresidentAso::class);
    }
    public function matches()
    {
        return $this->hasMany(Matches::class);
    }
}
