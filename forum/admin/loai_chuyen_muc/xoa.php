<?php
try{
	include '../ini.php';
	require '../../classes/xl_chuyen_muc.php';
	require '../../classes/xl_bai_viet.php';
	require '../../classes/xl_binh_luan.php';
	require '../../classes/xl_feedback_bai_viet.php';
	require '../../classes/xl_feedback_binh_luan.php';
	
	quan_tri('loai_chuyen_muc_xoa');
	
	$xl_chuyen_muc = new xl_chuyen_muc;
	$xl_bai_viet = new xl_bai_viet;
	$xl_binh_luan = new xl_binh_luan;
	$xl_feedback_bai_viet = new xl_feedback_bai_viet;
	$xl_feedback_binh_luan = new xl_feedback_binh_luan;
	
	kiem_tra_rong($_GET['ma'], 'Mã chuyên mục');
	$ma_chuyen_muc = trim($_GET['ma']);

	if($xl_chuyen_muc->doc(array('ma_dien_dan'=>$ma_dien_dan, 'ma_loai_cha'=>$ma_chuyen_muc)))
	{
		throw new Exception('Lỗi! [Chuyên mục] này có chuyên mục con, vui lòng xóa các chuyên mục con trước khi thực hiện thao tác này');
	}

	$dbh->beginTransaction();

	$ds_bai_viet = $xl_bai_viet->danh_sach(0, 0, array('ma_dien_dan'=>$ma_dien_dan, 'ma_loai_chuyen_muc'=>$ma_chuyen_muc), ' ma ASC', 'ma', PDO::FETCH_COLUMN, '', false);
	
	if($ds_bai_viet!=NULL)
	{
		#xóa bình luận
		$ds_binh_luan = array();
		foreach ($ds_bai_viet as $k)
		{
			$binh_luan = $xl_binh_luan->danh_sach(0, 0, array('ma_dien_dan'=>$ma_dien_dan, 'ma_bai_viet'=>$k), ' ma ASC', 'ma', PDO::FETCH_COLUMN, '', false);	
			$ds_binh_luan = array_merge($ds_binh_luan, $binh_luan);
			
			$xl_binh_luan->xoa(array('ma_dien_dan'=>$ma_dien_dan, 'ma_bai_viet'=>$k));
		}

		#xóa feedback bài viết
		foreach ($ds_bai_viet as $k)
		{
			$xl_feedback_bai_viet->xoa(array('ma_bai_viet'=>$k));
		}
	
		if($ds_binh_luan!=NULL)
		{
			#xóa feedback bình luận
			foreach ($ds_binh_luan as $k)
			{
				$xl_feedback_binh_luan->xoa(array('ma_binh_luan'=>$k));
			}
		}
	
		#xóa bài viết
		$xl_bai_viet->xoa(array('ma_dien_dan'=>$ma_dien_dan, 'ma_loai_chuyen_muc'=>$ma_chuyen_muc));
	}
	
	$xl_chuyen_muc->xoa(array('ma_dien_dan'=>$ma_dien_dan, 'ma'=>$ma_chuyen_muc));
	$dbh->commit();	
	throw new Exception('Thành công! Đã xóa dữ liệu của chuyên mục', 30);
	
}catch(Exception $e)
{
	throwMessage($e);
}