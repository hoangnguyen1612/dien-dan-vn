<div class="content-box-header">
					
	<h3>Thống kê [Tổng quát]</h3>
	
	<div class="clear"></div>
	
</div> <!-- End .content-box-header -->

<div class="content-box-content">

	<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
{showMessage()}
<script src="/forum/admin/templates/scripts/highcharts/js/highcharts.js"></script>
<script src="/forum/admin/templates/scripts/highcharts/js/modules/exporting.js"></script>
<style>
Style Attribute{
	font-family: Arial, Helvetica, sans-serif !important;
}
</style>
{literal}
<script type="text/javascript">
$(function () {
        $('#container').highcharts({
            chart: {
                zoomType: 'xy'
            },
            title: {
                text: 'Thống kê lượng người truy cập và bài viết trong 7 ngày gần nhất'
            },
            subtitle: {
                text: '{/literal}{$ngay}{literal}'
            },
            xAxis: [{
                categories: [{/literal}{$title}{literal}]
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
                data: [{/literal}{$so_luong_truy_cap}{literal}],
                tooltip: {
                    valueSuffix: ''
                }
    
            }, {
                name: 'Bài viết',
                color: '#89A54E',
                type: 'spline',
                data: [{/literal}{$so_luong_bai_viet}{literal}],
                tooltip: {
                    valueSuffix: ''
                }
            }]
        });
    });

		</script>
	{/literal}    

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
		
								
	</div> <!-- End #tab1 -->
						
</div> <!-- End .content-box-content -->