<?php
try{
	require '../ini.php';
	require '../classes/xl_feedback_binh_luan.php';
	require '../classes/xl_binh_luan.php';
	require '../classes/xl_thanh_vien_dien_dan.php';

	$xl_feedback_binh_luan = new xl_feedback_binh_luan;
	

	kiem_tra_quyen();
	
	if(empty($_GET['ma_binh_luan']))
	{
		echo 'Mã bình luận không hợp lệ';exit;
	}
	
	$ma_binh_luan = $_GET['ma_binh_luan'];
	
	$xl_binh_luan = new xl_binh_luan;
	if(!$xl_binh_luan->doc(array('ma'=>$ma_binh_luan, 'ma_dien_dan'=>$ma_dien_dan)))
	{
		throw new Exception('Mã bình luận không hợp lệ');
	}
	$binh_luan_thich = $xl_feedback_binh_luan->doc(array('ma_binh_luan'=>$ma_binh_luan, 'ma_nguoi_dung'=>$ma_nguoi_dung), 'ma');
	
	
	if($binh_luan_thich == NULL){
	
		$xl_feedback_binh_luan->them(array('ma_binh_luan'=>$ma_binh_luan, 'ngay_tao'=>date('Y-m-d H:i:s'), 'ma_nguoi_dung'=>$ma_nguoi_dung));	
		cong_like_binh_luan($ma_binh_luan); // cộng thêm like cho bình luận đó
		$binh_luan = $xl_binh_luan->doc(array('ma'=>$ma_binh_luan,'ma_dien_dan'=>$ma_dien_dan));
		cong_diem_thanh_vien($binh_luan['ma_nguoi_dung'],$ma_dien_dan,$diem_duoc_thich); // tính điểm cho thành viên khi được like bình luận
		$so_luong_nguoi_thich = $binh_luan['thich'];
		echo "like~$so_luong_nguoi_thich";exit;
		
	}else{
		$xl_feedback_binh_luan->xoa(array('ma_binh_luan'=>$ma_binh_luan,'ma_nguoi_dung'=>$ma_nguoi_dung));
		tru_like_binh_luan($ma_binh_luan);
		$binh_luan = $xl_binh_luan->doc(array('ma'=>$ma_binh_luan,'ma_dien_dan'=>$ma_dien_dan));
		tru_diem_thanh_vien($binh_luan['ma_nguoi_dung'],$ma_dien_dan,$diem_duoc_thich); // trừ điểm cho thành viên khi bỏ like bình luận
		$so_luong_nguoi_thich = $binh_luan['thich'];
		echo "dislike~$so_luong_nguoi_thich";exit;
	}
	
	echo 'Lỗi trong quá trình thích bài viết ,vui lòng thử lại sau';exit;
	
}catch(PDOException $e)
{
	echo $e->getMessage();exit;
}catch(Exception $e)
{
	throwMessage($e);
}