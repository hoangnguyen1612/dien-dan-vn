<?php
	try{
		include '../ini.php';
		include '../../classes/xl_quan_tri.php';
		
		$dt_xl_quan_tri = new xl_quan_tri;
		if(empty($_GET['ten_dang_nhap'])){
			$_SESSION['msg']='Vui lòng nhập mã sữa ';
			$_SESSION['style_msg'] = 'notification error png_bg';
			header('Location: danh_sach.php');	
			exit;	
		}
		#### Lấy ra được lon sữa ##########

		$quan_tri = $dt_xl_quan_tri->doc($_GET['ten_dang_nhap']);
		if($quan_tri == NULL){
			echo 'yes'; 
		}else{
			echo 'no';
		}	
		$dbh = NULL;
	}catch(Exception $e){
		echo 'Lỗi kết nối '.$e->getMessage();
		exit;
	}
		
?>