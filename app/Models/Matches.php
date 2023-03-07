<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matches extends Model
{
    use HasFactory;
    // RELACIÓN DE MUCHOS A MUCHOS
    public function soccerTeam()
    {
        return $this->belongsToMany(SoccerTeams::class)->withTimestamps();
    }
    // RELACIÓN DE UNO A MUCHOS
    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }
    //RELACION DE UNO A MUCHOS
    public function goals()
    {
        return $this->hasMany(Goals::class);
    }
    //RELACION DE UNO A MUCHOS
    public function penalty()
    {
        return $this->hasMany(Penalties::class);
    }
}
