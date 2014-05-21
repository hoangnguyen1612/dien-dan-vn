<?php

/*
	Ta co mot hinh o server kich thuot rat lon, 
	muon khi no hien thi o browser no se duoc thumb
	Chi goi ham, truyen duong dan file hinh, no se hien ra hinh
*/
function thumb($img, $w, $h, $fill = true) {
        if (!extension_loaded('gd') && !extension_loaded('gd2')) {
                trigger_error("No dispones de la libreria GD para generar la imagen.", E_USER_WARNING);
                return false;
        }

        $imgInfo = getimagesize($img);
        switch ($imgInfo[2]) {
                case 1: $im = imagecreatefromgif($img); break;
                case 2: $im = imagecreatefromjpeg($img);  break;
                case 3: $im = imagecreatefrompng($img); break;
                default:  trigger_error('Tipo de imagen no reconocido.', E_USER_WARNING);  break;
        }

        if ($imgInfo[0] <= $w && $imgInfo[1] <= $h && !$fill) {
                $nHeight = $imgInfo[1];
                $nWidth = $imgInfo[0];
        }else{
                if ($w/$imgInfo[0] < $h/$imgInfo[1]) {
                        $nWidth = $w;
                        $nHeight = $imgInfo[1]*($w/$imgInfo[0]);
                }else{
                        $nWidth = $imgInfo[0]*($h/$imgInfo[1]);
                        $nHeight = $h;
                }
        }
  
        $nWidth = round($nWidth);
        $nHeight = round($nHeight);

        $newImg = imagecreatetruecolor($nWidth, $nHeight);

        imagecopyresampled($newImg, $im, 0, 0, 0, 0, $nWidth, $nHeight, $imgInfo[0], $imgInfo[1]);

        header("Content-type: ". $imgInfo['mime']);

        switch ($imgInfo[2]) {
                case 1: imagegif($newImg); break;
                case 2: imagejpeg($newImg);  break;
                case 3: imagepng($newImg); break;
                default:  trigger_error('Imposible mostrar la imagen.', E_USER_WARNING);  break;
        }
  
        imagedestroy($newImg);
}
thumb("16.png",50,50);

/*
	Chen mot hinh khac vao hinh hien tai
	Thuong dung de chen dong chu vao mot cai hinh. Khi do hinh mark se chua mot dong chu va dang bi transparent
	Sau khi goi ham, hinh goc se bi chen hinh mark vao
*/
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
//imageWaterMark("aa.jpg");

/*
	Copy hinh anh
	Thuong dung de copy anh goc vao thu muc khac, dong thoi trong luc copy se thumb anh moi luon
	Anh goc se ko bi thumb, chi co anh moi bi thumb thoi
*/
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

        if($RESIZEWIDTH && $RESIZEHEIGHT){

            if($widthratio < $heightratio){

                $ratio = $widthratio;

            }else{

                $ratio = $heightratio;

            }

        }elseif($RESIZEWIDTH){

            $ratio = $widthratio;

        }elseif($RESIZEHEIGHT){

            $ratio = $heightratio;

        }

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
//copyfileimage("aa.jpg","cc.jpg",40,40);
?>