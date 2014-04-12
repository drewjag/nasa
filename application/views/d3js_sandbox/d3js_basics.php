<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>D3JS Basics</title>

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

	var canvas = d3.select("#container")
					.append("svg")
					.attr("width",500)
					.attr("height",500);

	var circle = canvas.append("circle")
					.attr("cx",250)
					.attr("cy",250)
					.attr("r",50)
					.attr("fill","red");
	var rect = canvas.append("rect")
					.attr("width",100)
					.attr("height",50);
	var line = canvas.append("line")
					.attr("x1",0)
					.attr("y1",100)
					.attr("x2",400)
					.attr("y2",400)
					.attr("stroke","green")
					.attr("stroke-width",10);
});
</script>
</html>