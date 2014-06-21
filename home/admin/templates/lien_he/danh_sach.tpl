<div class="content-box-header">
  <h3>Liên hệ [Danh sách]</h3>
  <ul class="content-box-tabs">
    <li><a href="#" class="default-tab">Danh sách</a></li>
  </ul>
  <div class="clear"></div>
</div>
<!-- End .content-box-header -->

<div class="content-box-content">
  <div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab --> 
    
    {include file='../elements/message.tpl'}
    <form method="get" action="list.php" name="fSearch" id="fSearch">
      Từ Khóa
      <input type="text" name="tu_khoa" class="text-input small-input" value="">
      <input class="button" type="submit" value="Tìm Kiếm">
      <input class="button" type="button" value="Tất cả" onclick="window.location.href='danh_sach.php'">
    </form>
    <form action="xoa_tat_ca.php" method="post">
      <table class="table">
        <thead>
          <tr>
            <th><input type="checkbox" class="check-all" id="phatlhjs-check-all"></th>
            <th class="admin_tieu_de">Mã</th>
            <th style="text-align:left" class="admin_tieu_de">Họ Tên</th>
            <th style="text-align:left" class="admin_tieu_de">Email</th>
            <th style="text-align:left" class="admin_tieu_de">Tiêu Đề</th>
            <th class="admin_tieu_de">Thời Gian</th>
            <th class="admin_tieu_de">Tác Vụ</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <td colspan="8"><div class="bulk-actions align-left"><img src="../templates/images/arrow_ltr.png" />
                <input name="xoa_muc_chon" class="button" type="submit" value="Xóa Các Mục Đã Chọn" onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')">
              </div>
              <div class="pagination">{$phan_trang}</div>
              <div class="clear"></div></td>
          </tr>
        </tfoot>
        <tbody>
        {foreach $danh_sach as $lien_he}
          <tr {if $lien_he['trang_thai']==0}style="background-color: #FFFFFF"{else}style="background-color:#E7E7E7"{/if}>
            <td><input name="item[]" type="checkbox" value="{$lien_he['ma']}"></td>
            <td class="admin_tieu_de">{$lien_he['ma']}</td>
             <td>{$lien_he.ho_ten}</td>
            <td class="admin_tieu_de" style="text-align:left">{$lien_he['email']}</td>
            <td class="admin_tieu_de" style="text-align:left">{$lien_he['tieu_de']|truncate: 30}</td>
            <td class="admin_tieu_de">{humanTiming(strtotime($lien_he['ngay_tao']))} ({date('H:i d/m/Y', strtotime($lien_he.ngay_tao))})</td>
            <td><!-- Icons --> 
              <a title="Xem" href="xem.php?ma={$lien_he['ma']}"><img width="16" alt="View" src="../templates/images/search.png"></a> <a href="xoa.php?ma={$lien_he['ma']}" onclick="return confirm('Bạn có chắc chắn muốn xóa mã #{$lien_he['ma']} không ?')" title="Delete"><img style="cursor:pointer" alt="Xóa" src="../templates/images/icons/cross.png"> </a></td>
          </tr>
       {/foreach}   
        </tbody>
      </table>
    </form>
  </div>
  <!-- End #tab1 --> 
  
</div>
<!-- End .content-box-content -->