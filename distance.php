<?php


	function distance($lat1, $lon1, $lat2, $lon2) {
		$iRadiusEarth = 6371; // kms
		$lat1 /= 57.29578;
		$lat2 /= 57.29578;
		$lon1 /= 57.29578;
		$lon2 /= 57.29578;

		$dlat=$lat2-$lat1;
		$dlon=$lon2-$lon1;

		$a = ( sin($dlat/2) * sin($dlat/2) ) + ( cos($lat1) * cos($lat2) ) * ( sin($dlon/2) * sin($dlon/2) );
		$c = 2 * atan2(sqrt($a), sqrt(1-$a));
		$d = $iRadiusEarth * $c;

		// Distance is returned in Kms
		return $d;
	}
	
	if(isset($_REQUEST['latlong1']) && $_REQUEST['latlong1'] != '' && isset($_REQUEST['latlong2']) && $_REQUEST['latlong1'] != ''){
		
		$latlong1 = explode(",", $_REQUEST['latlong1']);
		$latlong2 = explode(",", $_REQUEST['latlong2']);
		$lat1 = $latlong1[0];
		$lon1 = $latlong1[1];
		$lat2 = $latlong2[0];
		$lon2 = $latlong2[1];
		$Distance = distance($lat1, $lon1, $lat2, $lon2);
		echo "Distance between ". $lat1.", ".$lon1. " | " .$lat2.", ".$lon2." | <b>". number_format($Distance,2)."</b>";
	}
	else{
		echo "No Input was specified";
	}
	
	

?>