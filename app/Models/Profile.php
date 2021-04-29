<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'avatar', 'website', 'bio'];

    public function getAvatarAttribute($avatar)
    {
        return asset('storage/avatars/'.$avatar);
    }

}
