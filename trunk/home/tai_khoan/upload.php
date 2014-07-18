<?php
require '../ini.php';

if(isset($_POST))
{
	############ Edit settings ##############
	$ThumbSquareSize 		= 168; //Thumbnail will be 200x200
	$BigImageMaxSize 		= 100; //Image Maximum height or width
	$ThumbPrefix			= "thumb_"; //Normal thumb Prefix
	$DestinationDirectory	= '../upload/nguoi_dung/'; //specify upload directory ends with / (slash)
	$Quality 				= 90; //jpeg quality
	##########################################
	
	//check if this is an ajax request
	if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
		die();
	}
	
	// check $_FILES['ImageFile'] not empty
	if(!isset($_FILES['ImageFile']) || !is_uploaded_file($_FILES['ImageFile']['tmp_name']))
	{
			die('Đã có lỗi trong quá trình upload, vui lòng quay lại sau!'); // output error when above checks fail.
	}
	
	// Random number will be added after image name
	$RandomNumber 	= rand(0, 9999999999); 

	$ImageName 		= str_replace(' ','-',strtolower($_FILES['ImageFile']['name'])); //get image name
	$ImageSize 		= $_FILES['ImageFile']['size']; // get original image size
	$TempSrc	 	= $_FILES['ImageFile']['tmp_name']; // Temp name of image file stored in PHP tmp folder
	$ImageType	 	= $_FILES['ImageFile']['type']; //get file type, returns "image/png", image/jpeg, text/plain etc.

	//Let's check allowed $ImageType, we use PHP SWITCH statement here
	switch(strtolower($ImageType))
	{
		case 'image/png':
			//Create a new image from file 
			$CreatedImage =  imagecreatefrompng($_FILES['ImageFile']['tmp_name']);
			break;
		case 'image/gif':
			$CreatedImage =  imagecreatefromgif($_FILES['ImageFile']['tmp_name']);
			break;			
		case 'image/jpeg':
		case 'image/pjpeg':
			$CreatedImage = imagecreatefromjpeg($_FILES['ImageFile']['tmp_name']);
			break;
		default:
			die('Không phải File hình ảnh!'); //output error and exit
	}
	
	//PHP getimagesize() function returns height/width from image file stored in PHP tmp folder.
	//Get first two values from image, width and height. 
	//list assign svalues to $CurWidth,$CurHeight
	list($CurWidth,$CurHeight)=getimagesize($TempSrc);
	
	//Get file extension from Image name, this will be added after random name
	$ImageExt = substr($ImageName, strrpos($ImageName, '.'));
  	$ImageExt = str_replace('.','',$ImageExt);
	
	//remove extension from filename
	$ImageName 		= preg_replace("/\\.[^.\\s]{3,4}$/", "", $ImageName); 
	$ImageName = $_SESSION['login']['ma'].'_'.$ImageName;
	
	//Construct a new name with random number and extension.
	$NewImageName = $ImageName.'-'.$RandomNumber.'.'.$ImageExt;
	
	//set the Destination Image
	$thumb_DestRandImageName 	= $DestinationDirectory.$NewImageName; //Thumbnail name with destination directory
	$DestRandImageName 			= $DestinationDirectory.$ThumbPrefix.$NewImageName; // Image with destination directory
	
	//Resize image to Specified Size by calling resizeImage function.
	//if(resizeImage($CurWidth,$CurHeight,$BigImageMaxSize,$DestRandImageName,$CreatedImage,$Quality,$ImageType))
	if(cropImage($CurWidth,$CurHeight,$ThumbSquareSize,$thumb_DestRandImageName,$CreatedImage,$Quality,$ImageType))
	{
		//Create a square Thumbnail right after, this time we are using cropImage() function
		if(!cropImage($CurWidth,$CurHeight,100,$DestRandImageName,$CreatedImage,$Quality,$ImageType))
		{
			echo 'Lỗi khi tạo thumbnail';
		}
		/*
		We have succesfully resized and created thumbnail image
		We can now output image to user's browser or store information in the database
		*/
		echo '<table width="100%" border="0" cellpadding="4" cellspacing="0">';
		echo '<tr>';
		echo '<td align="center"><img src="/home/upload/nguoi_dung/'.$NewImageName.'" alt="Thumbnail"></td>';
		//echo '</tr><tr>';
		//echo '<td align="center"><img src="../upload/hinh_dai_dien/'.$ThumbPrefix.$NewImageName.'" alt="Resized Image"></td>';
		echo '</tr>';
		echo '<tr><td style="color:#3c8dbc; text-align:center">Nếu muốn thay đổi, bạn hãy chọn lại hình ảnh ở trên!</td></tr>';
		echo '</table>';

		$_SESSION['login']['hinh_dai_dien'] = $NewImageName;
		$_SESSION['login']['thumbnail'] = $ThumbPrefix.$NewImageName;
		
		
		#delete old image
		$nguoi_dung = $xl_nguoi_dung->doc(array('ma'=>$login['ma'], 'hinh_dai_dien, thumbnail'));
		if($nguoi_dung['hinh_dai_dien']!='' && $nguoi_dung['hinh_dai_dien']!=NULL && $nguoi_dung['hinh_dai_dien']!='no_avatar_male.jpg' && $nguoi_dung['hinh_dai_dien']!='no_avatar_female.jpg')
		{
			unlink('../upload/nguoi_dung/'.$nguoi_dung['hinh_dai_dien']);
		}
	
		
		$xl_nguoi_dung->cap_nhat(array('ma'=>$login['ma'], 'hinh_dai_dien'=>$NewImageName,'thumbnail'=>$ThumbPrefix.$NewImageName));
		
	}else{
		die('Resize Error'); //output error
	}
}
