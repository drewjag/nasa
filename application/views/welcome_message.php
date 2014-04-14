<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Search for Asteroids</title>

    <link rel="stylesheet" href="/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bootstrap/3.1.1/css/bootstrap-theme.min.css">
    <script src="/bootstrap/3.1.1/js/bootstrap.min.js"></script>

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