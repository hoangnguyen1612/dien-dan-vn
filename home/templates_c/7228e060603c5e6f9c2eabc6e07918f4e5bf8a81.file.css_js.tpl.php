<?php /* Smarty version Smarty-3.1.14, created on 2014-07-24 14:04:53
         compiled from "D:\wamp\www\dien-dan-vn\home\templates\elements\css_js.tpl" */ ?>
<?php /*%%SmartyHeaderCode:990453d0b015965975-20004598%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7228e060603c5e6f9c2eabc6e07918f4e5bf8a81' => 
    array (
      0 => 'D:\\wamp\\www\\dien-dan-vn\\home\\templates\\elements\\css_js.tpl',
      1 => 1405661390,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '990453d0b015965975-20004598',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53d0b0159e0516_77261837',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d0b0159e0516_77261837')) {function content_53d0b0159e0516_77261837($_smarty_tpl) {?><!-- bootstrap 3.0.2 -->
<link href="/home/templates/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- font Awesome -->
<link href="/home/templates/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- Ionicons -->
<link href="/home/templates/css/ionicons.min.css" rel="stylesheet" type="text/css" />
<!-- Morris chart -->
<link href="/home/templates/css/morris/morris.css" rel="stylesheet" type="text/css" />
<!-- jvectormap -->
<link href="/home/templates/css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
<!-- fullCalendar -->
<link href="/home/templates/css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
<!-- Daterange picker -->
<link href="/home/templates/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
<!-- bootstrap wysihtml5 - text editor -->
<link href="/home/templates/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
<!-- Theme style -->
<link href="/home/templates/css/AdminLTE.css" rel="stylesheet" type="text/css" />
<link href="/home/templates/css/general.css" rel="stylesheet" type="text/css" />


<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

<!-- jQuery 2.0.2 -->
<script type="text/javascript" src="/home/templates/js/jquery-1.10.2.min.js"></script> 
<script type="text/javascript" src="/home/templates/js/jquery.min.js"></script> 
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- jQuery UI 1.10.3 -->
<script src="/home/templates/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="/home/templates/js/bootstrap.min.js" type="text/javascript"></script>
<!-- Morris.js charts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="/home/templates/js/plugins/morris/morris.min.js" type="text/javascript"></script>
<!-- Sparkline -->
<script src="/home/templates/js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- jvectormap -->
<script src="/home/templates/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
<script src="/home/templates/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
<!-- fullCalendar -->
<script src="/home/templates/js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<!-- jQuery Knob Chart -->
<script src="/home/templates/js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="/home/templates/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="/home/templates/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="/home/templates/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

<!-- AdminLTE App -->
<script src="/home/templates/js/AdminLTE/app.js" type="text/javascript"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) 
<script src="/home/templates/js/AdminLTE/dashboard.js" type="text/javascript"></script>-->

<!-- AdminLTE for demo purposes -->
<script src="/home/templates/js/AdminLTE/demo.js" type="text/javascript"></script>

<link rel="stylesheet" type="text/css" href="/home/templates/js/ui-lightness/jquery-ui.css" />
<script type="text/javascript" src="/home/templates/js/ui/jquery-ui.custom.js"></script> 
<script src="/home/templates/js/jquery.validate.min.js"></script>
<?php if (isset($_SESSION['message'])&&!empty($_SESSION['message']['content'])){?>
		<script>
		window.onload = function(){
        	alert('<?php echo $_SESSION['message']['content'];?>
');
		}
        </script>												
<?php }?>   <?php }} ?>