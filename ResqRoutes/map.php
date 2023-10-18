<?php

// $db_name="u214862894_rqr";
// $mysql_username="u214862894_rqr";
// $mysql_password="Rqr@1234";
// $server_name="217.21.80.7";
// $connect=mysqli_connect($server_name,$mysql_username,$mysql_password,$db_name);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Vehicle Tracking</title>
   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body>
	

 
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
   
  </head>
  <body>
    
    <div id="map"></div>
    <div id="detaildiv">
      
     <p style="margin-left: 100px;">Data gets updated every 5 seconds</p>
      <br><br><br>
   

    </div>
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

    </script>
   
</body>
</html>
