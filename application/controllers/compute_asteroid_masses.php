<?php

/**
 * Class Compute_asteroid_masses
 * @property System_model $system_model
 */
class Compute_asteroid_masses extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
	}



	function index()
	{
		$density = "?";
		$asteroids = $this->db->query("SELECT * FROM nasa.asteroid")->result_array();
		foreach($asteroids as $a){
			echo $a['full_name'] . " " . $a['albedo'] . " " . $a['magnitude'] . $a['diameter'] . " ";

			$spec_type = substr($a['spec_type_tholen'], 0, 1);
			$tholen_c_array = array ('C', 'D', 'P', 'T', 'B', 'G');
			$tholen_s_array = array ('S', 'K', 'Q', 'V', 'R', 'A', 'E');
			if(in_array($spec_type, $tholen_c_array)){
				$spec_type = 'C';
			}
			if(in_array($spec_type, $tholen_s_array)){
				$spec_type = 'S';
			}

			if($spec_type!='C' && $spec_type!='S' && $spec_type!='M'){
				if(strpos($a['spec_type_tholen'], 'C')){
					$spec_type= 'C';
				}
				if(strpos($a['spec_type_tholen'], 'S')){
					$spec_type= 'S';
				}
				if(strpos($a['spec_type_tholen'], 'M')){
					$spec_type= 'M';
				}
			}

			switch ($spec_type) {
				case 'C':
					$density = 1.38;
					break;
				case 'S' :
					$density = 2.71;
					break;
				case 'M' :
					$density = 5.32;
					break;
				default:
					$density = "0";
			}

			echo $density;

			if(isset($a['diameter']) && $a['diameter'] > 0){
				$diameter = $a['diameter'];
			} else {
				$diameter = (1329 / sqrt($a['albedo'])) * pow(10, -0.2*$a['magnitude']);
			}

			$volume = round((4/3) * pi() * pow($diameter/2, 3), 2);

			echo " Volume:" . $volume;

			if($density > 0){
				$mass = $density * $volume;
			} else {
				$mass = 0;
			}

			echo " Mass:" . $mass;

			$success = $this->db->query("UPDATE nasa.asteroid SET volume=? , mass=? WHERE asteroid_pk=?", array($volume, $mass, $a['asteroid_pk']));
			if($success){
				echo " Success!";
			} else {
				echo " Facepalm :(";
			}

			echo "<br/>";
		}

	}


}
