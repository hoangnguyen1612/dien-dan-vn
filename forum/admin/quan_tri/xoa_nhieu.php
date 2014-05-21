<?php
/*echo '<pre>';
print_r($_POST);
echo '</pre>';
exit;	*/
try{
	include '../ini.php';
	include("../../classes/xl_quan_tri.php");
	$dt_quan_tri = new xl_quan_tri;
	
	# Kiểm tra mã sữa
	if(empty($_POST['data'])){
		throw new Exception('Vui lòng chọn quản trị cần xóa');	
	}			
	
	//$Ma_sua = $_GET['Ma_sua'];
	# Tạo vòng lặp , xóa từng sữa
	foreach($_POST['data'] as $ma){
		# Kiểm tra logic
		# Kiểm tra mã sữa có tồn tại ko 
		$row = $dt_quan_tri->doc($ma);
		if ($row == NULL) {
			throw new Exception('Mã quản trị không tồn tại');	
		}
		$result = $dt_quan_tri->xoa($ma);
		if($result === false){
			throw new Exception('Xóa không thành công , vui lòng thử lại');
		}
		// Xóa file hình	
	}
	$dbh=NULL;
	$_SESSION['msg']= 'Xóa thành công quản trị';
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

	
	
	
