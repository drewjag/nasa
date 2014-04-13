<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Search for Asteroids</title>

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
	<h1>Search for Asteroids</h1>

	<div id="body">

        <form action="index.php/search/search_asteroid" method="post">

            <table>
                <input type="text" name="text_search" id="text_search" />
                <input type="text" name="magnitude_min" id="magnitude_min" />
                <input type="text" name="magnitude_max" id="magnitude_max" />
                <input type="text" name="diameter_max" id="diameter_max" />
                <input type="text" name="diameter_min" id="diameter_min" />
                <input type="text" name="spk_id" id="spk_id" />
                <select id="spec_type" name="spec_type">
                    <? foreach($spec_types as $type) : ?>
                        <option value ="<?= $type['spec_type_smassi'] ?>"><?= $type['spec_type_smassi'] ?></option>
                    <? endforeach; ?>
                </select>
                <select id="near_earth_object" name="near_earth_object">
                        <option value ="Y">Y</option>
                        <option value ="N">N</option>
                </select>

                <input type="submit" value="Submit">
            </table>
        </form>

        <table>
            <thead>
            <tr>
                <td>Full Name</td>
                <td>Near Earth Object</td>
                <td>Diameter</td>
                <td>Spec Type SMASSI</td>
                <td>Spec Type Tholen</td>
                <td>Potentially Hazardous</td>
                <td>Magnitude</td>
                <td>spk_id</td>

            </tr>
            </thead>
                <tr>
                    <td><?= $asteroid[0]['full_name'] ?></td>
                    <td><?= $asteroid[0]['near_earth_object'] ?></td>
                    <td><?= $asteroid[0]['diameter'] ?></td>
                    <td><?= $asteroid[0]['spec_type_smassi'] ?></td>
                    <td><?= $asteroid[0]['spec_type_tholen'] ?></td>
                    <td><?= $asteroid[0]['potentially_hazardous'] ?></td>
                    <td><?= $asteroid[0]['magnitude'] ?></td>
                    <td><?= $asteroid[0]['spk_id'] ?></td>
                </tr>
        </table>

	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>