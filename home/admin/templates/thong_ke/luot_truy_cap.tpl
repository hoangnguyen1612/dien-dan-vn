<div class="content-box-header">

	<h3>Thống kê [Lượt truy cập 7 ngày gần nhất]</h3>
	<ul class="content-box-tabs">
		<li><a href="#" class="default-tab">Lượt truy cập 7 ngày gần nhất</a></li>
        <li><a href="luot_truy_cap_nhieu_nhat.php">Lượt truy cập nhiều nhất</a></li>
        <li><a href="luot_truy_cap_chi_tiet.php">Lượt truy cập chi tiết</a></li>
	</ul>
	<div class="clear"></div>
	
</div> <!-- End .content-box-header -->

<div class="content-box-content">

	<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
{showMessage()}
<script src="/forum/admin/templates/scripts/highcharts/js/highcharts.js"></script>
<script src="/forum/admin/templates/scripts/highcharts/js/modules/exporting.js"></script>
	
{literal}
<script type="text/javascript">
$(function () {
            $('#container').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Biểu đồ thống kê tình hình truy cập trên toàn hệ thống trong 7 ngày gần nhất'
                },
                subtitle: {
                    text: '({/literal}{$ngay}{literal})'
                },
                xAxis: {
                    categories: [{/literal}{$title}{literal}]
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Lượt truy cập'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} lượt</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                    name: 'Lượt truy cập',
                    data: [{/literal}{$so_luong_truy_cap}{literal}]

                }]
            });
        });

</script>
	{/literal}    

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
		
								
	</div> <!-- End #tab1 -->
						
</div> <!-- End .content-box-content -->