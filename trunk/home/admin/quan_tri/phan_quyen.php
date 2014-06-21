<?php

try{	
	include('../ini.php');
	include('../../classes/xl_quan_tri.php');
	include('../../classes/xl_phan_quyen.php');
	#***************************************************************************************
	$kt = false;
	$dt_xl_quan_tri = new xl_quan_tri;
	$dt_xl_phan_quyen = new xl_phan_quyen;
	
	if(empty($_GET['ma']))
	{
		throw new Exception('Vui lòng chọn quản trị viên!');
	}
	$ma = $_GET['ma'];
	$dt_smarty->assign('ma',$ma);
	
	$quan_tri = $dt_xl_quan_tri->doc($ma);
	if($quan_tri==NULL)
	{
		throw new Exception('Mã quản trị không tồn tại trong cơ sở dữ liệu, vui lòng kiểm tra lại!');
	}
	
	$kt = true;
	throw new Exception();
}catch(Exception $e)
{
	#******************* lấy ra danh sách quản trị *****************************************
	
	$ds_quan_tri = $dt_xl_quan_tri->danh_sach();
	$dt_smarty->assign('ds_quan_tri',$ds_quan_tri);
	
	#**************************************************************************************
	
	#******************** lưu session ****************************************************
	
	if($kt==true)
	{
		$_SESSION['type_message'] = 'success';
	}
	else
	{
		$_SESSION['type_message'] = 'error';
		$_SESSION['message'] = $e->getMessage();
	}
	#***************************************************************************************
	$contentForLayout = $dt_smarty->fetch('quan_tri/phan_quyen.tpl');
	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	$dt_smarty->assign('jsForLayout','');
	
	$dt_smarty->display('layouts/default.tpl');
	
	unset($_SESSION['message']);
	unset($_SESSION['type_message']);
}
function doc_thu_muc()
	{
		$dt_xl_phan_quyen = new xl_phan_quyen;
		global $ma;
		
		$ten_file = array('them.php'=>'Thêm', 'cap_nhat.php'=>'Cập Nhật', 'danh_sach.php'=>'Danh Sách', 'xoa.php'=>'Xóa');

		$dir = opendir('../../admin/');
		$str = '';
		while(($file=readdir($dir))!=false)
		{
			echo "<tr>";
			if($file!='.' && $file!='..' && is_dir("../../admin/$file") && $file!='templates_c'&& $file!='upload' && $file!='templates')
			{
				echo "	<td colspan='2'>
							<p style='font-weight:bold; font-size:15px; color:#F60'>$file</p>
								<table>";
								foreach($ten_file as $key=>$value)
								{
									$chon = '';
									if($dt_xl_phan_quyen->doc($ma, "$file/$key")!=NULL)
									{
										$chon = "checked";
									}
									echo"
									<tr>
										<td><label for='$file/$key'>$value</label></td>
										<td><input type='checkbox' value='$file/$key' id='$file/$key' name='item[]' $chon />
									</tr>
									";
								}
						echo "</table></td>";
			}
			echo "</tr>";
		}
		closedir($dir);
	}
?>