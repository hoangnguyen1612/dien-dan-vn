<?php
$time = time();
$time_check = time()-600; // 10 phút
$sql="SELECT * FROM online WHERE ma_dien_dan=:ma_dien_dan and ma_nguoi_dung=:ma_nguoi_dung";
$sth = $dbh->prepare($sql);
$sth->execute(array('ma_dien_dan'=>$ma_dien_dan,'ma_nguoi_dung'=>$login['ma']));
$online = $sth->fetch(PDO::FETCH_ASSOC);
if($online==NULL){
$sql1="INSERT INTO online VALUE(NULL,:ma_nguoi_dung,:thoi_gian,:ma_dien_dan)";
$sth = $dbh->prepare($sql1);	
$result = $sth->execute(array('ma_dien_dan'=>$ma_dien_dan,'ma_nguoi_dung'=>$login['ma'],'thoi_gian'=>$time));
}
else{
$sql2="UPDATE online SET thoi_gian=:thoi_gian WHERE ma_dien_dan =:ma_dien_dan and ma_nguoi_dung =:ma_nguoi_dung";
$sth = $dbh->prepare($sql2);	
$result = $sth->execute(array('ma_dien_dan'=>$ma_dien_dan,'ma_nguoi_dung'=>$login['ma'],'thoi_gian'=>$time));
}
$sql3="SELECT online.*,(Select ho from nguoi_dung where nguoi_dung.ma = online.ma_nguoi_dung) ho_nguoi_dung,(Select ten from nguoi_dung where nguoi_dung.ma = online.ma_nguoi_dung) ten_nguoi_dung FROM online where ma_dien_dan=:ma_dien_dan";
$sth = $dbh->prepare($sql3);
$sth->execute(array('ma_dien_dan'=>$ma_dien_dan));
$ds_online = $sth->fetchAll(PDO::FETCH_ASSOC);
//Nếu quá 10 phút, xóa bỏ session
$sql4="DELETE FROM online WHERE thoi_gian<$time_check";
$sth = $dbh->prepare($sql4);
$sth->execute();
?>