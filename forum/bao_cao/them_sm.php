<?php
try{
	include '../ini.php';
	include '../classes/xl_bai_viet.php';
	include '../classes/xl_binh_luan.php';
	include '../classes/xl_bao_cao_bai_viet.php';
	include '../classes/xl_bao_cao_binh_luan.php';
	
	kiem_tra_quyen();

	if(!isset($_POST['loai'])){
		throw new Exception('Vui lòng nhập loại báo cáo');
	}
	if($_POST['loai'] != 0 && $_POST['loai'] != 1){
		throw new Exception('Loại báo cáo không đúng , vui lòng thử lại');
	}
	if(empty($_POST['ma'])){
		throw new Exception('Vui lòng nhập mã bài viết hoặc mã bình luận');
	}
	if(empty($_POST['noi_dung'])){
		throw new Exception('Vui lòng nhập nội dung cho báo cáo');
	}
	$dt_xl_bai_viet = new xl_bai_viet;
	$dt_xl_binh_luan = new xl_binh_luan;	
	$dt_xl_bao_cao_bai_viet = new xl_bao_cao_bai_viet;
	$dt_xl_bao_cao_binh_luan = new xl_bao_cao_binh_luan;
	
	$data['ngay_tao'] = date('Y-m-d H:i:s');
	$data['ma_nguoi_bao_cao'] = $login['ma'];
	$data['ma_dien_dan'] = $ma_dien_dan;
	if($_POST['noi_dung_khac'] != ''){
		$data['noi_dung'] = $_POST['noi_dung_khac'];
	}else{
		$data['noi_dung'] = $_POST['noi_dung'];
	}

	if($_POST['loai'] == 0){		
		
		if(!$dt_xl_bai_viet->doc(array('ma'=>$_POST['ma'],'ma_dien_dan'=>$ma_dien_dan))){
			throw new Exception('Bài viết không tồn tại');
		}
		$data['ma_bai_viet'] = $_POST['ma'];
		$dt_xl_bao_cao_bai_viet->them($data);	
		$ma_bai_viet = $_POST['ma'];
	}
	if($_POST['loai'] == 1){
		$binh_luan = $dt_xl_binh_luan->doc(array('ma'=>$_POST['ma'],'ma_dien_dan'=>$ma_dien_dan));
		if($binh_luan == NULL){
			throw new Exception('Bài bình luận không tồn tại');
		}
		$data['ma_binh_luan'] = $_POST['ma'];
		
		$dt_xl_bao_cao_binh_luan->them($data);
		$ma_bai_viet = $binh_luan['ma_bai_viet'];
	}

	header("Location:/{$dien_dan['ma_linh_vuc']}/{$dien_dan['domain']}/bai_viet/chi_tiet?ma={$ma_bai_viet}");
	exit;

}catch(Exception $e){
	$_SESSION['message']['type'] = 'error';
	$_SESSION['message']['content'] =  $e->getMessage();
	header("Location:".$_SERVER['HTTP_REFERER']);
}