
</div>
</div>
<!-- start slider -->
<div class="slider_bg">
  <div class="wrap">
    <div class="slider">
      <h2>Thông Tin Tài Khoản</h2>
      <h3 style="">Xem và cập nhật thông tin cá nhân của bạn để chúng tôi có thể hỗ trợ bạn tốt hơn</h3>
    </div>
  </div>
</div>
<!-- start main -->
<div class="main_bg">
  <div class="wrap">
    <div class="main">
      <div class="content"> 
         <div class="user">
         	<div class="title"><h3><i class="fa fa-pencil-square"></i>&nbsp;&nbsp;Thông Tin Cơ Bản</h3></div>
            <table>
            	<tr>
                	<td rowspan="3"><div id="img">
         		<img src="../upload/hinh_dai_dien/ngan.png" width="168" height="168" />
         	</div></td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            		<td style="vertical-align:top">
                    	<table id="info-basic" style="display:block">
                        	<tr>
                            	<td><i class="fa fa-user"></i>&nbsp;<label class="info">Họ tên</label></td>
                                <td><label>Nguyễn Thanh Hoàng</label></td>
                            </tr>
                            <tr>
                            	<td><i class="fa fa-male"></i>&nbsp;&nbsp;<label class="info">Giới tính</label></td>
                                <td><label>Nam</label></td>
                            </tr>
                            <tr>
                            	<td><i class="fa fa-calendar-o"></i> <label class="info">Ngày sinh</label></td>
                                <td><label>16 tháng 12 1992</label></td>
                            </tr>
                            <tr><td>&nbsp;</td></tr>
                            <tr>
                            	<td>
                                	<input type="button" class="action-button" value="Chỉnh Sửa" onclick="open_edit_basic()"/>
                                </td>
                            </tr>
                        </table>
                        <table id="info-edit-basic" style="display:none">
                        <form id="msform">
                        	<tr>
                            	<td><i class="fa fa-user"></i>&nbsp;<label class="info">Họ tên</label></td>
                                <td><input type="text" class="textbox" value="Nguyễn Thanh Hoàng"></td>
                            </tr>
                            <tr><td>&nbsp;</td></tr>
                            <tr>
                            	<td><i class="fa fa-male"></i>&nbsp;&nbsp;<label class="info">Giới tính</label></td>
                                <td><input class="css-radio" type="radio" name="radio-group" id="nam" value="1" checked="checked"/>
   <label class="lbl-radio" for="nam" id="lbl-nam" style="color:#666; margin-left: 0px">Nam</label>
   	<input class="css-radio" type="radio" name="radio-group" id="nam" value="1"/>
   <label class="lbl-radio" for="nam" id="lbl-nam" style="color:#666;">Nữ</label>
   </td>
                            </tr>
                             <tr><td>&nbsp;</td></tr>
                            <tr>
                            	<td><i class="fa fa-calendar-o"></i> <label class="info">Ngày sinh</label></td>
                                <td><input type="text" class="textbox" value="16/12/1992" /></td>
                            </tr>
                            <tr><td>&nbsp;</td></tr>
                            <tr>
                            	<td>
                                	<input type="button" class="action-button" value="Cập Nhật"  />
                                    
                                </td>
                                <td><input type="button" class="action-button" value="Không Lưu" onclick="close_edit_basic()"/></td>
                            </tr>
                        </form>    
                        </table>
                    </td>
                </tr>
            </table>
            <script>
            	function open_edit_basic()
				{
					document.getElementById("info-basic").style.display = 'none';
					document.getElementById("info-edit-basic").style.display = 'block';
				}
				function close_edit_basic()
				{
					document.getElementById("info-basic").style.display = 'block';
					document.getElementById("info-edit-basic").style.display = 'none';
				}
				function open_edit_contact()
				{
					document.getElementById("info-contact").style.display = 'none';
					document.getElementById("info-edit-contact").style.display = 'block';
				}
				function close_edit_contact()
				{
					document.getElementById("info-contact").style.display = 'block';
					document.getElementById("info-edit-contact").style.display = 'none';
				}
            </script>
         </div>
         <div class="user">
         	<div class="title"><h3><i class="fa fa-pencil-square"></i>&nbsp;&nbsp;Thông Tin Liên Hệ</h3></div>
            <table id="info-contact" style="display:block">
                        <form id="msform">
                        	<tr>
                    <td><i class="fa fa-map-marker"></i>&nbsp;&nbsp;&nbsp;<label class="info">Địa chỉ</label></td>
                    <td><label>Biên Hòa, Đồng Nai</label></td>
                </tr>
                <tr>
                    <td><i class="fa fa-phone"></i>&nbsp;&nbsp;<label class="info">Điện Thoại</label></td>
                    <td><label>01634 479 979</label></td>
                </tr>
                <tr>
                    <td><i class="fa fa-envelope"></i> <label class="info">Email</label></td>
                    <td><label>nt.hoang@gmail.com</label></td>
                </tr>
                <tr><td>&nbsp;</td></tr>
                <tr>
                    <td>
                        <input type="button" class="action-button" value="Chỉnh Sửa" onclick="open_edit_contact()" />
                    </td>
                    
                </tr>
                        </form>    
            </table>
            
            <table id="info-edit-contact" style="display:none">
                <tr>
                    <td><i class="fa fa-map-marker"></i>&nbsp;&nbsp;&nbsp;<label class="info">Địa chỉ</label></td>
                    <td><input type="text" class="textbox" value="Biên Hòa, Đồng Nai"></td>
                </tr>
                 <tr><td>&nbsp;</td></tr>
                <tr>
                    <td><i class="fa fa-phone"></i>&nbsp;&nbsp;<label class="info">Điện Thoại</label></td>
                    <td><input type="text" class="textbox" value="01634 479 979"></td>
                </tr>
                 <tr><td>&nbsp;</td></tr>
                <tr>
                    <td><i class="fa fa-envelope"></i> <label class="info">Email</label></td>
                    <td><input type="text" class="textbox" value="nt.hoang1612@gmail.com"></td>
                </tr>
                <tr><td>&nbsp;</td></tr>
                <tr>
                    <td>
                        <input type="button" class="action-button" value="Cập Nhật"/>
                    </td>
                    <td>
                        <input type="button" class="action-button" value="Không Lưu" onclick="close_edit_contact()" />
                    </td>
                </tr>
            </table>
         </div>
         <div class="user">
         	<div class="title"><h3><i class="fa fa-pencil-square"></i>&nbsp;&nbsp;lĩnh vực quan tâm</h3></div>
            
         </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="../templates/scripts/sliding.js"></script>