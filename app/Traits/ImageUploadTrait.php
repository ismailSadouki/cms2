<?php
namespace App\Traits;

trait ImageUploadTrait
{
    protected $image_path = '/public/images';

    protected $avatar_path = '/public/avatars';

    protected $avatar_height=240;

    protected $avatar_width=240;

    protected $logo_height=50;
    protected $logo_width=70;


    protected $img_height=500;

    protected $img_width=704;

    public function uploadImage($img)
    {
        $img_name=$this->imageName($img);

        \Image::make($img)->resize($this->img_width,$this->img_height)->save(storage_path($this->image_path.'/'.$img_name));
    
        return $img_name;
    }

    public function imageName($image)
    {
        return time().'-'.$image->getClientOriginalName();
    }

    public function uploadAvatar($img)
    {
        $img_name=$this->imageName($img);

        \Image::make($img)->resize($this->img_width,$this->img_height)->save(storage_path($this->avatar_path.'/'.$img_name));
    
        return $img_name;
    }


    public function uploadImageLogo($img)
    {
        $img_name=$this->imageName($img);

        \Image::make($img)->resize($this->logo_width,$this->logo_height)->save(storage_path($this->image_path.'/'.$img_name));
    
        return $img_name;
    }

}