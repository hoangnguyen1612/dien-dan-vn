<div id="page-body">
  <main role="main">
    <div class="row-fluid">
      <div class="side-segment">
        <h3>danh sách thành viên diễn đàn {$dien_dan.ten}</h3>
      </div>
        <div class="well">
          <div class="row-fluid">
            <div class="span2">
              
            </div>
            <div class="span9">
              <div class="row-fluid">
                <div class="span7">
                  
                </div>
                <div class="span5"> 
                  <!-- Bio -->
                
                  <!-- // Bio END --> 
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="row-fluid">
      <div class="pull-left">
        <form method="post" id="jumpbox" action="./viewforum.php" onsubmit="if(this.f.value == -1){ return false; }">
          <fieldset class="controls-row">
            <label class="control-label" for="f" accesskey="j">Đi đến:</label>
            <select class="selectpicker" data-container="body" name="f" id="f" onchange="if(this.options[this.selectedIndex].value != -1){ document.forms['jumpbox'].submit() }" data-original-title="" title="" style="display: none;">
              <option value="-1">Select a forum</option>
              <option value="-1">------------------</option>
              <option value="1">Your first category</option>
              <option value="2">&nbsp; &nbsp;Your first forum</option>
              <option value="11">Test Forum</option>
              <option value="6">Category with Password and locked forums</option>
              <option value="7">&nbsp; &nbsp;Password protected</option>
              <option value="8">&nbsp; &nbsp;Locked from the get-go</option>
              <option value="12">Category with Subforums and moderator assigned</option>
              <option value="13">&nbsp; &nbsp;Forum 1</option>
              <option value="17">&nbsp; &nbsp;&nbsp; &nbsp;Subforum 1</option>
              <option value="18">&nbsp; &nbsp;&nbsp; &nbsp;Subforum 2</option>
              <option value="3">Link Category</option>
              <option value="20">&nbsp; &nbsp;BBOOTS Community</option>
              <option value="19">&nbsp; &nbsp;Purchase BBOOTS</option>
              <option value="21">&nbsp; &nbsp;COLORIZE Service</option>
              <option value="15">&nbsp; &nbsp;phpBB ™ Documentation</option>
              <option value="16">&nbsp; &nbsp;phpBB ™ Home</option>
            </select>
            <div class="btn-group bootstrap-select">
              <button type="button" class="btn dropdown-toggle selectpicker btn-default" data-toggle="dropdown" data-id="f" title="" data-original-title="Select a forum"><span class="filter-option pull-left">Thông báo từ BQT HUTECH</span>&nbsp;<span class="caret"></span></button>
              <div class="dropdown-menu open">
                <ul class="dropdown-menu inner selectpicker" role="menu" data-original-title="" title="">
                  <li rel="0" class="selected"><a tabindex="0" class="" style="" data-original-title="" title=""><span class="text">Chọn chuyện mục</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                  <li rel="1"><a tabindex="0" class="" style="" data-original-title="" title=""><span class="text">------------------</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                  <li rel="2"><a tabindex="0" class="" style="" data-original-title="" title=""><span class="text">Thông báo từ BQT HUTECH</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                  <li rel="3"><a tabindex="0" class="" style="" data-original-title="" title=""><span class="text">&nbsp; &nbsp;Your first forum</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                  <li rel="4"><a tabindex="0" class="" style="" data-original-title="" title=""><span class="text">Test Forum</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                  <li rel="5"><a tabindex="0" class="" style="" data-original-title="" title=""><span class="text">Category with Password and locked forums</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                  <li rel="6"><a tabindex="0" class="" style="" data-original-title="" title=""><span class="text">&nbsp; &nbsp;Password protected</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                  <li rel="7"><a tabindex="0" class="" style="" data-original-title="" title=""><span class="text">&nbsp; &nbsp;Locked from the get-go</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                  <li rel="8"><a tabindex="0" class="" style="" data-original-title="" title=""><span class="text">Category with Subforums and moderator assigned</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                  <li rel="9"><a tabindex="0" class="" style="" data-original-title="" title=""><span class="text">&nbsp; &nbsp;Forum 1</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                  <li rel="10"><a tabindex="0" class="" style="" data-original-title="" title=""><span class="text">&nbsp; &nbsp;&nbsp; &nbsp;Subforum 1</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                  <li rel="11"><a tabindex="0" class="" style="" data-original-title="" title=""><span class="text">&nbsp; &nbsp;&nbsp; &nbsp;Subforum 2</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                  <li rel="12"><a tabindex="0" class="" style="" data-original-title="" title=""><span class="text">Link Category</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                  <li rel="13"><a tabindex="0" class="" style="" data-original-title="" title=""><span class="text">&nbsp; &nbsp;BBOOTS Community</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                  <li rel="14"><a tabindex="0" class="" style="" data-original-title="" title=""><span class="text">&nbsp; &nbsp;Purchase BBOOTS</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                  <li rel="15"><a tabindex="0" class="" style="" data-original-title="" title=""><span class="text">&nbsp; &nbsp;COLORIZE Service</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                  <li rel="16"><a tabindex="0" class="" style="" data-original-title="" title=""><span class="text">&nbsp; &nbsp;phpBB ™ Documentation</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                  <li rel="17"><a tabindex="0" class="" style="" data-original-title="" title=""><span class="text">&nbsp; &nbsp;phpBB ™ Home</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                </ul>
              </div>
            </div>
            <button type="submit" class="btn">Đi</button>
          </fieldset>
        </form>
      </div>
    </div>
    <div class="row-fluid"> </div>
    <div class="space10"></div>
  </main>
</div>



