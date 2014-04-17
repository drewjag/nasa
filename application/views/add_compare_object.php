<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Add Compare Object</title>

	<?$this->load->view('snippets/header_essentials');?>

</head>
<body>

<div class="container">
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

                <input type="submit" class='btn btn-med btn-success' value="Submit">
            </table>
        </form>

	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>