<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>D3JS Bar Chart and Scales</title>

	<style type="text/css">
	</style>

	<?=$this->load->view('snippets/header_essentials',TRUE);?>
</head>
<body>

<div>
	<a href="/welcome/d3js_test"><<< Menu</a>
</div>

<div id="container">
</div>

</body>
<script type="text/javascript">
$(document).ready(function() {

	var dataArray = [340,120,150,500,230];
	var width = 500;
	var height = 500;

	//set up the scale
	var widthScale = d3.scale.linear()
						.domain([0,500])
						.range([0,500]);

	//can even set colors by range
	var colorScale = d3.scale.linear()
					.domain([0,500])
					.range(["red","blue"]);

	var canvas = d3.select("#container")
					.append("svg")
					.attr("width",width)
					.attr("height",height);

	var bars = canvas.selectAll("rect")
					.data(dataArray)
					.enter()
						.append("rect")
						.attr("width",function(eachDataElement) {
							return widthScale(eachDataElement);
						})
						.attr("height",50) //height of the bars
						.attr("fill",function(eachDataElement) {
							return colorScale(eachDataElement);
						})
						.attr("y", function(eachDataElement,index) {
							return index * 100; //adding some space between the bars
						});

});
</script>
</html>