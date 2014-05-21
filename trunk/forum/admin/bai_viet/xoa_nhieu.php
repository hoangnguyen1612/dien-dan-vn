<?php
/*echo '<pre>';
print_r($_POST);
echo '</pre>';
exit;	*/
try{
	include '../ini.php';
	include("../../classes/xl_san_pham.php");
	$dt_san_pham = new xl_san_pham;
	
	# Kiểm tra mã sản phẩm
	if(empty($_POST['data'])){
		throw new Exception('Vui lòng chọn sản phẩm cần xóa');	
	}			
	
	
	# Tạo vòng lặp , xóa từng sản phẩm
	foreach($_POST['data'] as $ma){
		# Kiểm tra logic
		# Kiểm tra mã sữa có tồn tại ko 
		$row = $dt_san_pham->doc($ma);
		if ($row == NULL) {
			throw new Exception('Mã sản phẩm không tồn tại');	
		}
		$dt_san_pham->xoa($ma);
		// Xóa file hình	
		unlink('../../upload/san_pham/'.$row['hinh']);
		
	}
	$dbh=NULL;
	$_SESSION['msg']= 'Xóa thành công sản phẩm';
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

	
	
	
