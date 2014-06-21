<div class="content-box-header">
  <h3>Liên hệ [Xem Chi Tiết]</h3>
  <ul class="content-box-tabs">
    <li><a href="#" class="default-tab">Xem Chi Tiết</a></li>
    <li><a href="danh_sach.php">Danh Sách</a></li>
  </ul>
  <div class="clear"></div>
</div>
<!-- End .content-box-header -->

<div class="content-box-content">
  <div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab --> 
    
    {if isset($smarty.session.message) && $smarty.session.type_message == 'error'}
    <div class="notification error png_bg"> <a href="#" class="close"><img src="../templates/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
      <div> {$smarty.session.message} </div>
    </div>
    {/if} 
    {if isset($lien_he['tieu_de'])}
    <table class="table">
      <thead>
      </thead>
      <tfoot>
      </tfoot>
      <tbody>
        <tr>
          <td class="left">Tiêu Đề</td>
          <td>{$lien_he['tieu_de']}</td>
        </tr>
        <tr>
          <td class="left">Người Gửi</td>
          <td>{$lien_he['ho_ten']}</td>
        </tr>
        <tr>
          <td class="left">Email</td>
          <td>{$lien_he['email']}</td>
        </tr>
        <tr>
          <td class="left">Ngày Gửi</td>
          <td>{$lien_he['ngay_tao']}</td>
        </tr>
        <tr>
          <td class="left">Nội Dung</td>
          <td><div style="width: 500px; height: 70px; overflow: auto">{nl2br($lien_he['noi_dung'])}</div></td>
        </tr>
      </tbody>
    </table>
    {/if} 
    </div>
  <!-- End #tab1 --> 
  
</div>
<!-- End .content-box-content -->