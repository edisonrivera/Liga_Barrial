<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'title_post',
        'content_post',
        'image_post',
        'code_president_team'
    ];
    public function presidentTeam(){
        return $this->belongsTo(PresidentTeam::class);
    }
    
}
