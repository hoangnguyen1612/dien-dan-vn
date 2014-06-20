<?php
# 
try{
# 
if(empty($_GET['filename'])){
	throw new Exception('Vui lòng nhập tên file');
}
$filename = $_GET['filename']; 
  
# 

# 
// Đường dẫn tới file download 
# 
$download_path = "../upload/file_upload/"; 
# 
  
# 
if(preg_match("/\.\./", $filename)) die("I'm sorry, you may not download that file."); 
# 
$file = str_replace("..", "", $filename); 
# 
  
# 
// Không cho download file .ht. 
# 
if(preg_match("/\.ht.+/", $filename)) die("I'm sorry, you may not download that file."); 
# 
  
# 
//Kết hợp đường dẫn tới file và tên file để tạo đường dẫn đầy đủ. 
# 
$file = "$download_path$file"; 
# 
  
# 
// Kiểm tra xem file có tồn tại không. 
# 
if(!file_exists($file)) die("File không tồn tại trong diễn đàn"); 
# 
  
# 
// Lấy ra dạng file (đuôi file) 
# 
$type = filetype($file); 
# 
  
# 
// lấy ngày hiện tại 
# 
$today = date("F j, Y, g:i a"); 
# 
$time = time(); 
# 
  
# 
// gởi yêu cầu download tới browser 
# 
header("Content-type: $type"); 
# 
header("Content-Disposition: attachment;filename=$filename"); 
# 
header("Content-Transfer-Encoding: binary"); 
# 
header('Pragma: no-cache'); 
# 
header('Expires: 0'); 
# 
# 
set_time_limit(0); 
# 
readfile($file);  
}catch(Exception $e){
	echo $e->getMessage();
	exit;
}