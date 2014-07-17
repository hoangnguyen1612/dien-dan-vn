<div class="content-box-header">
					
	<h3>Thống kê [Phản hồi cao nhất]</h3>
	<ul class="content-box-tabs">
		<li><a href="#" class="default-tab">Phản hồi cao nhất</a></li>
        <li><a href="phan_hoi_chi_tiet.php">Phản hồi chi tiết</a></li>
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
    
        var colors = Highcharts.getOptions().colors,
            categories = [{/literal}{$name}{literal}],
            name = 'Browser',
            data = [{/literal}{$result}{literal}];
    
        function setChart(name, categories, data, color) {
			chart.xAxis[0].setCategories(categories, false);
			chart.series[0].remove(false);
			chart.addSeries({
				name: name,
				data: data,
				color: color || 'white'
			}, false);
			chart.redraw();
        }
    
        var chart = $('#container').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Top 10 diễn đàn có điểm phản hồi cao nhất'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: categories
            },
            yAxis: {
                title: {
                    text: 'Phần trăm phản hồi cho diễn đàn'
                }
            },
            plotOptions: {
                column: {
                    dataLabels: {
                        enabled: true,
                        color: colors[0],
                        style: {
                            fontWeight: 'bold'
                        },
                        formatter: function() {
                            return this.y +'%';
                        }
                    }
                }
            },
            tooltip: {
                formatter: function() {
                    var point = this.point,
                        s = this.x +':<b>'+ this.y +'% market share</b><br/>';
                    if (point.drilldown) {
                        s += 'Click to view '+ point.category +' versions';
                    } else {
                        s += 'Click to return to browser brands';
                    }
                    return s;
                }
            },
            series: [{
                name: name,
                data: data,
                color: 'white'
            }],
            exporting: {
                enabled: false
            }
        })
        .highcharts(); // return chart
    });
    

		</script>
{/literal}    
<style>
.highcharts-legend{
	display:none
}
</style>
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
		
								
	</div> <!-- End #tab1 -->
						
</div> <!-- End .content-box-content -->