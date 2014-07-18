<?php
try{
	include ('../ini.php');	
	require '../classes/xl_dien_dan.php';

	sleep(1);
	$result = '';
	if(empty($_POST['page']))
	{
		throw new Exception();
	}

	$page = $_POST['page'];

	$xl_dien_dan = new xl_dien_dan;
	
	$ds = $xl_dien_dan->danh_sach($page, 10, '', 'ngay_tao DESC', '*', PDO::FETCH_ASSOC, '', false);
	
	if(!empty($ds))
	{
		foreach($ds as $item)
		{
			$ten = $item['ten'];
			if(strlen($ten)>21)
			{
				$ten = substr($item['ten'], 0, 21);
				$ten.='...';
			}
			$result.="<div class='forum'>
           	<center><a href='/{$item['ma_linh_vuc']}/{$item['domain']}'><img data-action='swing'  src='/home/upload/dien_dan/{$item['hinh_dai_dien']}' class='img'/></a></center>
           	 <p class='header'><span class='title'><a href='/{$item['ma_linh_vuc']}/{$item['domain']}'>".$ten."</a></span><br />
             <span class='user'><i class='fa fa-users'></i> {$item['so_luong_thanh_vien']} thành viên</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class='time'><i class='fa  fa-thumbs-o-up'></i>&nbsp;Đánh giá:&nbsp;{$item['feedback']}%</span>
             </p>
           </div>";	
		}
	}

	throw new Exception();
}catch(Exception $e)
{
	echo $result;
}