<div id="page-body">
  <main role="main">
    <div class="row-fluid">
      <div class="side-segment">
        <h3>Báo cáo sai phạm {if $smarty.get.loai == 0 } bài viết : {$bai_viet.tieu_de} {/if} {if $smarty.get.loai == 1} bình luận : {$binh_luan.tieu_de} {/if}</h3>
      </div>
      <form method="post" action="/{$ma_dien_dan}/bao_cao/them_sm" id="report">
        <div class="well">
          <p>Sử dụng mẫu dưới đây để báo cáo sai phạm đến quản trị của diễn đàn. Việc sử dụng báo cáo sai phạm chỉ nên dùng khi bài viết vi phạm nội quy của diễn đàn.</p>
          <fieldset>
          	<input type="hidden" name = "loai" value="{$smarty.get.loai}" >
            <input type="hidden" name = "ma" value="{$smarty.get.ma}" />
            <div class="control-group">
              <label class="control-label" for="reason_id">Lý do:</label>
              <div class="controls controls-row">
                <div class="selector">
                  <select class="selectpicker" name="noi_dung" id="reason_id" data-original-title="" title="" style="display: none;">
                    <option value="Bài viết có chứa link độc hại.">Bài viết có chứa link độc hại.</option>
                    <option value="Báo cáo bài viết vi phạm bản quyền của người khác.">Báo cáo bài viết vi phạm bản quyền của người khác.</option>
                    <option value="Bình luận sai thông tin.">Bình luận sai thông tin.</option>
                    <option value="Bài viết không đúng nội dung chuyên mục">Bài viết không đúng nội dung chuyên mục.</option>
                  </select>
                  
                </div>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="report_text">Lý do khác:</label>
              <div class="controls controls-row">
                <textarea placeholder="Các lí do khác......." rows="2" name="noi_dung_khac" id="report_text" class="span12"></textarea>
              </div>
            </div>
          </fieldset>
        </div>
        <div class="form-actions">
          <fieldset>
            <input type="submit" name="submit" class="btn" value="Gửi">
            <input type="button" name="cancel" class="btn" value="Quay lại" onclick="window.location.href='{$smarty.server.HTTP_REFERER}'">
          </fieldset>
        </div>
      </form>
    </div>
  </main>
</div>
