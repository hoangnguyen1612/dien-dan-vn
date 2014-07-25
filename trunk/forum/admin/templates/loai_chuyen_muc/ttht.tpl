<div class="content-box-header">
  <h3>Chuyên mục [Cập nhật thứ tự hiển thị]</h3>
  <ul class="content-box-tabs">
    <li><a href="danh_sach.php">Danh sách</a></li>
    <li><a href="#" class="default-tab">Cập nhật thứ tự hiển thị</a></li>
  </ul>
  <div class="clear"></div>
</div>
<!-- End .content-box-header -->

<div class="content-box-content">
  <div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab --> 
    
    {showMessage()}
    <form method="post" action="cap_nhat_ttht_sm.php" name="fthem" onsubmit="return get()">
      <fieldset>
        <p>
          <label>Cập nhật thứ tự hiển thị cho chuyên mục: <a target="_blank" href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/bai_viet/danh_sach?loai={$chuyen_muc.ma}">{$chuyen_muc.ten}</a></label>
          <i>* Bạn hãy click chuột để kéo và thả các chuyên mục mà bạn muốn sắp xếp. Thứ tự hiển thị các chuyên mục sẽ được sắp xếp theo thứ tự trên xuống dưới!</i>
        <ul id="sortable">
        {foreach $ds as $c}
          <li class="ui-state-default bg-color" id="{$c.ma}">{$c.thu_tu_hien_thi}. {$c.ten}<span style="float:right; font-size: 70px" class="ui-icon ui-icon-arrowthick-2-n-s"></li>
        {/foreach}
        </ul>
        <input type="hidden" name="sort" id="sort" />
        <script>
        	function get()
			{
				var result = $('#sortable li').map(function(i,n) {
						return $(n).attr('id');
					}).get().join(',');
				document.getElementById("sort").value = result;
				return true;
			}
        </script>
        <script>
		  $(function() {
			$( "#sortable" ).sortable({
				update:function(event, ui){
					var result = $('#sortable li').map(function(i,n) {
						return $(n).attr('id');
					}).get().join(',');
					document.getElementById("sort").value = result;
				}
			});
			$( "#sortable" ).disableSelection();
		  });
		  </script>
        </p>
        <p style="text-align:center">
          <input type="submit" value="Lưu Và Tiếp Tục" name="save-and-continue" class="button">
          <input type="submit" value="Lưu Và Thoát" name="save-and-exit" class="button">
          <input type="button" onclick="window.location.href='danh_sach.php'" value="Không Lưu" class="button">
        </p>
      </fieldset>
      <div class="clear"></div>
    </form>
  </div>
  <!-- End #tab1 --> 
  
</div>
<link rel="stylesheet" type="text/css" href="/home/templates/js/ui-lightness/jquery-ui.css" />
<script type="text/javascript" src="/home/templates/js/ui/jquery-ui.custom.js"></script> 
<style>
#sortable li{
	margin-bottom: 20px;
	width: 400px;
	height: 25px;
	font-size: 14px;
	font-weight: 700;
	line-height: 25px;
	border-radius: 5px;
	box-shadow:0 0 14px #FFFFFF;
	border-color: antiquewhite;
	cursor: all-scroll;
}
</style>