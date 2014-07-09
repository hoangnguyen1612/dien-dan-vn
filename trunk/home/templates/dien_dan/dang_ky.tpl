<aside class="right-side"> 
  <!-- Content Header (Page header) -->
  <section class="content-header no-margin">
    <h1>Đăng Ký Diễn Đàn</h1>
  </section>
  {showMessage()} 
  <!-- Main content -->
  <section class="content"> 
    <!-- MAILBOX BEGIN -->
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-solid">
          <div class="box-body">
            <div class="row" style="margin-left: 0px">
              <link rel="stylesheet" type="text/css" href="/home/templates/css/formwizard.css" />
              <div id="RMAMain">
                <div id="RMAContainer">
                  <form action="them_sm.php" method="post" enctype="multipart/form-data" id="RMAForm">
                    <fieldset class="sectionwrap">
                      <legend>Chọn lĩnh vực</legend>
                      <table style="margin:auto;">
                        <tr>
                          <td style="padding-left: 20px" align="center"><p> </p>
                            <label>Chọn một mục</label>
                            <br />
                            <select class="btn" onchange="document.getElementById('lv').value = document.getElementById('ma_linh_vuc').value" id="ma_linh_vuc" style="border: 1px solid #ccc">
                              
                        {foreach $mac_dinh as $value}
                          {$x=$value.ma}
                          
                              <option value="{$value.ma}">{$value.ten}</option>
                              
                        {/foreach}
                      
                            </select>                 
                            <script>
                        window.onload = function()
                        {
                            document.getElementById("lv").value = document.getElementById("ma_linh_vuc").value;
                        }
                        
                        function change()
                        {
                            document.getElementById("lv").value = document.getElementById("ma_linh_vuc").value;
                        }
                      </script></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td width="100%" align="center"><div class="radios"> {$i=0}
                              {foreach $linh_vuc as $value}
                              <input type="radio" class="btn-radio" name="rGroup" value="{$value.ma}" id="{$value.ma}" 
                        {if isset($smarty.session.data.rGroup) && $smarty.session.data.rGroup==$value.ma}
                            checked
                        {else if $value.ma==1}
                            checked
                        {/if}/>
                              <label class="radio1 bg-{$mau.$i}" for="{$value.ma}">
                              <p style="text-align:center">{$value.ten}</p>
                              </label>
                              {$i = $i+1}
                              {/foreach} </div></td>
                        </tr>
                      </table>
                      {literal} 
                      <script>
                    $(".btn-radio").click(function(){
                        var lv = $("input:radio[name='rGroup']:checked").val();
                        jQuery.ajax({
                            type:"POST",
                            url:"get_linh_vuc.php",
                            data: {'linh_vuc':lv},
                            success: function(result) {
                                $("#ma_linh_vuc").find('option').remove();
                                $("#ma_linh_vuc").append(result);
                                change();
                            }
                        });
                    });
                </script> 
                      {/literal}
                    </fieldset>
                    <fieldset class="sectionwrap">
                      <legend>Thông tin cơ bản</legend>
                      <table width="70%">
                        <tr>
                          <td><label>Tên diễn đàn</label>
                            <span class="red">*</span><br />
                            <input class="required form-control" id="ten_dien_dan" name="data[ten_dien_dan]" type="text" value="{$smarty.session.data.ten_dien_dan|default:''}"/>
                            <input type="hidden" name="data[chon_linh_vuc]" id="lv" class="required" />
                            </td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td><label>Câu khẩu hiệu (slogan)</label>
                            <span class="red">*</span><br />
                            <input class="required form-control" name="data[slogan]" type="text" id="slogan" value="{$smarty.session.data.slogan|default:''}"/></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td><label>Mô tả về diễn đàn</label>
                            <span class="red">*</span><br />
                            <textarea style="width:100%" rows="10" class="form-control" name="data[mo_ta]" id="mo_ta" value="{$smarty.session.data.mo_ta|default:''}"></textarea></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td><label>Hình đại diện</label>
                            <input class="form-control" name="image" type="file" id="hinh_dai_dien" /></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                        </tr>
                      </table>
                    </fieldset>
                    <div class="cloneSet">
                      <fieldset class="sectionwrap">
                        <legend>Chọn màu sắc</legend>
                        <iframe name="select_frame" id="demo-color" src="/home/demo.html" style="width:100%; height:700px;"></iframe>
                        <input type="hidden" name="data[css]" id="css" value="color-1">
                        <script>
						function get_css()
						{
							var name = $('iframe[name=select_frame]').contents().find('#tam').val();
		
							$('input[name="data[css]"]').val(name);
							return true;
						}
					</script>
                        <div style="clear:both"></div>
                      </fieldset>
                    </div>
                    <div style="width: 800px; float: left;">
                      <div id="cloneRet"></div>
                      <button class="submit" type="submit" name="RMASubmit" id="submitMe" onclick="return get_css(); document.getElementById('RMAForm').submit()">Hoàn tất</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.col (MAIN) --> 
    </div>
    <!-- MAILBOX END --> 
    
  </section>
  <!-- /.content --> 
</aside>
<script src="/home/templates/js/steps.js"></script> 
{literal}
<style>


#RMAMain { width: 100%; overflow: hidden; }
#RMAContainer { background: #FFFFFF; max-width: 90%; margin: 0 auto; }
#RMAForm { width: 100%; overflow: hidden; padding: 5px 15px 10px 15px; border-radius: 8px; -webkit-border-radius: 8px; -moz-border-radius: 8px; -ms-border-radius: 8px; -o-border-radius: 8px; border: 1px solid #CCC; box-shadow: 10px 10px 10px #f1f1f1}
#RMAForm2 { max-width: 800px; margin: 0 auto; overflow: hidden; padding: 10px 0; border-radius: 8px; -webkit-border-radius: 8px; -moz-border-radius: 8px; -ms-border-radius: 8px; -o-border-radius: 8px; border: 2px solid #CCC; margin-top: 25px;background: url(logo.jpg) 95% 50% no-repeat;}
#RMAForm ul { list-style: none; float: left; }
#RMAForm select { width: 185px; padding: 2px 0; margin-top: 2px;}
#RMAForm li { padding: 8px; position:relative; }
#RMAForm label {display: inline-block; margin-top: 8px; font-weight: normal; text-transform: uppercase; text-align: right;  padding: 0 5px 0 0; }
#RMAForm label.error { width: auto; display: inline-block; margin-top: 8px; color: #F00; text-transform: none; font-weight: normal;}
#RMAForm textarea { padding: 5px; width: 173px; margin-top: 2px; font-size: 75%;}
#cloneRet .cloneSet { width: 400px; !important }

#RMAForm input[type=text], #RMAForm textarea{
	color: black !important;
}

#RMAForm input:focus, textarea:focus, select:focus {
    background: #fff; 
    border:1px solid #555; 
    box-shadow: 0 0 3px #aaa; 
    padding-right: 20px;
    -moz-transition: padding .25s; 
    -webkit-transition: padding .25s; 
    -o-transition: padding .25s;
    transition: padding .25s;
}
/* Button Style */
button.submit {
    background-color: #68b12f;
    background: -webkit-gradient(linear, left top, left bottom, from(#68b12f), to(#50911e));
    background: -webkit-linear-gradient(top, #68b12f, #50911e);
    background: -moz-linear-gradient(top, #68b12f, #50911e);
    background: -ms-linear-gradient(top, #68b12f, #50911e);
    background: -o-linear-gradient(top, #68b12f, #50911e);
    background: linear-gradient(top, #68b12f, #50911e);
    border: 1px solid #509111;
    border-bottom: 1px solid #5b992b;
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    -ms-border-radius: 3px;
    -o-border-radius: 3px;
    float: right;
    box-shadow: inset 0 1px 0 0 #9fd574;
    -webkit-box-shadow: 0 1px 0 0 #9fd574 inset ;
    -moz-box-shadow: 0 1px 0 0 #9fd574 inset;
    -ms-box-shadow: 0 1px 0 0 #9fd574 inset;
    -o-box-shadow: 0 1px 0 0 #9fd574 inset;
    color: white;
    font-weight: bold;
    padding: 6px 10px;
    font-size: 75%;
    text-align: center;
    text-shadow: 0 -1px 0 #396715;
	margin-top: 2px;
}
button.submit:hover {
    opacity:.85;
    cursor: pointer; 
}
#steps{
	margin: auto;
}
button.submit:active {
    border: 1px solid #20911e;
    box-shadow: 0 0 10px 5px #356b0b inset; 
    -webkit-box-shadow:0 0 10px 5px #356b0b inset ;
    -moz-box-shadow: 0 0 10px 5px #356b0b inset;
    -ms-box-shadow: 0 0 10px 5px #356b0b inset;
    -o-box-shadow: 0 0 10px 5px #356b0b inset;    
}
button.AddRem, .next, .prev {
	float:right;
    background-color: #2f9ab1;
    background: -webkit-gradient(linear, left top, left bottom, from(#2f9ab1), to(#1e8591));
    background: -webkit-linear-gradient(top, #2f9ab1, #1e8591);
    background: -moz-linear-gradient(top, #2f9ab1, #1e8591);
    background: -ms-linear-gradient(top, #2f9ab1, #1e8591);
    background: -o-linear-gradient(top, #2f9ab1, #1e8591);
    background: linear-gradient(top, #2f9ab1, #1e8591);
    border: 1px solid #118391;
    border-bottom: 1px solid #2b8d99;
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    -ms-border-radius: 3px;
    -o-border-radius: 3px;
    box-shadow: inset 0 1px 0 0 #74cbd5;
    -webkit-box-shadow: 0 1px 0 0 #74cbd5 inset ;
    -moz-box-shadow: 0 1px 0 0 #74cbd5 inset;
    -ms-box-shadow: 0 1px 0 0 #74cbd5 inset;
    -o-box-shadow: 0 1px 0 0 #74cbd5 inset;
    color: white;
    font-weight: bold;
    padding: 6px 10px;
    margin-top: 2px;
    font-size: 75%;
    text-align: center;
    text-shadow: 0 -1px 0 #155c67;
}
button.AddRem:hover, .next:hover, .prev:hover {
    opacity:.85;
    cursor: pointer; 
}
button.AddRem:active, .next:active, .prev:active {
    border: 1px solid #1e8291;
    box-shadow: 0 0 10px 5px #0b616b inset; 
    -webkit-box-shadow:0 0 10px 5px #0b616b inset ;
    -moz-box-shadow: 0 0 10px 5px #0b616b inset;
    -ms-box-shadow: 0 0 10px 5px #0b616b inset;
    -o-box-shadow: 0 0 10px 5px #0b616b inset; 
}
.iSep {
    width: 100%;
    border-bottom: 1px solid #CCC;
    margin-top: 20px;
    margin-bottom: 2px;
    text-align: left;
    padding-left: 5px;
    font-weight: bold;
}
.iSepT, .stepContainer {
    padding: 5px;
    overflow: hidden;
    border-bottom: 1px solid #CDCDCD;
    border-top: 1px solid #CDCDCD;
    border-left: 1px solid #CDCDCD;
	border-right: 1px solid #CDCDCD;
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    -ms-border-radius: 3px;
    -o-border-radius: 3px;
    margin-top: 25px;
    background-color: #FFF;
    background: -webkit-gradient(linear, left top, left bottom, from(#FFF), to(#DEDEDE));
    background: -webkit-linear-gradient(top, #FFF, #DEDEDE);
    background: -moz-linear-gradient(top, #FFF, #DEDEDE);
    background: -ms-linear-gradient(top, #FFF, #DEDEDE);
    background: -o-linear-gradient(top, #FFF, #DEDEDE);
    background: linear-gradient(top, #FFF, #DEDEDE);
}

/*#sideContent {
    float: right;
    width: 400px;
}

#mainContent {
    float: left;
}*/

button {
    margin: 0 3px;
}

#cloneRet {
    overflow: hidden;    
}

.cloneSet2 {
    float: left;    
}
.margin{
	margin-left: 10%;
}
/* Form Wizard Styles */
        p { margin: 0px 0px 2px 0px; }
        legend { font-size:18px; margin:0px; padding:0px 0px 5px 25px; color:#b0232a; font-weight:bold;}
        #steps { list-style:none; width:100%; overflow:hidden; margin:0px; padding:0px;}
        #steps li {font-size:24px; float:left; padding:10px; color:#b0b1b3;}
        #steps li span {font-size:11px; display:block;}
        #steps li.step-current { color:#000;}
        #makeWizard { background-color:#b0232a; color:#fff; padding:5px 10px; text-decoration:none; font-size:18px;}
        #makeWizard:hover { background-color:#000;}
/* ==|== media queries ======================================================
   EXAMPLE Media Query for Responsive Design.
   This example overrides the primary ('mobile first') styles
   Modify as content requires.
   ========================================================================== */

@media only screen and (min-width: 35em) {
  /* Style adjustments for viewports that meet the condition */
}

#steps li:nth-child(2), #steps li:last-child{
	margin-left: 20%;
}

/* ==|== non-semantic helper classes ========================================
   Please define your styles before this section.
   ========================================================================== */

/* For image replacement */
.ir { display: block; border: 0; text-indent: -999em; overflow: hidden; background-color: transparent; background-repeat: no-repeat; text-align: left; direction: ltr; *line-height: 0; }
.ir br { display: none; }

/* Hide from both screenreaders and browsers: h5bp.com/u */
.hidden { display: none !important; visibility: hidden; }

/* Hide only visually, but have it available for screenreaders: h5bp.com/v */
.visuallyhidden { border: 0; clip: rect(0 0 0 0); height: 1px; margin: -1px; overflow: hidden; padding: 0; position: absolute; width: 1px; }

/* Extends the .visuallyhidden class to allow the element to be focusable when navigated to via the keyboard: h5bp.com/p */
.visuallyhidden.focusable:active, .visuallyhidden.focusable:focus { clip: auto; height: auto; margin: 0; overflow: visible; position: static; width: auto; }

/* Hide visually and from screenreaders, but maintain layout */
.invisible { visibility: hidden; }

/* Contain floats: h5bp.com/q */
.clearfix:before, .clearfix:after { content: ""; display: table; }
.clearfix:after { clear: both; }
.clearfix { *zoom: 1; }



/* ==|== print styles =======================================================
   Print styles.
   Inlined to avoid required HTTP connection: h5bp.com/r
   ========================================================================== */

@media print {
  * { background: transparent !important; color: black !important; box-shadow:none !important; text-shadow: none !important; filter:none !important; -ms-filter: none !important; } /* Black prints faster: h5bp.com/s */
  a, a:visited { text-decoration: underline; }
  a[href]:after { content: " (" attr(href) ")"; }
  abbr[title]:after { content: " (" attr(title) ")"; }
  .ir a:after, a[href^="javascript:"]:after, a[href^="#"]:after { content: ""; }  /* Don't show links for images, or javascript/internal links */
  pre, blockquote { border: 1px solid #999; page-break-inside: avoid; }
  thead { display: table-header-group; } /* h5bp.com/t */
  tr, img { page-break-inside: avoid; }
  img { max-width: 100% !important; }
  @page { margin: 0.5cm; }
  p, h2, h3 { orphans: 3; widows: 3; }
  h2, h3 { page-break-after: avoid; }
}

</style>
{/literal}