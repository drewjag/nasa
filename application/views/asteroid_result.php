<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Asteroid Results</title>
	
	<?$this->load->view('snippets/header_essentials');?>


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

<div class="container">
	<h1>Asteroid Results</h1>

	<div id="body">

        <table>
            <thead>
            <tr>
                <td>Full Name</td>
                <td>Near Earth Object</td>
                <td>Diameter</td>
                <td>Spec Type</td>
                <td>Potentially Hazardous</td>
                <td>Magnitude</td>
                <td>spk_id</td>

            </tr>
            </thead>
            <? foreach($asteroid_result as $asteroid) :?>
                <tr>
                    <td><?= $asteroid['full_name'] ?></td>
                    <td><?= $asteroid['near_earth_object'] ?></td>
                    <td><?= $asteroid['diameter'] ?></td>
                    <td><?= (isset($asteroid['spec_type'])) ? $asteroid['spec_type'] : '' ?></td>
                    <td><?= $asteroid['potentially_hazardous'] ?></td>
                    <td><?= $asteroid['magnitude'] ?></td>
                    <td><?= $asteroid['spk_id'] ?></td>
                </tr>
            <? endforeach ?>
        </table>

	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>