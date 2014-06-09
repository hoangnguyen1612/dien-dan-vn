<div id="page-body">
  <main role="main">
    <div class="side-segment">
      <h3>THÔNG BÁO CỦA BẠN</h3>
    </div>
    {if !empty($danh_sach)}
    <div class="well" id="message">
      <table class="notification">
      	<tbody> 
        {foreach $danh_sach as $thong_bao}
         <tr {if $thong_bao.trang_thai==1}class="read"{/if}>
         <td width="2%" align="center" class="icon"><i class="icon-{$thong_bao_icon[$thong_bao.loai_thong_bao]} icon-{$thong_bao.loai_thong_bao}"></i></td>
          <td width="84%"><a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/thong_bao/da_doc?ma={$thong_bao.ma}">{$thong_bao.noi_dung}</a></td>
          <td width="14%" align="right">{time_thong_bao($thong_bao.ngay_tao)}</td>
         </tr>
       {/foreach} 
        </tbody>
      {else if}
      	<span style="">Không có tin nhắn nào để hiển thị</span>
      {/if}
      </table>
    </div>
  </main>
</div>
