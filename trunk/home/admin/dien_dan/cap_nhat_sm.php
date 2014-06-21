<?php
	try{
		include('../../classes/xl_bai_viet.php');
		include('../ini.php');
	
		# lưu session
		$data = $_POST['data'];
		#xử lý dữ liệu lấy vào
		if(empty($data['ma']))
		{
			throw new Exception("Bắt buộc phải nhập mã bài viết!");
		}
		if(empty($data['ma_loai_bai_viet']))
		{
			throw new Exception("Bắt buộc phải nhập mã loại bài viết!");
		}
		if(empty($data['tieu_de']))
		{
			throw new Exception("Bắt buộc phải nhập tiêu đề!");
		}
		if($data['trang_thai']!=0 && $data['trang_thai']!=1)
		{
			throw new Exception("Bắt buộc phải chọn trạng thái!");
		}
		if(empty($_POST['date_ngay_tao_Month']))
		{
			throw new Exception("Bắt buộc phải chọn tháng!");
		}
		if(empty($_POST['date_ngay_tao_Day']))
		{
			throw new Exception("Bắt buộc phải chọn ngày!");
		}
		if(empty($_POST['date_ngay_tao_Year']))
		{
			throw new Exception("Bắt buộc phải chọn năm!");
		}
		if(empty($_POST['time_ngay_tao_Hour']))
		{
			throw new Exception("Bắt buộc phải chọn giờ!");
		}
		if(empty($_POST['time_ngay_tao_Minute']))
		{
			throw new Exception("Bắt buộc phải chọn phút!");
		}
		if(empty($_POST['time_ngay_tao_Second']))
		{
			throw new Exception("Bắt buộc phải chọn giây!");
		}
		
		# kiểm tra mã bài viết có tồn tại thì mới cho cập nhật
		$dt_xl_bai_viet = new xl_bai_viet;
		$bai_viet = $dt_xl_bai_viet->doc($data['ma']);
		if($bai_viet==NULL)
		{
			throw new Exception("Mã bài viết không tồn tại!");
		}
		
		$data['ngay_tao'] = $_POST['date_ngay_tao_Year']."-".$_POST['date_ngay_tao_Month']."-".$_POST['date_ngay_tao_Day']." ".$_POST['time_ngay_tao_Hour'].":".$_POST['time_ngay_tao_Minute'].":".$_POST['time_ngay_tao_Second'];
		$data['ma_nguoi_dung'] = 0;

		# kiểm tra có upload hình thì cập nhật
		if($_FILES['hinh']['name']!='')
			$data['hinh']=$_FILES['hinh']['name'];
		else
			$data['hinh']=$bai_viet['hinh'];
		#đưa hình về server
		if($_FILES['hinh']['name']!='')
		{
			# kiểm tra lỗi upload
			if($_FILES['hinh']['error']!=0)
			{
				throw new Exception('Đã có lỗi trong quá trình upload, vui lòng thử lại!');
			}
			# kiểm tra dung lượng file quá lớn
			if($_FILES['hinh']['size']>2000000)
			{
				throw new Exception('File có kích thước quá lớn, vui lòng thử lại file khác!');
			}
			# kiểm tra kiểu định dạng file phải là file ảnh
			if(getimagesize($_FILES['hinh']['tmp_name'])==NULL)
			{
				throw new Exception('File không đúng định dạng, vui lòng thử lại!');
			}
			# thêm vào tổng số giây, thời điểm lúc upload để đảm dù tên hình đó đã có trong database cũng không sợ bị đè hình
			$data['hinh'] = time().'-'.$data['hinh'];
			
			# di chuyển file ảnh đã được upload về server
			move_uploaded_file($_FILES['hinh']['tmp_name'],'../../upload/bai_viet/'.$data['hinh']);
		}
		
		# khởi tạo đối tượng xử lý bài viết
		$dt_xl_bai_viet =  $dt_xl_bai_viet->cap_nhat($data);
		
		if($dt_xl_bai_viet===false)
		{
			throw new Exception('Đã có lỗi trong quá trình cập nhật!');
		}
		
		# xóa hình cũ 
		if($_FILES['hinh']['name']!='' && $bai_viet['hinh']!='')
		{
			unlink("../upload/bai_viet/".$bai_viet['hinh']);
		}
		$_SESSION['message'] = "Cập nhật thành công!";
		$_SESSION['type_message'] = "success";
		if(isset($_POST['save-and-end']))
		{
			header("Location: danh_sach.php");
			exit;
		}
		header("Location: cap_nhat.php?ma=".$data['ma']);	
	}catch(Exception $e)
	{
		#đóng kết nối
		$dbh = null;
		
		$_SESSION['message'] = $e->getMessage();
		$_SESSION['type_message'] = "error";
		header("Location:".$_SERVER['HTTP_REFERER']);
	}
?>