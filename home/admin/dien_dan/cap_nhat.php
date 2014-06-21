<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
try{
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	include('../ini.php');
	include('../../classes/xl_loai_bai_viet.php');
	include('../../classes/xl_bai_viet.php');
	
	# lấy mã
	if(empty($_GET['ma']))
	{
		throw new Exception('Đã có lỗi, vui lòng thử lại sau!');
	}
	$ma_bai_viet = $_GET['ma'];
	# đối tượng xử lý bài viết 
	$dt_xl_loai_bai_viet = new xl_loai_bai_viet;
	$ds_loai_bai_viet = $dt_xl_loai_bai_viet->danh_sach_all();
	$dt_smarty->assign('ds_loai_bai_viet', $ds_loai_bai_viet);
	
	$dt_xl_bai_viet = new xl_bai_viet;
	$bai_viet = $dt_xl_bai_viet->doc($ma_bai_viet);
	$dt_smarty->assign('ds_loai_bai_viet',$dt_xl_loai_bai_viet->danh_sach_all());

	$dt_smarty->assign('bai_viet',$bai_viet);
	
	$dt_smarty->assign('trang_thai',array(1=>"Hiển Thị",0=>"Không Hiển Thị"));
	
	# js
	$jsForLayout = $dt_smarty->fetch('bai_viet/them.js');
	$dt_smarty->assign('jsForLayout',$jsForLayout);
	
	#content
	$contentForLayout = $dt_smarty->fetch('bai_viet/cap_nhat.tpl');
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	$dt_smarty->display('layouts/default.tpl');	
	#unset session
	unset($_SESSION['data']);
	unset($_SESSION['message']);
	unset($_SESSION['type_message']);
}catch(Exception $e)
{
	
}
function in_loai_bai_viet($ds, $ma, $kitu, $ma_chon) {
	foreach ($ds as $loai_bai_viet):
		if ($loai_bai_viet['ma_loai_cha'] == $ma):
			
			if ($loai_bai_viet['ma'] == $ma_chon) {		
				echo '<option selected="selected" value="',$loai_bai_viet['ma'],'">', $kitu,$loai_bai_viet['ten'],'</option>';
			} else{
				echo '<option value="',$loai_bai_viet['ma'],'">', $kitu,$loai_bai_viet['ten'],'</option>';
			} 
		    in_loai_bai_viet($ds, $loai_bai_viet['ma'], $kitu.$kitu, $ma_chon);
		endif;
	endforeach;			
}
?>