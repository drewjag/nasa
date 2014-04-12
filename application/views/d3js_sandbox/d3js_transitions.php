<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>D3JS Transitions</title>

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

	var width,height = 500;

	var canvas = d3.select("#container")
					.append("svg")
					.attr("width",width)
					.attr("height",height);

	var circle = canvas.append("circle")
					.attr("cx",50)
					.attr("cy",50)
					.attr("r",25);

	circle.transition()
		.duration(1500)
		.delay(200)
		.attr("cx",150)
		.transition()
		.attr("cy",200)
		.each("end",function() {
			d3.select(this).attr("fill","red");
		});
});
</script>
</html>