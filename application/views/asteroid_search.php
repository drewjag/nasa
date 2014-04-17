<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Search for Asteroids</title>
    <?$this->load->view('snippets/header_essentials');?>
    <style>
        .home-call-to-action-container {
            margin: 10px 0px;
        }
    </style>
</head>
<body>

<div class="header">
    <div class="container">THIS IS A HEADER</div>
</div>

<div class="container">

    <div class="home-call-to-action-container">
        <!-- <table class="table table-striped">
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
                    <td><a id="full_name" href="/index.php/compare/view_asteroid/<?= $asteroid_data['asteroid_pk'] ?>"><?= $asteroid_data['full_name'] ?></a></td>
                    <td id="neo"><?= $asteroid_data['near_earth_object'] ?></td>
                    <td id="diameter"><?= $asteroid_data['diameter'] ?></td>
                    <td id="spec_type_smassi"><?= (isset($asteroid_data['spec_type_smassi'])) ? $asteroid_data['spec_type_smassi'] : '' ?></td>
                    <td id="spec_type_tholen"><?= (isset($asteroid_data['spec_type_tholen'])) ? $asteroid_data['spec_type_tholen'] : '' ?></td>
                    <td id="potentially_hazardous"><?= $asteroid_data['potentially_hazardous'] ?></td>
                    <td id="magnitude"><?= $asteroid_data['magnitude'] ?></td>
                    <td id="spk_id"><?= $asteroid_data['spk_id'] ?></td>
                </tr>
            <? endforeach ?>
        </table> -->
        <div class="jumbotron center">
            <!-- <img src="http://www.achievers.com/sites/www3.achievers.com/themes/achievers_responsive/images/sitelogo.png" /> -->
            <h1><a id="full_name" href="/index.php/compare/view_asteroid/<?= $asteroid_data['asteroid_pk'] ?>"><h1><?= $asteroid_data['full_name'] ?></h1></a></h1>
        </div>

        <a id="random_asteroid_button" class="btn btn-primary btn-lg btn-block" role="button">Find me an Asteroid</a>
    </div>
    <div class="center"><h1>OR</h1></div>
    <a class="searchBtn btn btn-default btn-lg btn-block" href="#" >Search for an Asteroid!</a>  

    <div id="search-container" class="searchCriteriaContainer" style="display: none;">

        <form action="/index.php/search/search_asteroid" method="post">

            <div class="searchCriteria">
                
                <div class="form-group">
                    <label for="text_search">Search Name:</label>
                    <input class="form-control" type="text" name="text_search" id="text_search" />
                </div>
                <div class="form-group">
                    <label for="magnitude_min">Minimum Magnitude:</label>
                    <input class="form-control" type="text" name="magnitude_min" id="magnitude_min" />
                </div>
                <div class="form-group"></div>
                    <label for="magnitude_max">Maximum Magnitude:</label>
                    <input class="form-control" type="text" name="magnitude_max" id="magnitude_max" />
                <div class="form-group">
                    <label for="diameter_max">Maximum Diameter:</label>
                    <input class="form-control" type="text" name="diameter_max" id="diameter_max" />
                </div>
                <div class="form-group">
                    <label for="diameter_min">Minimum Diameter:</label>
                    <input class="form-control" type="text" name="diameter_min" id="diameter_min" />
                </div>
                <div class="form-group">
                    <label for="spk_id">SPK ID:</label>
                    <input class="form-control" type="text" name="spk_id_input" id="spk_id_input" />
                </div>
                <div class="form-group">
                    <label for="spec_type">Asteroid Type:</label>
                    <select class="form-control" id="spec_type" name="spec_type">
                        <option value="">Select a type of Asteroid</option>
                        <? foreach($spec_types as $key => $row) : ?>
                        <option value="<?= $row; ?>"><?= $row; ?></option>
                        <? endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="near_earth_object">Near Earth Object:</label>
                    <select class="form-control" id="near_earth_object" name="near_earth_object">
                        <option value="">Select</option>
                        <option value ="Y">Y</option>
                        <option value ="N">N</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="near_earth_object">Near Earth Object:</label>
                    <select class="form-control" id="near_earth_object" name="near_earth_object">
                        <option value="">Select</option>
                        <option value ="Y">Y</option>
                        <option value ="N">N</option>
                    </select>
                </div>
                <input class="btn btn-success btn-primary btn-lg" type="submit" value="Submit">


            </div>

        </form>
        <? if (isset($num_rows)) : ?>
            <p>We found <?= $num_rows; ?> Asteroids that meet your criteria </p>
        <? endif ?>
        <!-- <table class="table table-striped">
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
                    <td><a id="full_name" href="/index.php/compare/view_asteroid/<?= $asteroid_data['asteroid_pk'] ?>"><?= $asteroid_data['full_name'] ?></a></td>
                    <td id="neo"><?= $asteroid_data['near_earth_object'] ?></td>
                    <td id="diameter"><?= $asteroid_data['diameter'] ?></td>
                    <td id="spec_type_smassi"><?= (isset($asteroid_data['spec_type_smassi'])) ? $asteroid_data['spec_type_smassi'] : '' ?></td>
                    <td id="spec_type_tholen"><?= (isset($asteroid_data['spec_type_tholen'])) ? $asteroid_data['spec_type_tholen'] : '' ?></td>
                    <td id="potentially_hazardous"><?= $asteroid_data['potentially_hazardous'] ?></td>
                    <td id="magnitude"><?= $asteroid_data['magnitude'] ?></td>
                    <td id="spk_id"><?= $asteroid_data['spk_id'] ?></td>
                </tr>
            <? endforeach ?>
        </table> -->

    </div>
    <h2>Other Fun stuff to do:</h2>
    <p>
        <a href="/index.php/compare">Add Object to list of Comparison's</a><br/>
    </p>
    <!-- <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p> -->
</div>

</body>
</html>

<script src="/scripts/jquery-1.11.0.min.js"></script>
<script src="/bootstrap/3.1.1/js/bootstrap.min.js"></script>

<script>

    var $random_asteroid = $('#random_asteroid_button');

    $random_asteroid.click(function(){

        $.ajax({
            url: "index.php/search/get_random_asteroid",
            success: function(data){
                $('#full_name').attr('href', "index.php/compare/view_asteroid/" + data[0].asteroid_pk);
                $('#full_name').text(data[0].full_name);
                $('#neo').text(data[0].near_earth_object);
                $('#diameter').text(data[0].diameter);
                $('#spec_type_smassi').text(data[0].spec_type_smassi);
                $('#spec_type_tholen').text(data[0].spec_type_tholen);
                $('#potentially_hazardous').text(data[0].potentially_hazardous);
                $('#spk_id').text(data[0].spk_id);
                $('#magnitude').text(data[0].magnitude);
            },
            dataType: 'json'
        });

    });

    var criteriaVisible = false;
    $('.searchBtn').click(function(){
        if (!criteriaVisible) {
            $('.searchCriteriaContainer').slideDown('fast', function(){
                criteriaVisible = true;
            });
        }
    });

</script>
