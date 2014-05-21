<?php
try{
	#print_r($_POST);exit;
	include('../ini.php');
	include('../../classes/xl_quan_tri.php');
	include('../../classes/xl_phan_quyen.php');	
	if(empty($_POST['ma']))
	{
		throw new Exception("Đã có lỗi!");
	}

	$item = $_POST['item'];
	$ma = $_POST['ma'];
	
	# kiểm tra có mã nào không tồn tại trong cơ sở dữ liệu
	$dt_xl_quan_tri = new xl_quan_tri;
	$dt_xl_phan_quyen = new xl_phan_quyen;
	
	$quan_tri = $dt_xl_quan_tri->doc($ma);
	if($quan_tri==NULL)
	{
		throw new Exception("Mã $value không tồn tại trong cơ sở dữ liệu, vui lòng thử lại!");
	}
	
	
	$dt_xl_phan_quyen->xoa($ma);
	
	
	foreach($item as $key=>$value)
	{
		$phan_quyen = $dt_xl_phan_quyen->them($ma, $value);
		if($phan_quyen === false)
		{
			throw new Exception(mysql_error());
		}
	}
	$_SESSION['msg']= 'Cập nhật quyền thành công';
	$_SESSION['style_msg'] = 'notification success png_bg';
	header("Location: danh_sach.php");
	exit;	
}catch (PDOException $e){

	echo $e->getMessage();
		
}catch (Exception $e){
	# Đóng kết nối
	$dbh = NULL;
	#Lay cau du lieu 
	$_SESSION['msg'] = $e->getMessage();
	$_SESSION['style_msg'] = 'notification error png_bg';
	header('Location:'.$_SERVER['HTTP_REFERER']);	
}