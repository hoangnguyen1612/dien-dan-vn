<div id="page-body">
  <main role="main">
    <div class="row-fluid">
      <div class="side-segment">
        <h3>Yêu cầu tham gia diễn đàn</h3>
      </div>
      <form method="post" action="./memberlist.php?mode=group" id="viewprofile">
        <div class="well">
          <div class="row-fluid">
          {if !empty($danh_sach)}
           {foreach $danh_sach as $thanh_vien}
               <div class="thumbnail">
                    <img src="/home/upload/nguoi_dung/{if $thanh_vien.thumbnail!=NULL}{$thanh_vien.thumbnail}{else if $thanh_vien.gioi_tinh==0}no_avatar_male.jpg{else if}no_avatar_female.jpg{/if}" />
               </div>
               <div class="fullname">
                    <a href="" class="topictitle">{$thanh_vien.ho_ten}</a><br />
                    <a href="/{$ma_dien_dan}/thanh_vien/them?ma={$thanh_vien.ma_nguoi_dung}" class="topictitle no-bold underline">Thêm</a> / <a href="/{$ma_dien_dan}/thanh_vien/huy_bo?ma={$thanh_vien.ma_nguoi_dung}" class="topictitle no-bold underline">Hủy bỏ</a>
               </div>
               <div class="clear"></div>
               <div class="spacing"></div>
           {/foreach}
          {else if}
          
          <span style="color: #999">Không có yêu cầu tham gia diễn đàn mới nào</span>	
          {/if}
          </div>
        </div>
      </form>
    </div>
    <div class="row-fluid"> </div>
    <div class="space10"></div>
  </main>
</div>



