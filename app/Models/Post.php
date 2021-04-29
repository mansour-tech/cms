<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\Slug;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','slug','body','image_path','approved','category_id','user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    // scope + (اسم دالة الذي تشتيها) منع تكرار إستعلامات - لتسمية الدالة 
    public function scopeApproved($query)
    {
        return $query->whereApproved(true)->latest();
    }

    // دوال اكسس سورس تعمل على تعديل حقل قبل طلبة لعرض
    // Attribute +شرط تسمية اولاً جيت بعدين اسم الحقل بدون فواصل ويبدا بحرف كبير
    // وتقبل معامل وهو قيمة الحقل تم شرح هذي دالة في فيديو عرض منشور

    public function getImagepathAttribute($img)
    {
        return asset('storage/images/'.$img);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title']=$value;
        $this->attributes['slug']=Slug::uniqueSlug($value,'posts');;
    }

}
