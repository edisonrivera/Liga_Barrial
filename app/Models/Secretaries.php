<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secretaries extends Model
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

    protected $fillable = ['user_id', 'code_team'];

    //RELACION UNO A UNO
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //Relación de uno a muchos
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    //RELACION UNO A UNO
    public function soccerTeam()
    {
        return $this->belongsTo(SoccerTeams::class);
    }
}
