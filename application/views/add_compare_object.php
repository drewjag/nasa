<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Add Compare Object</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Add Compare Object</h1>

	<div id="body">

        <form action="/index.php/compare/add_compare_object" method="post">

            <table>
                <label for="compare_type">Comparison Type:</label>
                <select id="compare_type" name="compare_type">
                    <? foreach($compare_types as $pk => $compare_type) : ?>
                        <option value ="<?= $pk ?>"><?= $compare_type ?></option>
                    <? endforeach ?>
                </select><br/>

                <label for="measurement_type">Unit of Measurement:</label>
                <select id="measurement_type" name="measurement_type">
                    <? foreach($measurement_types as $pk => $measurement_type) : ?>
                        <option value ="<?= $pk ?>"><?= $measurement_type ?></option>
                    <? endforeach ?>
                </select><br/>

                <label for="name">Name:</label>
                <input type="text" name="name" id="name" /><br/>

                <label for="object_value">Value:</label>
                <input type="text" name="object_value" id="object_value" /><br/>

                <label for="image_url">Image URL:</label>
                <input type="text" name="image_url" id="image_url" /><br/>

                <input type="submit" value="Submit">
            </table>
        </form>

	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>