<?php
try{
	include ('../ini.php');	
	include ('../../classes/xl_dien_dan.php');

	sleep(1);
	$result = '';
	if(empty($_POST['page']))
	{
		throw new Exception();
	}

	$page = $_POST['page'];

	$xl_dien_dan = new xl_dien_dan;
	
	$ds = $xl_dien_dan->danh_sach($page, 4, '', 'feedback DESC', 'ma, ten, feedback', PDO::FETCH_ASSOC, '', false);
	
	if($ds)
	{
		$i = $page+1;
		foreach($ds as $item)
		{
			$result.="<div class='forum' title='Phản hồi'>
						<div class='feedback'><span>{$item['feedback']}%</span></div>
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