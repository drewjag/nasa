<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>D3JS Bar Chart</title>

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

	var dataArray = [340,120,150,500];
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

	//lets add some axis
	var axis = d3.svg.axis()
					.ticks(5)
					.scale(widthScale);


	var canvas = d3.select("#container")
					.append("svg")
					.attr("width",width)
					.attr("height",height)

					.append("g")
					.attr("transform","translate(20,0)");


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

	canvas.append("g")
		.attr("transform","translate(0,400)")
		.call(axis);

});
</script>
</html>