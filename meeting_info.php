<!--Caroline Lee
  - 10-2-2017
  - Project
  - Meeting Info
-->
<?php require 'header.php' ?>

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
                        <h1>Meeting Name</h1>
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
                    <h4 class="group-name">Group Name</h4>
                    <li class="list-group-item list-group-item">Group member 1</li>
                    <li class="list-group-item list-group-item">Group member 2</li>
                    <li class="list-group-item list-group-item">Group member 3</li>
                    <li class="list-group-item list-group-item">Group member 4</li>
                    <li class="list-group-item list-group-item">Group member 5</li>
                </div>
            </div>
            <div class="col-md-4 meeting-calendar">
                <!--CALENDAR STUFF-->
                <div class="googleCalendar">
                    <h4 class="meeting-time">7:00pm-11:00pm</h4>
                    <iframe src="https://calendar.google.com/calendar/embed?title=Put%20your%20Title%20here&amp;showCalendars=0&amp;height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;src=8d3fc8l9g04n7r9im45fsn08ak%40group.calendar.google.com&amp;color=%238D6F47&amp;ctz=America%2FNew_York" width=310 height=300 frameborder="0" scrolling="no"></iframe>
                </div>
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
            <button class="meeting-notes" role="tooltip" data-toggle="popover" data-content="Notes about the meeting... anything that the user needs to know">Meeting Notes</button>
        </div>
    </div>
<script>//placeholder//
      function initMap() {
        var uluru = {lat: -25.363, lng: 131.044};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOMcE-hq4YPziF6CDJ3VLjXBCqeUy1daA&callback=initMap"></script>

    <?php require 'footer.php' ?>