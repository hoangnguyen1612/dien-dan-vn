<?php
try{
	require '../ini.php';
	
	sleep(1);
	
	$data = '';
	if(!isset($_POST['type']))
	{
		throw new Exception();
	}
	
	$type = $_POST['type'];
	
	if(!in_array($type, array(0, 1, 2)))
	{
		throw new Exception();
	}
	$ds = '';
	switch($type){
		case 0: 
				include '../../classes/xl_bai_viet.php';
				$xl_bai_viet = new xl_bai_viet;
				$ds = $xl_bai_viet->danh_sach(0, 10, array('ma_dien_dan'=>$ma_dien_dan), 'count(ma) DESC', 'ma_nguoi_dang, (select concat(ho, " ", ten) from nguoi_dung where ma = ma_nguoi_dang) as ten, count(ma_nguoi_dang) as tong', PDO::FETCH_ASSOC, ' group by ma_nguoi_dang', false);
				break;
		case 1: 
				include '../../classes/xl_binh_luan.php';
				$xl_binh_luan = new xl_binh_luan;
				$ds = $xl_binh_luan->danh_sach(0, 10, array('ma_dien_dan'=>$ma_dien_dan, 'dung'=>1), 'count(ma_nguoi_dung) DESC', 'ma_nguoi_dung, (select concat(ho, " ", ten) from nguoi_dung where ma = ma_nguoi_dung) as ten, count(ma_nguoi_dung) as tong', PDO::FETCH_ASSOC, ' group by ma_nguoi_dung', false);
				break;
		case 2: 
				include '../../classes/xl_binh_luan.php';
				$xl_binh_luan = new xl_binh_luan;
				$ds = $xl_binh_luan->danh_sach(0, 10, array('ma_dien_dan'=>$ma_dien_dan, 'giup_ich'=>1), 'count(ma_nguoi_dung) DESC', 'ma_nguoi_dung, (select concat(ho, " ", ten) from nguoi_dung where ma = ma_nguoi_dung) as ten, count(ma_nguoi_dung) as tong', PDO::FETCH_ASSOC, ' group by ma_nguoi_dung', false);
				break;				
	}
	
	if(empty($ds))
	{
		throw new Exception();
	}
	
	$i = 1;
	foreach ($ds as $item)
	{
		$data.="<div class='forum' title=''>
                <div class='feedback'><span>{$item['tong']}</span></div>
                <div class='content'>
                    <h3>$i.&nbsp;{$item['ten']}</h3>
                </div>
                <hr class='line' size='1'>
            </div>";
		$i++;	
	}
	
	throw new Exception();
	
}catch(Exception $e)
{
	echo $data;
}