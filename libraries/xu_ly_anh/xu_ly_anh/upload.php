<?php
function copyfileimage($oldpic,$newpic,$maxwidth=800,$maxheight=600,$quatily=65){

  $imagesize = getImageSize($oldpic);

  switch ($imagesize['mime']) {

  case 'image/gif':

    $im = imageCreateFromGIF($oldpic);

    break;

  case 'image/jpeg':

    $im = imageCreateFromJPEG($oldpic);

    break;

  case 'image/png':

    $im = imageCreateFromPNG($oldpic);

    break;

  case 'image/wbmp':

    $im = imageCreateFromWBMP($oldpic);

    break;

  case 'image/xbm':

    $im = imagecreatefromxbm($oldpic);

    break;

  default:

  	die("Hình ảnh không phù hợn : $oldpic");

  	break;

  }

    $width = imagesx($im);

    $height = imagesy($im);

    if(($maxwidth && $width > $maxwidth) || ($maxheight && $height > $maxheight)){

        if($maxwidth && $width > $maxwidth){

            $widthratio = $maxwidth/$width;

            $RESIZEWIDTH=true;

        }

        if($maxheight && $height > $maxheight){

            $heightratio = $maxheight/$height;

            $RESIZEHEIGHT=true;

        }

        /*if($RESIZEWIDTH && $RESIZEHEIGHT){

            if($widthratio < $heightratio){

                $ratio = $widthratio;

            }else{

                $ratio = $heightratio;

            }

        }elseif($RESIZEWIDTH){

            $ratio = $widthratio;

        }elseif($RESIZEHEIGHT){

           $ratio = $heightratio;

        }*/
		$ratio = $widthratio;

        $newwidth = $width * $ratio;

        $newheight = $height * $ratio;

        if(function_exists("imagecopyresampled")){

              $newim = imagecreatetruecolor($newwidth, $newheight);

              imagecopyresampled($newim, $im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

        }else{

            $newim = imagecreate($newwidth, $newheight);			

			imagecopyresized($newim, $im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

        }

        ImageJpeg ($newim,$newpic,$quatily);

        ImageDestroy ($newim);

    }else{

        ImageJpeg ($im,$newpic,$quatily);

    }

	ImageDestroy ($im);

}
//copyfileimage("upload/aa.jpg","thumb/aa.jpg",40,40);
function imageWaterMark($groundImage,$waterPos=9,$waterImage="nguyena.png"){

    $water_info = getimagesize($waterImage); 

    $w    = $water_info[0]; 

    $h    = $water_info[1];

    $water_im = imagecreatefrompng($waterImage);   

    imageAlphaBlending($water_im, false);

    imageSaveAlpha($water_im, true);

    if(!empty($groundImage) && file_exists($groundImage)) 

    { 

        $ground_info = getimagesize($groundImage); 

        $ground_w    = $ground_info[0]; 

        $ground_h    = $ground_info[1];

        switch($ground_info[2]) 

        { 

            case 1:$ground_im = imagecreatefromgif($groundImage);break; 

            case 2:$ground_im = imagecreatefromjpeg($groundImage);break; 

            case 3:$ground_im = imagecreatefrompng($groundImage);break; 

            default:die($formatMsg); 

        } 

    } 

    else{die("Không chấp nhận");} 

    if( ($ground_w<$w) || ($ground_h<$h) ){return;} 

    switch($waterPos) 

    { 

        case 0: 

            $posX = rand(0,($ground_w - $w)); 

            $posY = rand(0,($ground_h - $h)); 

            break; 

        case 1: 

            $posX = 0; 

            $posY = 0; 

            break; 

        case 2: 

            $posX = ($ground_w - $w) / 2; 

            $posY = 0; 

            break; 

        case 3: 

            $posX = $ground_w - $w; 

            $posY = 0; 

            break; 

        case 4: 

            $posX = 0; 

            $posY = ($ground_h - $h) / 2; 

            break; 

        case 5: 

            $posX = ($ground_w - $w) / 2; 

            $posY = ($ground_h - $h) / 2; 

            break; 

        case 6: 

            $posX = $ground_w - $w; 

            $posY = ($ground_h - $h) / 2; 

            break; 

        case 7: 

            $posX = 0; 

            $posY = $ground_h - $h; 

            break; 

        case 8: 

            $posX = ($ground_w - $w) / 2; 

            $posY = $ground_h - $h; 

            break; 

        case 9: 

            $posX = $ground_w - $w; 

            $posY = $ground_h - $h; 

            break; 

        default: 

            $posX = rand(0,($ground_w - $w)); 

            $posY = rand(0,($ground_h - $h)); 

            break;     

    } 

    imagealphablending($ground_im, true);     

    imagecopy($ground_im, $water_im, $posX, $posY, 0, 0, $w,$h);    

    unlink($groundImage);

		ImageJpeg($ground_im,$groundImage);

    if(isset($water_info)) unset($water_info); 

    if(isset($water_im)) imagedestroy($water_im); 

    unset($ground_info); 

    imagedestroy($ground_im); 

} 
//imageWaterMark("upload/bb.jpg",9,'upload/nguyena.png');
?>