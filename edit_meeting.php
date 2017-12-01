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

    include("config/db_connect.php");

    $meeting_name = $_SESSION['meeting_name'];
    //$location = $_SESSION['location'];
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
                        <h1 id="meeting-name-edit" name="meeting-name-edit"><?php echo $meeting_name;?></h1>
                    </div>
                    <div class="link">
                        <div class="edit-name">
                            <a data-toggle="modal" class="clickable" data-target="#edit-name-modal-edit">Change</a>
                        </div>
                    </div>
                    <!--EDIT NAME MODAL-->
                    <div class="modal fade" id="edit-name-modal-edit" role="dialog">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <!--use ajax here?-->
                                        <div class="form-group">
                                            <label for="meeting-name-edit">Enter Meeting Name</label>
                                            <input type="text" class="form-control" id="new-meeting-name-edit" name="new-meeting-name-edit">
                                            <button type="button" class="btn btn-default" onclick="changeNameEdit()" data-dismiss="modal">Submit</button>
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
                        <select class="form-control" id="meeting-edit-group-names" name="meeting-edit-group-names">
                            <?php
                            $group_name = $_SESSION['group_name'];
                            $stmt = $conn->prepare("SELECT * FROM groups");
                            $stmt->execute();
                            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            $count = $stmt->rowCount();
                            echo "<option value='" . 0 . "'>" . $group_name . "</option>";
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
                        <div class="group-box-meeting" id="group-edit-members" name="group-edit-members">
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
                </div>
                <div class="col-md-3 second-row-col-2">
                    <div class="start-date-dropdown">
                        <div class="form-group">
                            <label for='datetimepicker'>Date: </label>
                            <input type="text" class="datepicker" id="datepicker-edit" value="<?php echo $day; ?>">
                        </div>
                    </div>

                    <div class="time">
                        <label for="time1">From: </label>
                        <input type="text" id="time1-edit" class="time ui-timepicker-input" autocomplete="off" value="<?php echo $sTime; ?>">
                    </div>
                    <div class="time">
                        <label for="time2">To: </label>
                        <input type="text" id="time2-edit" class="time ui-timepicker-input" autocomplete="off"value="<?php echo $eTime; ?>">
                    </div>
                    <!--datepickers from: https://codepen.io/milz/pen/xbXpWw-->
                    <div class="notes-board">
                        <div class="form-group">
                            <label for="notes">Notes:</label>
                            <textarea class="form-control" rows="5" id="notes-edit"><?php echo $notes; ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 second-row-col-3" id="map-column">

                    <div class="map">
                        <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                        <div class="map-space" id="map" style="width:300px;height:300px;background:black"></div>
                    </div>

                </div>
            </div>
        </div>
        <!--CONTAINER FOR THIRD ROW-->
        <div class="container-fluid">
            <div class="row third-row">
                <div class="col-md-offset-4 col-md-4 third-row-col-1">
                    <button type="button" class="btn" onclick="clearAll()">Clear</button>
                    <button type="button" class="btn" onclick="updateMeeting()">Save</button>
                    <span class="popuptext" id="confirmSaved">Saved!</span>
                </div>
            </div>
        </div>
    </div>

    <script>//placeholder//
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -33.8688, lng: 151.2195},
                zoom: 13,
                mapTypeId: 'roadmap'
            });
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