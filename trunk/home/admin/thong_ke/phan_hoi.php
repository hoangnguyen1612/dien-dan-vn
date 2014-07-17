<?php
try{
	include ('../ini.php');	
	include ('../../classes/xl_bo_dem.php');
	include ('../../classes/xl_dien_dan.php');

	$xl_dien_dan = new xl_dien_dan;

	
	$ds_dien_dan = $xl_dien_dan->danh_sach(0, 10, '', 'feedback DESC', 'ma, ten, feedback', PDO::FETCH_ASSOC, '', false);
	
	$result = '';
	$i = 0;
	$name = '';
	
	foreach($ds_dien_dan as $item)
	{
		$result.="{
                    y: {$item['feedback']},
                    color: colors[$i],
                    drilldown: {
                        name: '{$item['ten']}',
                        color: colors[$i]
                    }
                },";
		$i++;	
		$name.="'{$item['ten']}', ";	
	}
	$name = rtrim($name, ',');
	
	$dt_smarty->assign('name', $name);
	$dt_smarty->assign('result', $result);
	$contentForLayout = $dt_smarty->fetch('thong_ke/phan_hoi.tpl');

	$dt_smarty->assign('contentForLayout', $contentForLayout);
	$dt_smarty->display('layouts/default.tpl');
	
}catch(Exception $e)
{
	throwMessage($e);
}
?>