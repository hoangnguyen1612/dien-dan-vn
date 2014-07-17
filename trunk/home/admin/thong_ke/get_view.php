<?php
try{
	include ('../ini.php');	
	include ('../../classes/xl_bo_dem.php');

	sleep(1);
	$result = '';
	if(empty($_POST['page']))
	{
		throw new Exception();
	}

	$page = $_POST['page'];

	$xl_bo_dem = new xl_bo_dem;
	
	$ds = $xl_bo_dem->truy_cap_chi_tiet($page, 4);
	
	if($ds)
	{
		$i = $page+1;
		foreach($ds as $item)
		{
			$result.="<div class='forum' title='Lượt truy cập'>
						<div class='feedback'><span>{$item['luot_xem']}</span></div>
						<div class='content'>
							<h3>$i.&nbsp;{$item['ten']}</h3>
						</div>
						<hr class='line' size='1'>
					</div>";
			$i++;		
		}
	}

	throw new Exception();
}catch(Exception $e)
{
	echo $result;
}
?>