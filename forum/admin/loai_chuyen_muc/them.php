<?php
try{
include '../ini.php';	
include '../ini_interface.php';
include '../../classes/xl_chuyen_muc.php';

	
$dt_xl_chuyen_muc = new xl_chuyen_muc;
$ds_chuyen_muc = $dt_xl_chuyen_muc->danh_sach(0,0,array('ma_dien_dan'=>$_SESSION['dien_dan']['ma']),'thu_tu_hien_thi ASC', '*', PDO::FETCH_ASSOC, '', false);
// danh sách các chuyên mục
$dt_smarty->assign('ds_chuyen_muc',$ds_chuyen_muc);
$dt_smarty->assign('rieng_ru',array('Có'=>1 , 'Không' => 0));
$dt_smarty->assign('chon',1);
############## Chuẩn bị câu thông báo ##############
		if(isset($_SESSION['msg'])){
			$thong_bao = $dt_smarty->fetch('elements/message.tpl');
		# Xóa session
			unset($_SESSION['msg']);
			unset($_SESSION['style_msg']);
		}else{
			$thong_bao = '';
		}
		$dt_smarty->assign('thong_bao',$thong_bao);
#####################################################
$contentForLayout = $dt_smarty->fetch('loai_chuyen_muc/them.tpl');		
$dt_smarty->assign('contentForLayout', $contentForLayout);

$dt_smarty->display('layouts/default.tpl');
}catch(Exception $e){
	echo $e->getMessage();
	exit;
}
?>