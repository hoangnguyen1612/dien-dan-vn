<?php /* Smarty version Smarty-3.1.14, created on 2014-05-23 08:28:23
         compiled from "..\templates\thong_ke\tong_quat.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11504537eed7e655d32-77684629%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '18e7fcb9f32c2819aa2891e072758cbd4088873d' => 
    array (
      0 => '..\\templates\\thong_ke\\tong_quat.tpl',
      1 => 1400833695,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11504537eed7e655d32-77684629',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_537eed7e73c4e7_56524916',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_537eed7e73c4e7_56524916')) {function content_537eed7e73c4e7_56524916($_smarty_tpl) {?><div class="content-box-header">
					
	<h3>Thống kê [Tổng quát]</h3>
	
	<div class="clear"></div>
	
</div> <!-- End .content-box-header -->

<div class="content-box-content">

	<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->

<script src="/forum/admin/templates/scripts/highcharts/js/highcharts.js"></script>
<script src="/forum/admin/templates/scripts/highcharts/js/modules/exporting.js"></script>
	

<script type="text/javascript">
$(function () {
        $('#container').highcharts({
            chart: {
                zoomType: 'xy'
            },
            title: {
                text: 'Thống kê lượng người truy cập và bài viết trong 12 tháng'
            },
            subtitle: {
                text: '1/2014-12/2014'
            },
            xAxis: [{
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            }],
            yAxis: [{ // Primary yAxis
                labels: {
                    format: '{value}bài',
                    style: {
                        color: '#89A54E'
                    }
                },
                title: {
                    text: 'Bài viết',
                    style: {
                        color: '#89A54E'
                    }
                }
            }, { // Secondary yAxis
                title: {
                    text: 'Số lượng người',
                    style: {
                        color: '#4572A7'
                    }
                },
                labels: {
                    format: '{value} người',
                    style: {
                        color: '#4572A7'
                    }
                },
                opposite: true
            }],
            tooltip: {
                shared: true
            },
            legend: {
                layout: 'vertical',
                align: 'left',
                x: 120,
                verticalAlign: 'top',
                y: 100,
                floating: true,
                backgroundColor: '#FFFFFF'
            },
            series: [{
                name: 'Số lượng người',
                color: '#4572A7',
                type: 'column',
                yAxis: 1,
                data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
                tooltip: {
                    valueSuffix: ' mm'
                }
    
            }, {
                name: 'Bài viết',
                color: '#89A54E',
                type: 'spline',
                data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6],
                tooltip: {
                    valueSuffix: '°C'
                }
            }]
        });
    });

		</script>
	    

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
		
								
	</div> <!-- End #tab1 -->
						
</div> <!-- End .content-box-content --><?php }} ?>