<?php
try{
	require '../ini.php';
	require '../classes/xl_chatbox.php';
	if($ma_nguoi_dung==''){
		throw new Exception('Vui lòng đăng nhập để thực hiện chức năng trò chuyện');
	}
	$data_chatbox['ma_nguoi_dung'] = $ma_nguoi_dung;
	$data_chatbox['ma_dien_dan'] = $ma_dien_dan;
	$data_chatbox['msg'] = $_POST['msg'];
	$data_chatbox['ngay_tao'] = date('Y-m-d H:i:s');
	$data_chatbox['mausac'] = $_POST['mausac'];
	$dt_xl_chatbox = new xl_chatbox;
	
	$result=$dt_xl_chatbox->them($data_chatbox);
	if($result==NULL){
		throw new Exception('Lỗi thêm');
	}
	$domain = $dien_dan['domain'];
	$ma_linh_vuc = $dien_dan['ma_linh_vuc'];	
	$ds_chatbox = $dt_xl_chatbox->danh_sach(0,0,array('ma_dien_dan'=>$ma_dien_dan),'ma ASC','*,(Select ten from nguoi_dung where nguoi_dung.ma = chatbox.ma_nguoi_dung) ten_nguoi_dung',PDO::FETCH_ASSOC,'',false);
	foreach($ds_chatbox as $chatbox){
		$ngay_tao = date('H:i',strtotime($chatbox['ngay_tao']));
		$ma_nguoi_chat = $chatbox['ma_nguoi_dung'];
		echo '<a href=/'.$ma_linh_vuc.'/'.$domain.'/thanh_vien/thong_tin?ma_thanh_vien='.$ma_nguoi_chat.'><span class="username" style="color:'.$chatbox['mausac'].'">'.$chatbox['ten_nguoi_dung'].'</span></a> : '.$chatbox['msg'].'&nbsp&nbsp&nbsp&nbsp&nbsp<span style="float:right;margin-right:3px">'.$ngay_tao.'</span></br>';
	}
}catch(Exception $e){
	echo $e->getMessage();
	exit;
}