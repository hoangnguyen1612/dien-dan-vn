<?php
require_once 'xl_chung.php';
class xl_feedback_binh_luan extends xl_chung{
	protected $bang = 'feedback_binh_luan';
}

function dem_feedback_binh_luan($ma)
{
	$xl_feedback_binh_luan = new xl_feedback_binh_luan;
	$like = $xl_feedback_binh_luan->dem(array('ma_binh_luan'=>$ma, 'loai'=>1)); 
	$dislike = $xl_feedback_binh_luan->dem(array('ma_binh_luan'=>$ma, 'loai'=>0));
	
	return $like-$dislike;
}