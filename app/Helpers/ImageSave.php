<?php
namespace App\Helpers;

class ImageSave{

   
    public static function Image($image,$name, $destination ){
   
        $image = preg_replace('#^data:image/[^;]+;base64,#', '',$image);
        $data = base64_decode($image);
        $image_name= ''.$name.'-'.rand().date('Y-m-d').time().'.png';
        $path = public_path($destination);
        if(!file_exists($path))
        {
            mkdir($path,0777,true);
        }
        $path = $path.'/'. $image_name;
        file_put_contents($path,$data);
        return $image_name;
    }

     public static function CroppedImageSave($image, $name, $destination)
    {
        $image = preg_replace('#^data:image/[^;]+;base64,#', '', $image);
        $data = base64_decode($image);
        $image_name = '' . $name . '-' . rand() . date('Y-m-d') . time() . '.webp';
        $path = public_path($destination);
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $path = $path . '/' . $image_name;
        file_put_contents($path, $data);
        $img = imagecreatefrompng($path); 
        $quality = 100;
        imagewebp($img, $path, $quality);
        imagedestroy($img);
        return $image_name;
    }
    
    public static function  withoutCrop($image, $name, $destination)
    {    
                $img = file_get_contents($image);
                $img_base64 = base64_encode($img);
                $data = base64_decode($img_base64);
                $image_name =$name.'-'.rand() .date('Y-m-d') .time().'.jpeg';
                $path = public_path($destination);
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                $path = $path . '/' . $image_name;
                file_put_contents($path, $data);
               /* $img = imagecreatefromjpeg($path);
                $quality = 50;
                imagewebp($img, $path, $quality);
                imagedestroy($img);*/
                return $image_name; 
            
    }
}

?>