<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Players extends Model
{
    use HasFactory;
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $table='players';
    protected $keyType='string';
    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    public $incrementing = false;
    protected $primaryKey='ci_player';

    protected $fillable = [
        'ci_player', 
        'user_id', 
        'code_team', 
        'age', 
        'born_date_player'
    ];


    //RELACION DE UNO A UNO
    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }


    //RELACION DE UNO A MUCHOS
    public function soccerTeam()
    {
        return $this->belongsTo(SoccerTeams::class);
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
