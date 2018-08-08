<?php
include('dbconnection.php');
$latitude1=$_GET["lat"];//value from bus module
$longitude1=$_GET["lon"];//value from bus module
$speed=$_GET["speed"];
$result=mysqli_query($DB,"SELECT * FROM busstop_details WHERE sid=1");
while($num=mysqli_fetch_array($result)){
$latitude2=$num['latitude'];//value from busstop table database //fixed value
$longitude2=$num['longitude'];//value from busstop table database //fixed value
}
//processing arrival time
$earth_radius = 6371;
$dLat = deg2rad($latitude2 - $latitude1);
$dLon = deg2rad($longitude2 - $longitude1);
$a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * sin($dLon/2) * sin($dLon/2);
$c = 2 * asin(sqrt($a));
$distance = $earth_radius * $c;//distance
$atime = $distance/$speed;
//insert into bus details
$sql = "INSERT INTO `bus_details`(`arv_time`,`distance`)values('$atime','$distance')";
try {
    $stmt = $DB->prepare($sql);
    $stmt->execute();
	echo "success";
  } catch (Exception $ex) {
    echo $ex->getMessage();
  }
?>