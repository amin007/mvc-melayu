<div class="span_11">
	<div class="col-md-6 col_4">
		<div class="map_container">
			<div id="vmap" style="width: 100%; height: 400px;"></div>
		</div>
	</div>
<!-- map -->
<link href="<?=$url?>css/jqvmap.css" rel="stylesheet" type="text/css" />
<script src="<?=$url?>js/jquery.vmap.js"></script>
<script src="<?=$url?>js/jquery.vmap.sampledata.js" type="text/javascript"></script>
<script src="<?=$url?>js/jquery.vmap.world.js" type="text/javascript"></script>
<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery('#vmap').vectorMap({
		    map: 'world_en',
		    backgroundColor: '#333333',
		    color: '#ffffff',
		    hoverOpacity: 0.7,
		    selectedColor: '#666666',
		    enableZoom: true,
		    showTooltip: true,
		    values: sample_data,
		    scaleColors: ['#C8EEFF', '#006491'],
		    normalizeFunction: 'polynomial'
		});
	});
</script>
<!-- //map -->
	

	<div class="col-md-6 col_5">
		<div id="chart_container">
			<div id="chart"></div>
			<div id="slider"></div>
		</div>
	</div>
<!-- Graph JavaScript -->
<script src="<?=$url?>js/d3.v3.js"></script>
<script src="<?=$url?>js/rickshaw.js"></script>	
<script>
var seriesData = [ [], [], [], [], [] ];
var random = new Rickshaw.Fixtures.RandomData(50);

for (var i = 0; i < 75; i++) {
	random.addData(seriesData);
}

var graph = new Rickshaw.Graph( {
	element: document.getElementById("chart"),
	renderer: 'multi',
	
	dotSize: 5,
	series: [
		{
			name: 'temperature',
			data: seriesData.shift(),
			color: '#AFE9FF',
			renderer: 'stack'
		}, {
			name: 'heat index',
			data: seriesData.shift(),
			color: '#FFCAC0',
			renderer: 'stack'
		}, {
			name: 'dewpoint',
			data: seriesData.shift(),
			color: '#555',
			renderer: 'scatterplot'
		}, {
			name: 'pop',
			data: seriesData.shift().map(function(d) { return { x: d.x, y: d.y / 4 } }),
			color: '#555',
			renderer: 'bar'
		}, {
			name: 'humidity',
			data: seriesData.shift().map(function(d) { return { x: d.x, y: d.y * 1.5 } }),
			renderer: 'line',
			color: '#ef553a'
		}
	]
} );


graph.render();

var detail = new Rickshaw.Graph.HoverDetail({
	graph: graph
});
</script>


	<div class="clearfix"> </div>
</div>
