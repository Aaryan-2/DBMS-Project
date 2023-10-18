<?php 
session_start();
include('includes/config.php');
error_reporting(0);

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>ResQRoutes</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<link href="assets/css/slick.css" rel="stylesheet">
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
		<!--<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />-->
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon1.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_qe9d47vwdCHSxPWUw64WaQQXayvkY9M&callback=initMap"></script>
<style type="text/css">
      /* Set the size of the div element that contains the map */
      
      #map {
        
        height: 500px;
        /* The height is 400 pixels */
        width: 100%;
        /* The width is the width of the web page */
      }


    </style>
<!-- Start Switcher -->
<?php include('includes/colorswitcher.php');?>
<!-- /Switcher -->  
        
<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header --> 

<!-- Banners -->
<section id="banner" class="banner-section">
  <div class="container">
    <div class="div_zindex">
      <div class="row">
        <div class="col-md-5 col-md-push-7">
          <div class="banner_content">
            
        <h1 class="display-1 mb-4 animated slideInDown">Bringing care, hope, and excellence.</h1>
           <a href="car-listing.php" class="btn">BOOK AMBULANCE<span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a> </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /Banners --> 


<!-- Resent Cat-->
<section class="section-padding gray-bg">
  <div class="container">
    <div class="section-header text-center">
      <h2>Ambulance Services For Our Coustmers</span></h2>
      <h5>Choose the below Ambulances according to your preferences</h5>
    </div>
    <div class="row"> 
      
      <!-- Nav tabs -->
      <div class="recent-tab">
        <ul class="nav nav-tabs" role="tablist">
         <!-- <li role="presentation" class="active"><a href="#resentnewcar" role="tab" data-toggle="tab">New Car</a></li>-->
        </ul>
      </div>
      <!-- Recently Listed Cars -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="resentnewcar">

<?php $sql = "SELECT tblvehicles.VehiclesTitle,tblbrands.BrandName,tblvehicles.PricePerDay,tblvehicles.FuelType,tblvehicles.ModelYear,tblvehicles.id,tblvehicles.SeatingCapacity,tblvehicles.VehiclesOverview,tblvehicles.Vimage1 from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
?>  

<div class="col-list-3">
<div class="recent-car-list">
<div class="car-info-box"> <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="image"></a>
<ul>
<li><i class="fa fa-car" aria-hidden="true"></i><?php echo htmlentities($result->FuelType);?></li>
<!-- <li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo htmlentities($result->ModelYear);?> Model</li> -->
<li><i class="fa fa-user" aria-hidden="true"></i><?php echo htmlentities($result->SeatingCapacity);?> seats</li>
</ul>
</div>
<div class="car-title-m">
<h6><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->BrandName);?> , <?php echo htmlentities($result->VehiclesTitle);?></a></h6>
<!-- <span class="price">$<?php echo htmlentities($result->PricePerDay);?> /Day</span>  -->
</div>
<div class="inventory_info_m">
<p><?php echo substr($result->VehiclesOverview,0,70);?></p>
</div>
</div>
</div>
<?php }}?>
       
      </div>
    </div>
  </div>
</section>
<!-- /Resent Cat --> 
<p style="margin: 1em 0 0.5em 0;
	color: #343434;
	font-weight: normal;
	font-family: 'Ultra', sans-serif;   
	font-size: 36px;
	line-height: 42px;
  text-align: center;
	text-transform: uppercase;
	text-shadow: 0 2px white, 0 3px #777;">Check Our Drivers Location</p>
<div id="map"></div>
    <div id="detaildiv">
      <br><br>
       
     <p style="margin-left: 100px; text-align:center">Data gets updated for every 5 seconds</p>
      <br><br><br>
   </div>
<!-- Fun Facts-->
<section class="section-padding fun-facts-section parallex-bg">

  <div class="container div_zindex">
    <div class="row">
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-calendar" aria-hidden="true"></i>24 x 7</h2>
            <p>Service</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-car" aria-hidden="true"></i>We are</h2>
            <p>Hiring Drivers</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-car" aria-hidden="true"></i>Leave </h2>
            <p>Feedbacks</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>100+</h2>
            <p>Satisfied Customers</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Fun Facts--> 



<!--Testimonial -->
<section class="section-padding testimonial-section parallex-bg">
  <div class="container div_zindex">
    <div class="section-header white-text text-center">
      <h2>What Our Clients Say!!</h2>
    </div>
    <div class="row">
      <div id="testimonial-slider">
<?php 
$tid=1;
$sql = "SELECT tbltestimonial.Testimonial,tblusers.FullName from tbltestimonial join tblusers on tbltestimonial.UserEmail=tblusers.EmailId where tbltestimonial.status=:tid";
$query = $dbh -> prepare($sql);
$query->bindParam(':tid',$tid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>


        <div class="testimonial-m">
 
          <div class="testimonial-content">
            <div class="testimonial-heading">
              <h5><?php echo htmlentities($result->FullName);?></h5>
            <p><?php echo htmlentities($result->Testimonial);?></p>
          </div>
        </div>
        </div>
        <?php }} ?>
        
       
  
      </div>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Testimonial--> 


<!--Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer--> 

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top--> 

<!--Login-Form -->
<?php include('includes/login.php');?>
<!--/Login-Form --> 

<!--Register-Form -->
<?php include('includes/registration.php');?>

<!--/Register-Form --> 

<!--Forgot-password-Form -->
<?php include('includes/forgotpassword.php');?>
<!--/Forgot-password-Form --> 

<!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

</body>
<script>
      var lati="";
      var long="";
    //  var newLocation = [
    //   ['Coimbatore',11.025157278173614, 76.96447409478081, 4],
    //   ['Erode', 11.34257852203067, 77.71367677417517, 5],
    //   ['Tiruppur', 11.12070195966657, 77.35625623525983, 3],
    //   ['Tiruppur', 11.12070195966657, 77.35625623525983, 3],
    //   ['Tiruppur', 11.12070195966657, 77.35625623525983, 3],

     
    // ];
       
    //newLocation.splice(0, newLocation.length);
   

if (navigator.geolocation) {
  // Request the user's location
  navigator.geolocation.getCurrentPosition(function(position) {
    // Get the latitude and longitude
    lati = position.coords.latitude;
    long = position.coords.longitude;
    
    // Do something with the coordinates
    console.log(`Latitude: ${lati}, Longitude: ${long}`);
  }, function(error) {
    // Handle errors
    switch(error.code) {
      case error.PERMISSION_DENIED:
        console.log("User denied the request for geolocation.");
        break;
      case error.POSITION_UNAVAILABLE:
        console.log("Location information is unavailable.");
        break;
      case error.TIMEOUT:
        console.log("The request to get user location timed out.");
        break;
      case error.UNKNOWN_ERROR:
        console.log("An unknown error occurred.");
        break;
    }
  });
} else {
  console.log("Geolocation is not supported by this browser.");
}
    
 


var newLocation = [];
var map;
var infowindow;



function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    zoom: 10,
    center: new google.maps.LatLng(lati, long),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });

  infowindow = new google.maps.InfoWindow();

  startUpdatingMarkers();
}

function createMarkers() {
  for (var i = 0; i < newLocation.length; i++) {
    var marker = new google.maps.Marker({
      position: new google.maps.LatLng(newLocation[i][1], newLocation[i][2]),
      map: map
    });

    console.log(marker);

    newLocation[i][3] = marker;

    google.maps.event.addListener(marker, 'click', (function(marker, i) {
      return function() {
        infowindow.setContent(newLocation[i][0]);
        infowindow.open(map, marker);
      }
    })(marker, i));
  }
}

function updateMarkerPositions() {
  for (var i = 0; i < newLocation.length; i++) {
    var position = new google.maps.LatLng(newLocation[i][1], newLocation[i][2]);
    if (newLocation[i][3]) {
      newLocation[i][3].setPosition(position);
    }
  }
}

function updateMarkers() {
  $.ajax({
    url: "https://srijyothiroadways.in/api/rqr/pullcord.php",
    type: 'GET',
    datatype: "text",
    success: function(data) {
      var arr = JSON.parse(data);
      newLocation.length = 0;
 clearMarkers();
      for (var i = 0; i < arr.length; i++) {
        var locationData = [arr[i].vehicle_id, arr[i].latitude, arr[i].longitude];
        newLocation.push(locationData);
      }

      var locationData = ["YOUR LOCATION", lati, long];
        newLocation.push(locationData);

      createMarkers();
      updateMarkerPositions();
    }
  });
}

function startUpdatingMarkers() {
  updateMarkers();
  setInterval(updateMarkers, 5000);
}

function clearMarkers() {
  for (var i = 0; i < newLocation.length; i++) {
    if (newLocation[i][3]) {
      newLocation[i][3].setMap(null); // Remove the marker from the map
      newLocation[i][3] = null; // Clear the reference to the marker
    }
  }
}

$(document).ready(function() {
  initMap();
});
  </script>

</html>