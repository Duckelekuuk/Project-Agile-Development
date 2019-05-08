<?php
	/**
 	*
 	* Get amount of availible parking spots with car charging pole.
 	* @author 		Kai Stroet
 	* @return      	count of availible charing ports
 	*
 	*/
	function GetParkingSpotsCount() {
		$availableSpots = 0;
		$api = "https://amsterdam-maps.bma-collective.com/embed/elektrisch/laden/chargingstations.bb.json.php";
		$parkingspots = array("EVB-P1629220","EVB-P1629218","EVB-P1811500","EVB-P1629219","EVB-P1811123");
    		$contents = file_get_contents($api);
    		$chargingPoints = json_decode($contents, true);
    		foreach($chargingPoints as $chargingPoint) {
 			if(in_array($chargingPoint['CSExternalID'], $parkingspots)){
 				$ports = $chargingPoint['ChargingPoints']['ChargingPoint'];
 				foreach ($ports as $port) {
 					if($port['Status'] == 0){
 						$availableSpots++;
 					}
 				}
 			}
		}
		return $availableSpots;
    }

    //echo GetParkingSpotsCount();

?>
