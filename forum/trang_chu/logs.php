<?php
try{
	require '../../libraries/functions.php';
	require '../../config.php';
	require '../classes/xl_chatbox.php';
	
	$dbh = connection();
	$dien_dan = get_subdomain();
	
	$dt_xl_chatbox = new xl_chatbox;

	
	$ds_chatbox = $dt_xl_chatbox->danh_sach(0,0,array('ma_dien_dan'=>$dien_dan['ma']),'ma ASC','*,(Select ten from nguoi_dung where nguoi_dung.ma = chatbox.ma_nguoi_dung) ten_nguoi_dung',PDO::FETCH_ASSOC,'',false);
	foreach($ds_chatbox as $chatbox){
		$ngay_tao = date('H:i',strtotime($chatbox['ngay_tao']));
		echo '<span class="username">'.$chatbox['ten_nguoi_dung'].'</span> : '.$chatbox['msg'].'&nbsp&nbsp&nbsp&nbsp&nbsp<span style="float:right;margin-right:3px">'.$ngay_tao.'</span></br>';
	}
}catch(Exception $e){
	echo $e->getMessage();
	exit;
}