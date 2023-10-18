<!-- <?php
$db_name="u214862894_rqr";
$mysql_username="u214862894_rqr"; //Username- u214862894_rqr
$mysql_password="Rqr@1234";  // password- Rqr@1234
$server_name="217.21.80.7";   // server name- 217.21.80.7
$connect=mysqli_connect($server_name,$mysql_username,$mysql_password,$db_name);
$out[]="";

  $sql1="select * from tbllocation";
$res1=mysqli_query($connect,$sql1);
while ($row1 = $res1->fetch_assoc()) {
	$out[] = $row1;
}


  echo json_encode($out);


?> -->