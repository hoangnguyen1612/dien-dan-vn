<?php
include '../ini_interface.php';



$contentForLayout = $dt_smarty->fetch('thong_ke/tong_quat.tpl');

$dt_smarty->assign('contentForLayout', $contentForLayout);

$dt_smarty->display('layouts/default.tpl');

?>