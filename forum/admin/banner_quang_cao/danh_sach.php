<?php
include '../ini.php';


$contentForLayout = $dt_smarty->fetch('banner_quang_cao/danh_sach.tpl');

$dt_smarty->assign('contentForLayout', $contentForLayout);

$dt_smarty->display('layouts/default.tpl');

?>