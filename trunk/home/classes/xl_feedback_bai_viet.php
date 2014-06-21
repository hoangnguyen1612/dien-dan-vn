<?php
require_once 'xl_chung.php';

class xl_feedback_bai_viet extends xl_chung{
	protected $bang = 'feedback_bai_viet';
}

function feedback_bai_viet($ma)
{
	$xl_feedback_bai_viet = new xl_feedback_bai_viet;
	$feedback = $xl_feedback_bai_viet->dem(array('ma_bai_viet'=>$ma)); 
	return $feedback;
}