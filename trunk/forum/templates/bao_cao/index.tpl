<div id="page-body">
  <main role="main">
    <div class="row-fluid">
      <div class="side-segment">
        <h3>Báo cáo sai pham bài viết này</h3>
      </div>
      <form method="post" action="./report.php?f=2&amp;p=25&amp;pm=0" id="report">
        <div class="well">
          <p>Sử dụng mẫu dưới đây để báo cáo sai phạm đến quản trị của diễn đàn. Việc sử dụng báo cáo sai phạm chỉ nên dùng khi bài viết vi phạm nội quy của diễn đàn.</p>
          <fieldset>
            <div class="control-group">
              <label class="control-label" for="reason_id">Lý do:</label>
              <div class="controls controls-row">
                <div class="selector">
                  <select class="selectpicker" name="reason_id" id="reason_id" data-original-title="" title="" style="display: none;">
                    <option value="1">Bài viết có chứa link độc hại.</option>
                    <option value="2">Báo cáo bài viết vi phạm bản quyền của người khác.</option>
                    <option value="3">Báo cáo về việc đóng chủ đề.</option>
                    <option value="4">Bài viết không đúng nội dung chuyên mục.</option>
                  </select>
                  
                </div>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="notify1">Thông báo cho tôi:</label>
              <span class="help-block">Thông báo cho tôi khi báo cáo được xử lý.</span>
              <div class="controls controls-row">
                <input type="radio" name="notify" id="notify1" value="1" checked="checked">
                <label for="notify1">Có</label>
                <input type="radio" name="notify" id="notify0" value="0">
                <label for="notify0">Không</label>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="report_text">Thông tin thêm:</label>
              <div class="controls controls-row">
                <textarea placeholder="Các thông tin thêm......." rows="2" name="report_text" id="report_text" class="span12"></textarea>
              </div>
            </div>
          </fieldset>
        </div>
        <div class="form-actions">
          <fieldset>
            <input type="submit" name="submit" class="btn" value="Gửi">
            <input type="submit" name="cancel" class="btn" value="Quay lại">
          </fieldset>
        </div>
      </form>
    </div>
  </main>
</div>
