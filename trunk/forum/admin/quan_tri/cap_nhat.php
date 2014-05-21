<?php
try{
	include '../ini.php';
	include('../../classes/xl_quan_tri.php');
	$dt_xl_quan_tri = new xl_quan_tri;
	
	if(empty($_GET['ma'])){
		$_SESSION['msg']='Vui lòng nhập mã quản trị';
		$_SESSION['style_msg'] = 'notification error png_bg';
		header('Location: danh_sach.php');	
		exit;	
	}
#### Lấy ra được bài viết mới ##########
	$quan_tri = $dt_xl_quan_tri->doc($_GET['ma']);
	if($quan_tri == NULL){
		$_SESSION['msg']='Mã quản trị không tồn tại';
		$_SESSION['style_msg'] = 'notification error png_bg';
		header('Location: danh_sach.php');	
		exit;	
	}

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
	$dt_smarty->assign('quan_tri',$quan_tri);	
	$dt_smarty->assign('thong_bao',$thong_bao);
	$dt_smarty->assign('trang_thai',array(1 => 'Hoạt động',0=>'Không hoạt động'));
	$contentForLayout = $dt_smarty->fetch('quan_tri/cap_nhat.tpl');
	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	
	$dt_smarty->display('layouts/default.tpl');
	$dbh = NULL;
}catch(Exception $e){
	echo $e->getMessage();
	exit;
}
?>