<?php
try{
	include "../ini.php";
	
	quan_tri('thanh_vien_cap_nhat');
	
	#debug($_POST);
	if(empty($_POST['item'])){
		throw new Exception('Vui lòng chọn thành viên cần cập nhật');	
	}
	if(!is_numeric($_POST['loai_thanh_vien'])){
		throw new Exception('Vui lòng nhập loại thành viên để cập nhật');
	}
	if(($_POST['loai_thanh_vien']!=1) && ($_POST['loai_thanh_vien']!=2)){
		throw new Exception('Vui lòng nhập đúng loại thành viên');
	}
	$str = '';
	$loai_thanh_vien = $_POST['loai_thanh_vien']; 

	$ma_dien_dan = $_SESSION['dien_dan']['ma'];
	foreach($_POST['item'] as $id){
		$ma = urldecode(base64_decode(trim($id)));
		$tv = $xl_thanh_vien_dien_dan->doc(array('ma_nguoi_dung'=>$ma,'ma_dien_dan'=> $ma_dien_dan), 'ma_nguoi_dung, quyen, loai_thanh_vien');
	
		if($tv['loai_thanh_vien'] == 0){
			$str .= "$ma,";
			continue;
		}
		if ($tv == NULL) {
			$str .= "$ma,";
			continue;	
		} 
		
		if($loai_thanh_vien==2 && $tv['quyen']!=NULL)
			$result = $xl_thanh_vien_dien_dan->cap_nhat_dieu_kien(array('loai_thanh_vien'=>$loai_thanh_vien, 'quyen'=>NULL), array('ma_dien_dan'=>$ma_dien_dan, 'ma_nguoi_dung'=>$ma));
		else
			$result = $xl_thanh_vien_dien_dan->cap_nhat_dieu_kien(array('loai_thanh_vien'=>$loai_thanh_vien), array('ma_dien_dan'=>$ma_dien_dan, 'ma_nguoi_dung'=>$ma));
	
		if($result===false){
			$str .= "$ma,";
			continue;
		} 
	}
	if($str == ''){
		throw new Exception('Cập nhật thành viên thành công', 30);
	}else{
		throw new Exception('Lỗi! Các thành viên có mã sau không cập nhật được: '.$str);
	}
}catch(Exception $e){
	throwMessage($e);
}

	
	
	
