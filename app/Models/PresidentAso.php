<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\Model\User;

class PresidentAso extends Model
{
    use HasFactory;
    public $timestamps = false;
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

    //RELACIÓN UNO A MUCHOS
    public function tournament()
    {
        return $this->hasMany(Tournament::class);
    }
}
