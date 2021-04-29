<?php

namespace App\Traits;

trait ImageUploadTrait
{
    protected $image_path  = "app/public/images";

    protected $avatar_path  = "app/public/avatars";  

    protected $avatar_height=240;
 
    protected $avatar_width=240;
    
    protected $img_height=300;
 
	protected $img_width=700;
 
    public function uploadImage($img)
    {
        $img_name=$this->imageName($img);

        \Image::make($img)->resize($this->img_width,$this->img_height)->save(storage_path($this->image_path.'/'.$img_name));

        return $img_name;
    }

    public function uploadAvatar($img)
    {
        $img_name=$this->imageName($img);

        \Image::make($img)->resize($this->avatar_width,$this->avatar_height)->save(storage_path($this->avatar_path.'/'.$img_name));

        return $img_name;
    }

    public function imageName($image)
    {
        return time().'-'.$image->getClientOriginalName();
    }
    

}