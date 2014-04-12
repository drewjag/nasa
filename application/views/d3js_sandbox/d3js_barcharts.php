<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>D3JS Bar Charts</title>

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

	var dataArray = [120,340,150,500,230];

	var canvas = d3.select("#container")
					.append("svg")
					.attr("width",500)
					.attr("height",500);

	var bars = canvas.selectAll("rect")
					.data(dataArray)
					.enter()
						.append("rect")
						.attr("width",function(eachDataElement) {
							return eachDataElement;
						})
						.attr("height",50) //height of the bars
						.attr("y", function(eachDataElement,index) {
							return index * 100; //adding some space between the bars
						});

});
</script>
</html>