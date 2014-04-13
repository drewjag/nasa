<?php

class Compute_masses {

	public function index()
	{
		$db['default']['hostname'] = 'vagrant-mysql01';
		$db['default']['username'] = "dev";
		$db['default']['password'] = "@ch13v3rs";

		$conn = mysql_connect("'vagrant-mysql01'", "dev", "@ch13v3rs");

		if (!$conn) {
			echo "Unable to connect to DB: " . mysql_error();
			exit;
		} else
		{
			echo "Connected to DB.";
			exit;
		}

		return 1;
	}


}
