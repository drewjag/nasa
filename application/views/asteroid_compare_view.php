<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Asteroid Results</title>

    <?$this->load->view('snippets/header_essentials');?>

</head>
<body>

<div class="container">
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
            </select><br/>

            <select id="compare_type_input" name="compare_type_input" style="display:none">
                <option value="">Random Comparison</option>
            </select>

            <p>
                <button id="compare_object_submit" class="btn btn-success btn-primary">Submit</button>
            </p>
        </table>
        <table>
            <a href="/index.php/compare">Add Object to list</a><br/>
        </table>

        <h3>Random Objects Compared to Asteroid</h3>

        <!-- <div id="owl-demo" class="owl-carousel"> -->
        <? foreach($comparison_output as $index => $compare_value) : ?>
            <!-- <div class="item"><img class="lazyOwl" data-src="<?= $compare_value['image_url'] ?>" alt="Lazy Owl Image"></div> -->

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
                    <td id="num_objects"><?= $compare_value['num_objects'] ?></td>
                    <td id="object_larger"><?= ($compare_value['object_larger'] === true) ? 'Y' : 'N' ?></td>
                    <td id="name"><?= $compare_value['name'] ?></td>
                    <td ><img id="image_url" src="<?= $compare_value['image_url'] ?>" width="250" height="200"/>
                    <td>
                </tr>
                <tr>
                    <? if ($compare_value['name'] == 'Circumference') : ?>
                        <td id="calculation_<?=$index?>">You would need <?= $compare_value['num_objects'] ?> of
                            this <?= $compare_value['object_name'] ?> to circle the asteroid!
                        </td>
                    <? elseif ($compare_value['name'] == 'Diameter') : ?>
                        <td id="calculation_<?=$index?>">You would need <?= $compare_value['num_objects'] ?> of
                            this <?= $compare_value['object_name'] ?> to go straight through the asteroid!
                        </td>
                    <? endif ?>
                </tr>
            </table>

        <? endforeach ?>
        <!-- </div> -->

    </div>


</div>

</body>
</html>

<script src="/scripts/jquery-1.11.0.min.js"></script>
<script src="/bootstrap/3.1.1/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
    


        // $("#owl-demo").owlCarousel({
        //     items : 4,
        //     lazyLoad : true
        // }); 

        var $submit = $('#compare_object_submit');

        $submit.click(function () {
            var object_value = $('#object_compare').find(":selected").val();
            $.ajax({
                url: "/index.php/compare/view_asteroid/<?= $asteroid[0]['asteroid_pk'] ?>/" + object_value + "/true",
                success: function (data) {
                    for(var i=0; i < data.length; i++ ){
                        var $row = $('#' + i);
                        $row.find('#object_name').text(data[i].object_name);
                        $row.find('#num_objects').text(data[i].num_objects);
                        if(data[i].object_larger){
                            $row.find('#object_larger').text('Y');
                        }else{
                            $row.find('#object_larger').text('N');
                        }
                        $row.find('#name').text(data[i].name);
                        $row.find('#image_url').attr('src', data[i].image_url);
                        var $text = 'You would need ' + data[i].num_objects + ' of this ' + data[i].object_name;
                        if(data[i].name == 'Diameter'){
                            $text += ' to go straight through the asteroid!';
                        }else if(data[i].name == 'Circumference'){
                            $text += ' to circle the asteroid!';
                        }
                        $('#calculation_' + i).text($text);
                    }
                },
                dataType: 'json'
            });

        });

        var $compare_object_dropdown = $('#object_compare');
        var $compare_type_dropdown = $('#compare_type_input');

        $compare_object_dropdown.change(function() {
            $compare_type_dropdown.show();
        });

    });

</script>
