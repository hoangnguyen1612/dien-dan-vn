<?php	
	try{
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

		$quan_tri = $dt_xl_quan_tri->doc($ma);
		if($quan_tri==NULL)
		{
			throw new Exception("Mã $value không tồn tại trong cơ sở dữ liệu, vui lòng thử lại!");
		}
		
		$dt_xl_phan_quyen = new xl_phan_quyen;
		if($dt_xl_phan_quyen->doc($ma,'')!=NULL)
		{
			$dt_xl_phan_quyen->xoa($ma);
		}
		
		foreach($item as $key=>$value)
		{
			$phan_quyen = $dt_xl_phan_quyen->them($ma, $value);
			if($phan_quyen === false)
			{
				throw new Exception(mysql_error());
			}
		}
		$_SESSION['message'] = 'Thêm Thành công!';
		$_SESSION['type_message'] = "success";
		header("Location:".$_SERVER['HTTP_REFERER']);
	}catch(Exception $e)
	{
		# đóng kết nối
		$dbh = null;
		$_SESSION['message'] = $e->getMessage();
		$_SESSION['type_message'] = "error";
		header("Location:".$_SERVER['HTTP_REFERER']);
	}
?>