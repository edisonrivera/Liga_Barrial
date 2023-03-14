<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $table = 'positions';

    protected $fillable = [
        'position_team',
        'puntos_team',
        'pjugados_team',
        'pg_team',
        'pp_team',
        'pe_team',
        'gf_team',
        'gd_team',
        'gc_team',
    ];

    public function soccer_team()
    {
        return $this->belongsTo(SoccerTeams::class, 'code_soccer_team');
    }

    public function updatePosition($pjugados_team, $pg_team, $pe_team, $pp_team, $gf_team, $gc_team)
    {
        $this->pjugados_team += $pjugados_team;
        $this->pg_team += $pg_team;
        $this->pe_team += $pe_team;
        $this->pp_team += $pp_team;
        $this->gf_team += $gf_team;
        $this->gc_team += $gc_team;
        $this->gd_team = $this->gf_team - $this->gc_team;
        $this->puntos_team = ($this->pg_team * 3) + ($this->pe_team * 1);
        $this->save();
    }
    
    public static function updatePositions($match)
   {
       $local = $match->name_team_local;
       $visit = $match->name_team_visit;

       $positionLocal = Position::where('code_soccer_team', $local->id)->firstOrFail();
       $positionVisit = Position::where('code_soccer_team', $visit->id)->firstOrFail();

       if ($match->goals_local > $match->goals_visit) {
           $positionLocal->updatePosition(1, 1, 0, 0, $match->goals_local, $match->goals_visit);
           $positionVisit->updatePosition(1, 0, 0, 1, $match->goals_visit, $match->goals_local);
       } elseif ($match->goals_local < $match->goals_visit) {
           $positionLocal->updatePosition(1, 0, 0, 1, $match->goals_local, $match->goals_visit);
           $positionVisit->updatePosition(1, 1, 0, 0, $match->goals_visit, $match->goals_local);
       } else {
           $positionLocal->updatePosition(1, 0, 1, 0, $match->goals_local, $match->goals_visit);
           $positionVisit->updatePosition(1, 0, 1, 0, $match->goals_visit, $match->goals_local);
       }
   }

}
