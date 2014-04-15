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

        <form action="/index.php/search/search_asteroid" method="post">

            <table class="table">
                <tr><td>
                        <label for="text_search">Search Name:</label>
                        <input type="text" name="text_search" id="text_search" />
                    </td></tr>
                <tr><td>
                        <label for="magnitude_min">Minimum Magnitude:</label>
                        <input type="text" name="magnitude_min" id="magnitude_min" />
                    </td></tr>
                <tr><td>
                        <label for="magnitude_max">Maximum Magnitude:</label>
                        <input type="text" name="magnitude_max" id="magnitude_max" />
                    </td></tr>
                <tr><td>
                        <label for="diameter_max">Maximum Diameter:</label>
                        <input type="text" name="diameter_max" id="diameter_max" />
                    </td></tr>
                <tr><td>
                        <label for="diameter_min">Minimum Diameter:</label>
                        <input type="text" name="diameter_min" id="diameter_min" />
                    </td></tr>
                <tr><td>
                        <label for="spk_id">SPK ID:</label>
                        <input type="text" name="spk_id" id="spk_id" />
                    </td></tr>
                <tr><td>
                        <label for="spec_type">Asteroid Type:</label>
                        <select id="spec_type" name="spec_type">
                            <option value="">Select a type of Asteroid</option>
                            <? foreach($spec_types as $key => $row) : ?>
                                <option value="<?= $row; ?>"><?= $row; ?></option>
                            <? endforeach ?>
                        </select>
                    </td></tr>
                <tr><td>
                        <label for="near_earth_object">Near Earth Object:</label>
                        <select id="near_earth_object" name="near_earth_object">
                            <option value="">Select</option>
                            <option value ="Y">Y</option>
                            <option value ="N">N</option>
                        </select>
                    </td></tr>
                <tr><td>
                        <input type="submit" value="Submit">
                    </td></tr>
            </table>
        </form>
        <? if (isset($num_rows)) : ?>
            <p>We found <?= $num_rows; ?> Asteroids that meet your criteria </p>
        <? endif ?>
        <table class="table table-striped">
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
            <? foreach($asteroid as $asteroid_data) : ?>
                <tr>
                    <td><a href="/index.php/compare/view_asteroid/<?= $asteroid_data['asteroid_pk'] ?>"><?= $asteroid_data['full_name'] ?></a></td>
                    <td><?= $asteroid_data['near_earth_object'] ?></td>
                    <td><?= $asteroid_data['diameter'] ?></td>
                    <td><?= (isset($asteroid_data['spec_type_smassi'])) ? $asteroid_data['spec_type_smassi'] : '' ?></td>
                    <td><?= (isset($asteroid_data['spec_type_tholen'])) ? $asteroid_data['spec_type_tholen'] : '' ?></td>
                    <td><?= $asteroid_data['potentially_hazardous'] ?></td>
                    <td><?= $asteroid_data['magnitude'] ?></td>
                    <td><?= $asteroid_data['spk_id'] ?></td>
                </tr>
            <? endforeach ?>
        </table>

    </div>
    <h2>Other Fun stuff to do:</h2>
    <p>
        <a href="/index.php/compare">Add Object to list of Comparison's</a><br/>
    </p>
    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>