<div class="content-box-header">
  <h3>Cấp bậc [Cấu hình]</h3>
  <ul class="content-box-tabs">
  	<li><a href="tong_quat.php">Biểu tượng và Số lượng</a></li>
    <li><a href="#" class="default-tab">Cấu hình</a></li>
  </ul>
  <div class="clear"></div>
</div>
<!-- End .content-box-header -->

<div class="content-box-content">
  <div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
    
    {showMessage()}
    <form method="post" action="cau_hinh_sm.php" name="fthem" onsubmit="return kiemtra()">
      <fieldset>
      	<p>
        	(* * *) Để hiển thị cấp bậc và tăng cấp cho mỗi thành viên trong diễn đàn, bạn cần cấu hình danh sách các cấp bậc có trong diễn đàn của bạn. 
    		Cấp bậc của mỗi thành viên tùy thuộc vào điểm số tích lũy của họ trong diễn đàn, vì vậy bạn hãy cấu hình các khoảng cấp bậc hợp lý để hệ thống vận hành được tốt.
        </p>
        
       
       <p>
       <label>Cấu hình cấp bậc <span class="required">(*)</span></label>
       <table class="table" id="cap_bac">
        {if empty($ds_cap_bac)}
           {section name=cap_bac loop=$so_luong+1 start=1}
            <tr>
             <td width="2%"><div style="width: 14px; height: auto; padding:3px; text-align:center; border: 1px solid #ccc; border-radius: 5px; background-color: #459300 ; color:white">{$smarty.section.cap_bac.index}</div></td>
              <td width="10%">
               &nbsp;&nbsp;&nbsp;&nbsp;<img src="/forum/upload/rank/{$icon}/{$smarty.section.cap_bac.index}{if $icon=='icon1'}.png{else if}.gif{/if}"/>
               <input type="hidden" name="data[icon_{$smarty.section.cap_bac.index}]" value="{$smarty.section.cap_bac.index}{if $icon=='icon1'}.png{else if}.gif{/if}" />
              </td>
              <td width="200px">
               <input type="text" placeholder="Tên cấp bậc {$smarty.section.cap_bac.index}" class="text-input large-input" style="font-size:14px !important" name="data[ten_cap_bac_{$smarty.section.cap_bac.index}]" value="{$x = noi_chuoi('ten_cap_bac_',$smarty.section.cap_bac.index)}{$smarty.session.data.$x|default: ''}" />
              </td>
              <td width="50px">
                  {if $smarty.section.cap_bac.index == 1}
                        <input type="text" readonly="readonly" value="0" class="text-input" />
                  {else if}
                    <input type="text" placeholder="Từ điểm" class="text-input .so" name="data[tu_diem_{$smarty.section.cap_bac.index}]" onkeypress="return inputNumber(event)" value="{$y = noi_chuoi('tu_diem_',$smarty.section.cap_bac.index)}{$smarty.session.data.$y|default: ''}"/>
                  {/if}
                    <input type="text" placeholder="Đến điểm" class="text-input .so" name="data[den_diem_{$smarty.section.cap_bac.index}]" onkeypress="return inputNumber(event)"value="{$z = noi_chuoi('den_diem_',$smarty.section.cap_bac.index)}{$smarty.session.data.$z|default: ''}" />
              </td>
            </tr>
            {/section}
       {else if}
       		 {$i=1} 
      		{foreach $ds_cap_bac as $key=>$value}    
       		<tr>
             <td width="2%"><div style="width: 14px; height: auto; padding:3px; text-align:center; border: 1px solid #ccc; border-radius: 5px; background-color: #459300 ; color:white">{$i}</div></td>
              <td width="10%">
               &nbsp;&nbsp;&nbsp;&nbsp;<img src="/forum/upload/rank/{$icon}/{$i}{if $icon=='icon1'}.png{else if}.gif{/if}"/>
              </td>
              <td width="200px">
               <input type="text" placeholder="Tên cấp bậc {$i}" class="text-input large-input" style="font-size:14px !important" name="data[ten_cap_bac_{$i}]" value="{$value.ten}" />
              </td>
              <td width="50px">
              <input name="data[cap_bac_{$i}]" value="{$value.ma}" type="hidden" />
              {if $i == 1}
                <input type="text" readonly="readonly" value="0" class="text-input" />
              {else if}
               <input type="text" placeholder="Từ điểm" class="text-input .so" name="data[tu_diem_{$i}]" onkeypress="return inputNumber(event)" value="{$value.dau}"/>
              {/if}    
                <input type="text" placeholder="Đến điểm" class="text-input .so" name="data[den_diem_{$i}]" onkeypress="return inputNumber(event)"value="{$value.cuoi}" />
               
              </td>
            </tr>
            {$i = $i +1}
            {/foreach}
       {/if}     
       </table>
       </p>
        <p style="text-align:center">
          <input type="submit" value="Lưu" name="save-and-continue" class="button">
          <input type="button" onclick="window.location.href='cau_hinh.php'" value="Làm mới" class="button">
          <input type="button" onclick="window.location.href='../thong_ke/tong_quat.php'" value="Không Lưu" class="button">
        </p>
      </fieldset>
      <div class="clear"></div>
    </form>
  </div>
  <!-- End #tab1 --> 
  
</div>
<!-- End .content-box-content -->