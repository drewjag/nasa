<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Asteroid Results</title>

    <link rel="stylesheet" href="/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bootstrap/3.1.1/css/bootstrap-theme.min.css">
    <script src="/bootstrap/3.1.1/js/bootstrap.min.js"></script>

</head>
<body>

<div id="container">
	<h1>Asteroid Results</h1>

	<div id="body">

        <table class="table">
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

            <tr>
                <td><?= $asteroid[0]['full_name'] ?></td>
                <td><?= $asteroid[0]['near_earth_object'] ?></td>
                <td><?= $asteroid[0]['diameter'] ?></td>
                <td><?= $asteroid[0]['spec_type'] ?></td>
                <td><?= $asteroid[0]['potentially_hazardous'] ?></td>
                <td><?= $asteroid[0]['magnitude'] ?></td>
                <td><?= $asteroid[0]['spk_id'] ?></td>
            </tr>
        </table>

        <? foreach($comparison_output as $compare_value) : ?>

            <table class="table">
                <thead>
                <tr>
                    <td>Object Name</td>
                    <td>Number of objects</td>
                    <td>Object Larger than Asteroid</td>
                    <td>Compare Type</td>
                    <td>Object Image</td>
                </tr>
                </thead>

                <tr>
                    <td><?= $compare_value['object_name'] ?></td>
                    <td><?= round($compare_value['num_objects']) ?></td>
                    <td><?= ($compare_value['object_larger'] === true) ? 'Y' : 'N' ?></td>
                    <td><?= $compare_value['name'] ?></td>
                    <td><img src="<?= $compare_value['image_url'] ?>" width="250" height="200" /><td>
                </tr>
                <tr>
                    <td>You would need <?= round($compare_value['num_objects']) ?> of this <?= $compare_value['object_name'] ?> to circle the asteroid!</td>
                </tr>
            </table>

        <? endforeach ?>

	</div>


</div>

</body>
</html>