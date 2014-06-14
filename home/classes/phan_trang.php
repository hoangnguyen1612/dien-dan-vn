<?php
class phan_trang{
	var $tentrang = '';
	var $so_pt_tren_mot_trang = 1;
	var $tong_record = 0;
	# constructor
	function phan_trang($tentrang,$so_pt_tren_mot_trang)
	{
		$this->tentrang = $tentrang;
		$this->so_pt_tren_mot_trang = $so_pt_tren_mot_trang;
	}
	# tìm trang hiện tại
	function tim_trang_hien_tai()
	{
		return (empty($_GET[$this->tentrang]))?1:($_GET[$this->tentrang]);
	}
	
	# tìm vị trí bắt đầu để lấy record
	function tim_vi_tri_bat_dau()
	{
		return ($this->so_pt_tren_mot_trang*($this->tim_trang_hien_tai()-1));
	}
	
	# tìm tổng số trang
	function ceil_tong_so_trang()
	{
		return ceil($this->tong_record/$this->so_pt_tren_mot_trang);
	}
	function in_bo_nut()
	{
		$str='';
		$tenfile = $_SERVER['SCRIPT_NAME'];
		$tenthamso = $_SERVER['QUERY_STRING'];
		
		$page = $this->tim_trang_hien_tai();
		
		$sotrang = $this->ceil_tong_so_trang();
		
		if($sotrang!=0)
		{
			$tenthamso = str_replace("&$this->tentrang=$page",'',$tenthamso);
			$tenthamso = str_replace("$this->tentrang=$page",'',$tenthamso);
			
			if($tenthamso!='')
				{
					$tenthamso.="&";
				}
			if($page!=1)
				$back = $page-1;
			else
				$back = $page;	
			
			if($page!=$sotrang)
				$next = $page+1;
			else
				$next = $page;
				
			$vt_dau = max($page-2,1);
			
			$vt_sau = min($page+2,$sotrang);	
					
			if($page==1)
				$str.= "<a class='btn btn-xs btn-primary disable'><i class='fa fa-fast-backward'></i></a> 
				<a class='btn btn-xs btn-primary disable'><i class='fa fa-caret-left'></i></a>";
			else
				$str.= "<a href='$tenfile?$tenthamso"."page=1' class='btn btn-xs btn-primary' title='Trang đầu'><i class='fa fa-fast-backward'></i></a>  
				<a href='$tenfile?$tenthamso"."page=$back' class='btn btn-xs btn-primary' title='Về trang trước'><i class='fa fa-caret-left'></i></a>";
			
			if($vt_dau>1) $str.= '...';
			for($i=$vt_dau;$i<=$vt_sau;$i++)
			{
				if($i==$page)
				{
					$str .=" <a class='btn btn-xs btn-primary current'>$i</a> ";
				
				}
				else
				{
					$str.= " <a href='$tenfile?$tenthamso"."page=$i' class='btn btn-xs btn-primary'>$i</a> ";
				
				}
			}

			if($vt_sau<$sotrang) $str.= '...';
			if($page==$sotrang)
				$str.="<a class='btn btn-xs btn-primary disable'><i class='fa fa-caret-right'></i></a> 
				<a class='btn btn-xs btn-primary disable'><i class='fa fa-fast-forward'></i></a>";
			else
				$str.="<a class='btn btn-xs btn-primary' href='$tenfile?$tenthamso"."page=$next' title='Đến trang sau'><i class='fa fa-caret-right'></i></a> 
				<a class='btn btn-xs btn-primary' href='$tenfile?$tenthamso"."page=$sotrang' title='Trang cuối'><i class='fa fa-fast-forward'></i></a>";      
		}
		return $str;			  
	}
}
?>