<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title_post',
        'content_post',
        'image_post',
        'code_secretary'
    ];
    // public function secretary (){
    //     return $this->belongsTo(Secretaries::class,'code_secretary','code_secretary');
    // }
    
}
