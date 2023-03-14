<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matches_Teams extends Model
{
    use HasFactory;

    protected $table = 'matches_teams';
    protected $fillable = [
        'match_id',
        'code_team_local',
        'code_team_visit',
        'goals_local',
        'goals_visit',
        'date_match',
        'time_match'
    ];

    public function matches_teams()
    {
        return $this->belongsTo(Matches::class, 'match_id');
    }
}
