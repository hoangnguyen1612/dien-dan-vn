<?php
$dbh = new PDO('mysql:host=localhost;dbname=dien_dan_vn','root','');
$dbh->exec('set names utf8');

require '../classes/xl_nguoi_dung.php';

$email = $_POST['data']['email'];

$xl_nguoi_dung = new xl_nguoi_dung;
$nguoi_dung = $xl_nguoi_dung->danh_sach(0, 0, array('email'=>$email),'ma DESC', '*', PDO::FETCH_ASSOC, '', false);

if($nguoi_dung)
{
	echo 'false'; 
}
else
{
	echo 'true';
}

