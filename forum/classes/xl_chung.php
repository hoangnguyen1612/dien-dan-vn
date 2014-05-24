<?php
class xl_chung{
	protected $bang = '';
	protected $ds_cot = '';
	
	#Đếm
	function dem($dieu_kien = array(), $ma = 'ma',$dinh_dang = PDO::FETCH_ASSOC ,$them_cau_truy_van = '')
	{
		global $dbh;
		
		$chuoi = " FROM `{$this->bang}` ";
		$du_lieu = array();
		
		$chuoi_dieu_kien = $this->tao_chuoi_dieu_kien($dieu_kien, $du_lieu);
		
		if($chuoi_dieu_kien)
		{
			$chuoi .= " WHERE $chuoi_dieu_kien";
		}
		$sql = "SELECT Count(`{$ma}`) as so_luong {$chuoi} {$them_cau_truy_van}";

		$sth = $dbh->prepare($sql);
		$sth->execute($du_lieu);
		$sl = $sth->fetchColumn(0);
		return $sl;
		
	}
	#đọc
	function doc($dieu_kien = array(), $ds_cot = '*', $dinh_dang = PDO::FETCH_ASSOC, $them_cau_truy_van = '')
	{
		global $dbh;
		
		$chuoi = " FROM `{$this->bang}`";
		$du_lieu = array();
		
		$chuoi_dieu_kien = $this->tao_chuoi_dieu_kien($dieu_kien, $du_lieu);
		if($chuoi_dieu_kien)
		{
			$chuoi .= " WHERE $chuoi_dieu_kien";
		}
		
		$ds_cot = $this->tao_chuoi_ds_cot($ds_cot);
		
		$sql = "SELECT {$ds_cot} {$chuoi} {$them_cau_truy_van} LIMIT 0,1"; 
		$sth = $dbh->prepare($sql);
		$sth->execute($du_lieu);
		return $sth->fetch($dinh_dang);
	}
	
	#thêm
	function them($du_lieu)
	{
	
		global $dbh;
		
		$chuoi_cot = '';
		$chuoi_gia_tri  = '';
		
		foreach($du_lieu as $key=>$value)
		{
			$chuoi_cot .= "`{$key}`,";
			$chuoi_gia_tri .= ":{$key},";
		}
		
		$chuoi_cot = trim($chuoi_cot, ',');
		$chuoi_gia_tri = trim($chuoi_gia_tri, ',');
		
		$sql = "INSERT INTO `{$this->bang}` ({$chuoi_cot}) VALUES ({$chuoi_gia_tri})";
	
		$sth = $dbh->prepare($sql);
		return $sth->execute($du_lieu);
	}
	
	#xóa
	function xoa($dieu_kien, $them_cau_truy_van = '')
	{
		global $dbh;
		if(is_array($dieu_kien))
		{
			$chuoi = " FROM `{$this->bang}`";
			$du_lieu = array();
			
			$chuoi_dieu_kien = $this->tao_chuoi_dieu_kien($dieu_kien, $du_lieu);
			
			if($chuoi_dieu_kien)
			{
				$chuoi .= " WHERE {$chuoi_dieu_kien}";
			}
			
			$sql = "DELETE {$chuoi} {$them_cau_truy_van}";
			
			$sth = $dbh->prepare($sql);
			
			return $sth->execute($du_lieu);
		}
		else
		{
			$sql = "DELETE FROM `{$this->bang}` WHERE `ma` = :ma LIMIT 1";
			$sth = $dbh->prepare($sql);
			return $sth->execute(array('ma' => $dieu_kien));
		}
	}
	
	#cập nhật
	function cap_nhat($du_lieu, $ma = 'ma')
	{
		global $dbh;
		
		$chuoi = '';
		foreach($du_lieu as $key=>$value)
		{
			$chuoi .= "`{$key}` = :{$key},";
		}
		$chuoi = trim($chuoi, ',');
		
		$sql = "UPDATE `{$this->bang}` SET {$chuoi} WHERE `{$ma}` = :{$ma} LIMIT 1";
	
		$sth = $dbh->prepare($sql);
		return $sth->execute($du_lieu);
	}
	
	function cap_nhat_dieu_kien($du_lieu, $dieu_kien)
	{
		global $dbh;
		
		$chuoi = ''; 
		foreach($du_lieu as $key=>$value)
		{
			$chuoi .= "`{$key}` = :{$key},";
		}
		$chuoi = trim($chuoi, ',');
		
		$chuoi_dieu_kien = ''; 
		foreach($dieu_kien as $key=>$value)
		{
			$chuoi_dieu_kien.=" `{$key}` = :{$key} and";
		}
		$chuoi_dieu_kien.= ' 1';
		
		$sql = "UPDATE `{$this->bang}` SET {$chuoi} WHERE {$chuoi_dieu_kien} LIMIT 1";
		$sth = $dbh->prepare($sql);
		return $sth->execute(array_merge($du_lieu, $dieu_kien));
	}
	
	#danh sách
	function danh_sach($vi_tri = 0, $so_luong = 0, $dieu_kien = array(), $sap_xep = 'ma DESC', $ds_cot = '*', $dinh_dang = PDO::FETCH_ASSOC, $them_cau_truy_van = '', $phan_trang = true)
	{
		global $dbh;
		
		$chuoi = " FROM `{$this->bang}` ";
		$du_lieu = array();
		
		$chuoi_dieu_kien = $this->tao_chuoi_dieu_kien($dieu_kien, $du_lieu);
		
		if($chuoi_dieu_kien)
		{
			$chuoi .= " WHERE $chuoi_dieu_kien";
		}

		$ds_cot = $this->tao_chuoi_ds_cot($ds_cot);
		
		if(!$phan_trang)
		{
			if($so_luong == 0)
			{
				$chuoi_ds = "SELECT {$ds_cot} {$chuoi} {$them_cau_truy_van} ORDER BY {$sap_xep} ";
				
			}
			else
			{
				$chuoi_ds = "SELECT {$ds_cot} {$chuoi} {$them_cau_truy_van} ORDER BY {$sap_xep} LIMIT $vi_tri, $so_luong";
			}
			$sth = $dbh->prepare($chuoi_ds);
			$sth->execute($du_lieu);
			return $sth->fetchAll($dinh_dang);
		}
		
		$chuoi_ds = "SELECT {$ds_cot} {$chuoi} {$them_cau_truy_van} ORDER BY {$sap_xep} LIMIT {$vi_tri}, {$so_luong}";
		
	
		$sth = $dbh->prepare($chuoi_ds);
		$sth->execute($du_lieu);
		
		$ds = $sth->fetchAll($dinh_dang);
		
		$chuoi_sl = "SELECT count(`ma`) {$chuoi} {$them_cau_truy_van}";
		
	
		$sth = $dbh->prepare($chuoi_sl);
		$sth->execute($du_lieu);
		$sl = $sth->fetchColumn(0);
		
		return array($ds, $sl);
	}
	
	#cập nhật trạng thái
	function cap_nhat_trang_thai($ma, $cot = 'trang_thai',$them_cau_truy_van = '')
	{
		global $dbh;
		
		$sql = "UPDATE `{$this->bang}` SET `{$cot}` = 1-`{$cot}` WHERE `ma` = :ma {$them_cau_truy_van} LIMIT 1";
		$sth = $dbh->prepare($sql);
		return $sth->execute(array('ma'=>$ma));
	}
	#cập nhật trạng thái có thêm câu truy vấn 
	function cap_nhat_trang_thai_1($cot = 'trang_thai',$them_cau_truy_van = '')
	{
		global $dbh;
		
		$sql = "UPDATE `{$this->bang}` SET `{$cot}` = 1-`{$cot}` WHERE {$them_cau_truy_van} LIMIT 1";
		$sth = $dbh->prepare($sql);
	
		return $sth->execute();
	}
	#cập nhật bộ đếm
	function cap_nhat_bo_dem($ma, $cot = 'so_lan_xem')
	{
		global $dbh;
		
		$sql = "UPDATE `{$this->bang}` SET `{$cot}` = 1 + `{$cot}` WHERE `ma` = :ma LIMIT 1";
		$sth = $dbh->prepare($sql);
		return $sth->execute(array('ma'=>$ma));
	}
	
	#tạo chuỗi danh sách cột
	function tao_chuoi_ds_cot($ds_cot)
	{
		global $lang_index;
		
		if(!is_array($ds_cot)) return $ds_cot;
		
		if(!isset($lang_index))
		{
			$lang_index = '';
		}
		
		$str = '';
		foreach($ds_cot as $cot)
		{
			$str.=$cot;
		}
		
		return rtrim($str, ',');
	}
	
	#tạo chuỗi điều kiện
	function tao_chuoi_dieu_kien($dieu_kien, &$du_lieu)
	{
		if(!$dieu_kien) return '';
		
		$chuoi = '';
		
		list($phep_toan, $mang) = each($dieu_kien);

		
		if(!is_array($mang))
		{
			foreach($dieu_kien as $key=>$value)
			{
				if($value === '') continue;
				
				$key = trim(strtolower($key));
				
				if(strpos($key, ' ')===false)
				{
					$du_lieu[] = $value;
					$chuoi .= " ($key = ?) AND";
				}
				else
				{
					if(strpos($key, 'like') === false)
					{
						$du_lieu[] = $value;
					}
					else
					{
						$du_lieu[] = '%' . $value . '%';
					}
					
					$chuoi .= " ($key ?) AND ";
				}
			}
			
			return trim($chuoi, ' AND ');
		}
		
		foreach($mang as $key=>$value)
		{
			if(is_array($value))
			{
				$chuoi .= '('.$this->tao_chuoi_dieu_kien(array($key=>$value), $du_lieu)." ) $phep_toan ";
			}
			else
			{
				if($value === '') continue;
				
				$key = trim(strtolower($key));
				
				if(strpos($key, ' ') === false)
				{
					$du_lieu[] = $value;
					$chuoi .= " ($key = ?) $phep_toan";
				}
				else
				{
					if(strpos($key, 'like') === false)
					{
						$du_lieu[] = $value;
					}
					else
					{
						$du_lieu[] =  '%' . $value . '%';
					}
					
					$chuoi .= " ($key ?) $phep_toan";
				}
			}
			
			$chuoi = trim($chuoi, " $phep_toan");
			return $chuoi;
		}
	}
}