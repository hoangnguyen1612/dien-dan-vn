<?php
function connection()
{
	try{
		$dbh = new PDO('mysql:host=localhost;dbname='.DB_NAME, DB_USERNAME, DB_PASSWORD);
		$dbh->exec('set names utf8');
	}catch(Exception $e)
	{
		throw new Exception('Server is maintaining, please try again later!');
	}
	$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERR_NONE);
	return $dbh;

}
function kiem_tra_quyen()
{
	global $login, $thanh_vien;
	if($login=='')
	{
		throw new Exception('Vui lòng đăng nhập để thực hiện chức năng này');
	} 
	if($thanh_vien=='')
	{
		throw new Exception('Vui lòng tham gia diễn đàn để thực hiện chức năng này');
	}
	if($thanh_vien['loai_thanh_vien']==3)
	{
		throw new Exception('Bạn chưa là thành viên của diễn đàn, vui lòng quay lại sau');
	}
}
function get_subdomain()
{
	global $dbh;
	if(empty($_GET['forum']))
	{
		throw new Exception('Forum error');
	}
	$ma_dien_dan = $_GET['forum']; 
	$sql = 'select * from dien_dan where ma = :ma limit 0,1';
	
	$sth = $dbh->prepare($sql);
	$sth->execute(array('ma'=>$ma_dien_dan));
	
	$dien_dan = $sth->fetch(PDO::FETCH_ASSOC);

	if(!$dien_dan)
	{
		throw new Exception('This forum does not exist!');
	}
	
	return $dien_dan;
}
function tao_chuoi($do_dai, $do_phuc_tap=0)
{
	$chuoi = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	
	if($do_phuc_tap==1)
	{
		$chuoi.='!@#$%^&*';
	}
	
	$ket_qua = '';
	for($i=0; $i<$do_dai; $i++)
	{
		$j = rand(0, 61);
		$ket_qua.=$chuoi[$j];
	}
	
	return $ket_qua;
}
function debug($arr)
{
	echo '<pre>';
	print_r($arr);
	echo '</pre>';
	exit;
}

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