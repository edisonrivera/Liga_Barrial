<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penalties extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $incrementing = true;
    // RELACIÓN DE UNO A MUCHOS
    public function matches()
    {
        return $this->belongsTo(Matches::class);
    }
    // RELACIÓN DE UNO A MUCHOS
    public function players()
    {
        return $this->belongsTo(Players::class);
    }
}
