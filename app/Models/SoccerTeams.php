<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoccerTeams extends Model
{
    use HasFactory;
     /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $table='soccer_teams';
    protected $keyType='string';
    public $timestamps = false;

    protected $fillable = [
        'code_soccer_team',
        'president_team',
        'name_team',
        'logo_team',
        'public_id',
        'fundation_date_team',
        'description_team' ,
    ];
    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    public $incrementing = false;
    protected $primaryKey='code_soccer_team';

    // RELACIÓN DE UNO A UNO
    public function presidentTeam()
    {
        return $this->belongsTo(PresidentTeam::class);
    }
    //RELACION DE UNO A MUCHOS
    public function players()
    {
        return $this->hasMany(Players::class);
    }
    // RELACIÓN DE MUCHOS A MUCHOS
    public function matches()
    {
        return $this->belongsToMany(Matches::class)->withTimestamps();
    }
}
