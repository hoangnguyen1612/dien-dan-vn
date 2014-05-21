<?php
include '../../libraries/smarty/Smarty.class.php';

$dt_smarty = new Smarty();

$dt_smarty->setTemplateDir('../templates/');
$dt_smarty->setCompileDir('../templates_c/');
$dt_smarty->setConfigDir('../../configs/');
$dt_smarty->setCacheDir('../../cache/');


$contentForLayout = $dt_smarty->fetch('cau_hinh/cau_hinh.tpl');

$dt_smarty->assign('contentForLayout', $contentForLayout);

$dt_smarty->display('layouts/default.tpl');

?>