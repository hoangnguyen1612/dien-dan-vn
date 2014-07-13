<?php
try{
	require '../ini.php';
	
	debug($_POST);
}catch(Exception $e)
{
	throwMessage($e);
}