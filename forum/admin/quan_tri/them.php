<?php
try{
include '../ini.php';

############## Chuẩn bị câu thông báo ##############
		if(isset($_SESSION['msg'])){
			$thong_bao = $dt_smarty->fetch('elements/message.tpl');
		# Xóa session
			unset($_SESSION['msg']);
			unset($_SESSION['style_msg']);
		}else{
			$thong_bao = '';
		}
#####################################################		

$dt_smarty->assign('thong_bao',$thong_bao);
$contentForLayout = $dt_smarty->fetch('quan_tri/them.tpl');

$dt_smarty->assign('contentForLayout', $contentForLayout);

$dt_smarty->display('layouts/default.tpl');
}catch(Exception $e){
	echo $e->getMessage();
	exit;
}

?>