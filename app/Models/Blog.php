<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'post_image',
        'title',
        'post_content'
    ];
     public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
