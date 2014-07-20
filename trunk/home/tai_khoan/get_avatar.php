<?php
try{
	require '../ini.php';
	sleep(2);
	
	$result = '';
	
	if(empty($_POST['id']))
	{
		throw new Exception();
	}
	$id = $_POST['id'];
	
	$item = $xl_nguoi_dung->doc(array('ma'=>$id), 'hinh_dai_dien');
	
	if($item)
	{
		$result = "/home/upload/nguoi_dung/{$item['hinh_dai_dien']}";
	}
	throw new Exception();
}catch(Exception $e)
{
	echo $result;
}