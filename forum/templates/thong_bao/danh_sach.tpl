<div id="page-body">
  <main role="main">
    <div class="side-segment">
      <h3>THÔNG BÁO CỦA BẠN</h3>
    </div>
    <div class="well" id="message">
      <table class="notification">
      	<tbody>
        {foreach $danh_sach as $thong_bao}
         <tr>
         <td width="2%" align="center" class="icon"><i class="icon-{$thong_bao_icon[$thong_bao.loai_thong_bao]} icon-{$thong_bao.loai_thong_bao}"></i></td>
          <td width="84%">{$thong_bao.noi_dung}</td>
          <td width="14%" align="right">{time_thong_bao($thong_bao.ngay_tao)}</td>
         </tr>
       {/foreach}  
        </tbody>
      </table>
    </div>
  </main>
</div>

<style>
.notification{
	width: 100%;
}
.notification td{
	padding: 8px;
	line-height: 1.428571429;
	vertical-align: top;
	border-top: 1px solid #ddd;
	border-bottom: 1px solid #ddd;
}
.read{
	background-color: rgba(0, 0, 0, 0.05);
	color: #000;
	font-weight: 600;
}
.notification .icon{
	font-size: 16px;
}
.notification .icon-0{
	color: #690;
}
.notification .icon-1{
	color: #749BE7;
}
.notification .icon-2{
	color: green;
}
.notification .icon-3{
	color: #F93;
}
.notification a{
	text-decoration:underline;
	color: #749BE7;
}
</style>
