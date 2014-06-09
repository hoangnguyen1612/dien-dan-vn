<?php
try{
	require '../ini.php';
	
	$url = ''; 

	$_SESSION['data'] = $_POST['data'];
	$_SESSION['data']['rGroup'] = $_POST['rGroup'];

	if(empty($_POST['data']['ten_dien_dan']))
	{
		throw new Exception('Vui lòng nhập tên diễn đàn');
	}
	
	if(empty($_POST['data']['mo_ta']))
	{
		throw new Exception('Vui lòng nhập mô tả về diễn đàn của bạn');
	}
	
	if(empty($_POST['data']['slogan']))
	{
		throw new Exception('Vui lòng nhập câu khẩu hiện (câu slogan) cho diễn đàn của bạn');
	}

	require_once '../classes/xl_dien_dan.php';
	require_once '../classes/xl_linh_vuc.php';
	$xl_dien_dan = new xl_dien_dan;
	$xl_linh_vuc = new xl_linh_vuc;
	
	if($xl_dien_dan->doc(array('domain'=>convert_to_slug(trim($_POST['data']['ten_dien_dan'])), 'ma_linh_vuc'=>$_POST['data']['chon_linh_vuc']), 'ma'))
	{
		throw new Exception('Tên diễn đàn ứng với lĩnh vực bạn chọn đã tồn tại, vui lòng chọn một tên khác');
	}
	
	if(!$xl_linh_vuc->doc(array('ma'=>$_POST['data']['chon_linh_vuc'])))
	{
		throw new Exception('Lĩnh vực không tồn tại, vui lòng kiểm tra lại');
	}
	
	$dbh->beginTransaction();
	$ma_dien_dan = time();
	
	$hinh = 'no_avatar.png';
	
	#upload hình ảnh
	if($_FILES['image']['name']!='')
	{
		$hinh = $_FILES['image']['name'];
		
		# kiểm tra lỗi upload
		if($_FILES['image']['error']!=0)
		{
			throw new Exception('Đã có lỗi trong quá trình upload, vui lòng thử lại!');
		}
		# kiểm tra dung lượng file quá lớn
		if($_FILES['image']['size']>2000000)
		{
			throw new Exception('File có kích thước lớn hơn 2Mb, vui lòng thử lại file khác!');
		}
		# kiểm tra kiểu định dạng file phải là file ảnh
		if(getimagesize($_FILES['image']['tmp_name'])==NULL)
		{
			throw new Exception('File không đúng định dạng, vui lòng thử lại!');
		}
		# thêm vào tổng số giây, thời điểm lúc upload để đảm dù tên hình đó đã có trong database cũng không sợ bị đè hình
		$hinh = $ma_dien_dan.'_'.$hinh;
		
		# di chuyển file ảnh đã được upload về server
		move_uploaded_file($_FILES['image']['tmp_name'],'../upload/dien_dan/'.$hinh);
		
		#thumb
		
	}

	# diễn đàn
	if(!$xl_dien_dan->them(array('ma'=>$ma_dien_dan, 'ten'=>$_POST['data']['ten_dien_dan'], 'mo_ta'=>$_POST['data']['mo_ta'], 'slogan'=>$_POST['data']['slogan'], 
	'ngay_tao'=>date('Y-m-d H:i:s'), 'ma_nguoi_tao'=>$_SESSION['login']['ma'], 'hinh_dai_dien'=>$hinh, 'ma_linh_vuc'=>$_POST['data']['chon_linh_vuc'], 
	'domain'=>convert_to_slug(trim($_POST['data']['ten_dien_dan'])))))
	{
		throw new Exception('Đã có lỗi trong quá trình tạo diễn đàn, vui lòng quay lại sau hoặc liên hệ với ban quản trị để được giải quyết. Chân thành cảm ơn bạn!');
	}
	
	# thành viên diễn đàn
	require_once '../classes/xl_thanh_vien_dien_dan.php';
	$xl_thanh_vien_dien_dan = new xl_thanh_vien_dien_dan;
	if(!$xl_thanh_vien_dien_dan->them(array('ma_dien_dan'=>$ma_dien_dan, 'ma_nguoi_dung'=>$login['ma'], 'loai_thanh_vien'=>0, 
	'ngay_gia_nhap'=>date('Y-m-d H:i:s'), 'trang_thai'=>1)))
	{
		throw new Excpetion('Đã có lỗi trong quá trình tạo diễn đàn, vui lòng quay lại sau hoặc liên hệ với ban quản trị để được giải quyết. Chân thành cảm ơn bạn!');
	}
	
	# cấu hình
	require_once '../classes/xl_cau_hinh.php';
	$xl_cau_hinh = new xl_cau_hinh;
	$data = array('TEN'=>$_POST['data']['ten_dien_dan'], 'CSS'=>$_POST['data']['css']);

	foreach($data as $tu_khoa=>$noi_dung)
	{
		if(!$xl_cau_hinh->them(array('tu_khoa'=>$tu_khoa, 'noi_dung'=>$noi_dung, 'ma_dien_dan'=>$ma_dien_dan)))
		{
			throw new Excpetion('Đã có lỗi trong quá trình tạo diễn đàn, vui lòng quay lại sau hoặc liên hệ với ban quản trị để được giải quyết. Chân thành cảm ơn bạn!');
		}
	}
	
	$dbh->commit();
	
	unset($_SESSION['data']);
	$url = "/{$_POST['data']['chon_linh_vuc']}/".convert_to_slug(trim($_POST['data']['ten_dien_dan']));
	throw new Exception('Chúc mừng! Diễn đàn của bạn đã được tạo thành công!', 30);
	
}catch(Exception $e)
{
	throwMessage($e, $url);
}