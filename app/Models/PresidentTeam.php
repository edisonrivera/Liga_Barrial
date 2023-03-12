<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresidentTeam extends Model
{
    use HasFactory;
     /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $fillable = ['user_id'];
    // RELACIÓN DE UNO A UNO
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // RELACIÓN DE UNO A UNO
    public function soccerTeam()
    {
        return $this->hasOne(SoccerTeams::class);
    }
}
