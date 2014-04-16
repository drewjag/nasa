<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Asteroid Results</title>

    <link rel="stylesheet" href="/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bootstrap/3.1.1/css/bootstrap-theme.min.css">

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
                <td><?= (isset($asteroid[0]['spec_type'])) ? $asteroid[0]['spec_type'] : '' ?></td>
                <td><?= $asteroid[0]['potentially_hazardous'] ?></td>
                <td><?= $asteroid[0]['magnitude'] ?></td>
                <td><?= $asteroid[0]['spk_id'] ?></td>
            </tr>
        </table>

        <h3>Compare Object to Asteroid</h3>
        <table>
            <select id="object_compare" name="object_compare">
                <? foreach ($comparison_object_options as $key => $value) : ?>
                    <option value="<?= $key; ?>"><?= $value; ?></option>
                <? endforeach ?>
            </select>

            <p>
                <button id="compare_object_submit" class="btn btn-success btn-primary">Submit</button>
            </p>
        </table>
        <table>
            <a href="/index.php/compare">Add Object to list</a><br/>
        </table>

        <h3>Random Objects Compared to Asteroid</h3>

        <? foreach($comparison_output as $compare_value) : ?>

            <table id="comparison" class="table">
                <thead>
                <tr>
                    <td>Object Name</td>
                    <td>Number of objects</td>
                    <td>Object Larger than Asteroid</td>
                    <td>Compare Type</td>
                    <td>Object Image</td>
                </tr>
                </thead>

                <tr id="<?=$index ?>">
                    <td id="object_name"><?= $compare_value['object_name'] ?></td>
                    <td id="num_objects"><?= round($compare_value['num_objects']) ?></td>
                    <td id="object_larger"><?= ($compare_value['object_larger'] === true) ? 'Y' : 'N' ?></td>
                    <td id="name"><?= $compare_value['name'] ?></td>
                    <td ><img id="image_url" src="<?= $compare_value['image_url'] ?>" width="250" height="200"/>
                    <td>
                </tr>
                <tr>
                    <td id="calculation_<?=$index?>">You would need <?= round($compare_value['num_objects']) ?> of
                        this <?= $compare_value['object_name'] ?> to circle the asteroid!
                    </td>
                </tr>
            </table>

        <? endforeach ?>

	</div>


</div>

</body>
</html>

<script src="/scripts/jquery-1.11.0.min.js"></script>
<script src="/bootstrap/3.1.1/js/bootstrap.min.js"></script>

<script type="text/javascript">

    var $submit = $('#compare_object_submit');

    $submit.click(function () {
        var object_value = $('#object_compare').find(":selected").val();
        $.ajax({
            url: "/nasa/index.php/compare/view_asteroid/<?= $asteroid[0]['asteroid_pk'] ?>/" + object_value,
            success: function (data) {
                for(var i=0; i < data.length; i++ ){
                    var $row = $('#' + i);
                    $row.find('#object_name').text(data[i].object_name);
                    $row.find('#num_objects').text(Math.round(data[i].num_objects));
                    if(data[i].object_larger){
                        $row.find('#object_larger').text('Y');
                    }else{
                        $row.find('#object_larger').text('N');
                    }
                    $row.find('#name').text(data[i].name);
                    $row.find('#image_url').attr('src', data[i].image_url);
                    $('#calculation_' + i).text('You would need ' + Math.round(data[i].num_objects) + ' of this ' + data[i].object_name + ' to circle the asteroid!');
                }
            },
            dataType: 'json'
        });

    });

</script>