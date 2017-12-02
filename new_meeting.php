<!--Caroline Lee
  - 10-2-2017
  - Project
  - Edit Meeting
-->
<?php require 'header.php';
session_start();
if(session_id() == '' || !isset($_SESSION)) {
    header("location:index.php");
}
else {
    $meeting_name = "(Meeting Name)";
    include("config/db_connect.php");
    $user = $_SESSION['username'];
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
                    <li><a href="logout.php">Logout</a></li>
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
                    <h1 id="meeting-name" name="meeting-name"><?php echo $meeting_name; ?></h1>
                </div>
                <div class="link">
                    <div class="edit-name">
                        <a data-toggle="modal" class="clickable" data-target="#edit-name-modal">Change</a>
                    </div>
                </div>
                <!--EDIT NAME MODAL-->
                <div class="modal fade" id="edit-name-modal" role="dialog">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <!--use ajax here?-->
                                <div class="form-group">
                                    <label for="meeting-name">Enter Meeting Name</label>
                                    <input type="text" class="form-control" id="new-meeting-name" name="new-meeting-name">
                                    <button type="button" class="btn btn-default" onclick="changeName()" data-dismiss="modal">Submit</button>
                                </div>

                            </div>
                        </div>
                    </div>
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
        <div class="row second-row">
            <!--GROUP INFO, DATES, MAP-->
            <div class="col-md-offset-1 col-md-3 second-row-col-1-meeting">
                <select class="form-control" id="group-names" name="group-names">
                    <?php
                    $stmt = $conn->prepare("SELECT * FROM groups");
                    $stmt->execute();
                    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $count = $stmt->rowCount();
                    echo "<option value='" . 0 . "'>" . "(Select Group)" . "</option>";
                    if ($count > 0) {
                        for($i=0; $i<$count; $i++) {
                            $row = $rows[$i];
                            echo "<option value='" . $row["name"] . "'>" . $row['name'] . "</option>";
                        }
                    }
                    ?>
                </select>
                <div class="link">
                    <div class="edit-groups">
                        <a href="edit_groups.php">Edit Groups</a>
                    </div>
                </div>
                <br>
                <div class="group-box-elements">
                    <div class="group-box-meeting" id="group-members" name="group-members">
                    </div>
                </div>
            </div>
            <div class="col-md-3 second-row-col-2">
                <div class="start-date-dropdown">
                    <div class="form-group">
                        <label for='datetimepicker'>Date: </label>
                        <input type="text" id="datepicker">
                    </div>
                </div>

                <div class="time">
                    <label for="time1">From: </label>
                    <input type="text" id="time1" class="time ui-timepicker-input" autocomplete="off">
                </div>
                <div class="time">
                    <label for="time2">To: </label>
                    <input type="text" id="time2" class="time ui-timepicker-input" autocomplete="off">
                </div>



                <!--datepickers from: https://codepen.io/milz/pen/xbXpWw-->
                <div class="notes-board">
                    <div class="form-group">
                        <label for="notes">Notes:</label>
                        <textarea class="form-control" rows="5" id="notes"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-3 second-row-col-3">
                <div class="map">
                    <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                    <div id="map" style="width:350px;height:350px;background:black"></div>
                </div>
            </div>
        </div>
    </div>
    <!--CONTAINER FOR THIRD ROW-->
    <div class="container-fluid">
        <div class="row third-row">
            <div class="col-md-offset-4 col-md-4 third-row-col-1">
                <button type="button" class="btn btn-primary" onclick="saveMeeting()">Save</button>
                <span class="popuptext" id="confirmSaved">Saved!</span>
            </div>
        </div>
    </div>
</div>
<script>//https://developers.google.com/maps/documentation/javascript/examples/places-searchbox//

    var plaec_id = "";
    var address  = "";
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 35.964668, lng: -83.926453},
            zoom: 13,
            mapTypeId: 'roadmap'
        });

        var geocoder = new google.maps.Geocoder();


        var input = document.getElementById('pac-input');

        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        map.addListener('bounds_changed', function() {
            searchBox.setBounds(map.getBounds());
        });

        var markers = [];

        searchBox.addListener('places_changed', function() {
            var places = searchBox.getPlaces();

            if (places.length == 0) {
                return;
            }

            // Clear out the old markers.
            markers.forEach(function(marker) {
                marker.setMap(null);
            });
            markers = [];

            // For each place, get the icon, name and location.
            var bounds = new google.maps.LatLngBounds();
            places.forEach(function(place) {
                if (!place.geometry) {
                    console.log("Returned place contains no geometry");
                    return;
                }

                var icon = {
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25)
                };

                // Create a marker for each place.
                markers.push(new google.maps.Marker({
                    map: map,
                    icon: icon,
                    title: place.name,
                    position: place.geometry.location
                }));

                var meeting_name = document.getElementById("new-meeting-name").value;

                place_id = place.place_id;
                address = place.formatted_address;

                //storeNewLocation(place.place_id, place.formatted_address, meeting_name);

                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });

            map.fitBounds(bounds);
        });
    }


</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOMcE-hq4YPziF6CDJ3VLjXBCqeUy1daA&libraries=places&callback=initMap"></script>
<?php require 'footer.php' ?>