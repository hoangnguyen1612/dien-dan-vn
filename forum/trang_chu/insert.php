<?php
try{
	require '../ini.php';
	require '../classes/xl_chatbox.php';
	$data_chatbox['ma_nguoi_dung'] = $ma_nguoi_dung;
	$data_chatbox['ma_dien_dan'] = $ma_dien_dan;
	$data_chatbox['msg'] = $_REQUEST['msg'];
	$data_chatbox['ngay_tao'] = date('Y-m-d H:i:s');
	$dt_xl_chatbox = new xl_chatbox;
	
	$result=$dt_xl_chatbox->them($data_chatbox);
	if($result==NULL){
		throw new Exception('Lỗi thêm');
	}
		
	$ds_chatbox = $dt_xl_chatbox->danh_sach(0,0,array('ma_dien_dan'=>$ma_dien_dan),'ma ASC','*,(Select ten from nguoi_dung where nguoi_dung.ma = chatbox.ma_nguoi_dung) ten_nguoi_dung',PDO::FETCH_ASSOC,'',false);
	foreach($ds_chatbox as $chatbox){
		$ngay_tao = date('H:i',strtotime($chatbox['ngay_tao']));
		echo '<span class="username">'.$chatbox['ten_nguoi_dung'].'</span> : '.$chatbox['msg'].'&nbsp&nbsp&nbsp&nbsp&nbsp<span style="float:right">'.$ngay_tao.'</span></br>';
	}
}catch(Exception $e){
	echo $e->getMessage();
	exit;
}