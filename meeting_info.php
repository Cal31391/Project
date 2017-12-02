<!--Caroline Lee
  - 10-2-2017
  - Project
  - Meeting Info
-->
<?php require 'header.php';

session_start();
if(session_id() == '' || !isset($_SESSION)) {
    header("location:index.php");
}
else {
    $user = $_SESSION['username'];
    $id = $_SESSION['id'];
    include("config/db_connect.php");


    $meeting_name = $_SESSION['meeting_name'];
    $location = $_SESSION['location'];
    $notes = $_SESSION['notes'];
    $group_name = $_SESSION['group_name'];
    $sTime = $_SESSION['sTime'];
    $eTime = $_SESSION['eTime'];
    $day = $_SESSION['day'];
}

?>

<body>
    <div class='page-wrapper'>
        <!--NAVBAR-->
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="dashboard.php">Field Trip</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li><a href="edit_groups.php">Groups</a></li>
                        <li><a href="help.php">Help</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="account_settings.php">Account</a></li>
                        <li><a href="index.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--CONTAINER FOR FIRST ROW-->
        <div class="container-fluid first-row">
            <!--TITLE AND LOGO-->
            <div class="row first-row" align="center">
                <div class="col-md-offset-4 col-md-4">
                    <div class="title">
                        <h1 id="meeting-name-header"><?php echo $meeting_name; ?></h1>
                        <a class="clickable" onclick='loadEditMeeting()' id="edit_meeting">Edit Meeting</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="logo">
                        <img src="./images/Logo.png" alt="logo" class="img-thumbnail" width="100px" height="100px">
                    </div>
                </div>
            </div>
        </div>
        <!--CONTAINER FOR SECOND ROW-->
        <div class="container-fluid second-row">
            <!--SECOND ROW-->
            <div class="col-md-4 group-module">
                <div class="group-box"><!--make dynamic-->
                    <h4 class="group-name"><?php echo $group_name; ?></h4>
                    <?php
                    $stmt = $conn->prepare("SELECT u.username, g.name
                    FROM user_group ug
                    inner join users u on u.id = ug.user_id
                    inner join groups g on g.id = ug.group_id
                    where g.name = '$group_name'");
                    $stmt->execute();
                    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $count = $stmt->rowCount();


                    if ($count > 0) {
                        for($i=0; $i<$count; $i++) {
                        $row = $rows[$i];
                        echo "<li class='list-group-item list-group-item'>".$row["username"]."</li>";
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-4 meeting-calendar">
                <!--CALENDAR STUFF-->
                <h4 class="date" id="day-time">
                    <h4 class="meeting-time"><?php echo $day; ?></h4>
                    <h4 class="meeting-time"><?php echo $sTime.' to '.$eTime; ?></h4>
                    <br>
                    <h4 class="location" id="location-info" ><?php echo $location; ?></h4>
                <!--Calendar from: https://codepen.io/profstein/pen/ozrbPJ-->
            </div>
            <div class="col-md-4 map-col">
                <h4 class="location">Location</h4>
                <div class="map">
                    <div class="map-space" id="map" style="width:300px;height:300px;background:black"></div>
                </div>
            </div>
        </div>
        <div class="row notes">
            <button class="meeting-notes" role="tooltip" data-toggle="popover" data-content=<?php echo $notes; ?>>Meeting Notes</button>
        </div>
    </div>
    <script>//placeholder//
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -33.8688, lng: 151.2195},
            zoom: 13,
            mapTypeId: 'roadmap'
        });
        var geocoder = new google.maps.Geocoder();

        geocodeAddress(geocoder, map);
      }

      var place_id = "<?php echo $location; ?>";
        console.log(place_id);
    function geocodeAddress(geocoder, resultsMap) {




        var address = document.getElementById('location-info');
        geocoder.geocode({'placeId': place_id}, function(results, status) {
            if (status === 'OK') {
                if (results[0]) {
                    resultsMap.setCenter(results[0].geometry.location);
                    var marker = new google.maps.Marker({
                        map: resultsMap,
                        position: results[0].geometry.location
                    });
                    address.textContent = results[0].formatted_address;
                } else {
                    window.alert('No results found');
                }
            } else {
                window.alert('Geocoder failed due to: ' + status);
            }
        });
    }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOMcE-hq4YPziF6CDJ3VLjXBCqeUy1daA&libraries=places&callback=initMap"></script>

<?php require 'footer.php' ?>