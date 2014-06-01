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

function showMessage()
{
	global $dt_smarty;
	
	if(!empty($_SESSION['message']['content']))
	{
		echo $dt_smarty->fetch('elements/message.tpl');
		unset($_SESSION['message']['content']);
	}
}

function kiem_tra_rong($value, $content)
{
	if(empty($value) || $value=='')
	{
		throw new Exception("Lỗi! [$content] phải có giá trị, vui lòng kiểm tra lại");
	}
}

function kiem_tra_gia_tri($variable, $value, $content)
{
	if(!in_array($variable, $value))
	{
		throw new Exception("Lỗi! [$content] không hợp lệ, vui lòng kiểm tra lại");
	}
}

function kiem_tra_la_so($value, $content, $ss = 0)
{
	if(!is_numeric($value) && $value<$ss)
	{
		throw new Exception("Lỗi! [$content] phải là số nguyên dương, vui lòng kiểm tra lại");
	}
}

function quan_tri($value)
{
	global $dbh, $thanh_vien, $ma_dien_dan;
	
	if($thanh_vien['loai_thanh_vien']==0)
	{
		return;
	}
	
	$sql = 'select quyen from thanh_vien_dien_dan where ma_nguoi_dung = :ma_nguoi_dung and ma_dien_dan = :ma_dien_dan';
	$sth = $dbh->prepare($sql);
	$sth->execute(array('ma_dien_dan'=>$ma_dien_dan, 'ma_nguoi_dung'=>$thanh_vien['ma_nguoi_dung']));
	$tv = $sth->fetch();
	
	if(strpos($tv['quyen'], $value)===false)
	{
		throw new Exception('Bạn không có quyền thực hiện thao tác này');
	}
}

function _date($date)
{
	return date('d-m-Y', strtotime($date));
}

function _date_time($date)
{
	return date('H:i d-m-Y', strtotime($date));
}

function getChildren($id, $categories)
{
	$arr = array($id);
	$children = array();
	
	do{
		list($cur_key, $cur_value) = each($arr);
		
		foreach($categories as $k => $category)
		{
			if ($category['ma_loai_cha'] == $cur_value)
			{
				$children[] = $k;
				$arr[] = $k;
			}
		}
		
		unset($arr[$cur_key]);
	} while (count($arr)>0);

	return $children;
}

function getParents($id, $categories)
{ 
	$parents = array();
	
	while(isset($categories[$id]))
	{
		$parent = $categories[$id];
		
		if($parent)
		{
			$parents[] = $categories[$parent];
		}
		$id = $parent;
	}
	
	return $parents;
}


function kiem_tra_loai_cha($id, $categories)
{
	$ma_loai_cha = $categories[$id];

	if(!empty($categories[$ma_loai_cha]))
	{
		return 1;
	}
	
	return 0;
}

function getChildrenFirst($id, $categories)
{
	$children = array();

	foreach($categories as $k => $category)
	{
		if($category['ma_loai_cha'] == $id)
		{
			$children[$category['ma']] = array('ten'=>$category['ten'], 'thu_tu_hien_thi'=>$category['thu_tu_hien_thi']);
		}
	}
	
	return $children;
}
function getChildrenFirstForum($id, $categories)
{
	$children = array();

	foreach($categories as $k => $category)
	{
		if($category['ma_loai_cha'] == $id)
		{
			$children[$category['ma']] = array('ten'=>$category['ten'], 'ghi_chu'=>$category['ghi_chu']);
		}
	}
	
	return $children;
}

function throwMessage(Exception $e, $url='')
{
	global $dbh;
	
	$dbh = NULL;

	$_SESSION['message'] = array(
		'type' => ($e->getCode() == 30) ? 'success' : 'error',
		'content' => $e->getMessage()
	);
	
	if($url)
	{
		header('Location: '.$url);
	}
	else
	{
		if(empty($_SERVER['HTTP_REFERER']))
		{
			echo '<meta http-equiv="content-type" content="text/html"; charset="utf-8" />';
			echo '<span style="color:red">',$e->getMessage(),'</span>';
		}
		else
		{
			header('Location: '.$_SERVER['HTTP_REFERER']);
		}
	}
	
	exit;
}

function url_encode($str)
{
	return rawurlencode(base64_encode($str));
}

function url_decode($str)
{
	return rawurldecode(base64_decode($str));
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

function tim_kiem_chuoi($str1, $str2)
{
	return strpos($str1, $str2);
}
function noi_chuoi($str1, $str2, $x='')
{
	return $str1.$x.$str2;
}
function get_subdomain()
{
	global $dbh;
	if(empty($_GET['forum']))
	{
		echo ('Forum error');
		exit;
	}
	$ma_dien_dan = $_GET['forum']; 
	$sql = 'select * from dien_dan where ma = :ma limit 0,1';
	
	$sth = $dbh->prepare($sql);
	$sth->execute(array('ma'=>$ma_dien_dan));
	
	$dien_dan = $sth->fetch(PDO::FETCH_ASSOC);

	if($dien_dan==NULL)
	{
		echo ('Error forum!');
		exit;
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
# Thời gian
function time_since($since) {
    $chunks = array(
        array(60 * 60 * 24 * 365 , 'năm trước'),
        array(60 * 60 * 24 * 30 , 'tháng trước'),
        array(60 * 60 * 24 * 7, 'tuần trước'),
        array(60 * 60 * 24 , 'ngày trước'),
        array(60 * 60 , 'giờ trước'),
        array(60 , 'phút trước'),
        array(1 , 'giây trước')
    );

    for ($i = 0, $j = count($chunks); $i < $j; $i++) {
        $seconds = $chunks[$i][0];
        $name = $chunks[$i][1];
        if (($count = floor($since / $seconds)) != 0) {
            break;
        }
    }

    $print = ($count == 1) ? '1 '.$name : "$count {$name}";
    return $print;
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