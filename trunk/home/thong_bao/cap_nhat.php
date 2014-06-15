<?php
require '../ini.php';

$ma_nguoi_dung = $_GET['ma_nguoi_dung'];
$sl_cu = $_GET['sl_cu'];

$sql = 'select count(*) from thong_bao where gui_den = :ma_nguoi_dung and trang_thai = 0';
$sth = $dbh->prepare($sql);
$sth->execute(array('ma_nguoi_dung'=>$ma_nguoi_dung));
$dem = $sth->fetchAll(PDO::FETCH_COLUMN);
$co = 0;
$str = '';

if($dem[0]>$sl_cu)
{
	$co = 1;
	$sql = 'select t.*, hinh_dai_dien, (select domain from dien_dan where ma=t.ma_dien_dan) as domain, (select ma_linh_vuc from dien_dan where ma=t.ma_dien_dan) as ma_linh_vuc from thong_bao t, nguoi_dung n where n.ma = gui_tu and gui_den = :ma_nguoi_dung and t.trang_thai = 0';
	$sth = $dbh->prepare($sql);
	$sth->execute(array('ma_nguoi_dung'=>$ma_nguoi_dung));
	$ds = $sth->fetchAll(PDO::FETCH_ASSOC);
	
	foreach($ds as $thong_bao)
	{
		$str .= '<li>
				<a href="/'.$thong_bao['ma_linh_vuc'].'/'.$thong_bao['domain'].'/thong_bao/da_doc?ma='.$thong_bao['ma'].'" style="white-space:normal">
					<div class="pull-left">
						<img src="/home/upload/nguoi_dung/'.$thong_bao['hinh_dai_dien'].'" class="img-circle" alt="user image"/>
					</div>
					<p style="width: 200px;">'.$thong_bao['noi_dung'].'<br /><small><i class="fa fa-clock-o"></i> '.time_since(time() - strtotime($thong_bao['ngay_tao'])).'</small></p>
				</a>
			</li>';
	}
}

$return = array('co'=>$co, 'sl'=>$dem[0], 'ds'=>$str);
print json_encode($return);