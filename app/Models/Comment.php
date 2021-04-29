<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['body','post_id','user_id'];
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function Post()
    {
        return $this->belongsTo('App\Models\post');
    }
}
