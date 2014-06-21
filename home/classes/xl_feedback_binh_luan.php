<?php
require_once 'xl_chung.php';
class xl_feedback_binh_luan extends xl_chung{
	protected $bang = 'feedback_binh_luan';
}

function dem_feedback_binh_luan($ma,$loai)
{
	$xl_feedback_binh_luan = new xl_feedback_binh_luan;
	if($loai == 1){
		$feedback = $xl_feedback_binh_luan->dem(array('ma_binh_luan'=>$ma, 'loai'=>1)); // đếm các bình luận có like
	}else{
		$feedback = $xl_feedback_binh_luan->dem(array('ma_binh_luan'=>$ma, 'loai'=>0)); // đếm các bình luận dislike
	}
	return $feedback ;
}
function trang_thai_thich_binh_luan($ma_binh_luan,$ma_nguoi_dung){
	$xl_feedback_binh_luan = new xl_feedback_binh_luan;
	$trang_thai = $xl_feedback_binh_luan->doc(array('ma_binh_luan'=>$ma_binh_luan,'ma_nguoi_dung'=>$ma_nguoi_dung),'ma');
	return $trang_thai;
}