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
           
        </div><!-- ./wrapper -->
    </body>
</html>

