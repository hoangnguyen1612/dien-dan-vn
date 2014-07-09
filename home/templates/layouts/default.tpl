<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Diễn Đàn Việt Nam</title>
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
{include '../elements/css_js.tpl'}
</head>
<body class="skin-blue">
<!-- header logo: style can be found in header.less --> 
{include '../elements/header.tpl'}
<div class="wrapper row-offcanvas row-offcanvas-left"> 
  <!-- Left side column. contains the logo and sidebar --> 
  {include '../elements/left.tpl'}
  {$contentForLayout}
  <div class="clear"></div>
  <aside class="right-side">
      <div id="footer">
      	<div id="header">
        	<div id="logo">Diendan.vn</div>
        </div>
      </div>
  </aside>
</div>
</body>
</html>
<style>
#footer {
	width: 100%;
	height: 100px;
	margin-bottom: 10px;
	box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
	background: #ffffff;
}
#footer #header {
	border-bottom: 1px solid #f1f1f1;
	padding: 10px;
}
#footer #logo {
	font-family: 'Kaushan Script', cursive;
	font-size: 20px;
	color: #357ca5;
}
</style>
