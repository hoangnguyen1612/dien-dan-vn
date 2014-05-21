<?php
/*echo '<pre>';
print_r($_POST);
echo '</pre>';
exit;	*/
try{
	include '../ini.php';
	include("../../classes/xl_loai_bai_viet.php");
	$dt_loai_bai_viet = new xl_loai_bai_viet;
	
	# Kiểm tra mã sữa
	if(empty($_POST['data'])){
		throw new Exception('Vui lòng chọn bài viết cần xóa');	
	}			
	
	//$Ma_sua = $_GET['Ma_sua'];
	# Tạo vòng lặp , xóa từng sữa
	foreach($_POST['data'] as $ma){
		# Kiểm tra logic
		# Kiểm tra mã sữa có tồn tại ko 
		$row = $dt_loai_bai_viet->doc($ma);
		if ($row == NULL) {
			throw new Exception('Mã bài viết không tồn tại');	
		}
		$dt_loai_bai_viet->xoa($ma);
		// Xóa file hình	
	}
	$dbh=NULL;
	$_SESSION['msg']= 'Xóa thành công bài viết';
	$_SESSION['style_msg'] = 'notification success png_bg';
	header('Location: danh_sach.php');	
	exit;
}catch(PDOException $e){
	echo $e->getMessage();
	exit;
		
}
catch(Exception $e){
	$dbh = NULL;
	$_SESSION['msg'] = $e->getMessage();
	$_SESSION['style_msg'] = 'notification error png_bg';
	header('Location: danh_sach.php');		
}

	
	
	
