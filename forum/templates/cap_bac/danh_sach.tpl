<div id="page-body">
  <main role="main">
    <div class="row-fluid">
      <div class="side-segment">
        <h3><span class="text-color">Cấp Bậc Thành Viên</span></h3>
      </div>
        <div class="well">
            <div class="widget-content">
             <table class="table">
			<thead>
              <tr>
                <th width="200px"><span class="text-color">Điểm từ</span></th>
                <th width="200px"><span class="text-color">Điểm đến</span></th>
                <th width="200px"><span class="text-color">Tên cấp bậc</span></th>
                <th width="150px"><span class="text-color">Hình ảnh hiển thị</span></th>
              </tr>
            </thead>
			<tfoot>
			  <tr>
				<td colspan="8">
                 
				  </td>
			  </tr>
			</tfoot>
			<tbody>       
                  {foreach $ds_cap_bac as $cap_bac}
                <tr>
                <td>{$cap_bac.dau}</td>
                <td>{$cap_bac.cuoi}</td>
                <td>{$cap_bac.ten}</td>
                <td class="c"><img src="/forum/upload/rankCF/{$cap_bac.icon}" /></td>
  				</tr>
              	  {/foreach}	
 				<tr>
                	<td colspan="4"><span class="text-color" style="font-weight:bold">Điểm sẽ được tính từ việc tạo bài viết mới, thích bài viết hoặc bài bình luận đúng</span><br />
                    				+ Tạo bài viết mới : <span class="text-color"  style="font-weight:bold">+2</span> điểm<br />
                                    + Bài viết được thích hoặc bình luận được thích (1 lượt) : <span class="text-color"  style="font-weight:bold">+1</span> điểm <br />
                                    + Bài bình luận được người viết bài bình chọn là câu trả lời chính xác : <span class="text-color"  style="font-weight:bold">+3</span> điểm 
                                    
                    </td>
                </tr>   
                      
 				   
                      
 				   
                      
 				 
              
                                            
                  </tbody>
		  </table>
            </div>
          </div>
    </div>
  </main>
</div>



