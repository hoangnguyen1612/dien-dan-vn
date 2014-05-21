<?php
class phan_trang{
	function tim_trang_hien_tai(){
		if(isset($_GET['page'])){		
    		$page = $_GET['page']; // Lay ra gia tri bat dau trang
		}else{
			$page = 1;
		}
		return $page;
	}
	function tim_vi_tri_query($page,$soluong){
		$start = ($page - 1 )*$soluong;
		return $start;
	}
	function bo_nut_phan_trang($tong_so_du_lieu,$page,$soluong){
		$str = '';
		$n = ceil($tong_so_du_lieu/$soluong); // Lấy ra được số trang cần chia , tongsotrang = (tongsp/số sản phẩm cần thể hiện ra), nếu ra dư thì lấy giá trị trên (dùng hàm ceil) 
		# Tao url dong cho web
		$url = $_SERVER['REQUEST_URI'];
	
	
		$url = str_replace($url,"?page=$page",'');
			
		$url = str_replace($url,"&page=$page",'');
		
		if(strpos($url,'?')=== false){
			$url .= '?';
		
		}else{
			$url .= '&';
			
		}
	
		# Nút quay về đầu trang 
		if($page == 1){ // neu dau trang thi disable
			$str .= "<a class='number disable' href='{$url}page=1'>|<</a>";
		}else{
			$str .= "<a class='number' href='{$url}page=1'>|<</a>";// quay về đầu trang
		}
		# Nút back
		if($page > 1){
			$back = $page-1; // lấy ra page-1 để làm nút back
			$str .= "<a class='number' href='{$url}page=$back'><</a>";	
		}else{ // kiểm tra điều kiện nếu đầu trang thì không back được nữa
			//$str .= "<a class='number disable' href='#'><</a>"; 
		} 
		
		# Lặp các nút 1....n trang
		$vitri_dau = max($page-2,1);
		$vitri_cuoi = min($page+2,$n);
		$so_trang = $vitri_cuoi-$vitri_dau;
		if($vitri_dau >1){
			$str .= '...';
		}
		/*#luôn hiện thị n nút 
		if($vitri_dau==1){
			$vitri_cuoi+=(4-$so_trang);	
		}
		#luôn hiện thị n nút
		if($vitri_cuoi==$n){
			$vitri_dau-=(4-$so_trang);
		}*/
		for($i=$vitri_dau;$i<=$vitri_cuoi;$i++){ // tạo vào lặp các nút trong trang
			if($i==$page){ // nếu là nút được chọn thì đổi màu
				$str .= "<a class='number current' href='{$url}page=$i'>$i</a>";
			}else{
				$str .= "<a class='number' href='{$url}page=$i'>$i</a>";
			} 	
		}	
		if($vitri_cuoi < $n){
			$str .= '...';
		}
	
		#Nút next
		if($page < $n){// kiểm tra điều kiện nếu cuối trang thì không next được nữa 
			$next = $page+1; // lấy ra page+1 để làm nút next
			$str .= "<a class='number' href='{$url}page=$next'>></a>";
		}else{			
		//	$str .= "<a class='number disable' href='#'>></a>";
		}
		
		#Nút xuống cuối trang
		if($page == $n){
			$str .= "<a class='number disable' href='{$url}page=$n'>>|</a>"; 
		}else{
			$str .= "<a class='number' href='{$url}page=$n'>>|</a>"; // di den cuối trang
		}
		return $str;
	}
}
?>