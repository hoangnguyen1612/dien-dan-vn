<?php
try{
	require '../ini.php';
	require '../ini_interface.php';
	require '../../classes/xl_bao_cao_bai_viet.php';
	require '../../classes/xl_nguoi_dung.php';
	require '../../classes/xl_loai_xu_ly_vi_pham_bai_viet.php';
	
	$url = $_SERVER['HTTP_REFERER'];

	if(empty($_POST['data']))
	{
		throw new Exception('Dữ liệu không hợp lệ');
	}
	
	$data = $_POST['data'];
	if(!isset($data['loai_xu_ly']))
	{
		throw new Exception('Lỗi hình thức xử lý vi phạm');
	}
	if(!isset($data['ma_bao_cao']))
	{
		throw new Exception('Lỗi mã báo cáo xử lý vi phạm');
	}
	if(!isset($data['tb_nguoi_bao_cao']))
	{
		throw new Exception('Lỗi gửi thông báo cho người báo cáo vi phạm');
	}
	if(!in_array($data['tb_nguoi_bao_cao'], array(0, 1)))
	{
		throw new Exception('Lỗi hình thức xử lý vi phạm không hợp lệ');
	}
	
	$ma_bao_cao = post_decode($data['ma_bao_cao']);
	
	$dbh->beginTransaction();
	
	$xl_bao_cao_bai_viet = new xl_bao_cao_bai_viet;
	$bao_cao = $xl_bao_cao_bai_viet->doc(array('ma_dien_dan'=>$ma_dien_dan, 'ma'=>$ma_bao_cao), 'bao_cao_bai_viet.*, (select tieu_de from bai_viet where ma_bai_viet = ma) as tieu_de, (select ma_nguoi_dang from bai_viet where ma_bai_viet = ma) as ma_nguoi_dang');
	if(!$bao_cao)
	{
		throw new Exception('Mã báo cáo bài viết không hợp lệ');
	}
	
	$loai_xu_ly = $data['loai_xu_ly'];
	$tb_nguoi_bao_cao = $data['tb_nguoi_bao_cao'];
	
	$xl_loai_xu_ly_vi_pham_bai_viet = new xl_loai_xu_ly_vi_pham_bai_viet;
	
	if(!$item = $xl_loai_xu_ly_vi_pham_bai_viet->doc(array('ma'=>$loai_xu_ly), 'ten'))
	{
		throw new Exception('Lỗi hình thức xử lý vi phạm không hợp lệ');
	}
	$ten_loai_xl = $item['ten'];
	
	# xử lý vi phạm
	switch($loai_xu_ly){
		case 3:
				require '../../classes/xl_bai_viet.php';
				$xl_bai_viet = new xl_bai_viet;
				if(!$xl_bai_viet->cap_nhat_dieu_kien(array('trang_thai'=>0), array('ma_dien_dan'=>$ma_dien_dan, 'ma'=>$bao_cao['ma_bai_viet'])))
				{
					throw new Exception('Đã có lỗi trong quá trình xử lý báo cáo vi phạm bài viết');
				}
				break;
				
		case 4:
				if(!$xl_thanh_vien_dien_dan->cap_nhat_dieu_kien(array('trang_thai'=>0), array('ma_dien_dan'=>$ma_dien_dan, 'ma_nguoi_dung'=>$bao_cao['ma_nguoi_dang'])))
				{
					throw new Exception('Đã có lỗi trong quá trình xử lý báo cáo vi phạm bài viết');
				}
				break;
	}
	
	include '../../classes/xl_thong_bao.php';
	$xl_thong_bao = new xl_thong_bao;
	
	# gửi thông báo người viết bài
	if($loai_xu_ly!=1)
	{
		# nếu bài viết vi phạm thì có thông báo gửi đến thành viên
		if(empty($data['noi_dung']))
		{
			throw new Exception('Lỗi nội dung gửi thông báo cho người viết bài');
		}
		$noi_dung = $data['noi_dung'];
		
		if(!$result = $xl_thong_bao->them(array('loai_thong_bao'=>3, 'gui_tu'=>$ma_nguoi_dung, 'gui_den'=>$bao_cao['ma_nguoi_dang'], 'ma_dien_dan'=>$ma_dien_dan,'trang_thai'=>0, 'noi_dung'=>"Bài viết : '{$bao_cao['tieu_de']}' trong diễn đàn {$dien_dan['ten']} của bạn đã vi phạm nội quy của diễn đàn. Lý do: $noi_dung. Hình thức xử lý của diễn đàn: $ten_loai_xl", 'ngay_tao'=>date('Y-m-d h:i:s'), 'duong_dan'=>"/{$dien_dan['ma_linh_vuc']}/{$dien_dan['domain']}/bai_viet/chi_tiet?ma={$bao_cao['ma_bai_viet']}")))
		{
			throw new Exception('Lỗi nội dung gửi thông báo cho người viết bài');
		}
	}
	
	# gửi thông báo cho người báo cáo vi phạm bài viết
	if($tb_nguoi_bao_cao==0)
	{
		if(!$result = $xl_thong_bao->them(array('loai_thong_bao'=>2, 'gui_tu'=>$ma_nguoi_dung, 'gui_den'=>$bao_cao['ma_nguoi_bao_cao'], 'ma_dien_dan'=>$ma_dien_dan,'trang_thai'=>0, 'noi_dung'=>"Báo cáo sai phạm của bạn ở bài viết :{$bao_cao['tieu_de']} trong diễn đàn {$dien_dan['ten']} đã được xử lý. Hình thức xử lý: $ten_loai_xl",'ngay_tao'=>date('Y-m-d h:i:s'), 'duong_dan'=>"/{$dien_dan['ma_linh_vuc']}/{$dien_dan['domain']}/bai_viet/chi_tiet?ma={$bao_cao['ma_bai_viet']}")))
		{
			throw new Exception('Lỗi nội dung gửi thông báo cho người báo cáo vi phạm');
		}
	}
	
	if(!$xl_bao_cao_bai_viet->cap_nhat_dieu_kien(array('ma_nguoi_xu_ly'=>$ma_nguoi_dung, 'trang_thai'=>1, 'ma_loai_xu_ly'=>$loai_xu_ly), array('ma_dien_dan'=>$ma_dien_dan, 'ma'=>$ma_bao_cao)))
	{
		throw new Exception('Đã có lỗi trong quá trình xử lý vi phạm bài viết');
	}

	$dbh->commit();
	
	$url = 'bai_viet.php';
	throw new Exception();
	
}catch(Exception $e){
	throwMessage($e, $url);
}
