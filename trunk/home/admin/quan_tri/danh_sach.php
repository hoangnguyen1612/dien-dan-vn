<?php

try{	
	include('../ini.php');
	include('../../classes/xl_ho_tro_truc_tuyen.php');
	include('../../classes/phan_trang.php');
	
	function doc_thu_muc()
	{
		$ten_file = array('them.php'=>'Thêm', 'cap_nhat.php'=>'Cập Nhật', 'danh_sach.php'=>'Danh Sách');

		$dir = opendir('../../admin');
		$str = '';
		while(($file=readdir($dir))!=false)
		{
			if(is_dir('../../admin/'.$file))
			{
				echo '<tr>';
				if($file!='.' and $file!='..')	
				{
					echo '<td>';
					echo $file.'<br />';
					$dir_1 = opendir('../../admin/'.$file);
					while(($file_1=readdir($dir_1))!=false)
					{

							if($file_1!='.' and $file_1!='..') echo '----'.$file_1.'<br />';
					}
					echo '<td>';
				}
				echo '</tr>';
			}
		}
		closedir($dir);
	}
	#***************************************************************************************
	
	$contentForLayout = $dt_smarty->fetch('quan_tri/danh_sach.tpl');
	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	$dt_smarty->assign('jsForLayout','');
	
	$dt_smarty->display('layouts/default.tpl');
	
}catch(Exception $e)
{
	
}
?>